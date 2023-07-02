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


// --------------------------------------------------------------------------------------
// One Time Scripts

add_action( 'wp_head', 'abdoo_one_time_scripts' );
function abdoo_one_time_scripts() {
    global $_GET;
    if(! isset($_GET['one_time_script']))return;

    /*if($_GET['one_time_script'] === 'change_media_file_paths_in_db'){

        global $wpdb;
        $backup_old_urls = [];
        $attachments = $wpdb->get_results("SELECT ID, guid FROM $wpdb->posts WHERE post_type = 'attachment'");
        foreach ($attachments as $attachment) {
            $new_url = preg_replace('/\/\d{4}\/\d{2}\//', '/', $attachment->guid);

            $backup_old_urls[$attachment->ID] = [
                'old' => $attachment->guid,
                'new' => $new_url
            ];

            $wpdb->update($wpdb->posts, array('guid' => $new_url), array('ID' => $attachment->ID));
        }
        file_put_contents("backup_old_media_urls.json", json_encode($backup_old_urls));
    } 
    elseif($_GET['one_time_script'] === 'change_media_file_paths'){
        global $wpdb;
        $attachments = $wpdb->get_results("SELECT ID, guid FROM $wpdb->posts WHERE post_type = 'attachment'");
        foreach ($attachments as $attachment) {
            $file_path = get_attached_file($attachment->ID);
            if (preg_match('/\/\d{4}\/\d{2}\//', $file_path)) {
                $new_path = preg_replace('/\/\d{4}\/\d{2}\//', '/', $file_path);
                rename($file_path, $new_path);
                update_attached_file($attachment->ID, $new_path);
            }
        }
        global $wpdb;
        $backup_old_urls = [];
        $attachments = $wpdb->get_results("SELECT ID, guid FROM $wpdb->posts WHERE post_type = 'attachment'");
        foreach ($attachments as $attachment) {
            $new_url = preg_replace('/\/\d{4}\/\d{2}\//', '/', $attachment->guid);

            $backup_old_urls[$attachment->ID] = [
                'old' => $attachment->guid,
                'new' => $new_url
            ];

            $wpdb->update($wpdb->posts, array('guid' => $new_url), array('ID' => $attachment->ID));
        }
        file_put_contents("backup_old_media_urls.json", json_encode($backup_old_urls));
    } */
}