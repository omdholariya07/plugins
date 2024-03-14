<?php

/**
 * @package AlecadddPlugin
 */
/*
Plugin Name: Alecaddd Plugin
Plugin URI: http://alecaddd.com/plugin
Description: This is my first attempt on writing a custom Plugin for this amazing tutorial series.
Version: 1.0.0
Author: om "alecaddd" Castellani
Author URI: http://alecaddd.com
License: GPLv2 or later
Text Domain: alecaddd-plugin
*/

/*
if(! defined('ABSPATH')){
    die;
}



if( ! function_exists('add_action')){
    echo 'Hey, you can\t accesss this file, you silly human!';
    exit;
}
*/


defined('ABSPATH') or die ('Hey, you can\'t access this file, you silly human!'); 
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}




if (class_exists('inc\\init')) {
    inc\init::register_services();
}