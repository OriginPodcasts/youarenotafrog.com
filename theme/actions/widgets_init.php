<?php add_action('widgets_init', 'yanaf_widgets_init');
function yanaf_widgets_init() {
    register_sidebar(
        array(
            'name' => __('Footer', 'yanaf'),
            'id' => 'sidebar-1',
            'before_widget' => '<div class="footer-widget">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
        )
    );

    register_widget('YANAF_Follow_Widget');
}