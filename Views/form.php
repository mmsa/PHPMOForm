<script src="Models/form.js"></script>
<link rel='stylesheet' type='text/css' href='css/style.css'>

<?php
if(!defined('RestrictedAccess')) 
  die('Access denied'); 

/**
Form View to display form elements
**/

class formView
{
	protected $form;
	protected $mailer;
	
	function setForm($form)
	{
		$this->form=$form;
	}
	function getForm()
	{
		return $this->form;
	}
	
	function setMailer($mailer)
	{
		$this->mailer=$mailer;
	}
	function getMailer()
	{
		return $this->mailer;
	}
	
	function outputForm()
	{
		#holds elements in string and pass it to hidden input for Jquery
		$elementNames='';
		#title of the form
		$html='<div class="container">';
		$html.='<h1>'.$this->getForm()->getFormName().'</h1>';
		$html.='<hr>';
		$html.='<div id="message" class="message"></div>';
		$html.='<hr>';
		#action will be based on the method settings by the user
		$html.='<form>';
		#i is a counter to avoid adding "," to the last element
		$i=1;
		#get number of elements in the form
		$numberOfElements=count($this->getForm()->getElements());
		foreach ($this->getForm()->getElements() as $e)
		{
			#print each element
			$html.='<div class="form-group">';
			$html.='<div id="'.$e->getElementName().'-error" class="error"></div>';
			$html.=$e->output();
			$html.='</div>';
			#don't include the display text elements
			if ($e->getElementType()!='displayText')
			{
				$elementNames.=$e->getElementName();
				if ($numberOfElements!=$i)
				{
					$elementNames.=',';
				}
			}
			#check if last element
			
			$i++;
		}
	#pass the elements names to the JQuery to retrieve the values by ID
		$html.='<input type="hidden" id="elements" name="elements" value="'.$elementNames.'">';
		#add the mailer config into the form
		$html.='<input type="hidden" id="mailto" name="mailto" value="'.$this->getMailer()->getTo().'">';
		$html.='<input type="hidden" id="mailfrom" name="mailfrom" value="'.$this->getMailer()->getFrom().'">';
		$html.='<input type="hidden" id="mailsubject" name="mailsubject" value="'.$this->getMailer()->getSubject().'">';
		$html.='<input type="hidden" id="formtoken" name="formtoken" value="'.$this->getForm()->getFormToken().'">';
		#submission button
		$html.='<button id="submit-btn" type="button" class="btn btn-primary">Submit data</button>';
		
		$html.='</form>';
		$html.='</div>';
		return $html;
	}
}
?>
