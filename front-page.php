<?php
/**
 * The front page template file.
 *
 * @package psrm
 */

get_header(); ?>

<?php if ( is_active_sidebar( 'home-museum-info' ) ): ?>

	<div class="row">
		<div id="above-content" class="museum-info content-area">
			<main id="above-main" class="above-site-main row">
				<?php dynamic_sidebar( 'home-museum-info' ); ?>
			</main>
		</div>
	</div>

<?php endif; ?>

<div class="row">

	<div id="primary" class="content-area">
		<main id="main" class="site-main row" role="main">

			<div id="home-welcome" class="col-xs-12">
				<?php dynamic_sidebar( 'home-welcome' ); ?>
			</div>
			<!-- #welcome -->

		</main>
		<!-- #main -->
	</div>
	<!-- #primary -->

</div>

<div class="row">

	<div id="secondary" class="content-area">
		<main id="main" class="site-main row" role="main">

			<div id="home-cta" class="home-widget-cta">
				<?php dynamic_sidebar( 'home-cta' ); ?>
			</div>

		</main>
		<!-- #main -->
	</div>
	<!-- #secondary -->

</div>
<div class="row">

	<div id="latest-news" class="content-area col-sm-8">
		<h1>Latest News From The Campo Depot</h1>
		<hr/>

		<?php
		query_posts( 'showposts=1' );
		while ( have_posts() ) : the_post();
			$news_id[] = get_the_ID();
			?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

					<div class="entry-meta">
						<?php psrm_posted_on(); ?> by <?php the_author(); ?>
					</div>
					<!-- .entry-meta -->
				</header>
				<!-- .entry-header -->

				<div class="entry-content">
					<?php
					the_excerpt( sprintf(
						__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'psrm' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );
					?>

				</div>
				<!-- .entry-content -->

				<footer class="entry-footer">
					<?php psrm_entry_footer(); ?>
				</footer>
				<!-- .entry-footer -->
			</article><!-- #post-## -->

		<?php endwhile; ?>
		<?php wp_reset_query(); ?>

	</div>
	<div id="latest-news-sidebar" class="content-area col-sm-4">
		<h2>Older News</h2>
		<hr/>
		<?php
		query_posts( array( 'post__not_in' => $news_id, 'showposts' => 3 ) );

		while ( have_posts() ): the_post();
			?>

			<?php the_title( sprintf( '<h4><a href="%s" rel=bookmark>', esc_url( get_permalink() ) ), '</a></h4>' );
			psrm_posted_on(); ?>

		<?php
		endwhile;
		wp_reset_query();
		?>
	</div>
</div>
<?php get_footer(); ?>
