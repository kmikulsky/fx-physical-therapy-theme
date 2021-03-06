<?php

function fxphysical_theme_support(){
    //alows wp to manage title tag
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo');
    add_theme_support('post-thumbnails'); 
}

add_action('after_setup_theme', 'fxphysical_theme_support');


function fxphysical_menus(){

    $locations = array(
        'primary' =>"Desktop Primary Left Sidebar",
        'footer' =>"Footer Menu Items"
    );
    register_nav_menus($locations);
}

add_action('init', 'fxphysical_menus');

function fxphysical_register_styles(){
    $version = wp_get_theme()->get('Version');
    //the line below commnted out isnt working so we need a workaround for the array order. this is a common issue with local host 
    //wp_enqueue_style('fxphysical-style' , get_template_directory_uri() . '/FX_Physical_Therapy/style.css', array() ,$version,'all');
      wp_enqueue_style('fxphysical-bootstrap' , "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" , array(), '4.4.1', 'all' );
      wp_enqueue_style('fxphysical-style' , get_stylesheet_uri()); 
      wp_enqueue_style('fxphysical-fontawesome' , "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" , array(), '5.13.0', 'all');
}

add_action('wp_enqueue_scripts', 'fxphysical_register_styles');
//add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );

function fxphysical_register_scripts(){
   
    wp_enqueue_script('fxphysical-jquery','https://code.jquery.com/jquery-3.4.1.slim.min.js', array(), '3.4.1', true );
    wp_enqueue_script('fxphysical-popper','https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), '1.16.0', true );
    wp_enqueue_script('fxphysical-bootstrap','https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array(), '4.4.1', true );
    wp_enqueue_script('fxphysical-main',get_template_directory_uri()."/assets/js/main.js", array(), '1.0', true );

}

add_action('wp_enqueue_scripts', 'fxphysical_register_scripts');

function fxphysical_widget_areas(){

    register_sidebar(
        array(
            'before_title' => '<h2>' ,
            'after_title' => '</h2>',
            'before_widget' => '<ul class="social-list list-inline py-3 mx-auto">',
            'after_widget' => '</ul>',
            'name' => 'Sidebar Area',
            'id' => 'sidebar-1',
            'description' => 'Sidebar Widget Area'
        )
    );

    register_sidebar(
        array(
            'before_title' => '<h2>' ,
            'after_title' => '</h2>',
            'before_widget' => '<ul class="social-list list-inline py-3 mx-auto">',
            'after_widget' => '</ul>',
            'name' => 'Footer Area',
            'id' => 'footer-1',
            'description' => 'Footer Widget Area'
        )
    );
}

add_action( 'widgets_init', 'fxphysical_widget_areas');


?>