<?php function yanaf_subscription_buttons($primary=false, $style='large') {
    $apps = array(
        'apple' => array(
            'name' => 'Apple Podcasts',
            'primary' => true
        ),
        'spotify' => array(
            'name' => 'Spotify',
            'primary' => true
        ),
        'google' => array(
            'name' => 'Google Podcasts'
        ),
        'amazon' => array(
            'name' => 'Amazon Music'
        ),
        'castbox' => array(
            'name' => 'CastBox',
            'inferred_from' => 'apple',
            'pattern' => '/^https?:\/\/podcasts\.apple\.com\/.+\/id(\d+)/',
            'replace' => 'https://castbox.fm/vic/$1'
        ),
        'overcast' => array(
            'name' => 'Overcast',
            'inferred_from' => 'apple',
            'pattern' => '/^https?:\/\/podcasts\.apple\.com\/.+\/id(\d+)/',
            'replace' => 'https://overcast.fm/itunes$1'
        ),
        'podcastaddict' => array(
            'name' => 'Podcast Addict'
        ),
        'pocketcasts' => array(
            'name' => 'Pocket Casts'
        )
    );

    echo('<p class="app-links app-links-' . $style . '">');

    foreach ($apps as $key => $app) {
        if ($primary) {
            if (!isset($app['primary']) || !$app['primary']) {
                continue;
            }
        }

        if (!($url = get_field(sprintf('podcast_link_%s', $key), 'option'))) {
            if (isset($app['inferred_from'])) {
                if ($inferred_url = get_field(sprintf('podcast_link_%s', $app['inferred_from']), 'option')) {
                    if (preg_match($app['pattern'], $inferred_url, $match)) {
                        $url = preg_replace($app['pattern'], $app['replace'], $inferred_url);
                    }
                }
            }
        }

        if (!$url) {
            continue;
        }

        $base = get_template_directory_uri() . '/img/buttons/';
        switch ($style) {
            case 'small':
                $img = $base . 'small/' . $key . '.png';
                $size = 48;
                break;
            default:
                $img = $base . $key . '.png';
                $size = 48;
                break;
        }

        if ($url) { ?>
            <a href="<?php esc_attr_e($url); ?>" rel="external me" title="<?php esc_attr_e($app['name']); ?>" target="_blank">
                <img src="<?php echo $img; ?>" alt="<?php esc_attr_e($app['name']); ?> icon" style="height: <?php echo $size; ?>px;">
            </a>
        <?php }
    }

    echo('</p>');
}