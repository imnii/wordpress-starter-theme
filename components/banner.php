<?php if( function_exists('get_field') ) : ?>

  <?php 
    $banner_background_image = ( get_field( 'banner_background_image' ) ? get_field( 'banner_background_image' ) : '' ); 
    $banner_content = '';
    
    if ( is_404() ) 
      $banner_content = '<h1>Page Not Found.</h1>';
    elseif ( is_search() )
      $banner_content = '<h1>Search</h1>';
    elseif ( is_archive() )
      $banner_content = '<h1>' . get_the_archive_title() . '</h1>';
    elseif ( is_home() ) 
      $banner_content = '<h1>' . get_post_field( 'post_title', get_option( 'page_for_posts' ) ) . '</h1>';       
    else
      $banner_content = ( get_field( 'banner_content') ? get_field( 'banner_content' ) : '<h1>' . get_the_title() . '</h1>' ); 
  ?>
  <div class="banner" style="background-image: url(<?php echo $banner_background_image; ?>);">
    <div class="container">
      <?php echo $banner_content; ?>
    </div>
  </div>

<?php else: ?>

    <div class="container" style="color: #f00; padding-top: 30px; padding-bottom: 30px">
        <code>[ACF not found : components/banner.php]</code>
    </div>

<?php endif; ?>