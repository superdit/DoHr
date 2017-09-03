<?php

session_start();

$step = filter_input(INPUT_POST, 'step');

if ($step == '1')
	header('location:index.php?step=2');
else if ($step == '2')
{
	$dbhost = $_SESSION['dbhost'] = filter_input(INPUT_POST, 'dbhost');
	$dbname = $_SESSION['dbname'] = filter_input(INPUT_POST, 'dbname');
	$dbuser = $_SESSION['dbuser'] = filter_input(INPUT_POST, 'dbuser');
	$dbpass = $_SESSION['dbpass'] = filter_input(INPUT_POST, 'dbpass');
	$weburl = $_SESSION['weburl'] = filter_input(INPUT_POST, 'weburl');
	
	try 
	{		
		@$dbh = new PDO("mysql:host=".$dbhost.";dbname=".$dbname, $dbuser, $dbpass);
		@$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );	
	}
	catch(PDOException $e) 
	{
		$_SESSION['error'] = $e->getMessage();
		header('location:index.php?step=2');
		exit;
	}
	
	header('location:index.php?step=3');
}
else if ($step == '3')
{
	$_SESSION['adminemail'] = filter_input(INPUT_POST, 'adminemail');
	$_SESSION['adminpass']  = filter_input(INPUT_POST, 'adminpass');
}