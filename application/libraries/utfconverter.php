<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class UTFconverter {


	var $input;
	var $output;

	public function convert_to_utf16($input){
		$output = mb_strtoupper(bin2hex(mb_convert_encoding($input, 'UTF-16BE', 'UTF-8')));
		return $output;
	}


}
?>