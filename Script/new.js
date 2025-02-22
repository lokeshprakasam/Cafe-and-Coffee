
var r_fnam=/^([a-zA-Z]{4,15})$/;
var r_cfnam=/^([a-zA-Z ]{4,15})$/;

var r_mob=/^(0|91|91-|\+91)?(\d{10})$/;
var r_ema=/^([a-zA-Z0-9._]{4,15})@([a-zA-Z0-9]{4,15})\.([a-z.]{2,5})$/;

var r_usn=/^([a-zA-Z0-9]{4,15})$/;
var r_pwd=/^([a-zA-Z0-9._!@#$%^&*]{4,15})$/;

var r_bco=/^(M)([0-9]{4})$/;
var r_pri=/^\d+(?:\.\d{0,2})$/;
var r_cur=/^\d{1,6}$/;

//Change Password
function chn_pwd()
{
	var a=document.getElementById("cpwd").value;
	var b=document.getElementById("npwd").value;
	var c=document.getElementById("rpwd").value;
	
	if(!a.match(r_pwd))
	{
		document.getElementById("err").innerHTML="Type Proper Current Password";
		document.getElementById("cpwd").focus();
		return false;
	}
	else if(!b.match(r_pwd))
	{
		document.getElementById("err").innerHTML="Type Proper New Password";
		document.getElementById("npwd").focus();
		return false;
	}
	else if(b!=c)
	{
		document.getElementById("err").innerHTML="Retyped Password is mismatching";
		document.getElementById("rpwd").focus();
		return false;
	}
	else
	{
		return true;
	}
}


//Book Table
function book_tab()
{
	var bd=document.getElementById("bdate").value;
	var tid=document.getElementById("tid").value;
	var cn=document.getElementById("cname").value;
	var mo=document.getElementById("mobile").value;
	var em=document.getElementById("email").value;
	var am=document.getElementById("amnt").value;
	
	if(bd=="")
	{
		document.getElementById("err").innerHTML="Choose Date";
		document.getElementById("bdate").focus();
		return false;
	}
	else if(tid=="" || tid==0)
	{
		document.getElementById("err").innerHTML="Select Table";
		document.getElementById("tid").focus();
		return false;
	}
	else if(!cn.match(r_fnam))
	{
		document.getElementById("err").innerHTML="Type Customer Name";
		document.getElementById("cname").focus();
		return false;
	}
	else if(!mo.match(r_mob))
	{
		document.getElementById("err").innerHTML="Type Proper Mobile.no";
		document.getElementById("mobile").focus();
		return false;
	}
	else if(!em.match(r_ema))
	{
		document.getElementById("err").innerHTML="Type Proper Email";
		document.getElementById("email").focus();
		return false;
	}
	if(!am.match(r_pri) && !am.match(r_cur))
	{
		document.getElementById("err").innerHTML="Type Proper Amount";
		document.getElementById("amnt").focus();
		return false;
	}
	else
	{
		return true;
	}
}



//Add Bill
function add_bil()
{
	var cn=document.getElementById("cus_name").value;
	var mo=document.getElementById("cmobile").value;
	var bc=document.getElementById("bcode").value;
	var am=document.getElementById("f_amount").value;
	
	if(!cn.match(r_fnam))
	{
		document.getElementById("err").innerHTML="Type Proper Name";
		document.getElementById("cus_name").focus();
		return false;
	}
	else if(!mo.match(r_mob))
	{
		document.getElementById("err").innerHTML="Type Proper Mobile";
		document.getElementById("cmobile").focus();
		return false;
	}
	else if(bc=="0")
	{
		document.getElementById("err").innerHTML="Select Product";
		document.getElementById("bcode").focus();
		return false;
	}
	else if(am=="")
	{
		document.getElementById("err").innerHTML="Add product for Billing";
		document.getElementById("f_amount").focus();
		return false;
	}
	else
	{
		return true;
	}
}



//Add Coffee
function add_cof()
{
	var bc=document.getElementById("bcode").value;
	var cn=document.getElementById("cname").value;
	var ct=document.getElementById("ctype").value;
	var cp=document.getElementById("cprice").value;
	var cd=document.getElementById("cdesc").value;
	
	if(!bc.match(r_bco))
	{
		document.getElementById("err").innerHTML="Type Proper BarCode";
		document.getElementById("bcode").focus();
		return false;
	}
	else if(!cn.match(r_cfnam))
	{
		document.getElementById("err").innerHTML="Type Proper Name";
		document.getElementById("cname").focus();
		return false;
	}
	else if(ct=="0")
	{
		document.getElementById("err").innerHTML="Select Type";
		document.getElementById("ctype").focus();
		return false;
	}
	else if(!cp.match(r_pri) && !cp.match(r_cur))
	{
		document.getElementById("err").innerHTML="Enter Coffee Price";
		document.getElementById("cprice").focus();
		return false;
	}
	else if(cd=="")
	{
		document.getElementById("err").innerHTML="Enter Description";
		document.getElementById("cdesc").focus();
		return false;
	}
	else
	{
		return true;
	}
}


//Admin Login
function adm_login()
{
	var un=document.getElementById("uname").value;
	var pw=document.getElementById("pwd").value;
	
	if(!un.match(r_usn))
	{
		document.getElementById("err").innerHTML="Type Proper Username";
		document.getElementById("uname").focus();
		return false;
	}
	else if(!pw.match(r_pwd))
	{
		document.getElementById("err").innerHTML="Type Proper Password";
		document.getElementById("pwd").focus();
		return false;
	}
	else
	{
		return true;
	}
}

//Confirmation
function cnfrm()
{
	var x=confirm("Are you sure?");
	if(x==true)
	{
		return true;
	}
	else
	{
		return false;
	}
}

var xmlHttp;

//Table Booking report
function tab_rep(d)
{
	if(d=="")
	{
	
	}
	else
	{
		xmlHttp=GetXmlHttpObject();
		var url="misc.php?tr="+d;
		xmlHttp.open("GET",url,false);
		xmlHttp.send();
		
		document.getElementById("tab_rep_res").innerHTML=xmlHttp.responseText;
	}
}

function tab_availability(d)
{
	if(d=="")
	{
	
	}
	else
	{
		xmlHttp=GetXmlHttpObject();
		var url="misc.php?ta="+d;
		xmlHttp.open("GET",url,false);
		xmlHttp.send();
		
		document.getElementById("tid").innerHTML=xmlHttp.responseText;
	}
}


//Get Object for AJAX
function GetXmlHttpObject()
{
var xmlHttp=null;
try
	{
		xmlHttp=new XMLHttpRequest();
	}
catch (e)
{
	// Internet Explorer
	try
	{
		xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
	}
	catch (e)
	{
		xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
}
return xmlHttp;
}
