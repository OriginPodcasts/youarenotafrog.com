<?php add_action('acf/init', 'yanaf_acf_init');
function yanaf_acf_init() {
    acf_add_options_page(
        array(
            'page_title' => __('Resource List Settings'),
            'menu_title' => __('Settings'),
            'menu_slug' => 'resource-list-settings',
            'parent_slug' => 'edit.php?post_type=resource',
            'capability' => 'manage_options',
            'redirect' => false
        )
    );

    acf_add_options_page(
        array(
            'page_title' => __('Newsletter Form Settings'),
            'menu_title' => __('Newsletter'),
            'menu_slug' => 'newsletter-form-settings',
            'parent_slug' => 'options-general.php',
            'capability' => 'manage_options',
            'redirect' => false
        )
    );
}
