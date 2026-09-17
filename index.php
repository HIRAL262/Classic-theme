<?php
/**
 * The main template file.
 *
 * @package Meridian
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div class="container">
	<main id="primary" class="site-main content-area">
		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
			<?php endwhile; ?>

			<?php the_posts_pagination( array( 'mid_size' => 2 ) ); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>
	</main><!-- #primary -->

	<?php get_sidebar(); ?>
</div>

<?php
get_footer();
