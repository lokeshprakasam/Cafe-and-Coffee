<?php

	//session
	session_start();
	if(isset($_SESSION['adm_sess']))
	{
		//header("location:Admin/");
	}
	
	//dbconnection
	$con=mysqli_connect("localhost","root","","csms") or die(mysqli_error());

?>