<?php
namespace MD\Helper;

class Config{
    public static $settings = null;
    public static function get($var){
        if(self::$settings == null){
            self::$settings = parse_ini_file( '../../Config/config.ini');
        }
        return self::$settings[$var];
    }
}