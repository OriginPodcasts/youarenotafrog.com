<?php get_header(); ?>

<div class="hero">
    <div class="grid-container">
        <p class="h1">The podcast for doctors and other busy people</p>
        <p class="subtitle">Beat burnout. Work happier</p>
        <p class="scroll-link-container"><a href="#main"><i class="fi-arrow-down"></i> Scroll to explore</a></p>
    </div>
</div>

<main class="grid-container">
    <div class="grid-x grid-margin-x">
        <div class="medium-8 cell">
            <p><img src="https://placehold.it/900x450&text=Promoted Article" alt="main article image"></p>
        </div>
        <div class="medium-4 cell">
            <p><img src="https://placehold.it/400x200&text=Other cool article" alt="article promo image" alt="advertisement for deep fried Twinkies"></p>
            <p><img src="https://placehold.it/400x200&text=Other cool article" alt="article promo image"></p>
        </div>
    </div>
    <hr>

    <div class="text-center">
        <h4 style="margin: 0;" class="text-center">BREAKING NEWS</h4>
    </div>

    <hr>
    <section class="grid-container">
        <div class="grid-x grid-margin-x small-up-3 medium-up-4 large-up-5">
            <div class="cell">
                <img src="https://placehold.it/400x370&text=Look at me!" alt="image for article">
            </div>

            <div class="cell">
                <img src="https://placehold.it/400x370&text=Look at me!" alt="image for article">
            </div>

            <div class="cell">
                <img src="https://placehold.it/400x370&text=Look at me!" alt="image for article">
            </div>

            <div class="cell show-for-medium">
                <img src="https://placehold.it/400x370&text=Look at me!" alt="image for article">
            </div>

            <div class="cell show-for-large">
                <img src="https://placehold.it/400x370&text=Look at me!" alt="image for article">
            </div>
        </div>
    </section>

    <hr>

    <div class="text-center">
        <h4 style="margin: 0;" class="text-center">LATEST STORIES</h4>
    </div>

    <hr>

    <div class="grid-x grid-margin-x">
        <div class="large-8 cell" style="border-right: 1px solid #E3E5E8;">
        	<?php if (have_posts()) {
    			while (have_posts()) {
    				the_post(); ?>

    				<article class="grid-x grid-margin-x">
    		            <div class="large-6 cell">
    		                <a href="<?php the_permalink(); ?>"><img src="https://placehold.it/600x370&text=Look at me!" alt="image for article" alt="aAticle preview image"></a>
    		            </div>
    		            <div class="large-6 cell">
    		                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
    		                <p>
    		                    <span><i class="fi-torso"> By <?php the_author(); ?> &nbsp;&nbsp;</i></span>
    		                    <span><i class="fi-calendar"> <?php the_date(); ?> &nbsp;&nbsp;</i></span>
    		                </p>
    		                
                            <?php the_excerpt(); ?>
    		            </div>
    		        </article>
    			<?php }
    		}

    		get_template_part('nav', 'below'); ?>
    	</div>

    	<div class="grid-x large-4 cell">
    		<?php get_sidebar(); ?>
        </div>
    </div>
</main>

<?php get_footer();