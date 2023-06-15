<?php add_action('wp_footer', 'yanaf_wp_footer', 20);

function yanaf_wp_footer() {
    get_template_part('includes/search-modal'); ?>
    <script>$(document).foundation();</script>
<?php }