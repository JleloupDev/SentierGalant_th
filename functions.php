<?php

/**
 ** activation theme
 **/

// ENlever les infos de version
remove_action("wp_head", "wp_generator");

// Désactiver les erreurs de connexion
function ps_disable_login_errors()
{
	return ''; // or you can try return null
}
add_filter('login_errors', 'ps_disable_login_errors');

// Désactive l'édition des fichiers via interace WP
define('DISALLOW_FILE_EDIT', true);

//Generate all thumnails
add_theme_support( 'post-thumbnails' );

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
	wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}


function theme_settings_page() {
	?>
	    <div class="wrap">
	    <h1>Theme Panel</h1>
	    <form method="post" action="options.php">
	        <?php
	            settings_fields("section");
	            do_settings_sections("theme-options");      
	            submit_button(); 
	        ?>          
	    </form>
		</div>
	<?php
}

function add_theme_menu_item()
{
	add_menu_page("Options du thème Sentiergalant", "Options du thème Sentiergalant", "manage_options", "theme-panel", "theme_settings_page", null, 99);
}

add_action("admin_menu", "add_theme_menu_item");



//TODO: Ce code inclue les scrips dans toutes les pages
function collectiveray_load_js_script() {
    // wp_enqueue_script('js-file', 'PATH_TO_JS_FILE', array('jquery'), '', false);
    //or use the version below if you know exactly where the file is
    wp_enqueue_script( 'js-file', get_stylesheet_directory_uri() . '/Scripts/sgpopup.js');
}

add_action('wp_enqueue_scripts', 'collectiveray_load_js_script');