<?php
/****
element Class
All form elements will extend this class
Author: Mohamed Mostafa
****/
if(!defined('RestrictedAccess')) 
  die('Access denied'); 
class element
{
	protected $required=false;
	protected $numbersonly=false;
	protected $readonly=false;
	protected $value;
	protected $elementName;
	protected $label;
	protected $type;
	# set element value
	function __construct($numbersonly)
	{
		$this->numbersonly=$numbersonly;
	}
	#set readonly status
	function setReadOnly($readonly)
	{
		$this->readonly=$readonly;
	}
	#set Required status
	function setRequired($required)
	{
		$this->required=$required;
	}
	#add value to the element
	function setValue($value)
	{
		$this->value=$value;
	}
	#get if required
	function getIsRequired()
	{
		return $this->required;
	}
	#check if numbers only
	function getIsNumberOnly()
	{
		return $this->numbersonly;
		
	}
	#check the readonly status
	function getReadOnly()
	{
		return $this->readonly;
	}
	#set the name of the element
	function setName($name)
	{
		$this->elementName=$name;
	}
	#get element value, return string
	function getValue()
	{
		return $this->value;
	}
	#get element name, return String
	function getElementName()
	{
		return $this->elementName;
	}
	#set label
	function setLabel($label)
	{
		$this->label=$label;
	}
	#return label
	function getLabel()
	{
		return $this->label;
	}
	#output the HTML element
	function output(){}
	#get element type
	function getElementType()
	{
		return $this->type;
	}
}
?>