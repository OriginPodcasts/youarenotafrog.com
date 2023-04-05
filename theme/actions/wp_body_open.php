<?php add_action('wp_body_open', 'yanaf_skip_link', 5);
function yanaf_skip_link() {
    echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__('Skip to the content', 'yanaf') . '</a>';
}