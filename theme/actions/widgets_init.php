<?php add_action('widgets_init', 'yanaf_widgets_init');
function yanaf_widgets_init() {
    register_sidebar(
        array(
            'name' => __('Footer', 'yanaf'),
            'id' => 'sidebar-1',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
        )
    );
}