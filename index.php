<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-lg-8 app-content">
			<?php 
				if ( have_posts() ) {
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content', get_post_type() );
					endwhile;
					the_posts_pagination( array(
						'prev_text' => 'Previous',
						'next_text' => 'Next',
					) );
				}
				else {
					get_template_part( 'template-parts/content', 'none' );
				}
			?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer();