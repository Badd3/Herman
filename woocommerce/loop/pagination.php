<?php
/**
 * Pagination - Show numbered pagination for catalog pages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/pagination.php.
 *
 * Create a pager facet in facetwp's settings and use that facet name in the code below.  Be sure to change
 * the shortcode to use your facet's name instead of "my_custom_pager"
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.3.1
 */
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
if ( function_exists('FWP') ) : ?>
	<div class="flex justify-center my-4">
  <?php echo facetwp_display( 'facet', 'load_more' ); // change 'my_custom_pager' to the name of your pager facet ?>
	</div>
<?php else :
 
  $total   = isset( $total ) ? $total : wc_get_loop_prop( 'total_pages' );
  $current = isset( $current ) ? $current : wc_get_loop_prop( 'current_page' );
  $base    = isset( $base ) ? $base : esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) );
  $format  = isset( $format ) ? $format : '';
  if ( $total <= 1 ) {
    return;
  }
  ?>
 
    <nav class="woocommerce-pagination">
      <?php
      echo paginate_links( apply_filters( 'woocommerce_pagination_args', array( // WPCS: XSS ok.
        'base'         => $base,
        'format'       => $format,
        'add_args'     => false,
        'current'      => max( 1, $current ),
        'total'        => $total,
        'prev_text'    => '←',
        'next_text'    => '→',
        'type'         => 'list',
        'end_size'     => 3,
        'mid_size'     => 3,
      ) ) );
      ?>
 
    </nav>
 
<?php endif; ?>