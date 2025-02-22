<!DOCTYPE html>
<html>
	<head>
		<title>CSMS</title>
		<link rel="shortcut icon" type="image/x-icon" href="Images/favicon.ico">
		<link rel="stylesheet" href="Style/style.css" type="text/css" />
		<script src="Script/new.js"></script>
	</head>
	<body>
		<?php
		include_once("config.php");
		if(isset($_POST['sub']))
		{
			@extract($_POST);
			$sql=mysqli_query($con,"select * from csms_admin where uname='$uname' and pwd=md5('$pwd')");
			if(mysqli_num_rows($sql)==1)
			{
				$_SESSION['adm_sess']=$uname;
				header("location:Admin/Dashboard.php");
			}
			else
			{
				$dbmsg="<div class='neg'>Login Info is not Correct</div>";
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
			<div class="menu">
				<div class="item"> <a href="index.php">HOME</a></div>
				<div class="divider"> </div>
				<div class="item"> <a href="About.php">ABOUT</a></div>
				<div class="divider"> </div>
				<div class="item"> <a href="Login.php">LOGIN</a></div>
				<div class="divider"> </div>
				<div class="item"> <a href="Contact.php">CONTACT US</a></div>
				<div class="divider"> </div>
			</div>
			<div class="sep_div1"></div>
			<div id="banner">
				<img src="Images/banner1.jpg"/>
			</div>
			<!--<div id="divider1">
				
			</div>-->
			<div id="main_content">
				 <div id="cont_left">
					<div class="cont_header txt1">LOGIN INTO YOUR ACCOUNT</div>
					<div id="login_form">
						<form action="" method="post" name="admin_login" id="admin_login" autocomplete="off" onsubmit="return adm_login()">
						<table cellspacing="15px">
							<tr>
								<td class="label">Username</td>
								<td><input type="text" name="uname" id="uname" class="inp1" placeholder="Type UserName" /></td>
							</tr>
							<tr>
								<td class="label">Password</td>
								<td><input type="password" name="pwd" id="pwd" class="inp1" placeholder="Type Password" /></td>
							</tr>
							<tr>
								<td class="label"></td>
								<td>
									<input type="submit" name="sub" id="sub" class="sub" value="SignIn" />
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
					<div class="adv1"><img src="Images/coffee3.JPG"/></div>
				 </div>
			</div>
			<div class="sep_div2"></div>
			<!-- footer -->
			<div id="footer"> &copy; Coffee Shop Management System</div>
		</div>
		
		
	</body>
</html>