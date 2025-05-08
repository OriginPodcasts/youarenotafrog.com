<?php class YANAF_Podcast_Admin {
	private $plugin_name;
	private $version;
	private $importer;

	public function __construct($plugin_name, $version) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;

		require_once plugin_dir_path(dirname(__file__)) . 'includes/class-importer.php';
		require_once ABSPATH . '/wp-admin/includes/import.php';
		
		$this->importer = new YANAF_Podcast_Importer();
		register_importer(
			'yanaf-episode',
			'Podcast Episodes',
			'Import episodes from the You Are Not a Frog podcast',
			array($this->importer, 'activate')
		);
	}

	public function enqueue_styles() {
		wp_enqueue_style($this->plugin_name, plugin_dir_url(__file__) . 'css/yanaf-admin.css', array(), $this->version, 'all');
	}

	public function enqueue_scripts() {
		wp_enqueue_script($this->plugin_name, plugin_dir_url(__file__) . 'js/yanaf-admin.js', array('jquery'), $this->version, false);
	}
}
