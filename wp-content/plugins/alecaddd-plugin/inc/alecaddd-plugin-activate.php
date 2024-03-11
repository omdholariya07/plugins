<?php
/**
 * @package Alecadddplugin 
 */

 class Alecaddd_plugin_activate
 {
    public static function activate(){
        flush_rewrite_rules();
    }
 }