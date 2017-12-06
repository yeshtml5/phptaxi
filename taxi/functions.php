<?php
/*Menu Enable*/
function register_my_menu(){
	register_nav_menu('header-menu',__('Header Menu'));
}
add_action('init','register_my_menu');
/*Sidebar Enable*/
function resister_my_sidebar(){
	register_sidebar(
		array(
			('name')=>__('Main Sidebar')
		)
	);
}
add_action('init','resister_my_sidebar');
/*특성이미지*/
add_theme_support('post-thumbnails');
remove_filter( 'the_content', 'wpautop' );/*wordpress 강제p태그 삭제*/
 
function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
		show_admin_bar(false);
	}
}
add_action('after_setup_theme', 'remove_admin_bar');

/*
2017.10.28 이후 수정
*/
// REMOVE EMOJI ICONS
/*
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
*/
/*
update_option('siteurl','http://13.124.219.155/wordpress');
update_option('home','http://new.boscoin.io');
*/
?>
