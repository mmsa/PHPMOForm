<?php
/**
Elemnt type : input radioButton
** return : HTML
@Author : Mohamed Mostafa
**/
if(!defined('RestrictedAccess')) 
  die('Access denied'); 

class radio extends element{
	protected $type='radio';
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
    
		foreach ($this->getOptions() as $op)
		{
			$html.='<div class="form-check">';
			$html.='<label class="form-check-label">';
			
			$html.='<input type="radio" class="form-check-input ';
			if ($this->getIsRequired())
			{
				$html.='required';
			}
			$html.='" name="'.$this->getElementName().'" id="'.$this->getElementName().'" value="'.$op->getOpValue().'">';
			$html.=$op->getOpName();
			$html.='</label>';
			$html.='</div>';
		}
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
class options
{
	protected $op_name;
	protected $op_value;
	function __construct($op_name,$op_value)
	{
		$this->op_name=$op_name;
		$this->op_value=$op_value;
	}
	
	function getOpName()
	{
		return $this->op_name;
	}

	function getOpValue()
	{
		return $this->op_value;
	}
}

?>
    
