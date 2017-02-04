<?php
/**
Elemnt type : input dropdown
** return : HTML
@Author : Mohamed Mostafa
**/
if(!defined('RestrictedAccess')) 
  die('Access denied'); 

class dropdown extends element{
	protected $type='dropdown';
	protected $options=array();
	
	function __construct($elementName,$label)
	{
		$this->setName($elementName);
		$this->setLabel($label);
	}
	
	function output()
	{
		$html='<legend>'.$this->getLabel();
		if ($this->getIsRequired())
		{
			$html.='*';
		}
		$html.='</legend>';
		if (count($this->getOptions())==0)
		{
			$html.='No options added to the form';
		}
		else
		{
		$html.='<select class="custom-select ';
		if ($this->getIsRequired())
		{
			$html.='required';
		}
		$html.='" name="'.$this->getElementName().'" id="'.$this->getElementName().'" >';
		$html.='<option selected value="">Please select</option>';
		foreach ($this->getOptions() as $op)
		{
			$html.='<option value="'.$op->getOpValue().'">'.$op->getOpName().'</option>';
		}
		$html.='</select>';

	}
		
		
		return $html;
	}
	function addOptions($option)
	{
		array_push($this->options,$option);
	}
	function getOptions()
	{
	 return $this->options;
	}
	
	
}

?>
    
