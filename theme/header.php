<!DOCTYPE html>
<html <?php language_attributes(); yanaf_schema_type(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>
		
        <header class="site-header">
            <div class="grid-container">
                <div class="grid-x">
                    <div class="medium-2">
                        <a href="<?php esc_attr_e(home_url()); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php printf(__('%s logo', 'yanaf'), get_bloginfo('name')); ?>" class="yanaf-logo"></a>
                    </div>
                    <div class="medium-8">
                        <?php yanaf_main_menu(); ?>
                    </div>
                    <div class="medium-2">
                        <ul class="menu search-menu">
                            <li>
                                <a href="#search"><i class="fi-magnifying-glass"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
            