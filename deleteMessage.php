<?php

//Get the ID from the URL [www.demo.com/deleteMessage.php?id=XXXX]
//This is just a sample way of doing this, but as long as you pass
//the message ID to the deleteMessage function all is good.
$id = $_GET['id'];

//Lets load the Esendex Inbox Service Class
include_once ('inc/EsendexInboxService.php');

$username = '';	//Your Esendex Email Address
$password = '';	//Your Esendex Password
$accountReference = '';	//Your Esendex Account Number

//Pass the above account details to the Esendex Class
$inboxService = new EsendexInboxService($username, $password, $accountReference);

//Pass the ID to the deleteMessage function
$inboxService -> DeleteMessage($id);


?>