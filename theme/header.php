<!DOCTYPE html>
<html <?php language_attributes(); yanaf_schema_type(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>

        <div class="frogfest-alert">
            <div class="grid-container">
                <a href="https://www.shapestoolkit.com/frogfest" target="_blank">
                    <strong>Get your ticket to FrogFest 2024</strong>
                    <span class="hyphen">–</span>
                    Design the life you&rsquo;ll froggin&rsquo; love!
                    <span class="button">Book now</span>
                </a>
            </div>
        </div>
		
        <header class="site-header">
            <div class="grid-container">
                <div class="grid-x">
                    <div class="small-3 medium-2">
                        <a href="<?php esc_attr_e(home_url()); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php printf(__('%s logo', 'yanaf'), get_bloginfo('name')); ?>" class="yanaf-logo"></a>
                    </div>
                    <div class="small-6 medium-9">
                        <?php yanaf_main_menu(); ?>
                    </div>
                    <div class="small-3 medium-1">
                        <ul class="menu search-and-toggle">
                            <li>
                                <a href="javascript:;" data-open="search-modal">
                                    <i class="fi-magnifying-glass"></i>
                                </a>
                            </li>
                            <li class="title-bar hide-for-medium" data-responsive-toggle="menu-primary-menu">
                                <button class="menu-icon" type="button" data-toggle="menu-primary-menu"></button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
            