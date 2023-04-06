<?php add_action('init', 'yanaf_init');
function yanaf_init() {
    add_rewrite_rule('^download/([0-9]+)$', 'index.php?download_resource_id=$matches[1]/$', 'top');
    add_rewrite_rule('^recommends$', 'index.php?post_type=resource&external_resource=true', 'top');
}
