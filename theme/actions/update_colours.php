<?php function yanaf_update_colours() {
    $styles = array();

    foreach (get_terms('collection') as $term) {
        $slug = $term->slug;

        if ($colour = get_term_meta($term->term_id, 'colour', true)) {
            $colour = apply_filters('yanaf_collection_colour', $colour);
            $styles["collection-$slug"] = array(
                sprintf('background-color: %s', $colour)
            );

            $colour = apply_filters('yanaf_collection_colour', $colour);
            $styles["collection-$slug-dark"] = array(
                sprintf('background-color: %s', $colour)
            );
        }
    }

    foreach (get_posts(array('post_type' => 'resource')) as $post) {
        $slug = $post->post_name;

        if ($colour = get_post_meta($post->ID, 'colour', true)) {
            $colour = apply_filters('yanaf_resource_colour', $colour);
            $styles["resource-$slug"] = array(
                sprintf('background-color: %s', $colour)
            );

            $colour = apply_filters('yanaf_resource_colour', $colour);
            $styles["resource-$slug-dark"] = array(
                sprintf('background-color: %s', $colour)
            );
        }
    }

    $css = '';
    if (count($styles)) {
        foreach ($styles as $slug => $style) {
            $css .= sprintf(".%s { %s }\n", $slug, implode(';', $style));
        }
    }

    update_option('yanaf_colours_css', $css, true);
}

add_action('yanaf_update_colours', 'yanaf_update_colours');