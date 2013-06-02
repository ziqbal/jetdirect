<?php
/**
 * JetDirect Example
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


// Include Class
require_once("class-jetdirect.php"); 

// Create Object
$myobj=new JetDirect();

// Set host name or IP address 
$myobj->setAddress("HP2300");

// Set Port - Optional if your systems 'knows' about JetDirect
$myobj->setPort(9100);

// Set Message
$myobj->setMessage("Ready");

// Send Command
$myobj->send();

?>
