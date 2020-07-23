<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class BanglaConverter {
    public static $bn = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
    public static $en = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
    
    public static function bengali_to_english($number) {
        return str_replace(self::$bn, self::$en, $number);
    }
    
    public static function english_to_bengali($number) {
        return str_replace(self::$en, self::$bn, $number);
    }
}



?>
