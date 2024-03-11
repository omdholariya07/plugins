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
     
     public $plugin;

    function __construct(){
     //add_action ('init',array($this,'custom_post_type'));
     $this ->plugin = plugin_basename( __FILE__ );
    }
    function register() {
        add_action('wp_enqueue_style',array($this,'enqueue'));

        add_action('admin_menu',array($this,'add_admin_pages'));
        

        add_filter("plugin_action_links_$this->plugin", array($this,'settings_link'));
    }
     public function settings_link($links){
         $settings_link = '<a href="admin.php?page=alecaddd_plugin">Settings</a>';
         array_push($links,$settings_link);
         return $links;
     }
          public function add_admin_pages(){
        add_menu_page('$Alecaddd plugin','Alecaddd','manage_options','alecaddd_plugin',array($this,'admin_index'),'dashicons-store',110);
      }

      public function admin_index(){
        require_once plugin_dir_path(__FILE__).'templates/admin.php';
      }
    function activate(){
       require_once plugin_dir_path(__FILE__).'inc/alecaddd-plugin-activate.php';
       AlecadddPluginActivate::activate();
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

    function enqueue(){
        wp_enqueue_style('mypluginstyle',get_template_directory_uri()."/assets/style.css", array(),true);
       // wp_enqueue_style('mypluginstyle', plugins_url('/assets/style.css',__FILE__));
      //  wp_enqueue_script('mypluginscript', plugins_url('/assets/script.js',__FILE__));
    }
}
if( class_exists('AlecadddPlugin')){
    $alecadddPlugin = new AlecadddPlugin();
    $alecadddPlugin->register();
}

register_activation_hook( __FILE__, array($alecadddPlugin,'activate') );

register_deactivation_hook( __FILE__, array($alecadddPlugin,'deactivate'));

function my_sc_fun($atts){
    
    return 'Function Call' . $atts['msg'];
}
add_shortcode('my-sc','my_sc_fun');