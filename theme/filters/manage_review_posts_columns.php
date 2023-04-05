<?php add_filter('manage_review_posts_columns', 'yanaf_manage_review_posts_columns');
function yanaf_manage_review_posts_columns($columns) {
    $new_columns = array();
    foreach ($columns as $column_name => $column_display_name) {
        if ($column_name == 'title' || $column_name == 'author') {
            continue;
        }

        if ($column_name == 'date') {
            $new_columns['content'] = __('Title');
            $new_columns['reviewer'] = __('Author');
        }

        $new_columns[$column_name] = $column_display_name;
    }

    return $new_columns;
}