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
			$chk=mysqli_query($con,"select uname,pwd from csms_admin where uname='$adm_sess' and pwd=md5('$cpwd')");
			if(mysqli_num_rows($chk)==1)
			{
				$upd=mysqli_query($con,"update csms_admin set pwd=md5('$npwd') where uname='$adm_sess'");
				if(!$upd)
				{
					$dbmsg="<div class='neg'>Password not updated</div>";
					echo "<meta http-equiv='Refresh' content='2;url=Logout.php'>";
				}
				else
				{
					$dbmsg="<div class='pos'>Password updated successfully</div>";
					echo "<meta http-equiv='Refresh' content='2;url=Logout.php'>";
				}
			}
			else
			{
					$dbmsg="<div class='neg'>Current password is not correct</div>";
					echo "<meta http-equiv='Refresh' content='2;url=Logout.php'>";
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
					<div class="cont_header txt1">CHANGE YOUR ACCOUNT PASSWORD</div>
					<div id="admin_main">
						<form action="" method="post" name="admin_login" id="admin_login" autocomplete="off" onsubmit="return chn_pwd()">
						<table cellspacing="15px">
							<tr>
								<td class="label">Current Password</td>
								<td><input type="password" name="cpwd" id="cpwd" class="inp1" placeholder="Type Current Password" /></td>
							</tr>
							<tr>
								<td class="label">New Password</td>
								<td><input type="password" name="npwd" id="npwd" class="inp1" placeholder="Type New Password" /></td>
							</tr>
							<tr>
								<td class="label">Retype New Password</td>
								<td><input type="text" name="rpwd" id="rpwd" class="inp1" placeholder="Re-Type New Password" /></td>
							</tr>
							<tr>
								<td class="label"></td>
								<td>
									<input type="submit" name="sub" id="sub" class="sub" value="Update" />
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