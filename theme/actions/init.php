<?php add_action('init', 'yanaf_init');
function yanaf_init() {
    add_rewrite_rule('^download/([0-9]+)$', 'index.php?download_resource_id=$matches[1]/$', 'top');
    add_rewrite_rule('^recommends$', 'index.php?post_type=resource&external_resource=true', 'top');
    add_rewrite_rule('^recommends-categories/([\w-]+)$', 'index.php?post_type=resource&resource_category=$matches[1]&external_resource=true', 'top');

    $mydir = get_template_directory();
    load_theme_textdomain('yanaf', "$mydir/languages");
    $subdirs = array('post_types', 'taxonomies', 'shortcodes');

    foreach ($subdirs as $subdir) {
        $glob = sprintf('%s/%s/*.php', $mydir, $subdir);
        foreach (glob($glob) as $filename) {
            require_once($filename);
        }
    }

    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script(
            'yanaf',
            get_stylesheet_directory_uri() . '/js/theme.js',
            array(),
            '2023.1',
            true
        );
    }
}
