<ul class="menu">
    <li><a href="#description">Description</a></li>

    <?php if (get_field('about')) { ?>
        <li><a href="#about">About this <?php the_resource_type(); ?></a></li>
    <?php }

    if (get_field('reasons')) { ?>
        <li><a href="#reasons">Reasons to download</a></li>
    <?php } ?>

    <li><a href="#links">Download</a></li>
</ul>