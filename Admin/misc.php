<?php

	include_once("config.php");

	if(isset($_GET['cd']))
	{
		$cid=$_GET['cd'];
		$sql=mysqli_query($con,"delete from csms_coffee where cid=$cid");
		header("location:CoffeeReport.php");
	}
	
	if(isset($_GET['ta']))
	{
		$ta=$_GET['ta'];
		$a_sql=mysqli_query($con,"select tid from csms_book where bdate='$ta'");
		
		if(mysqli_num_rows($a_sql)==0)
		{
			$c_sql=mysqli_query($con,"select tid from csms_table");
			echo "<option value='0'>Select Table</option>";
			while($c_arr=mysqli_fetch_row($c_sql))
			{
				echo "<option>$c_arr[0]</option>";
			}
		}
		else
		{
			$myarr=array();
			$str="(";
			while($a_arr=mysqli_fetch_row($a_sql))
			{
				array_push($myarr,$a_arr[0]);
			}
			$str.=implode(",",$myarr);
			$str.=")";
					
			$b_sql=mysqli_query($con,"select tid from csms_table where tid not in $str");
			
			if(mysqli_num_rows($b_sql)==0)
			{
				echo "<option value='0'>Not available</option>";
			}
			else
			{
				echo "<option value='0'>Select Table</option>";
				while($b_arr=mysqli_fetch_row($b_sql))
				{
					echo "<option>$b_arr[0]</option>";
				}
			}
			
		}
	}
	
	
	
	if(isset($_GET['tr']))
	{
		$dat=$_GET['tr'];
		$a_sql=mysqli_query($con,"select * from csms_book where bdate='$dat'");
		
		echo "<table class='reporttab' align='center' width='95%' cellpadding='5px'>
							<tr bgcolor='#666666' style='color:white'>
								<th>Sno</th>
								<th>Table_No</th>
								<th>Name</th>
								<th>Email/Mobile</th>
								<th>Amount</th>
							</tr>";
		
		if(mysqli_num_rows($a_sql)==0)
		{
			echo "<tr><td colspan='5'>No Data Found</td></tr>";
		}
		else
		{
			$sno=1;
			while($arr=mysqli_fetch_row($a_sql))
			{
					echo "<tr><td>$sno</td><td>$arr[1]</td><td>$arr[3]</td><td>$arr[4] <br/> $arr[5]</td><td>$arr[6]</td></tr>";
					$sno++;
			}
		}
		
	}
	
?>