<?php get_header(); ?>

	<div class="container">
		<div class="app-content">
			<?php 
				if ( have_posts() )  { ?>
					<h1>Search Results for: <?php echo $_GET['s'] ?></h1>
				<?php
					while ( have_posts() ) { the_post();
						get_template_part( 'template-parts/content', 'search' );
					}
				}
				else {
					get_template_part( 'template-parts/content', 'none' );
				} 
			?>
		</div>
	</div>
	
<?php get_footer();