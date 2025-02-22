<?php

	include_once("config.php");
	
	if(isset($_GET['bc']))
	{
		$bc=$_GET['bc'];
		$bill_sql=mysqli_query($con,"select * from csms_coffee where bcode='$bc'");
		if(mysqli_num_rows($bill_sql)==0)
		{
			echo "*****";
		}
		else
		{
			$pro_info=mysqli_fetch_array($bill_sql);
			echo $pro_info['cid']."*".$pro_info['bcode']."*".$pro_info['cname']."*".$pro_info['ctype']."*".$pro_info['cprice'];
		}
	}

?>