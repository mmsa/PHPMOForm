<?php
/**
Elemnt type : input displaytext
** return : HTML
@Author : Mohamed Mostafa
**/
if(!defined('RestrictedAccess')) 
  die('Access denied'); 

class displaytext extends element{
	protected $type='displayText';
	function __construct($text)
	{
		$this->setValue($text);
	}
	
	function output()
	{
		$html='<small class="form-text text-muted">'.$this->getValue().'</small>';
		return $html;
	}
	
	
	
}


?>
