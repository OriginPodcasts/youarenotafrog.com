<?php class YANAF_Podcast_Activator {
	public static function activate() {
		if (!wp_next_scheduled(YANAF_Podcast_Cron::$job_name)) {
			wp_schedule_event(
				strtotime(YANAF_Podcast_Cron::$add_time),
				YANAF_Podcast_Cron::$recurrence,
				YANAF_Podcast_Cron::$job_name
			);
		}
	}
}
