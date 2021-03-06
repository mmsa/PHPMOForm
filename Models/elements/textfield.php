<?php
/**
Elemnt type : input textfield
** return : HTML
@Author : Mohamed Mostafa
**/
if(!defined('RestrictedAccess')) 
  die('Access denied'); 

class textfield extends element{
	protected $type='text';
	protected $numbersonly=false;
	/**
	initialise the name and label values
	**/
	function __construct($elementName,$label)
	{
		$this->setName($elementName);
		$this->setLabel($label);
	}
	

	function output()
	{
		$html='<label for="'.$this->getElementName().'" >'.$this->getLabel().'</label>';
		if ($this->getIsRequired())
		{
			$html.='*';
		}
		$html.='<input ';
		$html.='class="form-control ';
		#add required class if required is enabled
		#This will be used in JQuery validation part
		if ($this->getIsRequired())
		{
			$html.='required';
		}
		#add the numbersonly class if marked as true
		if ($this->getNumbersOnly())
		{
			$html.=' numbersonly ';
		}
		$html.='"id="'.$this->getElementName().'" name="'.$this->getElementName().'"  type="text"';
		#mark readonly if enabled
		if ($this->getReadOnly())
		{
		$html.='readonly';
		}
		$html.='/>';
		return $html;
	}
	#set the validation numbersonly
	function setNumbersOnly($numbersonly)
	{
		$this->numbersonly=$numbersonly;
	}
	#get the validation numbersonly
	function getNumbersOnly()
	{
		return $this->numbersonly;
	}
	
	
	
}


?>
