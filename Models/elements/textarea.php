<?php
/**
Elemnt type : input textarea
** return : HTML
@Author : Mohamed Mostafa
**/
if(!defined('RestrictedAccess')) 
  die('Access denied'); 

class textarea extends element{
	protected $type='textarea';
	
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
		$html.='<textarea class="form-control ';
		if ($this->getIsRequired())
		{
			$html.='required';
		}
		$html.=' " id="'.$this->getElementName().'" name="'.$this->getElementName().'" rows="3" ';
		if ($this->getReadOnly())
		{
		$html.='readonly';
		}
		$html.='></textarea>';
		return $html;
	}
	
	
}


?>
    
