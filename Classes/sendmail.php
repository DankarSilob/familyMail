<?php
class sendmail {
	var $to;
	var $subject;
	var $msg;
	var $headers = "";
	var $success = "Mensaje enviado satisfactoriamente. Espere pronto una respuesta.";
	var $failure = "Hubo un error al intentar mandar su mensaje. Intente más tarde.";
	
	function set_to($t){
		$this->to = $t."@familymail.com.mx";
	}
	
	function set_subject($s){
		$this->subject = $s;
		}
	
	function set_msg($m){
		$this->msg = wordwrap($m, 70, "\r\n");
		}
	
	function set_content_type(){
		$this->headers .= 'MIME-Version: 1.0' . "\r\n";
		$this->headers .= "Content-type: text/html; charset=UTF-8\r\n";
	}
	
	function set_from($from){
		$this->headers .= "From: ".$from." \r\n";
	}
	
	function set_reply_to($rt){
		$this->headers .= "Reply-To: ".$rt." \r\n";
	}
	
	function set_return_path($rp){
		$this->headers .= "Return-path: ".$rp." \r\n";
	}
	
	function set_cc($cc){
		$this->headers .= "Cc: ".$cc." \r\n";
	}
	
	function set_bcc($bcc){
		$this->headers .= "Bcc: ".$bcc." \r\n";
	}
	
	function send($msg){
		if (mail($this->to, $this->subject, $this->msg, $this->headers))
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