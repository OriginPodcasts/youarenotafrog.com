<?php add_action('after_setup_theme', 'yanaf_setup');
function yanaf_setup() {
	global $content_width;

	load_theme_textdomain('yanaf', get_template_directory() . '/languages');
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('responsive-embeds');
	add_theme_support('automatic-feed-links');
	add_theme_support('html5', array('search-form', 'navigation-widgets'));

	// Remove unused image sizes
	remove_image_size('1536x1536');
	remove_image_size('2048x2048');

	// Define image sizes compatible with Foundation
	// breakpoints.
	add_image_size('f-sm-whole', 620, 9999);
	add_image_size('f-sm-whole-sq', 620, 620, true);
	add_image_size('f-sm-whole-16x9', 620, 349, true);
	add_image_size('f-sm-whole-9x16', 349, 539, true);
	add_image_size('f-sm-third-sq', 206, 206, true);

	add_image_size('f-md-whole', 1004, 9999);
	add_image_size('f-md-half', 497, 9999);
	add_image_size('f-md-half-sq', 497, 497, true);
	add_image_size('f-md-half-16x9', 497, 280, true);
	add_image_size('f-md-third-9x16', 254, 393, true);
	add_image_size('f-md-sixth-sq', 166, 166, true);

	add_image_size('f-lg-whole', 1980, 9999);
	add_image_size('f-lg-half', 585, 9999);
	add_image_size('f-lg-half-sq', 585, 585, true);
	add_image_size('f-lg-half-16x9', 585, 329, true);
	add_image_size('f-lg-third-9x16', 282, 437, true);
	add_image_size('f-lg-sixth-sq', 195, 195, true);

	add_image_size('f-xlarge-whole', 1420, 9999);

	add_image_size('y-sm-carousel-sq', 620, 620, true);
	add_image_size('y-md-carousel-long', 247, 342, true);
	add_image_size('y-lg-carousel-long', 247, 342, true);

	if (!isset($content_width)) {
		$content_width = 1920;
	}

	register_nav_menus(
		array(
			'main-menu' => esc_html__('Main Menu', 'yanaf')
		)
	);

	register_nav_menus(
		array(
			'footer-menu' => esc_html__('Footer Menu', 'yanaf')
		)
	);
}

add_action('wp_enqueue_scripts', 'yanaf_enqueue');
function yanaf_enqueue() {
	wp_enqueue_style('yanaf-style', get_stylesheet_uri());
	wp_dequeue_script('jquery');
    wp_deregister_script('jquery');
}

add_filter('document_title_separator', 'yanaf_document_title_separator');
function yanaf_document_title_separator($sep) {
	$sep = esc_html('|');
	return $sep;
}

add_filter('the_title', 'yanaf_title');
function yanaf_title($title) {
	if ($title == '') {
		return esc_html('...');
	}
	
	return wp_kses_post($title);
}

function yanaf_schema_type() {
	$schema = 'https://schema.org/';
	if (is_single()) {
		$type = 'Article';
	} elseif (is_author()) {
		$type = 'ProfilePage';
	} elseif (is_search()) {
		$type = 'SearchResultsPage';
	} else {
		$type = 'WebPage';
	}

	echo 'itemscope itemtype="' . esc_url($schema) . esc_attr($type) . '"';
}

add_filter('nav_menu_link_attributes', 'yanaf_schema_url', 10);
function yanaf_schema_url($atts) {
	$atts['itemprop'] = 'url';
	return $atts;
}

if (!function_exists('yanaf_wp_body_open')) {
	function yanaf_wp_body_open() {
		do_action('wp_body_open');
	}
}

add_action('wp_body_open', 'yanaf_skip_link', 5);
function yanaf_skip_link() {
	echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__('Skip to the content', 'yanaf') . '</a>';
}

add_filter('the_content_more_link', 'yanaf_read_more_link');
function yanaf_read_more_link() {
	if (!is_admin()) {
		return ' <a href="' . esc_url(get_permalink()) . '" class="more-link">' . sprintf(__('...%s', 'yanaf'), '<span class="screen-reader-text">  ' . esc_html(get_the_title()) . '</span>') . '</a>';
	}
}

add_filter('excerpt_more', 'yanaf_excerpt_read_more_link');
function yanaf_excerpt_read_more_link($more) {
	if (!is_admin()) {
		global $post;
		return ' <a href="' . esc_url(get_permalink($post->ID)) . '" class="more-link">' . sprintf(__('...%s', 'yanaf'), '<span class="screen-reader-text">  ' . esc_html(get_the_title()) . '</span>') . '</a>';
	}
}

add_filter('big_image_size_threshold', '__return_false');
add_filter('intermediate_image_sizes_advanced', 'yanaf_image_insert_override');
function yanaf_image_insert_override($sizes) {
	unset($sizes['medium_large']);
	unset($sizes['1536x1536']);
	unset($sizes['2048x2048']);
	return $sizes;
}

add_action('widgets_init', 'yanaf_widgets_init');
function yanaf_widgets_init() {
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar Widget Area', 'yanaf'),
			'id' => 'primary-widget-area',
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);
}

add_action('wp_head', 'yanaf_pingback_header');
function yanaf_pingback_header() {
	if (is_singular() && pings_open()) {
		printf('<link rel="pingback" href="%s" />' . "\n", esc_url(get_bloginfo('pingback_url')));
	}

    
    if ($css = get_option('yanaf_colours_css')) {
    	printf('<style id="yanaf-collection-styles">%s</style>', $css);
    }
}

add_action('comment_form_before', 'yanaf_enqueue_comment_reply_script');
function yanaf_enqueue_comment_reply_script() {
	if (get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}

function yanaf_custom_pings($comment) { ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo esc_url(comment_author_link()); ?></li>
<?php }

add_filter('get_comments_number', 'yanaf_comment_count', 0);
function yanaf_comment_count($count) {
	if (!is_admin()) {
		global $id;
	
		$get_comments = get_comments('status=approve&post_id=' . $id);
		$comments_by_type = separate_comments($get_comments);
		return count($comments_by_type['comment']);
	}
	
	return $count;
}

function yanaf_init() {
	foreach (glob(dirname(__file__) . '/classes/*.php') as $filename) {
		require_once($filename);
	}

	foreach (glob(dirname(__file__) . '/helpers/*.php') as $filename) {
		require_once($filename);
	}

	foreach (glob(dirname(__file__) . '/post_types/*.php') as $filename) {
		require_once($filename);
	}

	foreach (glob(dirname(__file__) . '/actions/*.php') as $filename) {
		require_once($filename);
	}
}

yanaf_init();

add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('yanaf_collection_colour', 'yanaf_darken');
add_filter('yanaf_resource_colour', 'yanaf_darken');
