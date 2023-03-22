<?php class YANAF_Podcast_Deactivator {
	public static function deactivate() {
		require_once plugin_dir_path(dirname(__file__)) . 'includes/class-cron.php';
		wp_clear_scheduled_hook(YANAF_Podcast_Cron::$job_name);
	}
}
