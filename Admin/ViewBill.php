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
				 <div id="cont_left">
					<div class="cont_header txt1">BILL DETAILS</div>
					<div id="admin_main">
						
						<?php
							if(isset($_GET['bno']))
							{
								$bno=$_GET['bno'];
								$rsql=mysqli_query($con,"select * from csms_sale where bno=$bno");
								if(mysqli_num_rows($rsql)==0)
								{
									echo "No Data found";
								}
								else
								{
									$tot_quant=0;
									$tot_amnt=0;
									
									echo "<table class='reporttab' align='center' width='100%' cellpadding='5px'>";
									echo "<tr bgcolor='#666666' style='color:white'><th>BillNo</th><th>BarCode</th><th>CoffeeName</th><th>CoffeeType</th><th>Coffee Price</th><th>Quantity</th><th>Amount</th></tr>";
									while($rarr=mysqli_fetch_row($rsql))
									{
										$tot_amnt=$tot_amnt+$rarr[7];
										$tot_quant=$tot_quant+$rarr[6];
						?>
							<tr>
								<td><?php echo $rarr[1]; ?></td>
								<td><?php echo $rarr[2]; ?></td>
								<td><?php echo $rarr[3]; ?></td>
								<td><?php echo $rarr[4]; ?></td>
								<td><?php echo $rarr[5]; ?></td>
								<td><?php echo $rarr[6]; ?></td>
								<td align="right"><?php echo $rarr[7]; ?></td>
							</tr>
						<?php
									}
									echo "<tr><td colspan=5></td><td bgcolor='#ffee33'>$tot_quant</td><td bgcolor='#ffee33' align='right'>".number_format($tot_amnt,2)."</td></tr>";
									echo "</table>";
								}
							}
						?>
						<hr/>
						<div align="right"><input type='button' name="btn" class="sub" value="Print" onclick="window.print();"/></div>
					</div>
				 </div>
				 <div id="cont_right">
					<div class="cont_header txt1">ADVERTISMENT</div>
					<div class="space10"></div>
					<div class="adv1"><img src="../Images/coffee3.JPG"/></div>
				 </div>
			</div>
			<div class="sep_div2"></div>
			<!-- footer -->
			<div id="footer"> &copy; Coffee Shop Management System</div>
		</div>
		
		
	</body>
</html>