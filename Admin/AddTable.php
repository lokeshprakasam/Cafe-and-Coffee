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
			$ins=mysqli_query($con,"insert into csms_table(tstatus)values(0)");
			if(!$ins)
			{
				$dbmsg="<div class='pos'>Table Not Added.</div>";
			}
			else
			{
				$dbmsg="<div class='pos'>Table Added Successfully.</div>";
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
					<div class="cont_header txt1">ADD NEW TABLE</div>
					<div id="admin_main">
					<form action="" method="post" name="addtab" id="addtab" onsubmit="return cnfrm()">
						<input type="submit" name="sub" class="sub" id="addtab" value="Add New Table"/>
					</form>
					</div>
					
					<br/>
					<hr/>
					
					<div class="tab_view">
						<?php
							$tsql=mysqli_query($con,"select * from csms_table");
							if(mysqli_num_rows($tsql)==0)
							{
								echo "No Table Found";
							}
							else
							{
								while($arr=mysqli_fetch_row($tsql))
								{
									$bg1="";
									if($arr[1]==1){$bg1="#4c2b14";}else{$bg1="a09f9f";}
									echo "<div class='each_tab' style='background:$bg1'> $arr[0] </div>";
								}
							}
						?>
					</div>
					
					<div style="width:300px;"><?php if(isset($dbmsg)){echo $dbmsg;} ?></div>
					
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