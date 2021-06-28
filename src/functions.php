<?php

function mytheme_customize_register( $wp_customize ) {
  $wp_customize->add_panel( 'mytheme_theme_options', array(
        'priority'       => 100,
        'title'            => __( 'Theme Options', 'mytheme' ),
        'description'      => __( 'Theme texts can be done here', 'mytheme' ),
    ) 
);
  $wp_customize->add_section( 'copyright_section' , array(
    'title'           => __( 'Copyright', 'mytheme' ),
    'priority'        => 1,
    'panel'           => 'mytheme_theme_options'
) );
  $wp_customize->add_setting( 'footer_copyright' , array(
  'default'           => __('© 2020 Friendly All rights reserved', 'mytheme'),
  'sanitize_callback' => 'sanitize_text_field',
  'transport'         => 'refresh',
) );
$wp_customize->add_control( 'footer_copyright', 
array(
    'type'        => 'text',
    'priority'    => 10,
    'section'     => 'copyright_section',
    'label'       => 'Copyright text',
    'description' => 'Text put here will be outputted in the footer',
) 
);
}
add_action( 'customize_register', 'mytheme_customize_register' );

function cc_mime_types($mimes = array()) {
 $mimes['svg'] = "image/svg+xml";
 $mimes['svgz'] = 'image/svg+xml';
 return $mimes;
}
add_action('upload_mimes', 'cc_mime_types');

add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

	if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) )
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	else
		$dosvg = ( '.svg' === strtolower( substr($filename, -4) ) );

	if( $dosvg ){

		if( current_user_can('manage_options') ){

			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		else {
			$data['ext'] = $type_and_ext['type'] = false;
		}

	}

	return $data;
}

register_nav_menus( array(
  'primary'       => esc_html__( 'Primary', 'mytheme' ),
) );

/**
 * Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

/**
 * Register widget area.
 */
function mytheme_wp_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'mytheme' ),
			'id'            => 'sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'mytheme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(array(
		'name' => 'Footer Widget Column 1',
		'id' => 'footer-1',
		'description' => 'First column',
		'before_widget' => '<div class="widget col"><ul class="list-unstyled">',
		'after_widget' => '</ul></div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
		));

    register_sidebar(array(
      'name' => 'Footer Widget Column 2',
      'id' => 'footer-2',
      'description' => 'Second column',
      'before_widget' => '<div class="widget col"><ul class="list-unstyled">',
      'after_widget' => '</ul></div>',
      'before_title' => '<h4>',
      'after_title' => '</h4>',
      ));

    register_sidebar(array(
        'name' => 'Footer Widget Column 3',
        'id' => 'footer-3',
        'description' => 'Third column',
        'before_widget' => '<div class="widget col"><ul class="list-unstyled">',
        'after_widget' => '</ul></div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
        ));

        register_sidebar(array(
          'name' => 'Footer Widget Column 4',
          'id' => 'footer-4',
          'description' => 'Fourst column',
          'before_widget' => '<div class="widget col"><ul class="list-unstyled">',
          'after_widget' => '</ul></div>',
          'before_title' => '<h4>',
          'after_title' => '</h4>',
          ));

    register_sidebar(
      array(
        'name' => 'Social Links',
        'id' => 'social-links',
        'before_widget' => '<div id="%1$s" class="foot widget %2$s">',
        'after_widget' => '</div>',
      )
    );

}
add_action( 'widgets_init', 'mytheme_wp_widgets_init' );

function mytheme_custom_header_setup() {
  add_theme_support( 'custom-header', apply_filters( 'mytheme_custom_header_args', array(
      'width'                  => 106,
      'height'                 => 28,
      'flex-width'             => true,
      'flex-height'            => true,
  ) ) );
}
add_action( 'after_setup_theme', 'mytheme_custom_header_setup' );


function mytheme_assets() {
  wp_enqueue_style( 
    'mytheme-stylesheet', get_stylesheet_directory_uri() . '/css/style.css', 
    array(), 
    time(), 
    'all' );
  wp_enqueue_script( 
		'mytheme-js', 
		get_stylesheet_directory_uri() . '/js/main.js',
		array( 'jquery' ), 
		time(), 
		true 
	);
}
add_action('wp_enqueue_scripts', 'mytheme_assets');


function social_link_load_widget() {
  register_widget( 'social_link_widget' );
}
add_action( 'widgets_init', 'social_link_load_widget' );

// Creating the widget 
class social_link_widget extends WP_Widget {

function __construct() {
parent::__construct(

'social_link_widget', 
__('Social link widget', 'mytheme'), 
array( 'description' => __( 'Widget for display contacts.', 'mytheme' ), ) 
);
}

// Front-end
public function widget( $args, $instance ) {
$instagram = apply_filters( 'widget_title', $instance['instagram'] );
$dribbble = apply_filters( 'widget_title', $instance['dribbble'] );
$twitter = apply_filters( 'widget_title', $instance['twitter'] );
$youtube = apply_filters( 'widget_title', $instance['youtube'] );
// before and after widget arguments are defined by themes
echo '<div class="social-links d-flex">';
if ( ! empty( $instagram ) )
echo '<div class="social-icon"><a href="' . $instagram . '"><img src="' . esc_url( get_template_directory_uri() ) . '/images/Instagram.svg"/></a></div>';
if ( ! empty( $dribbble ) )
echo '<div class="social-icon"><a href="' . $dribbble . '"><img src="' . esc_url( get_template_directory_uri() ) . '/images/Dribbble.svg"/></a></div>';
if ( ! empty( $twitter ) )
echo '<div class="social-icon"><a href="' . $twitter . '"><img src="' . esc_url( get_template_directory_uri() ) . '/images/Twitter.svg"/></a></div>';
if ( ! empty( $youtube ) )
echo '<div class="social-icon"><a href="' . $youtube . '"><img src="' . esc_url( get_template_directory_uri() ) . '/images/Youtube.svg"/></a></div>';

echo '</div>';
}
       
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'instagram' ] ) ) {
  $instagram = $instance[ 'instagram' ];
}
else {
  $instagram = __( 'Instagram', 'mytheme' );
}
if ( isset( $instance[ 'dribbble' ] ) ) {
  $dribbble = $instance[ 'dribbble' ];
}
else {
  $dribbble = __( 'Dribbble', 'mytheme' );
}
if ( isset( $instance[ 'twitter' ] ) ) {
  $twitter = $instance[ 'twitter' ];
}
else {
  $twitter = __( 'Twitter', 'mytheme' );
}
if ( isset( $instance[ 'youtube' ] ) ) {
  $youtube = $instance[ 'youtube' ];
}
else {
  $youtube = __( 'Youtube', 'mytheme' );
}

?>


<label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php _e( 'Instagram:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" type="text" value="<?php echo esc_attr( $instagram ); ?>" />
<label for="<?php echo $this->get_field_id( 'dribbble' ); ?>"><?php _e( 'Dribbble:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'dribbble' ); ?>" name="<?php echo $this->get_field_name( 'dribbble' ); ?>" type="text" value="<?php echo esc_attr( $dribbble ); ?>" />
<label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'Twitter:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>" />
<label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php _e( 'Youtube:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" type="text" value="<?php echo esc_attr( $youtube ); ?>" />


<?php 
}
   
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['instagram'] = ( ! empty( $new_instance['instagram'] ) ) ? strip_tags( $new_instance['instagram'] ) : '';
$instance['dribbble'] = ( ! empty( $new_instance['dribbble'] ) ) ? strip_tags( $new_instance['dribbble'] ) : '';
$instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';
$instance['youtube'] = ( ! empty( $new_instance['youtube'] ) ) ? strip_tags( $new_instance['youtube'] ) : '';
return $instance;
}
} 

function app_link_load_widget() {
  register_widget( 'app_link_widget' );
}
add_action( 'widgets_init', 'app_link_load_widget' );

class app_link_widget extends WP_Widget {

  function __construct() {
  parent::__construct(
  
  'app_link_widget', 
  __('App link widget', 'mytheme'), 
  array( 'description' => __( 'Widget for display download links.', 'mytheme' ), ) 
  );
  }
  
  // Front-end
  public function widget( $args, $instance ) {
  $googleplay = apply_filters( 'widget_title', $instance['googleplay'] );

  $appstore = apply_filters( 'widget_title', $instance['appstore'] );

  echo '<div class="d-flex flex-column"><h4>Install App</h4>';
  if ( ! empty( $googleplay ) )
  echo '<div class="badge-img"><a href="' . $googleplay . '"><img src="' . esc_url( get_template_directory_uri() ) . '/images/Google Play Badge.png"/></a></div>';
  if ( ! empty( $appstore ) )
  echo '<div class="badge-img"><a href="' . $appstore . '"><img src="' . esc_url( get_template_directory_uri() ) . '/images/App Store Badge.png"/></a></div>';
  echo '</div>';
  }
         
  // Widget Backend 
  public function form( $instance ) {
  if ( isset( $instance[ 'googleplay' ] ) ) {
    $googleplay = $instance[ 'googleplay' ];
  }
  else {
    $googleplay = __( 'Google Play', 'mytheme' );
  }
  if ( isset( $instance[ 'appstore' ] ) ) {
    $appstore = $instance[ 'appstore' ];
  }
  else {
    $appstore = __( 'App store', 'mytheme' );
  }
  ?>
  
  
  <label for="<?php echo $this->get_field_id( 'googleplay' ); ?>"><?php _e( 'Google play:' ); ?></label> 
  <input class="widefat" id="<?php echo $this->get_field_id( 'googleplay' ); ?>" name="<?php echo $this->get_field_name( 'googleplay' ); ?>" type="text" value="<?php echo esc_attr( $googleplay ); ?>" />
  <label for="<?php echo $this->get_field_id( 'appstore' ); ?>"><?php _e( 'App store:' ); ?></label> 
  <input class="widefat" id="<?php echo $this->get_field_id( 'appstore' ); ?>" name="<?php echo $this->get_field_name( 'appstore' ); ?>" type="text" value="<?php echo esc_attr( $appstore ); ?>" />
  
  <?php 
  }
     
  public function update( $new_instance, $old_instance ) {
  $instance = array();
  $instance['googleplay'] = ( ! empty( $new_instance['googleplay'] ) ) ? strip_tags( $new_instance['googleplay'] ) : '';
  $instance['appstore'] = ( ! empty( $new_instance['appstore'] ) ) ? strip_tags( $new_instance['appstore'] ) : '';
  return $instance;
  }
  } 