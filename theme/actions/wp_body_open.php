<?php add_action('wp_body_open', 'yanaf_skip_link', 5);
function yanaf_skip_link() {
    echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__('Skip to the content', 'yanaf') . '</a>';

    $posts = get_posts(
        array(
            'post_type' => 'announcement',
            'numberposts' => 1
        )
    );

    foreach ($posts as $post) { ?>
        <div class="yanaf-alert">
            <div class="grid-container">
                <a href="<?php echo esc_attr(get_post_meta($post->ID, 'cta_url', true)); ?>" target="_blank">
                    <strong><?php echo esc_html($post->post_title); ?></strong>
                    <span class="hyphen">–</span>
                    <?php echo $post->post_content; ?>
                    <span class="button"><?php echo esc_attr(get_post_meta($post->ID, 'cta_text', true)); ?></span>
                </a>
            </div>
        </div> 
    <?php }
}
