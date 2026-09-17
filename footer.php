<?php
/**
 * The footer for our theme.
 *
 * @package Meridian
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container">
			<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) : ?>
				<div class="footer-widgets">
					<?php foreach ( array( 'footer-1', 'footer-2', 'footer-3' ) as $meridian_footer_sidebar ) : ?>
						<?php if ( is_active_sidebar( $meridian_footer_sidebar ) ) : ?>
							<div class="footer-widget-area">
								<?php dynamic_sidebar( $meridian_footer_sidebar ); ?>
							</div>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer',
					'menu_id'        => 'footer-menu',
					'container'      => false,
					'depth'          => 1,
					'fallback_cb'    => false,
				)
			);
			?>

			<div class="site-info">
				<?php
				$meridian_footer_text = get_theme_mod( 'meridian_footer_text' );
				if ( $meridian_footer_text ) {
					echo wp_kses_post( $meridian_footer_text );
				} else {
					printf(
						/* translators: 1: current year, 2: site name. */
						esc_html__( '&copy; %1$s %2$s. All rights reserved.', 'meridian' ),
						esc_html( gmdate( 'Y' ) ),
						esc_html( get_bloginfo( 'name' ) )
					);
				}
				?>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
