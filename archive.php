<?php
/**
 * The template for displaying archive pages.
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

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', get_post_type() );
			endwhile;

			the_posts_pagination( array( 'mid_size' => 2 ) );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
	</main><!-- #primary -->

	<?php get_sidebar(); ?>
</div>

<?php
get_footer();
