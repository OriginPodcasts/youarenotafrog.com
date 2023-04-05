<?php add_filter('get_comments_number', 'yanaf_comment_count', 0);
function yanaf_comment_count($count) {
    if (!is_admin()) {
        global $id;
    
        $get_comments = get_comments('status=approve&post_id=' . $id);
        $comments_by_type = separate_comments($get_comments);
        return count($comments_by_type['comment']);
    }
    
    return $count;
}