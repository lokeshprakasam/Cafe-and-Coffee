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
					<div class="cont_header txt1">BOOK TABLE</div>
					<div id="admin_main">
						<form action="" method="post" name="book_table" id="book_table" autocomplete="off" onsubmit="return book_tab()">
						<table cellspacing="15px">
							<tr>
								<td class="label">Date</td>
								<td><input type="date" name="bdate" id="bdate" class="inp1" placeholder="Choose Date" onchange="tab_availability(this.value)" /></td>
							</tr>
							<tr>
								<td class="label">Table</td>
								<td>
								<select name="tid" id="tid" class="inp1">
									<option value="0">Select Table </option>
								</select>
								</td>
							</tr>
							<tr>
								<td class="label">Name</td>
								<td><input type="text" name="cname" id="cname" class="inp1" placeholder="Enter Name" /></td>
							</tr>
							<tr>
								<td class="label">Mobile</td>
								<td><input type="text" name="mobile" id="mobile" class="inp1" placeholder="Enter Mobile" /></td>
							</tr>
							<tr>
								<td class="label">Email ID</td>
								<td><input type="text" name="email" id="email" class="inp1" placeholder="Enter Email" /></td>
							</tr>
							<tr>
								<td class="label">Amount</td>
								<td><input type="text" name="amnt" id="amnt" class="inp1" placeholder="Enter Amount" /></td>
							</tr>
							<tr>
								<td class="label"></td>
								<td>
									<input type="submit" name="sub" id="sub" class="sub" value="Book" />
									<input type="reset" name="res" id="res" class="res" value="Clear" />
								</td>
							</tr>
							<tr>
								<td id="err" colspan="2"></td>
							</tr>
							<tr>
								<td colspan="2"><?php if(isset($dbmsg)){echo $dbmsg;} ?></td>
							</tr>
							</table>
						</form>
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