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
				<img src="<?php bloginfo('template_directory'); ?>/assets/img/header-bg-smith-sinclair-1.png"/>
			</div>
			<div class="col-lg-4">
				<img src="<?php bloginfo('template_directory'); ?>/assets/img/header-bg-smith-sinclair-2.png"/>
				<h1>Wij zijn Smith <br> & sinclair</h1>
				<span>En onze missie is om volwassen zijn leuker te maken</span>
			</div>
			<div class="col-lg-4">
				<img src="<?php bloginfo('template_directory'); ?>/assets/img/header-bg-smith-sinclair-3.png"/>
			</div>
		</div>
	</div>
</div>


<!-- Products Section -->
<div id="products">
	<div class="container-xxl">
			<div class="col-12 text-center">
				<h2>Nu populair</h2>
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

			?>

				<div class="product d-flex flex-column">
					<img src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" class="product-image mx-auto" />
					<p class="product-title"><?php the_title() ?></p>
					<span class="product-price"><?php echo $product->get_price_html();  ?></span>
					<a href="<?php the_permalink() ?>" class="btn btn-primary">In winkelwagen</a>
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
		<h2>Voor wie zoek je wat?</h2>
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
						$category_id = $cat->term_id; ?>
						<div class="col-lg-6 col-11 me-lg-2 mx-auto mt-3 category clickable" style="background: url('<?php bloginfo('template_directory'); ?>/assets/img/header-bg-smith-sinclair-1.png');">
							<a href="<?php echo get_term_link($cat->slug, 'product_cat') ?>"><?php echo $cat->name ?></a>
						</div>	
					<?php } ?>				
			<?php } ?>
		</div>
	</div>
</div>

<!-- Featured Section -->
<div id="featured">
	<div class="container-xxl">
		<div class="d-lg-flex d-block flex-row align-items-center">
			 <div class="featured-image col-lg-6 col-12">
					<img src="<?php bloginfo('template_directory'); ?>/assets/img/header-bg-smith-sinclair-1.png')">
				</div>
				<div class="col-lg-5 col-12 offset-lg-1 offset-0">
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