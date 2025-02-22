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
		
		if(isset($_POST['sub']))
		{
			@extract($_POST);
			$err=0;
			
			$asql=mysqli_query($con,"select bcode from csms_coffee where bcode='$bcode'");
			if(mysqli_num_rows($asql)!=0)
			{
				$err=1;
				$msg.="Barcode Exist. ";
			}
			
			$bsql=mysqli_query($con,"select cname from csms_coffee where cname='$cname'");
			if(mysqli_num_rows($bsql)!=0)
			{
				$err=1;
				$msg.="Coffee Name Exist. ";
			}
			
			if($err==0)
			{
				$ins=mysqli_query($con,"insert into csms_coffee values('','$bcode','$cname','$ctype','$cprice','$cdesc',1)");
				if(!$ins)
				{
					$dbmsg="<div class='pos'>Coffee Not Added.</div>";
				}
				else
				{
					$dbmsg="<div class='pos'>Coffee Added Successfully.</div>";
				}
			}
			else
			{
				$dbmsg="<div class='neg'>$msg</div>";
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
					<div class="cont_header txt1">ADD NEW COFFEE DETAILS</div>
					<div id="admin_main">
						<form action="" method="post" name="add_coffee" id="add_coffee" autocomplete="off" onsubmit="return add_cof()">
						<table cellspacing="15px">
							<tr>
								<td class="label">BarCode</td>
								<td><input type="text" name="bcode" id="bcode" class="inp1" placeholder="Type BarCode" /></td>
							</tr>
							<tr>
								<td class="label">Coffee Name</td>
								<td><input type="text" name="cname" id="cname" class="inp1" placeholder="Type CoffeeName" /></td>
							</tr>
							<tr>
								<td class="label">Coffee Type</td>
								<td>
								<select name="ctype" id="ctype" class="inp1">
								<option value="0">Select Coffee Type</option>
								<option value="Light">Light</option>
								<option value="Dark">Dark</option>
								</select>
								</td>
							</tr>
							<tr>
								<td class="label">Price</td>
								<td><input type="text" name="cprice" id="cprice" class="inp1" placeholder="Type Price" /></td>
							</tr>
							<tr>
								<td class="label">Description</td>
								<td><textarea name="cdesc" id="cdesc" class="inp1" placeholder="Type Description"></textarea></td>
							</tr>
							<tr>
								<td class="label"></td>
								<td>
									<input type="submit" name="sub" id="sub" class="sub" value="Add" />
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