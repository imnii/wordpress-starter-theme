<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	</header>	
	<main class="entry-body">
		<?php the_excerpt(); ?>
	</main>
</article>
