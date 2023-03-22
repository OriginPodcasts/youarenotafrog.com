<?php function yanaf_footer_menu() {
    wp_nav_menu(
        array(
            'theme_location' => 'footer-menu',
            'container' => '',
            'fallback_cb' => false,
            'walker' => new YANAF_Menu_Walker()
        )
    );
}