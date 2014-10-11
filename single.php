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

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php psrm_post_nav(); ?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>