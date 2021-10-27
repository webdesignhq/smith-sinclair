<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Webdesignhq
 * @since 1.0.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>	
	<?php wp_head(); ?>	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen,projection" />


</head>

<body>
<div class="mobile__menu--container d-lg-none d-block">
	<div class="relative">
		<nav id="mobile-site-navigation" class="main-navigation absolute d-block d-lg-none">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav>
	</div>
</div>
<div class="mobile__search--container d-lg-none d-block">
	<div class="col-8 mx-auto">
		<?php echo do_shortcode('[fibosearch]'); ?>
	</div>	
</div>
<div class="age__check position-absolute d-flex flex-column justify-content-center">
	<div class="age__check-form col-4 mx-auto">
	<p>AGECHECK</p>
	</div>
	
</div>
<header class="container-fluid sticky-top p-0 ">
	<div class="topheader col-12 p-0 py-2">
			<div class="container-xxl d-flex flex-row justify-content-lg-end justify-content-center">
				<p>Klantenservice | Registreren | Inloggen</p>
			</div>
	</div>
	<div class="header d-flex flex-row justify-content-between align-items-center px-lg-5">
		<div class="shop__logo col-lg-2 col-2">
			<?php if ( function_exists( 'the_custom_logo' ) ) {
					 the_custom_logo();
				} ?>
		</div>
		<div class="col-lg-5 d-flex flex-row">
			<button class="search-toggle btn pt-4 d-lg-none d-block" type="btn" onclick=""><i class="fas fa-search"></i></button>
			<button class="menu-toggle btn pt-3" type="btn" onclick=""><i class="fas fa-bars"></i></button>
				<nav id="site-navigation" class="main-navigation d-none d-lg-block">
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</nav>
		</div>
		<div class="search col-lg-2 col-2 mt-lg-0 mt-4 d-lg-block d-none">
			<?php echo do_shortcode('[fibosearch]'); ?>
		</div>
		<div class="shop__controls col-lg-2 col-1 text-align-right d-none d-lg-inline-flex justify-content-lg-end align-items-center justify-content-center mt-lg-0 mt-0">
			<div id="weglot_here"></div>
			<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="mx-lg-3 mx-2"><i class="fas fa-user"></i></a>
			<?php echo do_shortcode("[woo_cart_but]"); ?>
		</div>
	</div>


</header>
		<?php if(!is_front_page() && (!is_product_category () && (!is_shop()) && (!is_product() && (!is_cart() && (!is_checkout()))))) { ?>
		<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
		
		<div id="bannerindex" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat; background-size: cover;">
		<div class="container-xxl d-flex flex-column justify-content-center h-100">
			<div class="row justify-content-center">
					<div class="col-md-8 text-center">
						<div class="bannerindexcontent text-left p-4">
							<h1 class="header__title"><?php echo get_the_title(); ?></h1>
						</div>
						<p class="header__breadcrumb"><?php woocommerce_breadcrumb(); ?></p>
					</div>
				</div>
		</div>
	</div>
	<?php } elseif(is_product_category() || (is_product())) {?>
		
		<?php 
			global $wp_query;
			$cat = $wp_query->get_queried_object();
			$thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true ); 
	
			
			if ( is_product_category() ){
			$image = wp_get_attachment_url( $thumbnail_id ); 
			$title = single_term_title( "", false );
			}else{
	
				$image = get_field('cover_image');
				$title = get_the_title();
			} ?>
				<div id="bannerindex" style="background: url(<?php echo $image ?> ) no-repeat; background-size: cover; background-position: center;">
					<div class="container-xxl d-flex flex-column justify-content-center h-100">
						<div class="row justify-content-center">
							<div class="col-md-8 text-center">
								<div class="bannerindexcontent text-left p-4">
									<h1 class="header__title"><?php echo $title ?></h1>
								</div>
								<p class="header__breadcrumb"><?php woocommerce_breadcrumb(); ?></p>
							</div>
						</div>
					</div>
				</div>

	<?php } elseif(is_shop()) {?>
		<div id="bannerindex" style="background: url('<?php bloginfo('template_directory'); ?>/assets/img/header-bg-smith-sinclair-1.png') no-repeat; background-size: cover;">
			<div class="container-xxl d-flex flex-column justify-content-center h-100">
				<div class="row justify-content-center">
					<div class="col-md-8 text-center">
						<div class="bannerindexcontent text-left p-4">
						<h1 class="header__title">Assortiment</h1>
							<p><?php woocommerce_breadcrumb(); ?></p>
						</div>
					</div>
				</div>
			</div>
	</div>
	<?php } ?>