<?php
/**
Mailer class
Handle the mail functionality
To, From , Subject

**/

class mailer
{
	protected $from;
	protected $to;
	protected $subject;
	function __construct($from,$to,$subject)
	{
		$this->from=$from;
		$this->to=$to;
		$this->subject=$subject;
	}
	function getFrom()
	{
		return $this->from;
	}
	function getTo()
	{
		return $this->to;
	}
	function getSubject()
	{
		return $this->subject;
	}
}
?>