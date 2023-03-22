<?php class YANAF_Podcast_Collection {
    public $taxonomy_name = 'collection';

    public function register_taxonomy() {
        register_taxonomy(
            $this->taxonomy_name,
            'episode',
            array(
                'labels' => array(
                    'name' => _x('Collections', 'taxonomy general name'),
                    'singular_name' => _x('Collection', 'taxonomy singular name'),
                    'all_items' => __('All Collections'),
                    'edit_item' => __('Edit Collection'),
                    'view_item' => __('View Collection'),
                    'update_item' => __('Update Collection'),
                    'add_new_item' => __('Add New Collection'),
                    'new_item_name' => __('New Collection Name'),
                    'parent_item' => __('Parent Collection'),
                    'parent_item_colon' => __('Parent Collection:'),
                    'search_items' => __('Search Collections'),
                    'popular_items' => __('Popular Collections'),
                    'separate_items_with_commas' => __('Separate collections with commas'),
                    'add_or_remove_items' => __('Add or remove collections'),
                    'choose_from_most_used' => __('Choose from the most used collections'),
                    'not_found' => __('No collections found'),
                    'back_to_items' => __('Back to collections')
                ),
                'description' => 'Curated collections of podcast episodes',
                'public' => true,
                'hierarchical' => true,
                'rewrite' => array(
                    'slug' => 'collections',
                    'with_front' => false
                )
            )
        );
    }

    public function registered_taxonomy() {
        add_action($this->taxonomy_name . '_add_form_fields', array($this, 'add_image_field_to_add_form'), 10, 2);
        add_action($this->taxonomy_name . '_edit_form_fields', array($this, 'add_image_field_to_edit_form'), 10, 2);
        add_action('edited_' . $this->taxonomy_name, array($this, 'save_image_field'), 10, 2);
        add_action('create_' . $this->taxonomy_name, array($this, 'save_image_field'), 10, 2);
    }

    public function admin_enqueue_scripts() {
        $screen = get_current_screen();
        
        if ($screen->base == 'edit-tags' && $screen->taxonomy == $this->taxonomy_name) {
            wp_enqueue_media();
        }

        if ($screen->base == 'term' && $screen->taxonomy == $this->taxonomy_name) {
            wp_enqueue_media();
        }
    }

    public function add_image_field_to_add_form($taxonomy) {
        require_once plugin_dir_path(dirname(__file__)) . 'admin/partials/add-collection.php';
    }

    public function add_image_field_to_edit_form($term, $taxonomy) {
        if ($image_id = get_term_meta($term->term_id, 'featured_image', true)) {
            $image_url = wp_get_attachment_url($image_id);
        } else {
            $image_url = '';
        }

        require_once plugin_dir_path(dirname(__file__)) . 'admin/partials/edit-collection.php';
    }

    public function save_image_field($term_id) {
        $original_image = get_term_meta($term_id, 'featured_image', true);

        if (isset($_POST['featured_image'])) {
            if ($uploaded = $_POST['featured_image']) {
                update_term_meta(
                    $term_id,
                    'featured_image',
                    sanitize_text_field($uploaded)
                );

                if ((string)$uploaded !== (string)$original_image) {
                    do_action('yanaf_updated_collection_image', $term_id, intVal($uploaded));
                }
            } else {
                delete_term_meta($term_id, 'featured_image');
                do_action('yanaf_updated_collection_image', $term_id, 0);
                return;
            }
        }
    }
}