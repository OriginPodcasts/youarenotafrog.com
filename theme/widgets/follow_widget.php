<?php class YANAF_Follow_Widget extends WP_Widget {
    public function __construct() {
        $widget_options = array(
            'classname' => 'follow-widget',
            'description' => 'Displays a list of social follow links.',
        );
        
        parent::__construct('follow_widget', 'Social Links', $widget_options);
    }

    public function form($instance) {
        $title = isset($instance['title']) ? $instance['title'] : 'Follow'; ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
    <?php }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        return $instance;
    }

    public function widget($args, $instance) {
        echo $args['before_widget']; ?>
        <div class="follow-cell">
            <?php if (!empty($instance['title'])) {
                echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
            } ?>
            <ul class="follow-menu">
                <?php foreach (yanaf_get_social_links() as $link) { ?>
                    <li>
                        <a href="<?php esc_attr_e($link['url']); ?>" class="<?php esc_attr_e($link['slug']); ?>" title="<?php esc_attr_e($link['name']); ?>" rel="me external" target="_blank">
                            <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <title><?php esc_html_e($link['name']); ?></title>
                                <?php echo $link['icon']; ?>
                            </svg>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <?php echo $args['after_widget'];
    }
}