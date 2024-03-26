<?php
/**
 * @package AlecadddPlugin
 */
namespace inc\Pages;

use \inc\Base\BaseController;
use \inc\Api\SettingsApi;
use inc\Api\Callbacks\AdminCallbacks;
use inc\Api\Callbacks\ManagerCallbacks;

class Admin extends BaseController 
{   
    public $settings;
    public $callbacks;

    public $callbacks_mngr;
    public $pages = array();

    public $subpages = array();

    public function register(){

        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->callbacks_mngr = new ManagerCallbacks();
       
        $this->setPages();

        $this->setSubPages();

        $this->setSettings();
        $this->setSections();
        $this->setFields();

        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
    }
    
      public function setPages(){

        
    $this->pages = array(
         
        array(
            'page_title' => 'Alecaddd Plugin',
            'menu_title' => 'Alecaddd',
            'capability' => 'manage_options',
            'menu_slug' => 'alecaddd_plugin',
            'callback' => array($this->callbacks,'adminDashboard'),
            'icon_url' => 'dashicons-store',
            'position' => 9
        ),


        );

      }

      public function setSubPages(){
        
        $this->subpages = array(
            array(
            'parent_slug'=>'alecaddd_plugin',
            'page_title' => 'Custom Post Types',
            'menu_title' => 'CPT',
            'capability' => 'manage_options',
            'menu_slug' => 'alecaddd_cpt',
            'callback' => array($this->callbacks,'adminCpt')
        
            ),

            array(
                'parent_slug'=>'alecaddd_plugin',
                'page_title' => 'Custom Post Types',
                'menu_title' => 'Texonomies',
                'capability' => 'manage_options',
                'menu_slug' => 'alecaddd_texonomies',
                'callback' => array($this->callbacks,'adminTaxonomy')
        
                ),

                array(
                    'parent_slug'=>'alecaddd_plugin',
                    'page_title' => 'Custom Post Types',
                    'menu_title' => 'Widgets',
                    'capability' => 'manage_options',
                    'menu_slug' => 'alecaddd_widgets',
                    'callback' => array($this->callbacks,'adminWidget')
        
                    )

        );
      }
        public function setSettings(){
            
            $args = array(
                array(
                            'option_group' => 'alecaddd_plugin_settings',
                            'option_name' => 'alecaddd_plugin',
                            'callback' => array($this->callbacks_mngr,'checkboxSanitize')
                        )
                
            );
            
            // foreach($this->managers as $key => $value){
              
            //     $args[] = array(
            //         'option_group' => 'alecaddd_plugin_settings',
            //                           'option_name' => $key,
            //                           'callback' => array($this->callbacks_mngr,'checkboxSanitize')
            //     );
            // }
        
             $this->settings->setSettings($args);
        }

        public function setSections(){
            $args = array(
                array(
                     'id' => 'alecaddd_admin_index',
                     'title' => 'Settings Manager',
                     'callback' => array($this->callbacks_mngr,'adminSectionManager'),
                     'page' => 'alecaddd_plugin'
                )
             );

             $this->settings->setSections($args);
        }

        public function setFields(){

            $args = array();
            
            foreach($this->managers as $key => $value){
               
                $args[] = array(
                    'id' => $key,
                    'title' => $value,
                    'callback' => array($this->callbacks_mngr,'checkboxField'),
                    'page' => 'alecaddd_plugin',
                    'section' => 'alecaddd_admin_index',
                    'args' => array(
                        'option_name'=>'alecaddd_plugin',
                       'label_for' =>$key, 
                       'class' => 'ui-toggle'
                    )
                );
            }

           
             $this->settings->setFields($args);
        }
}