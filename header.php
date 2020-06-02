<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package psrm
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_shortcode('[psrm-service-alerts]'); ?>
<div id="page" class="hfeed site">
    <a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'psrm'); ?></a>

    <header id="masthead" class="site-header" role="banner">
        <div class="site-branding">
            <?php if (get_header_image()) { ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <img src="<?php header_image(); ?>" class="img-responsive"
                         alt="<?php echo esc_attr(get_post_meta(get_custom_header()->attachment_id, '_wp_attachment_image_alt', true)); ?>">
                </a>
            <?php } else { ?>
                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                          rel="home"><?php bloginfo('name'); ?></a></h1>
                <h2 class="site-description"><?php bloginfo('description'); ?></h2>
            <?php } ?>
        </div>
        <div class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <nav class="collapse navbar-collapse" role="navigation">
                <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'sm sm-simple')); ?>
            </nav>
        </div>
    </header><!-- #masthead -->

    <div id="content" class="site-content">
