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
                     'option_name' => 'cpt_manager',
                     'callback' => array($this->callbacks,'checkboxSanitize')
                )
             );

             $args = array(
                array(
                     'option_group' => 'alecaddd_options_group',
                     'option_name' => 'texonomy_manager' ,  
                     'callback' => array($this->callbacks,'checkboxSanitize')
                ),
                array(
                    'option_group' => 'alecaddd_options_group',
                    'option_name' => 'media_widget' ,  
                    'callback' => array($this->callbacks,'checkboxSanitize')
                ),
                array(
                    'option_group' => 'alecaddd_options_group',
                    'option_name' => 'gallery_manager' ,  
                    'callback' => array($this->callbacks,'checkboxSanitize')
                ),
                array(
                    'option_group' => 'alecaddd_options_group',
                    'option_name' => 'testimonial_manager' ,  
                    'callback' => array($this->callbacks,'checkboxSanitize')
                ),
                array(
                    'option_group' => 'alecaddd_options_group',
                    'option_name' => 'templates_manager' ,  
                    'callback' => array($this->callbacks,'checkboxSanitize')
                ),
               array(
                'option_group' => 'alecaddd_options_group',
                'option_name' => 'login_manager' ,  
                'callback' => array($this->callbacks,'checkboxSanitize')
               ),
               array(
                'option_group' => 'alecaddd_options_group',
                'option_name' => 'membership_manager' ,  
                'callback' => array($this->callbacks,'checkboxSanitize')
               ),
               array(
                'option_group' => 'alecaddd_options_group',
                'option_name' => 'chat_manager' ,  
                'callback' => array($this->callbacks,'checkboxSanitize')
           )
             );

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
            $args = array(
                array(
                    'id' => 'cpt_manager',
                    'title' => 'Activate CPT Manager',
                    'callback' => array($this->callbacks_mngr,'checkboxField'),
                    'page' => 'alecaddd_plugin',
                    'section' => 'alecaddd_admin_index',
                    'args' => array(
                       'label_for' => 'cpt_manager', 
                       'class' => 'ui-toggle'
                    )
                ),
                     array(
                        'id' => 'taxonomy_manager',
                        'title' => 'Activate Taxonomy Manager',
                        'callback' => array($this->callbacks_mngr,'checkboxField'),
                        'page' => 'alecaddd_plugin',
                        'section' => 'alecaddd_admin_index',
                        'args' => array(
                           'label_for' => 'taxonomy_manager',
                           'class' => 'ui-toggle'
                           
                        )
                        ),
                        array(
                            'id' => 'media_widget',
                            'title' => 'Activate Media Widget',
                            'callback' => array($this->callbacks_mngr,'checkboxField'),
                            'page' => 'alecaddd_plugin',
                            'section' => 'alecaddd_admin_index',
                            'args' => array(
                               'label_for' => 'media_widget',
                               'class' => 'ui-toggle'
                               
                            )
                            ),
                            array(
                                'id' => 'gallery manager',
                                'title' => 'Activate Gallery Manager',
                                'callback' => array($this->callbacks_mngr,'checkboxField'),
                                'page' => 'alecaddd_plugin',
                                'section' => 'alecaddd_admin_index',
                                'args' => array(
                                   'label_for' => 'gallery manager',
                                   'class' => 'ui-toggle'
                                   
                                )
                                ),
                                array(
                                    'id' => 'testimonial manager',
                                    'title' => 'Activate Testimonial Manager',
                                    'callback' => array($this->callbacks_mngr,'checkboxField'),
                                    'page' => 'alecaddd_plugin',
                                    'section' => 'alecaddd_admin_index',
                                    'args' => array(
                                       'label_for' => 'testimonial manager',
                                       'class' => 'ui-toggle'
                                       
                                    )
                                    ),
                                    array(
                                        'id' => 'templates manager',
                                        'title' => 'Activate Templates Manager',
                                        'callback' => array($this->callbacks_mngr,'checkboxField'),
                                        'page' => 'alecaddd_plugin',
                                        'section' => 'alecaddd_admin_index',
                                        'args' => array(
                                           'label_for' => 'templates manager',
                                           'class' => 'ui-toggle'
                                           
                                        )
                                        ),
                                        array(
                                            'id' => 'login manager',
                                            'title' => 'Activate Ajax Login/Signup',
                                            'callback' => array($this->callbacks_mngr,'checkboxField'),
                                            'page' => 'alecaddd_plugin',
                                            'section' => 'alecaddd_admin_index',
                                            'args' => array(
                                               'label_for' => 'login manager',
                                               'class' => 'ui-toggle'
                                               
                                            )
                                            ),
                                            array(
                                                'id' => 'membership manager',
                                                'title' => 'Activate Membership Manager',
                                                'callback' => array($this->callbacks_mngr,'checkboxField'),
                                                'page' => 'alecaddd_plugin',
                                                'section' => 'alecaddd_admin_index',
                                                'args' => array(
                                                   'label_for' => 'membership manager',
                                                   'class' => 'ui-toggle'
                                                   
                                                )
                                                ),
                                                array(
                                                    'id' => 'chat manager',
                                                    'title' => 'Activate Chat Manager',
                                                    'callback' => array($this->callbacks_mngr,'checkboxField'),
                                                    'page' => 'alecaddd_plugin',
                                                    'section' => 'alecaddd_admin_index',
                                                    'args' => array(
                                                       'label_for' => 'chat manager',
                                                       'class' => 'ui-toggle'
                                                       
                                                    )
                                                    ),
                                
                         
             );

             $this->settings->setFields($args);
        }
}