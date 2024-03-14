<?php
/**
 * @package AlecadddPlugin
 */
namespace inc\Base;
use \inc\Base\BaseController;
/**
 * 
**/
class Enqueue extends BaseController{

   
    public function register(){
  add_action('admin_enqueue_script',array($this,'enqueue'));
    }
    public function enqueue() {
                   // wp_enqueue_style('mypluginstyle', get_template_directory_uri() . "/assets/style.css", array(), true);
                    wp_enqueue_style('mypluginstyle', $this->plugin_url .'/assets/style.css',);
                    wp_enqueue_script('mypluginscript', $this->plugin_url .'/assets/script.js',);
                }
}