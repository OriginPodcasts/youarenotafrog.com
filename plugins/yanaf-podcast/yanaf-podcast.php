<?php

/*
Plugin Name: YANAF Podcast Sync
Description: Podcast-specific functionality for youarenotafrog.com
Author: Mark Steadman
Version: 2023.1
Author URI: http://origin.fm/
*/

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

define('YANAF_PODCAST_VERSION', '2023.1');

function activate_yanaf_podcast() {
	require_once plugin_dir_path(__file__) . 'includes/class-activator.php';
	YANAF_Podcast_Activator::activate();
}

function deactivate_yanaf_podcast() {
	require_once plugin_dir_path(__file__) . 'includes/class-deactivator.php';
	YANAF_Podcast_Deactivator::deactivate();
}

register_activation_hook(__file__, 'activate_yanaf_podcast');
register_deactivation_hook(__file__, 'deactivate_yanaf_podcast');
require plugin_dir_path(__file__) . 'includes/class-yanaf-podcast.php';

require plugin_dir_path(__file__) . 'helpers/get_collections.php';
require plugin_dir_path(__file__) . 'helpers/get_collection_image_id.php';
require plugin_dir_path(__file__) . 'helpers/get_popular_post_tags.php';

function run_yanaf_podcast() {
	$plugin = new YANAF_Podcast();
	$plugin->run();
}

run_yanaf_podcast();