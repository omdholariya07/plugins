<?php
/**
 * @package AlecadddPlugin
 */
namespace inc\Api\Callbacks;
use inc\Base\BaseController;


class ManagerCallbacks extends BaseController
{

    public function checkboxSanitize($input)
    {
      //return  filter_var($input,FILTER_SANITIZE_NUMBER_INT);
      return(isset($input)? true : false);
    }

    public function adminSectionManager(){
        echo 'activate section and features of this plugin by activating checkbox from the following list.';
    }

    // public function checkboxField($args)
    // {
    //     $name = $args['label_for']; 
    //     $classes = $args['class'];
    //     $checkbox = get_option($name);
    //     return '<input type="checkbox" name="' . $name . '" value="1" class="' . $classes . '"' . ($checkbox ? ' checked' : '') . '>'; 
    // }
    
    public function checkboxField($args){
        $name = isset($args['label_for']) ? $args['label_for'] : ''; // Corrected from 'lebel_for'
        $classes = isset($args['class']) ? $args['class'] : ''; 
        $checkbox = get_option($name);
        return '<input type="checkbox" name="' . esc_attr($name) . '" value="1" class="' . esc_attr($classes) . '"' . checked($checkbox, 1, false) . '>'; 
    }
    
    
}