<?php
/**
 * Template Name: No Sidebar
 * Description: A Page Template for displaying no sidebar.
 */

get_header(); ?>

<div class="row">

    <div id="primary" class="content-area col-sm-12">
        <main id="main" class="site-main" role="main">

            <?php while (have_posts()) : the_post(); ?>

                <?php get_template_part('content', 'page'); ?>

            <?php endwhile; // end of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->
</div>
<?php get_footer(); ?>
