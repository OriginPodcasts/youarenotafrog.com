<?php class YANAF_Podcast_Importer {
    public function activate() {
        if ($this->is_post()) {
            try {
                if ($data = $this->clean()) {
                    if ($this->begin_import($data)) {
                        return;
                    }
                }
            } catch (Exception $ex) {
                $this->message($ex->getMessage(), 'error');
            }
        }

        $this->show_form();
    }

    private function show_form() {
        $url = isset($_POST['url']) ? $_POST['url'] : '';
        $importer = 'yanaf-episode';
        require_once dirname(dirname(__file__)) . '/admin/partials/import-form.php';
    }

    private function is_post() {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    private function clean() {
        if ($url = $_POST['url']) {
            if (filter_var($url, FILTER_VALIDATE_URL) !== false) {
                return array(
                    'url' => $url
                );
            }
        }

        throw new Exception('Enter a valid RSS feed URL.');
    }

    private function begin_import($data, $silent=false) {
        if ($rss = @simplexml_load_file($data['url'])) {
            if (!$silent) {
                echo '<div class="wrap"><h2>Importing...</h2><ul>';
            }

            $max_execution_time = ini_get('max_execution_time');
            ini_set('max_execution_time', 60 * 60);

            try {
                $index = 1;

                foreach ($rss->channel->item as $item) {
                    try {
                        $this->import_item($item, $silent);
                    } catch (Exception $ex) {
                        throw new Exception(
                            sprintf(
                                'Erorr importing item %d: %s',
                                $index,
                                $ex->getMessage()
                            )
                        );
                    } finally {
                        $index ++;
                    }
                }

                if (!$silent) {
                    echo '<li><b>All done!</b></li>';
                }
            } finally {
                ini_set('max_execution_time', $max_execution_time);
                if (!$silent) {
                    echo '</ul></div>';
                }
            }
        }

        return true;
    }

    private function import_item($item, $silent=false) {
        $updated = false;
        if ($post = $this->get_post((string)$item->guid)) {
            $post = $this->update_post($post->ID, $item);
            $updated = true;
        } else {
            $post = $this->create_post($item);
        }

        $this->update_post_meta($post->ID, $item);
        $this->set_post_thumbnail($post->ID, $item);

        if (!$silent) {
            printf(
                '<li>%s <a href="%s" target="_blank">%s</a></li>',
                $updated ? 'Updated' : 'Imported',
                get_permalink($post->ID),
                $post->post_title
            );

            flush();
        }
    }

    private function get_post($guid) {
        $query = new WP_Query(
            array(
                'post_type' => 'episode',
                'meta_key' => '__yanaf_guid',
                'meta_value' => $guid,
                'posts_per_page' => 1
            )
        );

        if ($query->have_posts() ) {
            return $query->posts[0];
        }
    }

    private function line_is_heading($text) {
        if (preg_match("/^\*\*.+\*\*$/", $text)) {
            return true;
        }

        if (preg_match("/^#{1,6} /", $text)) {
            return true;
        }

        return false;
    }

    private function get_section_for_heading($text) {
        if (preg_match("/reasons.*listen/i", $text)) {
            return 'reasons';
        }

        if (preg_match("/highlights/i", $text)) {
            return 'highlights';
        }

        if (preg_match("/resources/i", $text)) {
            return 'links';
        }
    }

    private function parse_link($text) {
        if (!preg_match("/[\*-] ?\[([^\]]+)\]\(([^\)]+)\) ?$/i", $text, $match)) {
            if (preg_match("/[\*-] ?([^\*]+)$/i", $text, $match)) {
                return array('content' => $match[1]);
            }

            if (trim($text)) {
                return array('content' => trim($text));
            }

            return false;
        }

        return array(
            'url' => $match[2],
            'content' => $match[1]
        );
    }

    private function parse_highlight($text) {
        if (!preg_match("/\[([^\]]+)\] ?(.+)$/i", $text, $match)) {
            return false;
        }

        return array(
            'timestamp' => $match[1],
            'content' => $match[2]
        );
    }

    private function parse_description($text, $only_section=null) {
        require_once dirname(dirname(__file__)) . '/vendor/markdownify/Converter.php';
        require_once dirname(dirname(__file__)) . '/vendor/markdownify/ConverterExtra.php';
        require_once dirname(dirname(__file__)) . '/vendor/markdownify/Parser.php';

        $converter = new Markdownify\Converter(2, false, false);
        $markdown = @$converter->parseString($text);
        $section = 'notes';
        $parsed = array($section => '');
        $lines = preg_split("/\r\n|\n|\r/", $markdown);

        foreach($lines as $line) {
            if ($this->line_is_heading($line)) {
                if ($line_section = $this->get_section_for_heading($line)) {
                    if ($line_section !== $section) {
                        $section = $line_section;
                        
                        if (!isset($parsed[$section])) {
                            $parsed[$section] = '';
                        }
                    }
                } else {
                    $section = null;
                }

                continue;
            }

            if ($section !== 'notes' && $only_section === 'notes') {
                return $parsed;
            }

            if (!$section) {
                continue;
            }

            switch ($section) {
                case 'links':
                    if (!$line) {
                        break;
                    }

                    if (!is_array($parsed[$section])) {
                        $parsed[$section] = array();
                    }

                    if ($link = $this->parse_link($line)) {
                        $parsed[$section][] = $link;
                    }

                    break;

                case 'highlights':
                    if (!$line) {
                        break;
                    }

                    if (!is_array($parsed[$section])) {
                        $parsed[$section] = array();
                    }

                    if ($highlight = $this->parse_highlight($line)) {
                        $parsed[$section][] = $highlight;
                    }

                    break;

                default:
                    $parsed[$section] .= "\n" . $line;
                    break;
            }
        }

        return $parsed;
    }

    private function get_post_args($item) {
        $timezone = wp_timezone();
        $date = date_create_from_format('D, d M Y H:i:s T', $item->pubDate);
        $date->setTimezone( $timezone );
        $post_date = $date->format('Y-m-d H:i:s');
        $description = $this->parse_description(
            (string)$item->description,
            'notes'
        );

        $args = array(
            'post_type' => 'episode',
            'post_title' => (string)$item->title,
            'post_content' => $description['notes'],
            'post_status' => 'publish',
            'post_date' => $post_date,
            'post_date_gmt' => get_gmt_from_date($post_date)
        );

        if ($itunes = $item->children('itunes', true)) {
            if ($number = $itunes->episode) {
                $args['post_name'] = (string)$itunes->episode;
            }
        }

        return $args;
    }

    private function create_post($item) {
        $args = $this->get_post_args($item);
        $post_id = wp_insert_post($args, true);

        if (is_wp_error($post_id)) {
            throw new Exception($post_id->get_error_message());
        }

        return get_post($post_id);
    }

    private function update_post($id, $item) {
        $args = $this->get_post_args($item);
        $args['ID'] = $id;
        $post_id = wp_update_post($args, true);

        if (is_wp_error($post_id)) {
            throw new Exception($post_id->get_error_message());
        }

        return get_post($post_id);
    }

    private function update_post_meta($id, $item) {
        update_post_meta($id, '__yanaf_guid', (string)$item->guid);

        if ($itunes = $item->children('itunes', true)) {
            if ($number = $itunes->episode) {
                update_post_meta($id, 'itunes_number', (string)$number);
            }

            if ($type = $itunes->episodeType) {
                update_post_meta($id, 'itunes_type', (string)$type);
            }

            if ($duration = $itunes->duration) {
                update_post_meta($id, 'itunes_duration', (string)$duration);
            }
        }

        $description = $this->parse_description(
            (string)$item->description
        );

        require_once dirname(dirname(__file__)) . '/vendor/markdown-extra.php';
        if (isset($description['reasons'])) {
            $reasons = Markdown($description['reasons']);
            update_post_meta($id, 'reasons', $reasons);
        }

        if (isset($description['links']) && is_array($description['links']) && count($description['links'])) {
            $links = array();
            foreach ($description['links'] as $link) {
                if (isset($link['url'])) {
                    $links[] = array(
                        'content' => sprintf(
                            '<a href="%s" target="_blank">%s</a>',
                            $link['url'],
                            trim($link['content'])
                        )
                    );
                } else {
                    $links[] = array(
                        'content' => trim(Markdown($link['content']))
                    );
                }
            }

            if (!($prev_links = get_post_meta($id, 'links', true))) {
                $prev_links = 0;
            }

            for ($i = count($links); $i < $prev_links; $i ++) {
                delete_post_meta($id, sprintf('links_%d_icon', $i));
                delete_post_meta($id, sprintf('_links_%d_icon', $i));
                delete_post_meta($id, sprintf('links_%d_content', $i));
                delete_post_meta($id, sprintf('_links_%d_content', $i));
            }

            foreach($links as $i => $link) {
                foreach ($link as $key => $value) {
                    update_post_meta($id, sprintf('links_%d_%s', $i, $key), $value);
                }
            }

            update_post_meta($id, 'links', count($links));
        }

        if (isset($description['highlights']) && is_array($description['highlights']) && count($description['highlights'])) {
            $highlights = array();
            foreach ($description['highlights'] as $highlight) {
                $highlights[] = array(
                    'timestamp' => trim($highlight['timestamp']),
                    'description' => trim(Markdown($highlight['content']))
                );
            }

            if (!($prev_highlights = get_post_meta($id, 'highlights', true))) {
                $prev_highlights = 0;
            }

            for ($i = count($highlights); $i < $prev_highlights; $i ++) {
                delete_post_meta($id, sprintf('highlights_%d_timestamp', $i));
                delete_post_meta($id, sprintf('_highlights_%d_timestamp', $i));
                delete_post_meta($id, sprintf('highlights_%d_content', $i));
                delete_post_meta($id, sprintf('_highlights_%d_content', $i));
            }

            foreach($highlights as $i => $highlight) {
                foreach ($highlight as $key => $value) {
                    update_post_meta($id, sprintf('highlights_%d_%s', $i, $key), $value);
                }
            }

            update_post_meta($id, 'highlights', count($highlights));
        }
    }

    private function set_post_thumbnail($id, $item) {
        if ($itunes = $item->children('itunes', true)) {
            $image = $itunes->image;
            $attrs = $image->attributes();
            $url = esc_url_raw((string)$attrs['href']);
            $redownload = true;

            if ($attachment = get_post_thumbnail_id($id)) {
                if ($original_url = get_post_meta($attachment, '__yanaf_url', true)) {
                    if ($original_url == $url) {
                        $redownload = false;
                    }
                }
            }

            if ($redownload) {
                if ($attachment = media_sideload_image($url, $id, 'Episode artwork', 'id')) {
                    update_post_meta($attachment, '__yanaf_url', $url);
                }
            }

            if ($attachment) {
                set_post_thumbnail($id, $attachment);
            }
        }
    }

    public function message($message, $kind='updated') {
        printf('<div class="%s"><p>%s</p></div>', $kind, $message);
    }
}