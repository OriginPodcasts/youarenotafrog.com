<ul id="links" class="resource-link-buttons">
    <?php foreach (get_resource_ctas() as $cta) { ?>
        <li>
            <a href="<?php echo $cta['url']; ?>"<?php if ($cta['external']) { ?> target="_blank"<?php } ?> class="small button">
                <?php esc_html_e($cta['label']); ?>
            </a>
        </li>
    <?php } ?>
    <li><a href="<?php echo get_post_type_archive_link('resource'); ?>" class="small button">See other resources</a></li>
</ul>