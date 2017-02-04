<?php
session_start();
/**
Form controller
@Author : Mohamed Mostafa
Send an email to the posted mail address and print confirmation to user
**/


class formprocess{
	protected $requests;
	protected $message;
	#assign posts and preapre the message to be sent
	function __construct($requests)
	{
		if ($this->securePost())
		{
			$this->requests=$requests;
			$this->sendEmail();
		}
		else
		{
			echo 'Unknown Access';
			die;
		}
	}
	#get posts
	function getRequests()
	{
		return $this->requests;
	}
	#read the message
	function prepareMessage()
	{
		$this->message='This is an auto generated message'."\n\n";
		foreach($this->getRequests() as $key => $val)
		{
			if ($this->ifNotFunctionElement($key))
			{
				$this->message.=$key.'	:  '.$this->cleanUpValue($val)."\n\n";
			}
		}
		$this->message.='Do not reply to this email.'."\n\n";
		$this->message.='Regards,'."\n\n";
		return $this->message;
	}
	function sendEmail()
	{
		$to = $this->cleanUpValue($_POST['mailto']);
		$subject = $this->cleanUpValue($_POST['mailsubject']);
		$headers = 'From: '.$this->cleanUpValue($_POST['mailsubject']);
		if (mail($to,$subject,$this->prepareMessage(),$headers))
		{
			echo 'Message emailed to '.$to;
		}
		else{
			echo 'Email not sent.';
		}
		
	}
	function ifNotFunctionElement($val)
	{
		$fun=array('mailto','mailfrom','mailsubject','formtoken');
		if (!in_array($val,$fun))
		{
			return true;
		}
		return false;
	}
	function cleanUpValue($string)
	{
		//good stackoverflow recommendation
		//clean up the input strings
		//http://stackoverflow.com/questions/110575/do-htmlspecialchars-and-mysql-real-escape-string-keep-my-php-code-safe-from-inje/110576#110576
		$string = mb_convert_encoding($string, 'UTF-8', 'UTF-8');
		$string = htmlentities($string, ENT_QUOTES, 'UTF-8');
		return $string;
	}
	#check if the session token and posted token are matched
	function securePost()
	{
		if ($_SESSION['token']==$_POST['formtoken'])
		{
			return true;
		}
		return false;
	}
	
}

new formprocess($_POST);


?>