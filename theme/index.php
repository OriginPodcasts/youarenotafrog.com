<?php get_header();

if ($collection = yanaf_get_collection()) { ?>
    <header class="collection-header collection-<?php esc_attr_e($collection->slug); ?>-dark">
        <div class="grid-container">
            <h1 class="collection-name"><?php esc_html_e($collection->name); ?></h1>
            <div class="collection-description">
                <?php echo wpautop(esc_html($collection->description)); ?>
            </div>

            <?php if ($image_id = yanaf_get_collection_image_id($collection->term_id)) {
                if ($image = wp_get_attachment_image_src($image_id, 'f-sm-whole')) { ?>
                    <img alt="<?php esc_attr_e($collection->name); ?> thumbnail" src="<?php esc_attr_e($image[0]); ?>" width="<?php esc_attr_e($image[1]); ?>" class="collection-image">
                <?php }
            } ?>
        </div>
    </header>
<?php } else if (is_archive() && (get_query_var('post_type') === 'resource' || get_query_var('resource_type') || get_query_var('resource_category'))) { ?>
    <header class="resources-header">
        <div class="grid-container">
            <h1 class="list-title"><?php the_field('resources_title', 'option'); ?></h1>
            <div class="list-subtitle"><?php the_field('resources_subtitle', 'option'); ?></div>
        </div>
    </header>
<?php } ?>

<div class="grid-container">
    <div class="grid-x grid-margin-x">
        <?php get_sidebar(); ?>

        <section class="main archive cell medium-9">
            <?php if (is_search()) { ?>
                <form action="<?php esc_attr_e(home_url()); ?>" class="search-form">
                    <button type="submit" class="button">
                        <svg height="1.5em" version="1.1" viewBox="0 0 1200 1200" xmlns="http://www.w3.org/2000/svg">
                            <path d="m524.43 305.27c-120.86 0-219.16 98.297-219.16 219.16 0 120.86 98.297 219.16 219.16 219.16 55.031 0 105.31-20.484 143.82-54.078l200.73 200.73c5.5859 5.75 15.855 5.9336 21.492 0.23828 5.6367-5.6992 5.5742-16.207-0.23828-21.727l-200.5-200.5c33.535-38.496 53.844-88.848 53.844-143.82 0-120.86-98.297-219.16-219.16-219.16zm0 30.227c104.52 0 188.93 84.41 188.93 188.93 0 104.52-84.406 188.93-188.93 188.93-104.52 0-188.93-84.406-188.93-188.93 0-104.52 84.41-188.93 188.93-188.93z"/>
                        </svg>
                    </button>

                    <input type="search" name="s" placeholder="What are you looking for?">
                </form>
            <?php }

            if (have_posts()) { ?>
                <section class="breadcrumb">
                    <h2 class="archive-title"><?php yanaf_archive_title(); ?></h2>
                    <span class="archive-count">
                        /
                        <?php echo $wp_query->found_posts; ?>
                        result<?php if ($wp_query->found_posts !== 1) { ?>s<?php } ?>
                    </span>
                </section>

                <?php get_template_part('includes/loop', get_post_type());
                get_template_part('includes/pagination');
            } ?>
        </section>
    </div>
</div>

<?php get_footer();