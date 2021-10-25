<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Adinda Media
 * @since 1.0.0
 */

?>

<footer>
<div id="usps">
	<div class="col-8 offset-2">
	<?php

		$usp_rows = get_field('usps', 'option');
		if($usp_rows)
		{
			echo '<ul>';

			foreach($usp_rows as $row)
			{
				echo '<li><img src="'. $row['usp-img'] .'" alt="" style="width:20px; height: auto;">' . $row['usp'] . '</li>';
			}

			echo '</ul>';
		}

	?>
	</div>
</div>
<div id="newsletter">
	<div class="container-xxl">
		<div class="col-lg-6 offset-lg-3  flex-row">
			<h2><?php the_field('newsletter_title', 'option'); ?></h2>
			<p><?php the_field('newsletter_description', 'option'); ?></p>
		</div>
	</div>
</div>
<div id="footer" style="position: relative;">
	<img src="<?php bloginfo('template_directory'); ?>/assets/img/icon.png" alt="" style="width:230px; height: auto; position: absolute; top: -120px; left: -50px;">
	<div class="container-xxl">
		<div class="col-lg-10 col-12 mx-auto d-lg-flex d-block flex-row justify-content-lg-between justify-content-start">
			<div class="col-lg-3 col-12">
				<span>Hoe kunnen wij jou helpen?</span>
				<p><?php the_field('description', 'option'); ?></p>
				<div class="socials__container col-6 mt-4 d-flex flex-row justify-content-start">
					<?php
						$socials_rows = get_field('social_media', 'option');
							if($usp_rows)
							{
								foreach($socials_rows as $row)
								{
									$image = $row['icon'];
									echo '<a class="me-3" href="'. $row['link'] .'"><img src="'. $image .'" style="width: 50px; height: 50px; object-fit: cover;"></a>';
								}
							}
					?>
				</div>
				

			</div>
			<div class="col-lg-3 offset-1 col-12">
				<span>Klantenservice</span>
				<?php wp_nav_menu( array( 'theme_location' => 'footer_customerservice' ) ); ?>
			</div>
			<div class="col-lg-3 col-12">
			<span>Informatie</span>
				<?php wp_nav_menu( array( 'theme_location' => 'footer_information' ) ); ?>
			</div>
			<div class="col-lg-3 col-12">
			<span>Waar vind je ons?</span>
				<?php the_field('address_details', 'option'); ?>
				<a href="tel:<?php the_field('phonenumber', 'option'); ?>"><?php the_field('phonenumber', 'option'); ?></a><br>
				<a href="mailto:<?php the_field('emailaddress', 'option'); ?>"><?php the_field('emailaddress', 'option'); ?></a>
			</div>
		</div>
	</div>
</div>	
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
		<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>
</body>

<?php wp_footer(); ?>

