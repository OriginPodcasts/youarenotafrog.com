<?php class YANAF_Podcast_Cron {
    public static $job_name = 'yanaf_sync';
    public static $recurrence = 'hourly';
    public static $add_time = '+5 minutes';

    public function perform() {
        require_once plugin_dir_path(dirname(__file__)) . 'includes/class-importer.php';
        $this->importer = new YANAF_Podcast_Importer();
        $this->importer->begin_import(
            array('url' => ''),
            true
        );
    }
}