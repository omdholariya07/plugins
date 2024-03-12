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

defined('ABSPATH') or die ('Hey, you can\t access this file, you silly human!');

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

use inc\Activate;
use inc\Deactivate;
use inc\Admin\AdminPages;


if (!class_exists('AlecadddPlugin')) {
    class AlecadddPlugin {

        public $plugin;

        function register() {
            add_action('wp_enqueue_style', array($this, 'enqueue'));
            add_action('admin_menu', array($this, 'add_admin_pages'));
            add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));
        }

        public function settings_link($links) {
            $settings_link = '<a href="admin.php?page=alecaddd_plugin">Settings</a>';
            array_push($links, $settings_link);
            return $links;
        }

        public function add_admin_pages() {
            add_menu_page('$Alecaddd plugin', 'Alecaddd', 'manage_options', 'alecaddd_plugin', array($this, 'admin_index'), 'dashicons-store', 110);
        }

        public function admin_index() {
            require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
        }

        public function activate() {
            Activate::activate();
        }

        public function deactivate() {
            Deactivate::deactivate();
        }

        public function uninstall() {
            // Delete CPT
            // Delete all the plugin data from the database 
        }

        public function custom_post_type() {
            register_post_type('book', ['public' => true, 'label' => 'Books']);
        }

        public function enqueue() {
            wp_enqueue_style('mypluginstyle', get_template_directory_uri() . "/assets/style.css", array(), true);
            // wp_enqueue_style('mypluginstyle', plugins_url('/assets/style.css',__FILE__));
            // wp_enqueue_script('mypluginscript', plugins_url('/assets/script.js',__FILE__));
        }
    }

    $alecadddPlugin = new AlecadddPlugin();
    $alecadddPlugin->register();

    register_activation_hook(__FILE__, array($alecadddPlugin, 'activate'));
    register_deactivation_hook(__FILE__, array($alecadddPlugin, 'deactivate'));

    // Uncomment the following lines if you want to use the shortcode function
    // function my_sc_fun($atts) {
    //     return 'Function Call' . $atts['msg'];
    // }
    // add_shortcode('my-sc', 'my_sc_fun');
}
