<?php get_header(); ?>

	<div class="container">
		<div class="row">
			<div class="col-lg-8 app-content">
				<?php while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry-header">
							<?php //the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						</div>
						<div class="entry-body">
							<?php the_content(); ?>
						</div>
						<div class="entry-footer">
							<div><?php the_date(); ?></div>
							<div><?php the_category(); ?></div>
							<div>
								<?php
									$posttags = get_the_tags();
									if ($posttags) {
										foreach($posttags as $tag) {
											echo $tag->name . ' '; 
										}
									}	
								?>
							</div>
						</div>
					</article>
					<?php
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif; 
					?>
				<?php endwhile; ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>

<?php get_footer();