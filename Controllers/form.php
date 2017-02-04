<?php
if(!defined('RestrictedAccess')) 
  die('Access denied'); 
/**
Form controller
@Author : Mohamed Mostafa
**/



class formController
{
	protected $model;
	protected $view;
	
	function __construct($model,$view)
	{
		$this->model=$model;
		$this->view=$view;
	}
	function displayForm()
	{
		$this->view->setForm($this->model);
		return $this->view->outputForm();
	}
	
	
	
}


?>