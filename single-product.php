<?php
/* Template Name: single product */

get_header();
?>


<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<div id="single-product">
	<div class="container-xxl">
		<div class="row">
			<?php
			while ( have_posts() ) : the_post();
				global $product;
				$productID = $product->get_id();
				$productVar = wc_get_product( $productID );
				$result = wc_get_checkout_url(); 
				$checkout_url = wc_get_checkout_url(); 
			?>
				<div class="col-lg-6 col-12 product__images--container text-center px-5">
					<!-- <img src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" class="product__image product__image--single mx-auto" /> -->
				   <?php do_action('woocommerce_before_single_product_summary'); ?>
				</div>
				<div class="col-lg-4 col-11 mx-auto mx-lg-0 product__info--container">
					<div class="row">
						<div class="col-11">
							<h1 class="product-title"><?php the_title() ?></h1>  
						</div>
						<div class="col-1">
							<a href="#" class="product__favorites--button"><i class="fa-regular fa-heart" aria-hidden="true"></i></a>
						</div>
					</div>
				   
					<div class="price--container row mt-4">
						<div class="col-4">
							<span class="price"><?php echo $product->get_price_html(); ?></span>
						</div>
					</div>
					<div class="product__cta--container row d-flex flex-row mt-5">
						<div class="col-8 d-flex justify-content-end"><span class="product__price--cta button__add--cart"><?php echo '<a href="'. $checkout_url.'?add-to-cart=' .$productID. '">'?>In Winkelwagen</a></span></div>
					</div>
				</div>
		</div>
	</div>
</div>

<?php
endwhile;
?>

<?php
get_footer();

?>