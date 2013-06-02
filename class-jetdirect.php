<?php
/**
 * JetDirect Class
 * See readme.txt file for description and usage
 * 2007-01-16    First Version    Zafar Iqbal
 *
 * IMPORTANT NOTE
 * there is no warranty, implied or otherwise with this software.
 *
 * LICENCE
 * This code has been placed in the Public Domain for all to enjoy.
 *
 * @author    Zafar Iqbal
 * @package   JetDirect
 */
class JetDirect {

	// Private Variables
	private $hostAddress;
	private $hostPort;
	private $hostMessage;

	// Class Constructor
	public function __construct() {
		$this->hostAddress="";
		$this->hostPort=0;
		$this->hostMessage="Test Message! You need to set this!";
	}

	// Class Destructor
	public function __destruct() {
	}

	// Set the address of the printer
	// Can be full name or IP address
	public function setAddress($address){
		$this->hostAddress=$address;
	}

	// Set Port number
	// Defaults to jetdirect port 9100 if your system knows about this
	public function setPort($port){
		$this->hostPort=$port;
	}

	// Set message to send
	// Max 44 chars I think...
	public function setMessage($msg){
		$this->hostMessage=$msg;
	}

	// Connect and send message to printer
	public function send(){
		if($this->hostPort==0){$service_port=getservbyname('jetdirect','tcp');}else{$service_port=$this->hostPort;}
		$address=gethostbyname($this->hostAddress);
		$socket=socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
		if($socket<0){echo "Error: ".socket_strerror($socket)."\n";exit;}
		$result=socket_connect($socket,$address,$service_port);
		if($result<0){echo "Error: ($result) ".socket_strerror($result)."\n";exit;}
		$in="\033%-12345X@PJL RDYMSG DISPLAY = \"".$this->hostMessage."\"\r\n\033%-12345X\r\n";
		socket_write($socket,$in,strlen($in));
		socket_close($socket);
	}
}
?>
