<?php
	$dbhost="localhost";
	$dbuser="root";
	$dbpass="123456";
	 $db="mall_2";
	 global $db;
	$conn =new mysqli($dbhost,$dbuser,$dbpass,$db);
	if($conn->connect_error)
	{
		echo "Connection was failed";
	}
	else
	{
		//echo "Connected Successfully";
	}
	if($db)
	{
		//echo "Connection success";	
	}
?>