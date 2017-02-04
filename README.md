# PHPMOForm
A simple PHP library to create forms and validate it using JQuery.

#Usage
Include the PHPMOForm.php in the first line where you plan to use your form.

<?php require_once("PHPMOForm.php");?>

Create a form using new form();

$testform1=new form();

You can set the formName
$testform1->setFormName('EVOSite Form');

Add fields to the form

#Textfield
