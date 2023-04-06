<?php add_action('init', 'yanaf_init');
function yanaf_init() {
    add_rewrite_rule('^download/([0-9]+)$', 'index.php?download_resource_id=$matches[1]/$', 'top');
    add_rewrite_rule('^recommends$', 'index.php?post_type=resource&external_resource=true', 'top');
    add_rewrite_rule('^recommends-categories/([\w-]+)$', 'index.php?post_type=resource&resource_category=$matches[1]&external_resource=true', 'top');
    wp_enqueue_style('yanaf-style', get_stylesheet_uri());
}
