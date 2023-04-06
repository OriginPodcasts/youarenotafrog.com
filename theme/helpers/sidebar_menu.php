<?php function yanaf_sidebar_menu() {
    $categories = array();
    $html = '<ul class="menu">';
    $episode_list = (is_post_type_archive() && get_query_var('post_type') === 'episode') || get_query_var('tag') || is_tax('collection');
    $resource_list = (is_post_type_archive() && get_query_var('post_type') === 'resource') || is_tax('resource_type') || is_tax('resource_category');

    if ($episode_list) {
        foreach (yanaf_get_popular_post_tags() as $tag) {
            $categories[] = array(
                'title' => $tag->name,
                'url' => get_term_link($tag->term_id)
            );
        }
    }

    $items = array();

    if ($episode_list) {
        $items[] = array(
            'url' => get_post_type_archive_link('episode'),
            'title' => 'Most recent'
        );
    } else if ($resource_list) {
        $items[] = array(
            'url' => get_post_type_archive_link('resource'),
            'title' => 'Most recent'
        );
    }

    if (count($categories)) {
        $items[] = array(
            'title' => 'By category',
            'children' => $categories
        );
    }

    if ($resource_list) {
        foreach (yanaf_get_resource_categories() as $category) {
            $items[] = array(
                'title' => $category->name,
                'url' => get_term_link($category->term_id)
            );
        }
    }

    if ($episode_list) {
        $items[] = array(
            'url' => home_url('/recommends/'),
            'title' => 'Frog recommends'
        );
    }

    foreach ($items as $item) {
        $html .= yanaf_get_menu_item_html($item);
    }

    $html .= '</ul>';
    echo $html;
}