<?php add_action('wp_body_open', 'yanaf_skip_link', 5);
function yanaf_skip_link() {
    echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__('Skip to the content', 'yanaf') . '</a>';

    $posts = new WP_Query(
        array(
            'post_type' => 'announcement',
            'posts_per_page' => 1,
            'meta_query' => array(
                'relation' => 'OR',
                array(
                    'key' => 'expires',
                    'compare' => 'NOT EXISTS'
                ),
                array(
                    'key' => 'expires',
                    'value' => ''
                ),
                array(
                    'key' => 'expires',
                    'value' => date('Y-m-d H:i:s'),
                    'compare' => '>'
                )
            )
        )
    );

    while ($posts->have_posts()) {
        $posts->the_post();
        global $post; ?>
        <div class="yanaf-alert">
            <div class="grid-container">
                <a href="<?php echo esc_attr(get_post_meta(get_the_ID(), 'cta_url', true)); ?>" target="_blank">
                    <strong><?php echo esc_html($post->post_title); ?></strong>
                    <span class="hyphen">–</span>
                    <?php echo $post->post_content; ?>
                    <span class="button"><?php echo esc_attr(get_post_meta(get_the_ID(), 'cta_text', true)); ?></span>
                </a>
            </div>
        </div> 
    <?php }

    wp_reset_postdata();
}
