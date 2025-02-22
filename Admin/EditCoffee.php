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
		$ls="";$ds="";
		
		if(isset($_POST['sub']))
		{
			@extract($_POST);
			$upd=mysqli_query($con,"update csms_coffee set bcode='$bcode', cname='$cname',ctype='$ctype', cprice='$cprice', cdesc='$cdesc' where bcode='$bcode'");
			if(!$upd)
			{
				$dbmsg="<div class='neg'>Details not updated</div>";
				echo "<meta http-equiv='Refresh' content='1;url=CoffeeReport.php'>";
			}
			else
			{
				$dbmsg="<div class='pos'>Details updated successfully.</div>";
				echo "<meta http-equiv='Refresh' content='1;url=CoffeeReport.php'>";
			}
		}
		
		if(isset($_GET['ce']))
		{
			$cid=$_GET['ce'];
			$sql=mysqli_query($con,"select * from csms_coffee where cid=$cid");
			$arr=mysqli_fetch_row($sql);
			if($arr[3]=="Light"){$ls="selected";}else{$ds="selected";}
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
					<div class="cont_header txt1">EDIT COFFEE DETAILS</div>
					<div id="admin_main">
						<form action="" method="post" name="edit_coffee" id="edit_coffee" autocomplete="off">
						<table cellspacing="15px">
							<tr>
								<td class="label">BarCode</td>
								<td><input type="text" name="bcode" id="bcode" class="inp1" value="<?php echo $arr[1]; ?>" /></td>
							</tr>
							<tr>
								<td class="label">Coffee Name</td>
								<td><input type="text" name="cname" id="cname" class="inp1" value="<?php echo $arr[2]; ?>" /></td>
							</tr>
							<tr>
								<td class="label">Coffee Type</td>
								<td>
								<select name="ctype" id="ctype" class="inp1">
								<option value="">Select Coffee Type</option>
								<option value="Light" <?php echo $ls; ?>>Light</option>
								<option value="Dark" <?php echo $ds; ?>>Dark</option>
								</select>
								</td>
							</tr>
							<tr>
								<td class="label">Price</td>
								<td><input type="text" name="cprice" id="cprice" class="inp1" value="<?php echo $arr[4]; ?>" /></td>
							</tr>
							<tr>
								<td class="label">Description</td>
								<td><textarea name="cdesc" id="cdesc" class="inp1" placeholder="Type Description"><?php echo $arr[5]; ?></textarea></td>
							</tr>
							<tr>
								<td class="label"></td>
								<td>
									<input type="submit" name="sub" id="sub" class="sub" value="Update" />
									<input type="reset" name="res" id="res" class="res" value="Clear" />
								</td>
							</tr>
							<tr>
								<td class="err" colspan="2"></td>
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