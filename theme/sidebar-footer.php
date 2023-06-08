<?php if (!dynamic_sidebar('footer')) { ?>
    <div class="follow-cell">
        <h2>Follow</h2>
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
<?php }