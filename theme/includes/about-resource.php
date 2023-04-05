<?php if ($about = get_field('about')) { ?>
    <section id="about" class="post-section post-about resource-section resource-about">
        <h2>About this <?php the_resource_type(); ?></h2>
        <?php echo apply_filters('the_content', $about); ?>
    </section>
<?php }