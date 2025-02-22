<!DOCTYPE html>
<html>
	<head>
		<title>CSMS - Admin</title>
		<link rel="shortcut icon" type="image/x-icon" href="../Images/favicon.ico">
		<link rel="stylesheet" href="../Style/style.css" type="text/css" />
		<script src="../Script/new.js"></script>
		<script src="Jquery.js"></script>
		<style>
			.hideit{display:none;}
			.fbox{border:0px;outline:0px;}
			#bill_row_wrapper input,.outline0 input{border:0px;outline:0px;}
			#bill_row_wrapper tr td{padding:3px;border-bottom:1px solid #999999;}
			#f_amount{background:#fffc00;}
			.width1{width:10%;}
			.rmvbtn{background-image:url(../Images/remove.png);
			height:20px;width:20px;background-size:100%;
			background-color:rgba(0,0,0,0);}
		</style>
	</head>
	<body>
		<?php
		include_once("config.php");
		$msg="";
		if(isset($_POST['sub']))
		{
			@extract($_POST);
			$ins=mysqli_query($con,"insert into csms_bill values($billno,now(),'$cus_name','$cmobile',$f_amount,$f_quan,now())");
			
			$insdetail="insert into csms_sale values";
											
			for($i=0;$i<sizeof($pid);$i++)
			{
				
				$bd_pid=$pid[$i];
				$bd_bcode=$bcode[$i];
				$bd_pname=$pname[$i];
				$bd_ptype=$ptype[$i];
				$bd_rate=$rate[$i];
				$bd_quan=$quan[$i];
				$bd_amount=$amount[$i];
				
				$insdetail.="('','$billno','$bd_bcode','$bd_pname','$bd_ptype',$bd_rate,$bd_quan,$bd_amount),";
			}
			
			$insdetail=substr($insdetail,0,strlen($insdetail)-1);
			$sql_a=mysqli_query($con,$insdetail) or die(mysqli_error($con));
			
			if(!$sql_a)
			{
				$dbmsg="<div class='pos'>Bill not generated.</div>";
			}
			else
			{
				$dbmsg="<div class='pos'>Bill Generated Successfully.</div>";
			}
			
		}
		?>
		<div id="main_wrap">
			<div id="header">
				<div id="header_left">Coffee Shop Management System</div>
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
					<div class="cont_header txt1"></div>
					<div id="admin_main">
						<form action="" method="post" name="add_bill" id="add_bill" autocomplete="off" onsubmit="return add_bil()">
						<table cellspacing="15px" width="100%">
							<tr>
								<td class="label">Bill No</td>
								<td><input type="text" name="billno" id="billno" class="inp1" value="<?php echo getBillno(); ?>" readonly /></td>
								<td width="100px"></td>
								<td class="label">Bill Date</td>
								<td><input type="text" name="bdate" id="bdate" class="inp1" value="<?php echo date("d-m-Y H:i:s"); ?>" readonly /></td>
							</tr>
							<tr>
								<td class="label">Name</td>
								<td><input type="text" name="cus_name" id="cus_name" class="inp1" placeholder="Customer Name" /></td>
								<td width="100px"></td>
								<td class="label">Mobile</td>
								<td><input type="text" name="cmobile" id="cmobile" class="inp1" placeholder="Customer Mobile" /></td>
							</tr>
							<tr>
								<td colspan="5"><div class="cont_header txt1">BILLING ITEMS</div></td>
							</tr>
							<tr>
								<td class="label">Select Coffee</td>
								<td colspan="3">
								<select name="bcode" id="bcode" class="inp1">
								<option value="0">Select Coffee</option>
								<?php
									$csql=mysqli_query($con,"select bcode,cname,ctype from csms_coffee");
									if(mysqli_num_rows($csql)==0)
									{
										echo "";
									}
									else
									{
										while($carr=mysqli_fetch_row($csql))
										{
											echo "<option value='$carr[0]'>$carr[1] $carr[2]</option>";
										}
									}
								?>
								</select>
								
								<input type="text" name="cid" id="cid" class="hideit"/>
								<input type="text" name="cbcode" id="cbcode" class="hideit" />
								<input type="text" name="cname" id="cname" class="hideit"/>
								<input type="text" name="ctype" id="ctype" class="hideit"/>
								<input type="text" name="cprice" id="cprice" class="hideit"/>
								</td>
							</tr>
							<tr>
								<td colspan="5">
									<table cellpadding="5px" width="100%">
										<tr bgcolor="#999999">
											<th>ItemCode</th>
											<th>CoffeName</th>
											<th>CoffeType</th>
											<th>CoffePrice</th>
											<th>Quantity</th>
											<th>TotalAmount</th>
											<th></th>
										</tr>
										<tbody id="bill_row_wrapper">
											
										</tbody>
										<tr class="outline0">
											<td colspan='4'></td>
											<td><input type='text' id='f_quan' name='f_quan' size="10" readonly/></td>
											<td>Rs. <input type='text' id='f_amount' name='f_amount' size="7" readonly/></td>
											<td></td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td class="label" colspan="4"></td>
								<td align="right">
									<input type="submit" name="sub" id="sub" class="sub" value="Save & Print" />
								</td>
							</tr>
							<tr>
								<td colspan="5"><?php if(isset($dbmsg)){echo $dbmsg;} ?></td>
							</tr>
							<tr>
								<td colspan="5" id="err"></td>
							</tr>
							</table>
						</form>
						
					</div>
				 </div>
			</div>
			<div class="sep_div2"></div>
			<!-- footer -->
			<div id="footer"> &copy; Coffee Shop Management System</div>
		</div>
		
		<script>
		
		
		var r=1;
		$('#bcode').change(function(){
			var bc=$("#bcode").val();
			
			$.ajax({url:"Bill.php?bc="+bc,cache:false,success:function(result){
				var pinfo=result;
				
				if(pinfo=="*****")
				{
					$("#bcode").val("").focus();
					return false;
				}
				
				var parr=pinfo.split("*");
				var pid=parr[0];var bcode=parr[1];var pname=parr[2];var ptype=parr[3];var pprice=parr[4];
				$("#cid").val(pid);
				$("#cbcode").val(bcode);
				$("#cname").val(pname);
				$("#ctype").val(ptype);
				$("#cprice").val(pprice);
				
				var rowid="row_"+r;
				
				var markup="<tr id='"+rowid+"'><td class='width1'><input readonly type='text' name='bcode[]' value='"+bcode+"' size='10'/></td><td class='width1'><input readonly type='text' name='pname[]' value='"+pname+"'/></td><td class='width1'><input readonly type='text' name='ptype[]' value='"+ptype+"' size='5'/></td><td class='width1'><input hidden type='text' class='pid' name='pid[]' value='"+pid+"' size='2'/><input readonly type='text' class='rate' name='rate[]' value='"+pprice+"' size='10'/></td><td class='width1'><input type='number' class='quan' name='quan[]' min='0' value='1' style='width:100px' /></td><td class='width1'><input readonly type='text' name='amount[]' class='amount' value='"+pprice+"' size='10'/></td><td class='width1' align='center'> <input type='button' class='rmvbtn' value='' onclick=\"rmv('"+rowid+"')\"/> </td></tr>";
				
				$("#bill_row_wrapper").append(markup);
				$("#bcode").val("").focus();
				r++;
				
				tot_qua();
				//tot_gst();
				//tot_gst_amnt(rowid);
				//tot_gst_famnt();
				calc_famount();
				
			}});
			return false;
		});
		
		
		$(document).on("click", "input.rmvbtn" , function() {
            $(this).closest('tr').remove();
			var rowid=$(this).closest('tr').attr('id');
			tot_qua();
			calc_famount();
        });
		
		$(document).on("keyup", "input.quan" , function() {
			var qu=$(this).val();
			var qres=qu.replace(/\D+/,'');
			$(this).val(qres);
        });
		
		//when we type quantity box - updation of amount + GSTamount
		$(document).on("input", "input.quan" , function() {
			add_qua();
			var cur_row=$(this).closest('tr').attr('id');
			var cur_qua_el="#"+cur_row+" .quan";
			var cur_qua_el_val=$(cur_qua_el).val();
			var cur_rat_el="#"+cur_row+" .rate";
			var cur_rat_el_val=$(cur_rat_el).val();
			var cur_am_el="#"+cur_row+" .amount";
			$(cur_am_el).val((cur_qua_el_val*cur_rat_el_val).toFixed(2));
			
			calc_famount();
        });
		
		
		//When we type price
		$(document).on("keyup", "input.rate" , function(){
			var rowid=$(this).closest('tr').attr('id');
			tot_qua();
			calc_famount();
		});
		
		//updating final quantity
		function tot_qua()
		{
			var tq=0;
			var q=document.getElementsByClassName('quan');
			for(i=0;i<q.length;i++)
			{
				tq=tq+parseInt(q[i].value);
			}
			document.getElementById("f_quan").value=tq;
		}
		
		//updating final quantity
		function add_qua()
		{
			var tq=0;
			var q=document.getElementsByClassName('quan');
			for(i=0;i<q.length;i++)
			{
				tq=tq+parseInt(q[i].value);
			}
			document.getElementById("f_quan").value=tq;
		}
			
		function calc_famount()
		{
			var famnt=0;
			var fa=document.getElementsByClassName('amount');
			for(i=0;i<fa.length;i++)
			{
				famnt=famnt+Number(fa[i].value);
			}
			var bam=0;
			document.getElementById("f_amount").value=famnt.toFixed(2);
		}
		
		</script>
	</body>
</html>