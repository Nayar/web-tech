<?php
/**
 * Authors: JOOLFOO Nayar (1118369) 
 *          DILJORE Humeira (1110539)
 *          GAUZEE Basheera (1115178)
 */

// Begin the magic
require "inc/core.php";

// If no data was submitted, we display the registration form
if(!isset($_POST['username'])){
	eval("\$contents = \"".$templates->get_page("register_page")."\";");
	eval("\$headerincludes = \"".$headerincludes."\";");
}
else {
	$success = false;
	if ((isset($_POST['email']) == (isset($_POST['email1'])) && (isset($_POST['password'])) == isset($_POST['password1'])))) {
		$newuser = array(
			"username" => $_POST['username'],
			"email" => $_POST['email'],
			"password" => $_POST['password'],
			"is_admin" => 0,
		);
		$success = $Users->register($newuser);
	}
	
	if($success) {
		$contents = "User Created";
		$Users->login($_POST['username'],$_POST['password']);
		header('Location: '.ROOTURL.'index.php');
		die();
	}
	else {
		$contents = "Failed";
	}
}

$templates->output_page($contents);
?>
 
