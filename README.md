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
$firstname=new textfield(fieldName, Field Label);
Example:
$firstname=new textfield('FirstName','First Name');

$firstname->setRequired(true);

#Textarea
$address=new textarea('Address','User Address');

#Radio, Checkbox, Select
For Radio, Checkbox, Select fields. Needs to create an element option first
$male=new options('Field Name',Field Value);
Example
$male=new options('Male','m');
$female=new options('Female','f');

And then add payment
#select
$paymentType=new dropdown('paymentType','Payment Type');
#radio
$gender=new radio('gender','Gender');
#checkbox
$hearaboutus=new checkbox('hearaboutus','How did you hear about us?');

Add options 
$gender->addOptions($male);
$gender->addOptions($female);

#And then add elements
$testform1->addElement($firstname);
$testform1->addElement($lastname);

You need to create view
#view
$formView=new formView();

#create a mailer object and pass it to the form
$from='Mohamed Mostafa <mmsa12@hotmail.com>';
$to='mmsa12@gmail.com';
$subject='EVOSite Form';
$mailer=new mailer($from,$to,$subject)

#display the form
$formView->setMailer($mailer);
$formController=new formController($testform1,$formView);
echo $formController->displayForm();


