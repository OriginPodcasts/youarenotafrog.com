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
require plugin_dir_path(__file__) . 'helpers/the_episode_player.php';
require plugin_dir_path(__file__) . 'helpers/episode_has_guests.php';
require plugin_dir_path(__file__) . 'helpers/episode_has_highlights.php';
require plugin_dir_path(__file__) . 'helpers/episode_has_links.php';
require plugin_dir_path(__file__) . 'helpers/episode_has_reasons.php';
require plugin_dir_path(__file__) . 'helpers/episode_has_transcript.php';
require plugin_dir_path(__file__) . 'helpers/get_episode_guest_count.php';
require plugin_dir_path(__file__) . 'helpers/get_episode_guests.php';
require plugin_dir_path(__file__) . 'helpers/get_episode_highlights.php';
require plugin_dir_path(__file__) . 'helpers/get_episode_links.php';
require plugin_dir_path(__file__) . 'helpers/the_episode_number.php';
require plugin_dir_path(__file__) . 'helpers/the_episode_reasons.php';
require plugin_dir_path(__file__) . 'helpers/the_episode_transcript.php';
require plugin_dir_path(__file__) . 'helpers/the_guest_names.php';
require plugin_dir_path(__file__) . 'helpers/the_guest_photos.php';

function run_yanaf_podcast() {
	$plugin = new YANAF_Podcast();
	$plugin->run();
}

run_yanaf_podcast();
