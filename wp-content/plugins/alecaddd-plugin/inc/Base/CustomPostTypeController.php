<?php
/**
 * @package AlecadddPlugin
 */
namespace inc\Base;

use inc\Api\SettingsApi;
use inc\Base\BaseController;
use inc\Api\Callbacks\AdminCallbacks;

/**
 * 
**/
class CustomPostTypeController extends BaseController{
    public $callbacks;
    public $subpages = array();
    public function register() {

        
        $option = get_option('alecaddd_plugin');
        $activated = isset($option['cpt_manager']) ? $option['cpt_manager'] : false;

        $option = get_option('alecaddd_plugin');
        $activated = isset($option['taxonomy_manager']) ? $option['taxonomy_manager'] : false;

        if(! $activated ){
            return;
        }

       

        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->setSubPages();

        $this->settings->addSubPages($this->subpages)->register();

        add_action('init',array($this,'activate'));
    }

    public function setSubPages(){
        
        $this->subpages = array(
            array(
            'parent_slug'=>'alecaddd_plugin',
            'page_title' => 'Custom Post Types',
            'menu_title' => 'CPT Manager',
            'capability' => 'manage_options',
            'menu_slug' => 'alecaddd_cpt',
            'callback' => array($this->callbacks,'adminCpt')
        
            )
        );
      }
    public function activate ()
    {
        register_post_type('alecaddd_products',
        array(
            'labels' => array(
               'name' =>'products',
            'singular_name' => 'product'
        ),
        'public' => true,
        'has_archive' => true,
        )
     );
    }
}