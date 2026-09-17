<?php
/**
 * The template for displaying search results pages.
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
				<h1 class="page-title">
					<?php
					printf(
						/* translators: %s: search query. */
						esc_html__( 'Search Results for: %s', 'meridian' ),
						'<span>' . get_search_query() . '</span>' // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					);
					?>
				</h1>
			</header><!-- .page-header -->

			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', 'search' );
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
