<?php
	
	//hide_warning_notice
	//error_reporting(0);
	
	//session
	session_start();
	if(isset($_SESSION['adm_sess']))
	{
		$adm_sess=$_SESSION['adm_sess'];
	}
	else
	{
		header("location:../Login.php");
	}
	
	//dbconnection
	$con=mysqli_connect("localhost","root","","csms") or die(mysqli_error());

	function getBillno()
	{
		global $con;
		$sql=mysqli_query($con,"select auto_increment from information_schema.tables where table_schema='csms' and table_name='csms_bill'") or die(mysqli_error($con));
		$arr=mysqli_fetch_row($sql);
		return $arr[0];
	}
	
	
?>