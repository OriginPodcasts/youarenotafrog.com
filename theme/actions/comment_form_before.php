<?php add_action('comment_form_before', 'yanaf_enqueue_comment_reply_script');
function yanaf_enqueue_comment_reply_script() {
    if (get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}