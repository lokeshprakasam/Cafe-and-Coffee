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
			
			if(isset($_POST['sub']))
			{
				@extract($_POST);
				$ins=mysqli_query($con,"insert into csms_book values('','$tid','$bdate','$cname',$mobile,'$email','$amnt')");
				if(!$ins)
				{
					$dbmsg="<div class='pos'>Table not Booked.</div>";
				}
				else
				{
					$dbmsg="<div class='pos'>Table Booked Successfully.</div>";
				}
			}
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
					<div class="cont_header txt1">BOOKING REPORT</div>
					<div id="admin_main">
						<table cellspacing="15px">
							<tr>
								<td class="label">Date</td>
								<td><input type="date" name="bdate" id="bdate" class="inp1" placeholder="Choose Date" onchange="tab_rep(this.value)" /></td>
							</tr>
						</table>
						
						<hr/>
						
						<div id="tab_rep_res">
							
						</div>
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