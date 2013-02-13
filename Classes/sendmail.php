<?php
class sendmail {
	var $to="registro@familymail.com.mx";
	var $subject="Petición para FamilyMail";
	var $msg;
	var $headers;
	//var $headers="From:\r\n";
	var $success = "Mensaje enviado satisfactoriamente. Espere pronto una respuesta.";
	var $failure = "Hubo un error al intentar mandar su mensaje. Intente más tarde.";
	
	function headers($h){
		$this->headers .= $h;
		}
	
	function send($msg){
		if (mail($this->to, $this->subject, $msg, $this->headers))
		{
			echo $success;
		}
		else
		{
			echo $failure;
		}	
	}
}
?>