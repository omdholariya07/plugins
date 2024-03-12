<?php
/**
 * @package Alecadddplugin
 */

namespace inc;

class Activate {
    public static function activate() {
        // Activation logic here
        // For example, you might want to perform some actions when the plugin is activated
        flush_rewrite_rules();
    }
}
