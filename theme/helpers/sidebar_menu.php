<?php function yanaf_sidebar_menu() {
    $categories = array();
    $html = '<ul class="menu">';

    foreach(yanaf_get_popular_post_tags() as $tag) {
        $categories[] = array(
            'title' => $tag->name,
            'url' => get_term_link($tag->term_id)
        );
    }

    $items = array(
        array(
            'url' => home_url('/episodes/'),
            'title' => 'Most recent'
        ),
        array(
            'title' => 'By category',
            'children' => $categories
        ),
        array(
            'url' => home_url('/recommends/'),
            'title' => 'Frog recommends'
        )
    );

    foreach ($items as $item) {
        $html .= yanaf_get_menu_item_html($item);
    }

    echo $html;
}