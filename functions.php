<?php
  /*
  ====================================================
  THEME SETUP
  ====================================================
  */
  if ( ! function_exists( 'theme_setup' ) ) :
    add_action( 'after_setup_theme', 'theme_setup' );
    function theme_setup() {
      add_theme_support( 'automatic-feed-links' );
      add_theme_support( 'title-tag' );
      add_theme_support( 'post-thumbnails' );
      add_theme_support( 'customize-selective-refresh-widgets' );
      add_theme_support( 'html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
      ]);
    }
  endif;

  /*
  ====================================================
  REGISTER WIDGET AREA
  ====================================================
  */
  add_action( 'widgets_init', 'theme_widgets_init' );
  function theme_widgets_init() {
    register_sidebar([
      'name'          => esc_html__( 'Sidebar' ),
      'id'            => 'sidebar01',
      'description'   => esc_html__( 'Add widgets here.' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>'
    ]);
  }

  /*
  ====================================================
  REGISTER THEME SCRIPTS
  ====================================================
  */
  // Replace JQuery version
  add_action( 'wp_enqueue_scripts', 'jQuery' );
  function jQuery() {
    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'jquery', get_stylesheet_directory_uri() . '/assets/lib/jquery-3.3.1/jquery.min.js', [], null, true );
  }

  // Frontend Scripts
  add_action( 'wp_enqueue_scripts', 'theme_scripts' );
  function theme_scripts() {
    // Fonts
    wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.0.9/css/all.css', [], null, false );
    
    // Stylesheets
    wp_enqueue_style( 'slick-css', get_stylesheet_directory_uri() . '/assets/lib/slick-1.8.0/slick.css', [], null, false );
    wp_enqueue_style( 'bootstrap-reboot-css', get_stylesheet_directory_uri() . '/assets/css/10_bootstrap-reboot.css', [], null, false );
    wp_enqueue_style( 'bootsrap-grid-css', get_stylesheet_directory_uri() . '/assets/css/20_bootstrap-grid.css', [], null, false );
    wp_enqueue_style( 'global-css', get_stylesheet_directory_uri() . '/assets/css/30_global.css', [], null, false );
    wp_enqueue_style( 'app-css', get_stylesheet_directory_uri() . '/assets/css/40_app.css', [], null, false );
    wp_enqueue_style( 'wp-css', get_stylesheet_uri(), [], null, false ); // WP Style
    
    // JavaScripts
    wp_enqueue_script( 'pace-js', get_stylesheet_directory_uri() . '/assets/lib/pace-1.0.0/pace.min.js', [], null, true );
    wp_enqueue_script( 'enquire-js', get_stylesheet_directory_uri() . '/assets/lib/enquire-2.1.6/enquire.min.js', [], null, true );
    wp_enqueue_script( 'slick-js', get_stylesheet_directory_uri() . '/assets/lib/slick-1.8.0/slick.min.js', [], null, true );
    wp_enqueue_script( 'app-js', get_stylesheet_directory_uri() . '/assets/js/app.js', [], null, true );
      
    $site_config = [
      'template_directory_uri' => get_template_directory_uri() 
    ];
    wp_localize_script( 'app-js', 'siteConfig', $site_config );

    // Comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }
  }

  // Backend Scripts
  add_action('admin_enqueue_scripts', 'admin_scripts');
  function admin_scripts() {
    wp_enqueue_style('admin-styles', get_template_directory_uri().'/assets/admin-scripts/admin.css');
  }

  add_editor_style( get_stylesheet_directory_uri() . '/assets/admin-scripts/editor-style.css' );

  /*
  ====================================================
  GET COMPONENTS
  ====================================================
  */
  function get_component( $component ) {
    get_template_part( 'components/' . $component );
  }

  /*
  ====================================================
  PLUGIN: ADVANCED CUSTOM FIELDS
  ====================================================
  */
  // Options Page
  if( function_exists('acf_add_options_page') ) {
    acf_add_options_page([
      'page_title' 	=> 'Theme Settings',
      'menu_title'	=> 'Theme Settings',
      'menu_slug' 	=> 'theme-settings',
      'capability'	=> 'edit_posts',
      'redirect'		=> false
    ]);
  }

  // Flexible Content Layout Name
  add_filter('acf/fields/flexible_content/layout_title/name=flexible_content_editor', 'my_acf_flexible_content_layout_title', 10, 4);
  function my_acf_flexible_content_layout_title( $title, $field, $layout, $i ) {
    if ( $text = get_sub_field('layout_name') ) {
      $title = $text;
    }
    return $title;
  }

  // Hide ACF settings to all users
  // add_filter('acf/settings/show_admin', '__return_false');

  /*
  ====================================================
  TEMPLATE PART SHORTCODE
  ====================================================
  */
  add_shortcode('template_part', 'template_part');
  function template_part( $atts, $content = null ){
    $tp_atts = shortcode_atts([
      'path' =>  null,
    ], $atts);        
    ob_start();  
    get_template_part($tp_atts['path']);  
    $ret = ob_get_contents();  
    ob_end_clean();  
    return $ret;    
  }
















// THIS FUNCTION REQUIRES TO RESET THE PERMALINKS SO IT CAN WORK
// add_action( 'init', 'wpse_63716_search_rule' );
// function wpse_63716_search_rule(){
//     add_rewrite_rule('^suche/([^/]*)?', 'index.php?s=$matches[1]', 'top');
// }
// function search_url_rewrite_rule() {
//     if ( is_search() && !empty($_GET['s'])) {
//         wp_redirect(home_url("/suche/") . urlencode(get_query_var('s')));
//         exit();
//     }   
// }
// add_action('template_redirect', 'search_url_rewrite_rule');

// function wpb_change_search_url() {
//     if ( is_search() && ! empty( $_GET['s'] ) ) {
//         wp_redirect( home_url( "/beloasd/" ) . urlencode( get_query_var( 's' ) ) );
//         exit();
//     }   
// }
// add_action( 'template_redirect', 'wpb_change_search_url' );

/*!
* WP - Admin Footer
*/
// function remove_footer_admin () {
//     echo '<p>Starter Theme by: <a href="https://linkedin.com/in/imnii/" target="_blank">IMNII</a></p>';
// }
// add_filter('admin_footer_text', 'remove_footer_admin');