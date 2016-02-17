<?php

//Hide Admin Bar for Logged In Users
add_filter('show_admin_bar', '__return_false');

add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup()
{
load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 640;
register_nav_menus(
array( 'main-menu' => __( 'Main Menu', 'blankslate' ) )
);
}
add_action( 'wp_enqueue_scripts', 'blankslate_load_scripts' );
function blankslate_load_scripts()
{
wp_enqueue_script( 'jquery' );
}
add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
function blankslate_enqueue_comment_reply_script()
{
if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'blankslate_title' );
function blankslate_title( $title ) {
if ( $title == '' ) {
return '&rarr;';
} else {
return $title;
}
}
add_filter( 'wp_title', 'blankslate_filter_wp_title' );
function blankslate_filter_wp_title( $title )
{
return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init()
{
register_sidebar( array (
'name' => __( 'Sidebar Widget Area', 'blankslate' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
function blankslate_custom_pings( $comment )
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php 
}
add_filter( 'get_comments_number', 'blankslate_comments_number' );
function blankslate_comments_number( $count )
{
if ( !is_admin() ) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}

add_action('init', homepageSliderType);

// Create 1 Custom Post type for a Demo, called HTML5-Blank
function homepageSliderType()
{
   register_taxonomy_for_object_type('category', 'homepageSlider'); // Register Taxonomies for Category
   register_taxonomy_for_object_type('post_tag', 'homepageSlider');

   register_post_type('homepageSlider', // Register Custom Post Type
       array(
       'labels' => array(
           'name' => __('Homepage Slider', 'homepageSlider'), // Rename these to suit
           'singular_name' => __('Homepage SliderCustom Post', 'homepageSlider'),
           'add_new' => __('Add New', 'homepageSlider'),
           'add_new_item' => __('Add New Homepage Slider Item', 'homepageSlider'),
           'edit' => __('Edit', 'html5blank'),
           'edit_item' => __('Edit Homepage Slider Item', 'homepageSlider'),
           'new_item' => __('New Homepage Slider Item', 'homepageSlider'),
           'view' => __('View Homepage Slider Item', 'homepageSlider'),
           'view_item' => __('View Homepage Slider Item', 'homepageSlider'),
           'search_items' => __('Search Homepage Slider Item', 'homepageSlider'),
           'not_found' => __('No Homepage Slider Items found', 'homepageSlider'),
           'not_found_in_trash' => __('No Homepage Slider Items found in Trash', 'homepageSlider')
       ),
       'public' => true,
       'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
       'has_archive' => true,
       'supports' => array(
           'title',
		   'editor',
           'thumbnail',
		   'custom-fields'
       ), // Go to Dashboard Custom HTML5 Blank post for supports
       'can_export' => true, // Allows export in Tools > Export
       'taxonomies' => array(
           'post_tag',
           'category'
       ) // Add Category and Post Tags support
   ));
}

function footer_widgets_init() {
 
    register_sidebar( array(
        'name' => __( 'New Business Footer Widget', 'tutsplus' ),
        'id' => 'new-business-footer-widget',
        'description' => __( 'The New Business footer widget', 'tutsplus' ),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<p class="widget-title">',
        'after_title' => '</p>',
    ) );
	
    register_sidebar( array(
        'name' => __( 'Careers Footer Widget', 'tutsplus' ),
        'id' => 'careers-footer-widget',
        'description' => __( 'The careers footer widget', 'tutsplus' ),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<p class="widget-title">',
        'after_title' => '</p>',
    ) );
         
}
add_action( 'widgets_init', 'footer_widgets_init' );