<?php get_header(); ?>
<div id="content">
	<div class="row content">
		<div class="col-lg-12 columns">
			<div class="columns">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							 
				<?php the_content(); ?>
				 
				
				<?php endwhile; else: ?>
				 
				<h2>Woops...</h2>
				 
				<p>Deze pagina heeft geen content.</p>
				 
				<?php endif; ?>
				 
				<p align="center"><?php posts_nav_link(); ?></p>
			</div>
		
		</div>
	</div>	
</div>	

			

<?php
get_footer();

?>