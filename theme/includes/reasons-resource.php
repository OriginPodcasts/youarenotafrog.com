 <?php if ($reasons = get_field('reasons')) { ?>
    <section id="reasons" class="post-section resource-section resource-reasons">
        <h2><?php the_resource_reasons_header(); ?></h2>
        <div class="grid-x grid-margin-x">
            <div class="cell medium-9 medium-offset-3">
                <?php echo apply_filters('the_content', $reasons); ?>
            </div>
        </div>
    </section>
<?php }