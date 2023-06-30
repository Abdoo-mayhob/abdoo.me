<?php 
// Used in footer.php
$GLOBALS['start_ms']  = microtime(true);

// Globals
define('SITE_URL' , site_url());
define('THEME_URI' , get_stylesheet_directory_uri());

// Functions Shortended
function abdoo_lang_switcher(){
    if (function_exists('pll_the_languages')){
        return pll_the_languages(['hide_current' => 1]);
    }
}


require_once get_template_directory() . "/inc/theme-setup.php";
require_once get_template_directory() . "/inc/enqueue.php";


// --------------------------------------------------------------------------------------
// Getters

function abdoo_get_svg($svg_name){
    ob_start();
    require(get_template_directory().'/img/'.$svg_name.'.svg'); // Note that file_get_contents will load https (maybe cached) files
    return ob_get_clean(); 
}

function abdoo_get_breadcrumb(){
    if ( function_exists('yoast_breadcrumb') ) {
        return yoast_breadcrumb( '<div id="breadcrumbs"','</div>', false);
    }
    else {
        return "<!-- Please Install & Activate YOAST SEO -->";
    }
}

function abdoo_get_portfolio($page = 0){
    return new WP_Query([
        'post_type'      => 'portfolio',
        'posts_per_page' => '6',
        'paged'          => $page,
    ]);
}
function abdoo_get_testimonials(){
    return new WP_Query([
        'post_type'      => 'testimonials',
        'posts_per_page' => '6',
        'no_found_rows' => true, // Ignores pagination, Increases Performance
    ]);
}
function abdoo_get_related_posts(){
    return new WP_Query([
        'category__in' => wp_get_post_categories(get_the_ID(),['fields'=>'ids']),
        'post__not_in' => [get_the_ID()],
        'posts_per_page' => '6',
        'no_found_rows' => true, // Ignores pagination, Increases Performance
    ]);
}

function abdoo_get_latest_posts(){
    return new WP_Query([
        'posts_per_page' => '6',
        'post__not_in' => [get_the_ID()],
        'no_found_rows' => true, // Ignores pagination, Increases Performance
    ]);
}

function abdoo_get_featured_posts($number_of_posts){
    return new WP_Query([
        'tag' => 'مقالات-مختارة',
        'posts_per_page' => (string) $number_of_posts,
        'post__not_in' => [get_the_ID()],
        // 'no_found_rows' => true, // Ignores pagination, Increases Performance
    ]);
}


function abdoo_get_logo_url($size = 'full'){
    return esc_url( wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), $size )[0] );
}

// Used to help display bg img instead of <img> with minimal syntax
function abdoo_bg_img($image_path, $height = '400px'){
    echo 'style="background-image: url(' . $image_path . ');height:' . $height . '"';
}
function abdoo_post_thumb_url(){
    // return get_the_post_thumbnail_url(get_the_ID(),'thumbnail');
    // Both work, But this is a bit less code in wp core
    $url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail' ) ;
    return $url[0] ?? abdoo_get_logo_url('thumbnail');
     
}


// --------------------------------------------------------------------------------------
// 

add_filter( 'get_the_archive_title', 'remove_wp_default_arhive_title_prefix', 10, 3 );
function remove_wp_default_arhive_title_prefix( $title, $original_title, $prefix){
	return $original_title;
}


// --------------------------------------------------------------------------------------
// Ajax

add_action( 'wp_ajax_abdoo_view_portfolio', 'abdoo_view_portfolio' );
add_action( 'wp_ajax_nopriv_abdoo_view_portfolio', 'abdoo_view_portfolio' );
function abdoo_view_portfolio() {
    $page = ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ? $_POST['page'] : 0;
    $portfolio = abdoo_get_portfolio($page);
	if($portfolio->have_posts() === false)
		die('0');

	while ( $portfolio->have_posts() ): $portfolio->the_post();?>
			<?php get_template_part('template-parts/loop') ?>
	<?php
	endwhile;
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX )die;
}