<?php class YANAF_Podcast {
	protected $plugin_name;
	protected $version;

	public function __construct() {
		if (defined('YANAF_PODCAST_VERSION')) {
			$this->version = YANAF_PODCAST_VERSION;
		} else {
			$this->version = '1.0.0';
		}

		$this->plugin_name = 'yanaf';
		$this->load_dependencies();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	private function load_dependencies() {
		require_once plugin_dir_path(dirname(__file__)) . 'includes/class-episode.php';
		require_once plugin_dir_path(dirname(__file__)) . 'includes/class-collection.php';
		require_once plugin_dir_path(dirname(__file__)) . 'includes/class-loader.php';
		require_once plugin_dir_path(dirname(__file__)) . 'includes/class-cron.php';
		require_once plugin_dir_path(dirname(__file__)) . 'admin/class-admin.php';
		require_once plugin_dir_path(dirname(__file__)) . 'public/class-public.php';

		$this->loader = new YANAF_Podcast_Loader();

		// Register post types
		$this->post_types = array(
			new YANAF_Podcast_Episode()
		);

		foreach($this->post_types as $post_type) {
			$this->loader->add_action('init', $post_type, 'register_post_type');
			$this->loader->add_filter(
				sprintf('manage_edit-%s_columns', $post_type->type_name),
				$post_type,
				'add_admin_columns'
			);

			$this->loader->add_filter(
				sprintf('manage_%s_posts_custom_column', $post_type->type_name),
				$post_type,
				'print_custom_column_data',
				10,
				2
			);

			$this->loader->add_action('wp_head', $post_type, 'wp_head');
		}

		$this->collections = array(
			new YANAF_Podcast_Collection()
		);

		foreach($this->collections as $collection) {
			$this->loader->add_action('init', $collection, 'register_taxonomy');
			$this->loader->add_action('admin_enqueue_scripts', $collection, 'admin_enqueue_scripts');
			$this->loader->add_action('registered_taxonomy', $collection, 'registered_taxonomy');
		}

		$this->cron = new YANAF_Podcast_Cron();
		add_action(YANAF_Podcast_Cron::$job_name, array($this->cron, 'perform'));
	}

	private function define_admin_hooks() {
		$plugin_admin = new YANAF_Podcast_Admin($this->get_plugin_name(), $this->get_version());
		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');
	}

	private function define_public_hooks() {
		$plugin_public = new YANAF_Podcast_Public($this->get_plugin_name(), $this->get_version());
		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');
	}

	public function run() {
		$this->loader->run();
	}

	public function get_plugin_name() {
		return $this->plugin_name;
	}

	public function get_loader() {
		return $this->loader;
	}

	public function get_version() {
		return $this->version;
	}
}
