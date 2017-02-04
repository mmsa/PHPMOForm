<?php session_start();?>
<html>
<head>
<title>PHPMOForm</title>
</head>
<body>
<?php
/**
This is a working example how to use PHPMoForm library
@Author: Mohamed Mostafa
Email : mmsa12@gmail.com
**/
//include('PHPMOForm.php');
define('RestrictedAccess', true); 
require_once("PHPMOForm.php");
	#create form
	$testform1=new form();
	#set form name if not then Form 1 is default name
	$testform1->setFormName('EVOSite Form');
	#create elements to add it to the form
	$firstname=new textfield('FirstName','First Name');
	$firstname->setRequired(true);
	$lastname=new textfield('LastName','Last Name');
	//$lastname->setRequired(true);
	$country=new textfield('Country','Country');
	#textarea example
	$address=new textarea('Address','User Address');
	#radio example
	#You need to create options first before and then add to the raido instance
	#create radio options
	#add the option name where it will be displayed in the form
	#value of the option which will be sent to the form
	#name,value
	$male=new options('Male','m');
	$female=new options('Female','f');
	#create radio element
	$gender=new radio('gender','Gender');
	$gender->addOptions($male);
	$gender->addOptions($female);
	//set required
	//$gender->setRequired(true);
	#create select menu (again needs options first)
	$paypal=new options('Paypal','paypal');
	$creditcard=new options('Credit Card','creditcard');
	$paymentType=new dropdown('paymentType','Payment Type');
	$paymentType->addOptions($paypal);
	$paymentType->addOptions($creditcard);
	//set required
	//$paymentType->setRequired(true);

	#display text to the form as help note
	$help=new displaytext('This is just to show how the help note will be displayed');
	#create checkbox  (again needs options first)
	$google=new options('Google','Google');
	$facebook=new options('Facebook','Facebook');
	$friend=new options('Friend','Friend');
	$hearaboutus=new checkbox('hearaboutus','How did you hear about us?');
	$hearaboutus->addOptions($google);
	$hearaboutus->addOptions($facebook);
	$hearaboutus->addOptions($friend);
	//set required
	//$hearaboutus->setRequired(true);
	#add elements to the form
	$testform1->addElement($firstname);
	$testform1->addElement($lastname);
	$testform1->addElement($address);
	$testform1->addElement($country);
	$testform1->addElement($gender);
	$testform1->addElement($paymentType);
	$testform1->addElement($help);
	$testform1->addElement($hearaboutus);
	#display the form
	$formView=new formView();
	#create a mailer object and pass it to the form
	$from='Mohamed Mostafa <mmsa12@hotmail.com>';
	$to='mmsa12@gmail.com';
	$subject='EVOSite Form';
	$mailer=new mailer($from,$to,$subject);
	#pass mailer to view form
	$formView->setMailer($mailer);
	$formController=new formController($testform1,$formView);
	echo $formController->displayForm();
	
	
	
?>
</body>
</html>