<?php session_start();?>
<?php
/** PHPMoForm Luncher
This file to load up all required classes used by the PHPMoForm

**/
/*
spl_autoload_register(Models());
spl_autoload_register(Elements());
function Models($class_name) {
    include 'Models/'.$class_name . '.php';
}

function Elements($class_name) {
    include 'Models/elements/'.$class_name . '.php';
}

*/
define('RestrictedAccess', true); 

include('Models/element.php');
include('Models/form.php');
include('Models/mailer.php');
include('Models/elements/textfield.php');
include('Models/elements/textarea.php');
include('Models/elements/radio.php');
include('Models/elements/dropdown.php');
include('Models/elements/displaytext.php');
include('Models/elements/checkbox.php');
include('Controllers/form.php');
include('Views/form.php');

?>
