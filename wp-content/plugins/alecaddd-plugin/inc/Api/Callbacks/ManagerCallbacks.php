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
        $output = array();
        
        // Check if $input is an array
        if (is_array($input)) {
            foreach ($this->manager as $key => $value) {
                $output[$key] = isset($input[$key]) ? true : false;  
            }
        }
        
        return $output;
    }
    

    public function adminSectionManager(){
        echo 'activate section and features of this plugin by activating checkbox from the following list.';
    }

    public function checkboxField($args)
    {
        $name = $args['label_for']; 
        $classes = $args['class'];
        $option_name = $args['option_name']; 
        $checkbox = get_option($option_name);
        echo '<div class="' . $classes . '"><input type="checkbox" id="' . $name . '" name="' . $option_name .'[' . $name . ']" value="1" class="' . $classes . '"' . ($checkbox[$name] ? ' checked' : '') . '><label for="' . $name . '"><div></div></label></div>'; 
    }
    
    
}   