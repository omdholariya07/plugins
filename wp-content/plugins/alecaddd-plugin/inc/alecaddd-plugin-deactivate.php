<?php
/**
 * @package Alecadddplugin 
 */

 class Alecaddd_plugin_deactivate
 {
    public static function deactivate(){
        flush_rewrite_rules();
    }
 }