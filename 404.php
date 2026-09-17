<?php
/**
 * The template for displaying 404 pages (not found).
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
		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Nothing here', 'meridian' ); ?></h1>
			</header>

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Try a search below.', 'meridian' ); ?></p>
				<?php get_search_form(); ?>
			</div>
		</section>
	</main><!-- #primary -->
</div>

<?php
get_footer();
