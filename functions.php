<?php
/**
** activation theme
**/

// ENlever les infos de version
remove_action("wp_head", "wp_generator");

// Désactiver les erreurs de connexion
function ps_disable_login_errors(){
	  return ''; // or you can try return null
}
add_filter( 'login_errors', 'ps_disable_login_errors' );

// Désactive l'édition des fichiers via interace WP
define('DISALLOW_FILE_EDIT',true);

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
 wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}
