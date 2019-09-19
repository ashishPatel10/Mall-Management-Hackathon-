<?php 

session_start();
		if (isset($_SESSION['email']) and isset($_SESSION['password'])) 
		{
		header("location: login.php");
		session_destroy();	
	 	}	 
	 else{
		header("location: login.php");
	 }

 ?>