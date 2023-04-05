<?php add_action('manage_review_posts_custom_column', 'yanaf_manage_review_posts_custom_column', 10, 2);
function yanaf_manage_review_posts_custom_column($column, $post_id) {
    if ($column == 'content') {
        $content = get_post_field('post_content', $post_id);
        $truncated_content = wp_trim_words($content, 20, '...');
        $edit_url = get_edit_post_link($post_id);
        echo '<a href="' . esc_url($edit_url) . '" class="row-title">' . strip_tags($truncated_content) . '</a>';
    }
}