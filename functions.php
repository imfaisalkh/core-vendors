<?php 

/*
Plugin Name: Core Vendors
Plugin URI: https://github.com/themeshash/core-vendors
Description: Provides different third party resources together with an API for developers.
Version: 1.0
Author: Faisal Khurshid
Author URI: http://themeforest.net/user/wpscouts
*/


#-----------------------------------------------------------------#
# If this file is called directly, abort.
#-----------------------------------------------------------------# 

    if ( ! defined( 'WPINC' ) ) {
        die;
    }


#-----------------------------------------------------------------#
# Register Vendor Plugins
#-----------------------------------------------------------------# 


    function wpscouts_enqueue_scripts() {
        if ( !is_admin() ) {

            wp_register_script('isotope', plugin_dir_url(__FILE__) . 'vendors/isotope-layout/isotope.pkgd.min.js');
            wp_register_script('packery', plugin_dir_url(__FILE__) . 'vendors/packery/packery.pkgd.min.js');
            wp_register_script('infinite-scroll', plugin_dir_url(__FILE__) . 'vendors/infinite-scroll/infinite-scroll.pkgd.min.js');
            wp_register_script('flickity', plugin_dir_url(__FILE__) . 'vendors/flickity/flickity.pkgd.min.js');
            wp_register_style('flickity', plugin_dir_url(__FILE__) . 'vendors/flickity/flickity.min.css');
            wp_register_script('fancybox', plugin_dir_url(__FILE__) . 'vendors/fancybox/jquery.fancybox.min.js');
            wp_register_style('fancybox', plugin_dir_url(__FILE__) . 'vendors/fancybox/jquery.fancybox.min.css');
        }
    }

    add_action( 'wp_enqueue_scripts', 'wpscouts_enqueue_scripts' );    



#-------------------------------------------------------------------------------#
#  Filter Body Classes
#-------------------------------------------------------------------------------#


    function wpscouts_body_class( $classes ) {

        // get values defined in 'globals.inc.php'
        $isotope_class = wp_script_is( 'isotope', 'enqueued' ) ? ' is-isotope-enabled' : '';
        $packery_class = wp_script_is( 'packery', 'enqueued' ) ? ' is-packery-enabled' : '';
        $infinite_scroll_class = wp_script_is( 'infinite-scroll', 'enqueued' ) ? ' is-infinite-scroll-enabled' : '';
        $flickity_class = wp_script_is( 'flickity', 'enqueued' ) ? ' is-flickity-enabled' : '';
        $fancybox_class = wp_script_is( 'fancybox', 'enqueued' ) ? ' is-fancybox-enabled' : '';

        // add custom classes to the $classes array
        $classes[] = $isotope_class . $packery_class . $infinite_scroll_class . $flickity_class . $fancybox_class;

        // return the $classes array
        return $classes;
    }

    add_filter( 'body_class', 'wpscouts_body_class' );
