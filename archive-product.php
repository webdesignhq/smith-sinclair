<?php
/* Template Name: shoppage */

get_header();
?>

<?php 

if ( is_product_category() ){
    global $wp_query;

    // get the query object
    $cat = $wp_query->get_queried_object();

    // get the thumbnail id using the queried category term_id
    $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true ); 

    // get the image URL
    $image = wp_get_attachment_url( $thumbnail_id ); 
}

?>
<div id="products">
	<div class="container-xxl col-12 d-lg-flex d-block flex-row">

		<?php if (have_posts()) : ?>     
		<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			

			$args = array(
				'post_type'      => 'product',
				'posts_per_page' => 12,
				'paged' => $paged,
				'tax_query'     => array(
					array(
						'taxonomy'  => 'product_cat',
						'field'     => 'id', 
						'terms'     => $cat
					)
				)
			);

			$loop = new WP_Query( $args );

			while ( $loop->have_posts() ) : $loop->the_post();
				global $product;

		?>

		<div class="product d-flex flex-column">
			<a href="#" class="product__favorites--button"><i class="fa-regular fa-heart" aria-hidden="true"></i></a>
			<img style="width:100%;" src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" class="product__image mx-auto" />
			<p class="product-title"><?php the_title() ?></p>
			<span class="product-price"><?php echo $product->get_price_html();  ?></span>
			<a href="<?php the_permalink() ?>" class="btn btn-primary">In winkelwagen</a>
		</div>

		<?php endwhile; ?>

		 <?php else: ?>
		<p>Sorry, er zijn geen producten gevonden<p>
			<?php endif ?>
  
	</div>
</div>

<?php
get_footer();

?>