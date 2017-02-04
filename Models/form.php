<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>


<?php
/**
Form class

**processing paramter 1: Send an email 2: store fDB
** form method default value is post
** array of elements hold all elements in the form
**display form elements based on the added elements.
**Send out the element data names to controller through JQuery


**/
//include('element.php');
if(!defined('RestrictedAccess')) 
  die('Access denied'); 

class form
{
	protected $formName;
	protected $processing=1;
	protected $elements=array();
	protected $formToken;
	#initi processing and method value 
	function __construct()
	{
		$this->setFormName('Form 1');
		$this->formToken=$this->getToken();
		$this->storeToken($this->getFormToken());
		//generate a token
		
	}
	#set form name if not default
	function setFormName($formName)
	{
		$this->formName=$formName;
	}
	#return form name
	function getFormName()
	{
		return $this->formName;
	}
	#add elements
	function addElement($element )
	{
		#$element is an element object
		array_push($this->elements,$element);
	}
	#return all elements attached to the form
	function getElements()
	{
		return $this->elements;
	}
	#generate a security token
	function getToken()
	{
		return md5(rand(100,99999));
	}
	function getFormToken()
	{
		return $this->formToken;
	}
	function storeToken($token)
	{
		$_SESSION['token']=$token;
		
	}
	
	
	
}

?>
