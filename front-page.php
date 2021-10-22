<?php
/* Template Name: Homepagina */

get_header();
?>
<?php is_front_page(); ?>
<!-- Banner Section -->
<div id="banner">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-4">
				<img style="width:100%;" src="<?php bloginfo('template_directory'); ?>/assets/img/header-bg-smith-sinclair-1.png"/>
			</div>
			<div class="col-lg-4 banner-middle">
				<img style="width:100%;" src="<?php bloginfo('template_directory'); ?>/assets/img/header-bg-smith-sinclair-2.png"/>
				<div class="banner-content">
					<h1>Wij zijn Smith <br> & sinclair</h1>
					<span>En onze missie is om volwassen zijn leuker te maken</span>
				</div>
			</div>
			<div class="col-lg-4">
				<img style="width:100%;"  src="<?php bloginfo('template_directory'); ?>/assets/img/header-bg-smith-sinclair-3.png"/>
			</div>
		</div>
	</div>
	<div class="overlay"></div>
</div>


<!-- Products Section -->
<div id="products">
	<div class="container-xxl">
			<div class="col-12 text-center">
				<h2 class="my-5">Nu populair</h2>
			</div>

			<div class="col-12 d-lg-flex d-block flex-row">

			<?php  
				$args = array(
					'post_type'      => 'product',
					'posts_per_page' => 5
				);

				$loop = new WP_Query( $args );

				while ( $loop->have_posts() ) : $loop->the_post();
					global $product;
					$productID = $product->get_id();
					$productVar = wc_get_product( $productID );
					$checkout_url = wc_get_checkout_url(); 

			?>

				<div class="product d-flex flex-column justify-content-between clickable">
					<img src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" class="product-image mx-auto" />
					<p class="product-title"><?php the_title() ?></p>
					<span class="product-price"><?php echo $product->get_price_html();  ?></span>
					<!-- <?php echo '<a href="'. $checkout_url.'?add-to-cart=' .$productID. '" class="btn btn-primary">'?>In winkelwagen</a> -->
					<a href="<?php echo get_permalink(); ?>" class="btn btn-primary"><?php the_field('txt-btn', 'option'); ?></a>
					</div>

				<?php
				endwhile;
				wp_reset_query(); 
				?>
			</div>
		</div>
</div>	

<!-- Categories Section -->
<div id="categories">
	<div class="container-xxl mx-auto">
		<h2 class="my-5">Voor wie zoek je wat?</h2>
		<div class="categories d-lg-flex col-12 d-block flex-row justify-content-between align-items-end">

			<?php

			  $taxonomy     = 'product_cat';
			  $orderby      = 'name';  
			  $title        = '';  
			  $empty        = 0;

			  $args = array(
					 'taxonomy'     => $taxonomy,
					 'orderby'      => $orderby,
					 'title_li'     => $title,
					 'hide_empty'   => $empty
			  );


			 $all_categories = get_categories( $args );
			 foreach ($all_categories as $cat) { ?>
					<?php if($cat->category_parent == 0) {
						$category_id = $cat->term_id; 
						$thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true ); 
						$image = wp_get_attachment_url( $thumbnail_id ); ?>
						
						<div class="col-lg-6 p-5 col-11 me-lg-2 mx-auto mt-3 category clickable" style="background: url('<?php echo $image ?>'); background-size: cover;">
							<div class="category-title"><a href="<?php echo get_term_link($cat->slug, 'product_cat') ?>"><?php echo $cat->name ?></a></div>
							<p class="category-description"><?php echo $cat->description ?></p>
						</div>	
					<?php } ?>				
			<?php } ?>
		</div>
	</div>
</div>

<div id="instagram"></div>

<div id="about" class="col-5 mx-auto text-center">
	<p>Sinds begin 2021 is Smith & Sinclair in Nederland gevestigd en wordt het merk wereldwijd door diverse distributie partners zowel online als in de retail vertegenwoordigd. Onze missie "Make adult more fun". Met unieke combinaties van alcohol en zoetwaren brengen we het beste uit onze kindertijd samen met de guilty pleasures uit het volwassen leven. It's about sophistication, not intoxication!</p>						
</div>

<!-- Featured Section -->
<div id="featured">
	<div class="container-xxl">
		<div class="d-lg-flex d-block flex-row align-items-center" id="featured__split">
			 <div class="featured-image col-lg-6 col-12">
					<img src="<?php bloginfo('template_directory'); ?>/assets/img/header-bg-smith-sinclair-1.png')">
				</div>
			<div class="col-lg-6 h-100 col-12 offset-0" id="featured__text">
					<h3 class="featured-title">Nieuw! Naughty or Nice</h3>
					<div class="featured-description">
						<p>Nog nooit was het zo makkelijk om in de kerstsfeer te komen, met de Naughty or Nice giftboxes. <br>Van Countdown Calendar tot kerstboom ornament.
				<br>Steel dit jaar de kerstshow met de EAT YOUR DRINK Cocktail Gummies in een unieke kerstverpakking..
				<br> Zo makkelijk kan het zijn...</p>
						<br />
					</div>
			</div>
		</div>
	</div>
</div>


<?php
get_footer();

?>