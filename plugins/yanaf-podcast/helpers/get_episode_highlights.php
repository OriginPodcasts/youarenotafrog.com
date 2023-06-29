<?php function yanaf_get_episode_highlights($post_id=null) {
    if ($post_id === null) {
        $post_id = get_the_ID();
    }

    $highlights = array();
    if ($text = get_post_meta($post_id, 'highlights', true)) {
        $lines = explode("\n", $text);
        $highlights = array();

        foreach ($lines as $line) {
            $matches = [];
            if (preg_match('/^(?:-\s*)?\[([\d:]+)\]:?\s*(.+)$/', $line, $matches)) {
                $timestamp = $matches[1];
                $description = $matches[2];
                $highlights[] = [
                    'timestamp' => $timestamp,
                    'description' => $description
                ];
            }
        }
    }

    return $highlights;
}