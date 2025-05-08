<?php function yanaf_init_theme() {
	$subdirs = array('classes', 'helpers', 'actions', 'filters', 'widgets');
	$mydir = dirname(__file__);

	foreach ($subdirs as $subdir) {
		$glob = sprintf('%s/%s/*.php', $mydir, $subdir);
		foreach (glob($glob) as $filename) {
			require_once($filename);
		}
	}
}

yanaf_init_theme();

add_filter('big_image_size_threshold', '__return_false');
add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('yanaf_collection_colour', 'yanaf_darken');
add_filter('yanaf_resource_colour', 'yanaf_darken');
add_filter('excerpt_more','__return_false');
