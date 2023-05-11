<?php function yanaf_the_episode_player($post_id=null) {
    if ($post_id === null) {
        $post_id = get_the_ID();
    }

    foreach (get_post_meta($post_id, 'player_url') as $url) {
        if ($url) {
            printf('<iframe src="%s" loading="lazy" frameborder="no" scrolling="no" width="100%%" height="182" class="yanaf-episode-player" seamless></iframe>', $url);
            return;
        }
    }

    foreach (get_post_meta($post_id, '__yanaf_guid') as $guid) {
        if ($guid) {
            printf('<iframe src="//player.captivate.fm/episode/%s" loading="lazy" frameborder="no" scrolling="no" width="100%%" height="182" class="yanaf-episode-player" seamless></iframe>', $guid);
        }
    }
}