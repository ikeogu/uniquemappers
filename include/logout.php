<?php 

	include_once 'session.php';

	$session->logout();
	header("Location: login.php");

?>