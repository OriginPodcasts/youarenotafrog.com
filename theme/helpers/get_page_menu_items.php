<?php function yanaf_get_page_menu_items() {
    $current_page_id = get_queried_object_id();
    $parent_page_id = wp_get_post_parent_id($current_page_id);

    if (!$parent_page_id) {
        $parent_page_id = $current_page_id;
    }

    $items = array(
        array(
            'url' => get_permalink($parent_page_id),
            'title' => get_the_title($parent_page_id),
            'active' => $current_page_id == $parent_page_id
        )
    );

    // Get the child pages of the top-level parent page
    $children = get_pages(
        array(
            'child_of' => $parent_page_id,
            'sort_column' => 'menu_order',
            'hierarchical' => false
        )
    );

    foreach ($children as $page) {
        $items[] = array(
            'url' => get_permalink($page->ID),
            'title' => $page->post_title,
            'active' => $current_page_id == $page->ID
        );
    }

    return $items;
}