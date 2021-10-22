<?php

/**
 * Plugin Name: form plugin 
 * Description : this is my plugin
 * author: Araissia soufien
 * version: 1.0.0
 */

function formInclude() 
{
    if(!$_POST) {
        include_once(plugin_dir_path(__FILE__) . 'form.php');
    }
    else {
        include_once(plugin_dir_path(__FILE__) . 'control.php');
    }
     return $content;
}


function register_style() {
    wp_register_style( 'new_style', plugins_url('/css/style.css', __FILE__), false, '1.0.0', 'all');
}
function register_script() {
    wp_register_script( 'new_script', plugins_url('/js/script.js', __FILE__), false, '1.0.0', 'all'); 
}
function enqueue_style(){
    wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css' );  
   wp_enqueue_style( 'new_style' );  
}
function enqueue_scripts(){
   wp_enqueue_script( 'new_script' );
}

add_shortcode('contact_form','formInclude');
add_action('wp_head', 'register_style');
add_action('wp_enqueue_scripts', 'register_script');
add_action('wp_head', 'enqueue_style');
add_action('wp_enqueue_scripts', 'enqueue_scripts');

