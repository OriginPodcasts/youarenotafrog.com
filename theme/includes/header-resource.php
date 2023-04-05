<header class="post-header resource-header">
    <div class="grid-container">
        <div class="grid-x grid-margin-x">
            <div class="cell medium-7 align-self-middle">
                <p class="post-type resource-type"><?php the_resource_type(); ?></p>
                <h1 class="post-title resource-title"><?php the_title(); ?></h1>
                <div class="post excerpt resource-excerpt"><?php the_excerpt(); ?></div>
                <a href="<?php the_resource_download_url(); ?>" class="button" download>Download</a>
            </div>

            <div class="cell medium-5">
                <?php yanaf_img_srcset(
                    get_post_thumbnail_id(get_the_ID()),
                    get_the_title(),
                    array(
                        'medium' => 'f-md-third-9x16' /* Half-width on medium devices */,
                        'large' => 'f-lg-third-9x16' /* Half-width on large devices */
                    ),
                    true
                ); ?>
            </div>
        </div>

        <p class="scroll-link-container">
            <a href="#description">
                <i class="fi-arrow-down"></i>
                Scroll to explore
            </a>
        </p>
    </div>
</header>