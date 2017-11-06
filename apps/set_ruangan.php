<?php 
	session_start();
	$_SESSION['counter_client'] = $_POST['counter'];
	include "last_stage.php";