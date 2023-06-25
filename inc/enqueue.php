<?php
/*
 *
 * Scripts and Styles Handeling.
 * 
 */

add_action( 'wp_enqueue_scripts', 'abdoo_theme_scripts' );
function abdoo_theme_scripts() {

	// Inlining Critical Css
	// wp_enqueue_style( 'abdoo-style-reset', get_stylesheet_directory_uri() . '/css/css-reset.css', [], '1.1');
	// wp_enqueue_style( 'abdoo-style', get_stylesheet_uri(), [], null);
	// wp_enqueue_style( 'keen-slider', get_stylesheet_directory_uri() . '/css/keen-slider.min.css', [], null);

	$css_files_to_inline = [
		'abdoo-style-reset'  => get_template_directory() . '/css/css-reset.css',
		'abdoo-style' 		 => get_template_directory() . '/style.css',
		'keen-slider' 		 => get_template_directory() . '/css/keen-slider.min.css',
	];
	
	if (get_locale() == 'ar') 
		$css_files_to_inline['abdoo-style-rtl'] = get_template_directory() . '/abdoo.rtl.css';

	foreach($css_files_to_inline as $handle => $path){
		abdoo_inline_css_file($path, $handle);
	}

	// wp_enqueue_style( 'abdoo-font-tajawal', "https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500&display=swap", [], null);


	// No jQuery Used in this Project
    wp_enqueue_script('typed-js', get_stylesheet_directory_uri() . '/js/typed.js', [], '1.0');
    wp_enqueue_script('keen-slider-js', get_stylesheet_directory_uri() . '/js/keen-slider.js', []);
    wp_enqueue_script('easypiechart-js', get_stylesheet_directory_uri() . '/js/easypiechart.min.js', []);
    wp_enqueue_script('abdoo-js', get_stylesheet_directory_uri() . '/js/main.js', [], '1.5');


	//
	if(defined('WP_DEBUG') && true === WP_DEBUG){ 
		wp_localize_script( 'abdoo-js', 'abdoo_WP_DEBUG', [ 
			'is_on' => true,
		]);
	}
	if(is_404()){ 
		wp_enqueue_script('particles-js', get_stylesheet_directory_uri() . '/js/particles.min.js',[], '2.0',true);
		wp_enqueue_script('404-js', get_stylesheet_directory_uri() . '/js/404.js',['particles-js'], '1.0',true);
	}

	// 
	// Injector -> Html Atrr 
	// Js General
}

function abdoo_inline_css_file($css_file_path, $handle){
	// Minify on the fly
	ob_start();
	require_once($css_file_path); // Note that file_get_contents will load https (maybe cached) files
	$buffer = ob_get_clean();
	$buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
    $buffer = str_replace(': ', ':', $buffer);
    $buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);

	// Add as inline by the recommended method
	wp_register_style( $handle, false );
	wp_enqueue_style( $handle );
	wp_add_inline_style( $handle, $buffer );
}