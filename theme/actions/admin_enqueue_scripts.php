<?php add_action('admin_enqueue_scripts', 'yanaf_action_admin_enqueue_scripts');
function yanaf_action_admin_enqueue_scripts() {
    global $pagenow;

    if ($pagenow == 'edit.php' && isset($_GET['post_type']) && $_GET['post_type'] == 'review') {
        wp_enqueue_style('yanaf-admin-review-list-style', get_template_directory_uri() . '/admin/css/review-list.css');
    }
}
