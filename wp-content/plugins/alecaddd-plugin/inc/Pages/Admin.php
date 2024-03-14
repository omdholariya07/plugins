<?php
/**
 * @package AlecadddPlugin
 */
namespace inc\Pages;

use \inc\Base\BaseController;
use \inc\Api\SettingsApi;

class Admin extends BaseController 
{   
    public $settings;

    public $pages = array();

    public function __construct(){
        $this->settings = new SettingsApi();
    

    $this->pages = array(
         
            array(
                'page_title' => 'Alecaddd Plugin',
                'menu_title' => 'Alecaddd',
                'capability' => 'manage_options',
                'menu_slug' => 'alecaddd_plugin',
                'callback' => function(){ echo '<h1>Alecaddd Plugin</h1>';},
                'icon_url' => 'dashicons-store',
                'position' => 9
            ),

            array(
                'page_title'=>'Test Plugin',
                'menu_title' => 'Test',
                'capability' => 'manage_options',
                'menu_slug' => 'test_plugin',
                'callback' => function(){ echo '<h1>External</h1>';},
                'icon_url' => 'dashicons-external',
                'position' => 9
            )


            );
        }
    public function register(){
      
        $this->settings->addPages($this->pages)->register();
    }


}