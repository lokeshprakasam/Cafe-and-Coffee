<!DOCTYPE html>
<html>
	<head>
		<title>CSMS - Admin</title>
		<link rel="shortcut icon" type="image/x-icon" href="../Images/favicon.ico">
		<link rel="stylesheet" href="../Style/style.css" type="text/css" />
		<script src="../Script/new.js"></script>
	</head>
	<body>
		<?php
		include_once("config.php");
		$msg="";
		
		?>
		<div id="main_wrap">
			<div id="header">
				<div id="header_left"></div>
				<div id="header_right">
					info@csms.com <br/>
					+91999 890 9999
				</div>
			</div>
			<div class="sep_div1"></div>
			<?php include_once("menu.php"); ?>
			<div class="sep_div1"></div>
			<div id="divider1">
				
			</div>
			<div id="main_content">
				 <div id="cont_left_full">
					<div class="cont_header txt1">Sales REPORT</div>
					<div id="admin_main">
						
						<table class="reporttab" align="center" width="95%" cellpadding="5px">
							<tr bgcolor="#666666" style="color:white">
								<th>BillNo</th>
								<th>Customer Name</th>
								<th>MobileNo</th>
								<th>Quantity</th>
								<th>BillAmount</th>
								<th>Date</th>
								<th></th>
							</tr>
							<?php
							
								$sql=mysqli_query($con,"select * from csms_bill order by bno desc");
								if(mysqli_num_rows($sql)==0)
								{
									echo "<tr><td colspan='7'>Details Not Found.</td></tr>";
								}
								else
								{
									while($arr=mysqli_fetch_row($sql))
									{
							?>
							<tr>
								<td><?php echo $arr[0]; ?></td>
								<td><?php echo $arr[2]; ?></td>
								<td><?php echo $arr[3]; ?></td>
								<td><?php echo $arr[5]; ?></td>
								<td><?php echo $arr[4]; ?></td>
								<td><?php echo $arr[1]; ?></td>
								<td align="center"> <a href="ViewBill.php?bno=<?php echo $arr[0]; ?>">View Details</a> </td>
							</tr>
							<?php
									}
								}
							?>
						</table>
						
					</div>
				 </div>
			</div>
			<div class="sep_div2"></div>
			<!-- footer -->
			<div id="footer"> &copy; Coffee Shop Management System</div>
		</div>
		
		
	</body>
</html>