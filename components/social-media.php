<?php if( function_exists('have_rows') ) : ?>

  <?php if ( have_rows( 'social_media', 'options' ) ) : ?> 
    <ul class="social-media">
      <?php while ( have_rows( 'social_media', 'options' ) ) : the_row(); ?>
        <?php if ( get_sub_field( 'social_media'  ) == 'facebook' ) : ?>
          <li><a href="<?php the_sub_field(  'url'  ); ?>" title="Facebook" target="_blank"><i class="fab fa-fw fa-facebook-f"></i></a></li>
        <?php elseif ( get_sub_field( 'social_media' ) == 'twitter' ): ?>
          <li><a href="<?php the_sub_field( 'url' ); ?>" title="Twitter" target="_blank"><i class="fab fa-fw fa-twitter"></i></a></li>
        <?php elseif ( get_sub_field( 'social_media' ) == 'instagram' ): ?>
          <li><a href="<?php the_sub_field( 'url' ); ?>" title="Instagram" target="_blank"><i class="fab fa-fw fa-instagram"></i></a></li>
        <?php elseif ( get_sub_field( 'social_media' ) == 'linkedin' ): ?>
          <li><a href="<?php the_sub_field( 'url' ); ?>" title="LinkedIn" target="_blank"><i class="fab fa-fw fa-linkedin"></i></a></li>
        <?php elseif ( get_sub_field( 'social_media' ) == 'google-plus' ): ?>
          <li><a href="<?php the_sub_field( 'url' ); ?>" title="Google+" target="_blank"><i class="fab fa-fw fa-google-plus"></i></a></li>
        <?php elseif ( get_sub_field( 'social_media' ) == 'pinterest' ): ?>
          <li><a href="<?php the_sub_field( 'url' ); ?>" title="Pinterest" target="_blank"><i class="fab fa-fw fa-pinterest"></i></a></li>
        <?php elseif ( get_sub_field( 'social_media' ) == 'reddit' ): ?>
          <li><a href="<?php the_sub_field( 'url' ); ?>" title="Reddit" target="_blank"><i class="fab fa-fw fa-reddit"></i></a></li>
        <?php elseif ( get_sub_field( 'social_media' ) == 'blogger' ): ?>
          <li><a href="<?php the_sub_field( 'url' ); ?>" title="Blogger" target="_blank"><i class="fab fa-fw fa-blogger"></i></a></li>
        <?php elseif ( get_sub_field( 'social_media' ) == 'tumblr' ): ?>
          <li><a href="<?php the_sub_field( 'url' ); ?>" title="Tumblr" target="_blank"><i class="fab fa-fw fa-tumblr"></i></a></li>
        <?php endif; ?>
      <?php endwhile; ?>
    </ul>
  <?php endif; ?>

<?php else: ?>

  <div class="container" style="color: #f00; padding-top: 30px; padding-bottom: 30px">
    <code>[ACF not found : components/social-media.php]</code>
  </div>

<?php endif; ?>