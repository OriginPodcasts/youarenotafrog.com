<?php

/*
Plugin Name: YANAF Kajabi Forms
Description: Podcast-specific functionality for youarenotafrog.com
Author: Mark Steadman
Version: 2023.1
Author URI: http://origin.fm/
*/

add_shortcode('kajabi_form', 'yanaf_kajabi_form_shortcode');
function yanaf_kajabi_form_shortcode($args) {
    if (array_key_exists('id', $args)) {
        return '<script src="https://www.shapestoolkit.com/forms/' . $args['id'] . '/embed.js"></script>';
    }

    if (count($args)) {
        return '<script src="https://www.shapestoolkit.com/forms/' . $args[0] . '/embed.js"></script>';   
    }
}

add_action('kajabi_form', 'yanaf_kajabi_form_action');
function yanaf_kajabi_form_action($id) {
    echo '<script src="https://www.shapestoolkit.com/forms/' . $id . '/embed.js"></script>';
}
