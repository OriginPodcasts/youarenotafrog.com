<?php add_action('edited_resource_type', 'yanaf_edited_resource_type', 10, 2);
function yanaf_edited_resource_type($term_id) {
    if ($singular = (isset($_POST['singular_name']) ? $_POST['singular_name'] : '')) {
        update_term_meta($term_id, 'singular_name', $singular);
    } else {
        delete_term_meta($term_id, 'singular_name');
    }
}
