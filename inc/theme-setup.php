<?php
/*
 *
 * Theme Setup.
 * Including Customizer options, Theme Supports, Menus..
 * in addition to wp core optimization
 */


 
// --------------------------------------------------------------------------------------
// Constants

define('TESTIMONIALS_AUTHOR_JOB_META_KEY', 'testimonials-author-job');
define('PORTFOLIO_PROJECT_LINK', 'project_link');

// --------------------------------------------------------------------------------------
// Theme Support Setup

add_action( 'after_setup_theme', 'abdoo_theme_setup' );
function abdoo_theme_setup() {


    // Don't Need .mo translations anymore.
    load_theme_textdomain('abdoo', get_template_directory() . '/languages');

    // ------------------------------------------------------
    // Make sure that new uploaded media are only 2 sizes: the org and thumbnail

    // This Generates a totaly new size for somereason
    // set_post_thumbnail_size(250,130);

    // This will remove all non default image sizes. 
    // Defaults are : thumbnail, medium, medium_large, large
    foreach ( get_intermediate_image_sizes() as $size ) {
        remove_image_size( $size );
    }

    // Remove the medium default size
    update_option( 'medium_size_w', 0 );
    update_option( 'medium_size_h', 0 );

    // Remove the medium_large default size
    update_option( 'medium_large_size_w', 0 );
    update_option( 'medium_large_size_h', 0 );

    // Remove the large default size
    update_option( 'large_size_w', 0 );
    update_option( 'large_size_h', 0 );

    // Upadte the Thumbnail default size (250w*130hmax250h)
    update_option( 'thumbnail_size_w', 250 );
    update_option( 'thumbnail_size_h', 250 );


    // Show excerpt field in pages
	add_post_type_support( 'page', 'excerpt' );

    // Show featured image media selector
	add_theme_support( 'post-thumbnails' ); 

    add_theme_support( 'custom-logo' );
	add_theme_support(
		'html5',
		[
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
        ]
	);
    add_theme_support( 'title-tag' );

    // ------------------------------------------------------
    // Create Featured Posts Tag Setup
    if( !term_exists( 'مقالات مختارة', 'post_tag' ) ) {
        wp_insert_term( 'مقالات مختارة', 'post_tag' );
    }

    // ------------------------------------------------------
    // Menus Setup
    register_nav_menu('header-menu', 'Header Menu' );
    register_nav_menu('footer-menu', 'Footer Menu' );

    // ------------------------------------------------------
    // Portfolio Post Type
	register_post_type( "portfolio", [
		"label" =>  "Portfolio",
		"description" => "Portfolio",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"can_export" => true,
		"rewrite" => [ "slug" => "portfolio", "with_front" => true ],
		"query_var" => true,
		"menu_position" => 4,
		"menu_icon" => "dashicons-schedule",
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields" ],
		"show_in_graphql" => true,
	]);


    // ------------------------------------------------------
    // Testimonials Post Type
	register_post_type( "testimonials", [
		"label" =>  "Testimonials",
		"description" => "testimonials",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"can_export" => true,
		"rewrite" => [ "slug" => "testimonials", "with_front" => true ],
		"query_var" => true,
		"menu_position" => 4,
		"menu_icon" => "dashicons-format-quote",
		"supports" => [ "title", "editor", "thumbnail", "custom-fields" ],
		"show_in_graphql" => true,
	]);

    // ------------------------------------------------------
    // Portfolio Post Type 'Tech' taxonomy
    register_taxonomy( "tech", "portfolio", [
		"label" =>  "Tech",
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'tech', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "tech",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => false,
		"show_in_graphql" => false,
	]);
}

// ------------------------------------------------------------------------------------------------
// Testimonials Job Meta Box

add_action("add_meta_boxes", "abdoo_testimonials_add_post_meta_box");
function abdoo_testimonials_add_post_meta_box(){
    add_meta_box("testimonials-author-job", "Author Job Title", "abdoo_testimonials_render_post_meta_box", "testimonials", "normal", "high", null);
}
function abdoo_testimonials_render_post_meta_box( $post ){
    $job = get_post_meta( $post->ID, TESTIMONIALS_AUTHOR_JOB_META_KEY, true );
    ?>
        <label>ex: Web Developer, SEO Expert... etc<br>
            <input style="width: 50%;" name="testimonials-author-job" type="text" value="<?= $job; ?>"/>
        </label>
    <?php
}
add_action("save_post", "abdoo_testimonials_save_post_meta", 10, 3);
function abdoo_testimonials_save_post_meta( $postID, $post, $update ){

    if( defined("DOING_AUTOSAVE") && DOING_AUTOSAVE ){
        return $postID;
    }

    $job = '';
    if( isset( $_POST['testimonials-author-job'] ) ){
        $job = $_POST['testimonials-author-job'];
    }
    update_post_meta( $postID, TESTIMONIALS_AUTHOR_JOB_META_KEY, $job );
}


// ------------------------------------------------------------------------------------------------
// Portfolio Project Link Meta Box

add_action("add_meta_boxes", "abdoo_portfolio_add_post_meta_box");
function abdoo_portfolio_add_post_meta_box(){
    add_meta_box("portfolio-author-job", "Project Link", "abdoo_portfolio_render_post_meta_box", "portfolio", "normal", "high", null);
}
function abdoo_portfolio_render_post_meta_box( $post ){
    $job = get_post_meta( $post->ID, PORTFOLIO_PROJECT_LINK, true );
    ?>
        <label>ex: https://abdoo.me<br>
            <input style="width: 50%;" name="project-link" type="text" value="<?= $job; ?>"/>
        </label>
    <?php
}
add_action("save_post", "abdoo_portfolio_save_post_meta", 10, 3);
function abdoo_portfolio_save_post_meta( $postID, $post, $update ){

    if( defined("DOING_AUTOSAVE") && DOING_AUTOSAVE ){
        return $postID;
    }

    $job = '';
    if( isset( $_POST['project-link'] ) ){
        $job = $_POST['project-link'];
    }
    update_post_meta( $postID, PORTFOLIO_PROJECT_LINK, $job );
}


// ------------------------------------------------------------------------------------------------
// Edit .htaccess to serve webp when possible and activate php short tags

add_action('admin_init', 'abdoo_edit_htaccess_short_tags');
function abdoo_edit_htaccess_short_tags(){
    $lines = [];
    $lines[] = 'php_value short_open_tag 1';
    $lines[] = '
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{HTTP_ACCEPT} image/webp
    RewriteCond %{REQUEST_FILENAME} (.*)\.(jpe?g|png|gif)$
    RewriteCond %{REQUEST_FILENAME}\.webp -f
    RewriteRule (.+)\.(jpe?g|png|gif)$ %{REQUEST_URI}\.webp [T=image/webp,E=webp,L]
</IfModule>
<IfModule mod_headers.c>
    <FilesMatch "\.(jpe?g|png|gif)$">
        Header append Vary Accept
    </FilesMatch>
</IfModule>
AddType image/webp .webp
    ';
    insert_with_markers(get_home_path().".htaccess", "abdoo", $lines);
}
// ------------------------------------------------------------------------------------------------
// Edit .htaccess to serve webp when possible and activate php short tags

add_action('admin_init', 'abdoo_edit_htaccess_resume_302');
function abdoo_edit_htaccess_resume_302(){
    $lines = [];
    $lines[] = '
    RewriteEngine On
    RewriteRule ^resume$ /abdoo@abdoo.me_Resume.pdf [R=302,L]
    ';
    insert_with_markers(get_home_path().".htaccess", "abdoo_resume", $lines);
}


// ------------------------------------------------------------------------------------------------
// Allow SVG Upload. code src: WPCode plugin lib

add_filter(
	'upload_mimes',
	function ( $upload_mimes ) {
		// By default, only administrator users are allowed to add SVGs.
		// To enable more user types edit or comment the lines below but beware of
		// the security risks if you allow any user to upload SVG files.
		if ( ! current_user_can( 'administrator' ) ) {
			return $upload_mimes;
		}

		$upload_mimes['svg']  = 'image/svg+xml';
		$upload_mimes['svgz'] = 'image/svg+xml';

		return $upload_mimes;
	}
);


// ------------------------------------------------------------------------------------------------
// Allow SVG uploads

add_filter(
	'wp_check_filetype_and_ext',
	function ( $wp_check_filetype_and_ext, $file, $filename, $mimes, $real_mime ) {

		if ( ! $wp_check_filetype_and_ext['type'] ) {

			$check_filetype  = wp_check_filetype( $filename, $mimes );
			$ext             = $check_filetype['ext'];
			$type            = $check_filetype['type'];
			$proper_filename = $filename;

			if ( $type && 0 === strpos( $type, 'image/' ) && 'svg' !== $ext ) {
				$ext  = false;
				$type = false;
			}

			$wp_check_filetype_and_ext = compact( 'ext', 'type', 'proper_filename' );
		}

		return $wp_check_filetype_and_ext;

	},
	10,
	5
);



// ------------------------------------------------------------------------------------------------
// Optimization Related Codes.

// Remove some unwanted wp default bloat styles
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );


add_action( 'wp_enqueue_scripts', 'abdoo_remove_wp_bloat' );
function abdoo_remove_wp_bloat(){
    wp_dequeue_style( 'classic-theme-styles' );
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-blocks-style' ); // WooCommerce block CSS
}


// ------------------------------------------------------
// Remove wp-emoji

add_action( 'init', 'abdoo_remove_wp_emoji' );
function abdoo_remove_wp_emoji() {
 remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
 remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
 remove_action( 'wp_print_styles', 'print_emoji_styles' );
 remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
 remove_action( 'admin_print_styles', 'print_emoji_styles' );
 remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
 remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
 add_filter( 'tiny_mce_plugins', 'abdoo_disable_emojis_tinymce' );
}
function abdoo_disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return [];
    }
}


// ------------------------------------------------------
// Defer all Scripts (including jquery)

add_filter( 'script_loader_tag', function ( $tag, $handle ) {

    // Fix: Customizer not loading on defer.
    global $wp_customize;
    if ( isset( $wp_customize ) || is_admin() ) {
        return $tag;
    }
    return str_replace( ' src', ' defer="defer" src', $tag );
}, 10, 2 );



// ------------------------------------------------------
// Remove comments completely

add_action('admin_init', 'remove_comments_completely');
function remove_comments_completely () {
    // Redirect any user trying to access comments page
    global $pagenow;

    if ($pagenow === 'edit-comments.php') {
        wp_safe_redirect(admin_url());
        exit;
    }

    // Remove comments metabox from dashboard
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

    // Disable support for comments and trackbacks in post types
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
};

// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove comments page in menu
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});

// Remove comments links from admin bar
add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});

