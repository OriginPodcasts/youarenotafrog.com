<?php function yanaf_main_menu() {
    wp_nav_menu(
        array(
            'theme_location' => 'main-menu',
            'container' => '',
            'fallback_cb' => false,
            'walker' => new YANAF_Menu_Walker()
        )
    );
}