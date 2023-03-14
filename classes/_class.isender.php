<?php
class isender{
    
	var $Hosts = "";
	
	/*======================================================================*\
	Function:	__construct
	Descriiption: ����������� ������
	\*======================================================================*/
	function __construct(){
	
		$this->Hosts = str_replace("www.","",$_SERVER['HTTP_HOST']);
	
	}
	
	/*======================================================================*\
	Function:	SendRegKey
	Descriiption: ���������� ��������������� ����
	\*======================================================================*/
	function SendRegKey($mail, $key){
	
		$text = "�� ��� Email ���� ��������� ������ ��� ����������� � ������� \"".$this->Hosts."\"<BR />";
		$text.= "���� �� �� ����������� ������, ������ �������������� ��� ���������. <BR /><BR />";
		$text.= "������ ��� �����������: <a href='http://".$this->Hosts."/signup/key/{$key}'>";
		$text.= "http://".$this->Hosts."/signup/key/{$key}</a>";
		$subject = "����������� � ������� \"".$this->Hosts."\"";
		
		return $this->SendMail($mail, $subject, $text);
		
	}
	
	/*======================================================================*\
	Function:	RecoveryPassword
	Descriiption: �������������� ������
	\*======================================================================*/
	function RecoveryPassword($user, $pass, $mail){
	
		$text.= "������ ��� ����� � ������ ������� ������������: <BR />";
		$text.= "<b>�����:</b> {$user}<BR />";
		$text.= "<b>������:</b> {$pass}<BR />";
		$text.= "������ ��� ����� � �������: <a href='http://".$this->Hosts."/signin'>http://".$this->Hosts."/signin</a>";
		$subject = "�������������� �������� ������ � ������� \"".$this->Hosts."\"";
		
		return $this->SendMail($mail, $subject, $text);
		
	}
	
	/*======================================================================*\
	Function:	SendAfterReg
	Descriiption: ���������� ������ ����� �����������
	\*======================================================================*/
	function SendAfterReg($user, $mail, $pass){
	
		$text = "���������� ��� �� ����������� � ������� � ������� \"".$this->Hosts."\"<BR />";
		$text.= "���� ������ ��� ����� � ������ ������� ������������: <BR />";
		$text.= "<b>�����:</b> {$user}<BR />";
		$text.= "<b>������:</b> {$pass}<BR />";
		$text.= "������ ��� ����� � �������: <a href='http://".$this->Hosts."/signin'>http://".$this->Hosts."/signin</a>";
		$subject = "���������� ����������� � ������� \"".$this->Hosts."\"";
		
		return $this->SendMail($mail, $subject, $text);
		
	}
	
	/*======================================================================*\
	Function:	SetNewPassword
	Descriiption: ���������� ������ ����� ����� ������
	\*======================================================================*/
	function SetNewPassword($user, $pass, $mail){
	
		$text = "� ���������� ������ �������� ��� ������� ������<BR />";
		$text.= "���� ����� ������ ��� ����� � ������ ������� ������������: <BR />";
		$text.= "<b>�����:</b> {$user}<BR />";
		$text.= "<b>����� ������:</b> {$pass}<BR />";
		$text.= "������ ��� ����� � �������: <a href='http://".$this->Hosts."/signin'>http://".$this->Hosts."/signin</a>";
		$subject = "����� ������ � ������� \"".$this->Hosts."\"";
		
		return $this->SendMail($mail, $subject, $text);
		
	}
	
	
	/*======================================================================*\
	Function:	Headers
	Descriiption: �������� ���������� ������
	\*======================================================================*/
	function Headers(){
	
	$headers = "MIME-Version: 1.0\r\n";
	$headers.= "Content-type: text/html; charset=Windows-1251\r\n";
	$headers.= "Date: ".date("m.d.Y (H:i:s)",time())."\r\n";
	$headers.= "From: support@".$this->Hosts." \r\n";
	
		return $headers;
	
	}
	
	/*======================================================================*\
	Function:	SendMail
	Descriiption: �����������
	\*======================================================================*/
	function SendMail($recipient, $subject, $message){
	
		$message .= "<BR />----------------------------------------------------
		<BR />��������� ���� ������� �������, ����������, �� ��������� �� ����!";
		return (mail($recipient, $subject, $message, $this->Headers())) ? true : false;
	
	}
	
	
	
}
?>