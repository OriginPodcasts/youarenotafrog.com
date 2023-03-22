<?php class YANAF_Podcast_Episode {
    public $type_name = 'episode';

    public function register_post_type() {
        register_post_type(
            $this->type_name,
            array(
                'label' => 'Episodes',
                'description' => 'Podcast episodes',
                'public' => true,
                'hierarchical' => false,
                'supports' => array('title', 'editor', 'thumbnail', 'slug'),
                'taxonomies' => array('post_tag'),
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
}