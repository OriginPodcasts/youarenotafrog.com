<?php function yanaf_get_resource_categories($internal=null) {
    if ($internal === true || $internal === false) {
        global $wpdb;

        $sql = (
            "SELECT DISTINCT\n    t.term_id\n" .
            "FROM\n    $wpdb->term_taxonomy AS tt\n" .
            "INNER JOIN\n    $wpdb->term_relationships AS tr ON tt.term_taxonomy_id = tr.term_taxonomy_id\n" .
            "INNER JOIN\n    $wpdb->terms AS t ON tt.term_id = t.term_id\n" .
            "INNER JOIN\n    $wpdb->posts AS p ON tr.object_id = p.ID\n" .
            "LEFT JOIN\n    $wpdb->postmeta AS pm ON p.ID = pm.post_id\n"
        );

        if ($internal === true) {
            $sql .= (
                 "WHERE \n    tt.taxonomy = %s\n" .
                 "AND\n    p.post_type = %s\n" .
                 "AND\n    pm.meta_key = %s\n" .
                 "AND\n    pm.meta_value = %s"
            );

            $query = $wpdb->prepare(
                $sql,
                'resource_category',
                'resource',
                'external',
                '1'
            );
        } else {
            $sql .= (
                "WHERE\n    tt.taxonomy = %s\nAND\n    p.post_type = %s\n" .
                "AND (\n" .
                "    (\n        pm.meta_key = %s\n    AND\n        pm.meta_value = %s\n    )\n    OR " .
                "pm.post_id NOT IN (\n" .
                "        SELECT DISTINCT post_id FROM $wpdb->postmeta WHERE meta_key = %s AND meta_value = %s\n" .
                "    )\n" .
                ")"
            );

            $query = $wpdb->prepare(
                $sql,
                'resource_category',
                'resource',
                'external',
                '0',
                'external',
                '1'
            );
        }

        $results = $wpdb->get_results($query);
        $terms = array();

        foreach ($results as $result) {
            $terms[] = WP_Term::get_instance($result->term_id, 'resource_category');
        }

        return $terms;
    }

    return get_terms(
        array('taxonomy' => 'resource_category')
    );
}