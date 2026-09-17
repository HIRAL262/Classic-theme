<?php
/**
 * Template for displaying search forms.
 *
 * @package Meridian
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$meridian_unique_id = wp_unique_id( 'search-form-' );
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr( $meridian_unique_id ); ?>" class="screen-reader-text">
		<?php echo esc_html_x( 'Search for:', 'label', 'meridian' ); ?>
	</label>
	<input type="search" id="<?php echo esc_attr( $meridian_unique_id ); ?>" class="search-field"
		placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'meridian' ); ?>"
		value="<?php echo esc_attr( get_search_query() ); ?>" name="s" />
	<button type="submit" class="search-submit">
		<?php echo esc_html_x( 'Search', 'submit button', 'meridian' ); ?>
	</button>
</form>
