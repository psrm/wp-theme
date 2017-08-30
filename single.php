<?php
/**
 * The template for displaying all single posts.
 *
 * @package psrm
 */

get_header(); ?>

    <div class="row">

        <div id="primary" class="content-area col-sm-9">
            <main id="main" class="site-main" role="main">

                <?php while (have_posts()) : the_post(); ?>

                    <?php get_template_part('content', 'single'); ?>

                    <?php
                    // Don't print empty markup if there's nowhere to navigate.
                    $previous = (is_attachment()) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '', true);
                    $next = get_adjacent_post(false, '', false);
                    if (!$next && !$previous) {
                        return;
                    }
                    ?>
                    <nav class="navigation post-navigation" role="navigation">
                        <h1 class="screen-reader-text"><?php _e('Post navigation', 'psrm'); ?></h1>
                        <div class="nav-links">
                            <?php
                            previous_post_link('<div class="nav-previous">%link</div>', _x('<span class="meta-nav">&larr;</span>&nbsp;%title', 'Previous post link', 'psrm'));
                            next_post_link('<div class="nav-next">%link</div>', _x('%title&nbsp;<span class="meta-nav">&rarr;</span>', 'Next post link', 'psrm'));
                            ?>
                        </div><!-- .nav-links -->
                    </nav><!-- .navigation -->

                <?php endwhile; // end of the loop. ?>

            </main><!-- #main -->
        </div><!-- #primary -->

        <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>
