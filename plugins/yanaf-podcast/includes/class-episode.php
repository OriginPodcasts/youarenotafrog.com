<?php class YANAF_Podcast_Episode {
    public $type_name = 'episode';

    public function register_post_type() {
        register_post_type(
            $this->type_name,
            array(
                'label' => 'Episodes',
                'labels' => array(
                    'name' => _x('Episodes', 'Post type general name', 'yanaf'),
                    'singular_name' => _x('Episode', 'Post type singular name', 'yanaf'),
                    'menu_name' => _x('Episodes', 'Admin Menu text', 'yanaf'),
                    'name_admin_bar' => _x('Episode', 'Add New on Toolbar', 'yanaf'),
                    'add_new' => __('Add New', 'yanaf'),
                    'add_new_item' => __('Add New Episode', 'yanaf'),
                    'new_item' => __('New Episode', 'yanaf'),
                    'edit_item' => __('Edit Episode', 'yanaf'),
                    'view_item' => __('View Episode', 'yanaf'),
                    'all_items' => __('All Episodes', 'yanaf'),
                    'search_items' => __('Search Episodes', 'yanaf'),
                    'parent_item_colon' => __('Parent Episodes:', 'yanaf'),
                    'not_found' => __('No episodes found.', 'yanaf'),
                    'not_found_in_trash' => __('No episodes found in Trash.', 'yanaf'),
                    'featured_image' => _x('Episode Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'yanaf'),
                    'set_featured_image' => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'yanaf'),
                    'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'yanaf'),
                    'use_featured_image' => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'yanaf'),
                    'archives' => _x('Episode archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'yanaf'),
                    'insert_into_item' => _x('Insert into episode', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'yanaf'),
                    'uploaded_to_this_item' => _x('Uploaded to this episode', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'yanaf'),
                    'filter_items_list' => _x('Filter episodes list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'yanaf'),
                    'items_list_navigation' => _x('Episodes list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'yanaf'),
                    'items_list' => _x('Episodes list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'yanaf')
                ),
                'description' => 'Podcast episodes',
                'public' => true,
                'hierarchical' => false,
                'supports' => array('title', 'excerpt', 'editor', 'thumbnail', 'slug'),
                // 'taxonomies' => array('post_tag'),
                'menu_icon' => 'dashicons-microphone',
                'menu_position' => 4,
                'has_archive' => true,
                'rewrite' => array(
                    'slug' => 'episodes',
                    'with_front' => false,
                    'feeds' => false
                ),
                'delete_with_user' => false
            )
        );

        add_rewrite_rule('^episode-(\d+)$', 'index.php?episode_redirect=$matches[1]', 'top');
    }

    public function add_admin_columns($columns) {
        $columns['yanaf-number'] = '#';
        $columns['yanaf-type'] = 'Type';
        return $columns;
    }

    public function print_custom_column_data($column, $post_id) {
        switch ($column) {
            case 'yanaf-number':
                echo get_post_meta($post_id, 'itunes_number', true);
                break;

            case 'yanaf-type':
                echo get_post_meta($post_id, 'itunes_type', true);
                break;
        }
    }

    public function wp_head() {
        
    }

    public function query_vars($query_vars) {
        $query_vars[] = 'episode_redirect';
        return $query_vars;
    }

    public function template_redirect() {
        if ($episode_number = get_query_var('episode_redirect')) {
            $query = new WP_Query(
                array(
                    'post_type' => 'episode',
                    'meta_key' => 'itunes_number',
                    'meta_value' => intVal($episode_number),
                    'posts_per_page' => 1
                )
            );

            if ($query->have_posts()) {
                wp_redirect(get_permalink($query->post->ID), 301);
                exit;
            }

            global $wp_query;
            $wp_query->set_404();
            status_header(404);
            nocache_headers();
        }
    }
}