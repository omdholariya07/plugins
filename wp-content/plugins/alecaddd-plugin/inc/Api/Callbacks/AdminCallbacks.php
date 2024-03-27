<?php
/**
 * @package AlecadddPlugin
 */
namespace inc\Api\Callbacks;
use inc\Base\BaseController;


class AdminCallbacks extends BaseController
{

    public function adminDashboard()
    {
       return require_once( $this->plugin_path . '/templates/admin.php' );
    }

    public function adminCpt()
    {
       return require_once( $this->plugin_path . '/templates/cpt.php' );
    }

    public function adminTaxonomy()
    {
       return require_once( $this->plugin_path . '/templates/taxonomy.php' );
    }

    public function adminWidget()
    {
       return require_once( $this->plugin_path . '/templates/widget.php' );
    }

    public function alecadddTextExample()
    {
        $value = esc_attr(get_option('text_example'));

      echo '<input type="text" class="regular-text" name="text_example" value="' . $value . '" placeholder="write something here!">';
    }

    public function alecadddFirstName()
    {
        $value = esc_attr(get_option('first_name'));
        
      echo '<input type="text" class="regular-text" name="text_example" value="' . $value . '" placeholder="write your first name">';
    }
}