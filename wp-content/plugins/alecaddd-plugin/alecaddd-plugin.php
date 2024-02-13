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

defined('ABSPATH') or die ('Hey, you can\t access this file, you silly human!');

if( ! function_exists('add_action')){
    echo 'Hey, you can\t accesss this file, you silly human!';
    exit;
}
*/

class AlecadddPlugin{

    function __construct(){
     add_action ('init',array($this,'custom_post_type'));
    }
    function activate(){
       //generate CPT
       $this->custom_post_type();
       // flush rewrite rules  
       flush_rewrite_rules();
    }
    function deactivate(){
      // flush rewrite rules
    }
    function uninstall(){
      //delete CPT
      //delete all the plugin data from the db 
    }

    function custom_post_type(){
        register_post_type('book',['public' => true, 'label' => 'Books']);
    }
}
if( class_exists('AlecadddPlugin')){
    $alecadddPlugin = new AlecadddPlugin();
}

register_activation_hook( __FILE__, array($alecadddPlugin,'activate') );

register_deactivation_hook( __FILE__, array($alecadddPlugin,'deactivate'));
