<?php 
// Used in footer.php
$GLOBALS['start_ms']  = microtime(true);

// Globals
define('SITE_URL' , site_url());
define('THEME_URI' , get_stylesheet_directory_uri());

// Functions Shortened
function abdoo_lang_switcher(){
    if (function_exists('pll_the_languages')){
        return pll_the_languages(['hide_current' => 1]);
    }
}


require_once get_template_directory() . "/inc/theme-setup.php";
require_once get_template_directory() . "/inc/enqueue.php";

if ( defined('WP_DEBUG') && true === WP_DEBUG)
    require_once get_template_directory() . "/inc/middleware.php";


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
// Miscellaneous

add_filter( 'get_the_archive_title', 'remove_wp_default_arhive_title_prefix', 10, 3 );
function remove_wp_default_arhive_title_prefix( $title, $original_title, $prefix){
	return $original_title;
}


add_filter( 'pll_copy_post_metas', 'copy_testimonials_post_metas' );
function copy_testimonials_post_metas( $metas ) {
    // return array_merge( $metas, [TESTIMONIALS_AUTHOR_LINK_META_KEY] );
    return array_diff($metas, [TESTIMONIALS_AUTHOR_JOB_META_KEY]); // Dont Copy TESTIMONIALS_AUTHOR_JOB_META_KEY Across Langs
}


// --------------------------------------------------------------------------------------
// Rest API

// When Using the Recommendation Extractor script. Match posts on author link meta field and don't insert non new posts
add_filter('rest_pre_insert_testimonials', 'check_link_before_rest_insert_post', 10, 2);
function check_link_before_rest_insert_post($prepared_post, $request) {
    if ( ! ($prepared_post->post_type == 'testimonials' && isset($request['meta']) && isset($request['meta'][TESTIMONIALS_AUTHOR_LINK_META_KEY])))
        return $prepared_post;

    $link = $request['meta'][TESTIMONIALS_AUTHOR_LINK_META_KEY];
    $post_type = $prepared_post->post_type;
    $args = [
        'post_type' => $post_type,
        'meta_query' => [
            [
                'key' => TESTIMONIALS_AUTHOR_LINK_META_KEY,
                'value' => $link,
                'compare' => '='
            ] 
        ]
    ]; 
    
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        return new WP_Error('rest_post_exists', __('A post with the same link already exists.'), ['status' => 400]);
    }
    
    return $prepared_post;
    //return new WP_Error('rest_post_exists', __('SUCC'), array('status' => 123));
}

// Save image from url sent by rest 
add_action('rest_insert_testimonials', 'handle_testimonials_image_upload', 10, 2);
function handle_testimonials_image_upload($post, $request) {
    if ( ! (isset($request['image']) && $request['image'] != '') )return;

    $post_id = $post->ID;
    $image_url = $request['image'];
    $name = $request['title'];
    upload_image_from_url_and_set_to_post($image_url, $post_id, $name);
}

function upload_image_from_url_and_set_to_post($image_url, $post_id, $name) {
    require_once(ABSPATH . 'wp-admin/includes/image.php');
    require_once(ABSPATH . 'wp-admin/includes/file.php');
    require_once(ABSPATH . 'wp-admin/includes/media.php');

    // Make a good file name
    $new_name = sanitize_title($name);
    $new_file_name = $new_name . '.png';

    // Download file
    $tmp = download_url($image_url);

    // Rename it properly
    $path = dirname($tmp);
    $new_tmp = $path . DIRECTORY_SEPARATOR . $new_file_name;
    rename($tmp, $new_tmp);
    $tmp = $new_tmp;

    
    $file_array = [
        'name' => $new_file_name,
        'tmp_name' => $tmp
    ];

    if (is_wp_error($tmp)) {
        @unlink($file_array['tmp_name']);
        return 0;
    }

    $id = media_handle_sideload($file_array, $post_id);
    if (is_wp_error($id)) {
        @unlink($file_array['tmp_name']);
        return 0;
    }

    // Update alt text of image
    update_post_meta($id, '_wp_attachment_image_alt', $name . 'Image');

    set_post_thumbnail($post_id, $id);
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


// --------------------------------------------------------------------------------------
// One Time Scripts

add_action( 'wp_head', 'abdoo_one_time_scripts' );
function abdoo_one_time_scripts() {
    global $_GET;
    if(! isset($_GET['one_time_script']))return;
}


// --------------------------------------------------------------------------------------
// Debugging

// Dump Data
function dd($var, $display=false, $msg = ''){
    $display_class = ($display)? 'style="display:block;"' : '';
    echo "<pre $display_class class='dd'>$msg ";var_dump($var);echo'</pre>';
    
}
// Dump Data & Die
function ddd($var, $display=false, $msg = ''){
    dd($var, $display, $msg);
    die;   
}
// Dump Data to debug.log
function ldd($var,$msg = ''){
    error_log($msg . print_r($var,1));
}
// Get Backtrace function call
function get_backtrace(): string{
    $e = new \Exception;
    return $e->getTraceAsString();
}

/* 
 *  Reset the debug.log file.
 *  Usage Example: ?debug_control=reset_log
 *  
 */
add_action( 'wp_footer', function () {

    if(! is_user_logged_in() && current_user_can('administrator'))return;
    if(! isset($_GET['debug_control']))return;

    if($_GET['debug_control'] == 'reset_log'){
        $debug_log = WP_CONTENT_DIR . '/debug.log';
        if (file_exists($debug_log)) {
            file_put_contents($debug_log, '');
        }
    }

});

// View & Modify WP_DEUBG or other constants in wp-config.php.
add_action( 'init', function () {

    // Security
    if(! is_user_logged_in() || ! current_user_can('administrator'))return;
    if(! isset($_GET['debug_control']))return;

    // Init
    $START_SECTION_PHRASE = '/* Add any custom values between this line and the "stop editing" line. */';
    $END_SECTION_PHRASE = '/* That\'s all, stop editing! Happy publishing. */';
    $wp_config_path = ABSPATH . 'wp-config.php';
    $contents = file_get_contents($wp_config_path);

    // Get the section containing the constants
    $start = strpos($contents, $START_SECTION_PHRASE);
    $end = strpos($contents, $END_SECTION_PHRASE);
    $custom_values = substr($contents, $start, $end - $start);

    // Extract the constants to key=>value array
    preg_match_all('/define\(\s*\'(.*?)\',\s*(.*?)\s*\);/', $custom_values, $matches);
    $constants = array_combine($matches[1], $matches[2]);

    dd($constants,1, "Current Values: ");

    // ----------------------------------------------------------------------------------
    // Modify The Constants
    // Usage Example: ?debug_control&constant=WP_DEBUG&value=TRUE
    
    if(! isset($_GET['constant']))return;
    if(! isset($_GET['value']))return;
    $new_const = $_GET['constant'];
    $new_value = $_GET['value'];

    if(!array_key_exists($new_const, $constants)){
        echo "unknown constant !";
        return;
    }
    $constants[$new_const] = $new_value;

    // Get all text around the section containing the constants
    $before = substr($contents, 0, $start);
    $after = substr($contents, $end + strlen($END_SECTION_PHRASE));

    // Write the new values
    $custom_values = '';
    foreach ($constants as $name => $value) {
        $custom_values .= "define('" . $name . "', " . $value . ");\n";
    }
    $new_contents = $before . 
                    $START_SECTION_PHRASE . PHP_EOL .
                    $custom_values . 
                    $END_SECTION_PHRASE .
                    $after;

    file_put_contents($wp_config_path, $new_contents);

});
