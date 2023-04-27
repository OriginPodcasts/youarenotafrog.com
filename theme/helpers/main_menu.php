<?php function yanaf_main_menu() {
    wp_nav_menu(
        array(
            'theme_location' => 'main-menu',
            'container' => '',
            'fallback_cb' => false,
            'menu_class' => 'menu vertical medium-horizontal drilldown',
            'walker' => new YANAF_Menu_Walker()
        )
    );
}