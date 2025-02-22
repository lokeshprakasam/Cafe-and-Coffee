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
					<div class="cont_header txt1">ADMIN DASHBOARD</div>
					<div id="dashboard">
						<div class="dash_item"><a href="AddCoffee.php">Add Coffee</a></div>
						<div class="dash_item"><a href="AddSell.php">Add Sale</a></div>
						<div class="dash_item"><a href="BookTable.php">Book Table</a></div>
						<div class="dash_item"><a href="CoffeeReport.php">Coffee Report</a></div>
						<div class="dash_item"><a href="SellReport.php">Sale Report</a></div>
						<div class="dash_item"><a href="ChangePassword.php">Change Password</a></div>
						<div class="dash_item"><a href="Logout.php">Logout</a></div>
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