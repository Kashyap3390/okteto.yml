<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width">
<title>Lifafa maker panel</title>
<!-- Font Awsome Icons -->
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@500&family=EB+Garamond&family=Play&display=swap');

*{
	text-decoration: none;
}
body{
font-family: 'Play', sans-serif;
	background: linear-gradient(to top, #332CFF,#CA00FF);
	padding: 5px;
	text-align: center;
	min-height: 100vh;	
}
form,.form{
	margin-top: 1%;
	background: white;
	border-radius: 10px;
	padding: 5px;
	border: none;
	justify-content: center;
	text-align: center;
	padding-top: 10px;
 padding: bottom: 20px;		
}
.input{
	background: linear-gradient(to left, #61C9FF,#D763FF);
	color: black;
	margin-bottom: 6px;
	height: 40px;
	width: 250px;
	text-align: center;
	font-weight: bold;
	letter-spacing: 1px;
	padding: 2px;
	border-radius: 5px;
	border: 1px solid black;
	outline: none;
}
	input[type=submit],.submit{		
		margin-top: 15px;
		letter-spacing: 1px;
		padding: 10px;
		width: 255px;
		text-align: center;
		border-radius: 5px;
		border: 0px;
		outline: none;
		height: 55px;
		background: #001CFF;
		color:white;
		font-weight: bold;
		margin-bottom: 15px;
	}
h3{
	border-top: 1.5px dashed red;
	border-bottom: 1.5px dashed red;
	color: rgba(00,200,200,.7);
	font-size: 15px;
	padding: 10px;
	}
	h2{		
	font-size: 15px;
	}
	span.name{
 font-size: 16px;
 width: 200px;
 color: red;
	border-bottom: 1px dashed red;
	}
	.get{	
	padding: 2px;
	color: gray;
	border-left: 2px solid red;	
	}
	small.label{
		font-size: 15px;
		color: #00B5FF;
		letter-spacing: 1px;
	}
	@media(min-width: 370px){
		form{
		margin-left: 15%;
		margin-right: 15%;
		}
	}	
	select{
		padding: 8px;
		height: 45px;
		width: 255px;
		border-radius: 5px;
	//	background: white;
		color: blue;
		letter-spacing: 1px;
		border: 3px 3px 3px 3px;
		background: linear-gradient(to left, #61C9FF,#fff);
		border: 0.5px solid black;
	}
	#simpleToast {
  visibility: hidden; /* Hidden by default. Visible on click */
  min-width: 250px; /* Set a default minimum width */
  margin-left: -125px; /* Divide value of min-width by 2 */
  background-color: MediumVioletRed; /* Background color */
  color: #fff; /* White text color */
  text-align: center; /* Centered text */
  border-radius: 2px; /* Rounded borders */
  padding: 16px; /* Padding */
  position: fixed; /* Sit on top of the screen */
  z-index: 1; /* Add a z-index if needed */
  left: 50%; /* Center the snackbar */
  bottom: 30px; /* 30px from the bottom */
  font-family: monospace;
  display: inline-flex;
  line-hight: 13px
}
#simpleToast span {
	font-family: 'EB Garamond', serif;
  margin-left: 12px;
  margin-top: 1px;
}

/* Show the SIMPLE-TOAST when clicking on a button (class added with JavaScript) */
#simpleToast.show {
  visibility: visible; /* Show the SIMPLE-TOAST */
  /* Add animation: Take 0.5 seconds to fade in and out the SIMPLE-TOAST.
  However, delay the fade out process for 2.5 seconds */
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

/* Animations to fade the SIMPLE-TOAST in and out */
@-webkit-keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}
.fa-exclamation-triangle{
	color: white;
	font-size: 16px;
	text-align: center;
	font-weight: none;
	margin-top: 3px;
}
::placeholder{
	color: white;
	text-align: left;
	letter-spacing: ;
	padding-left: 10px;
}
label{
	color: #47E1FF;
	text-align: center;
	font-size: 16px;
	letter-spacing: 1px;
}
</style>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
 error_reporting(0);
 include 'config.php';
 
 $select = "SELECT * FROM admin";
 $out = mysqli_query($conn, $select);
 $rows =  mysqli_num_rows($out);
 $array =  mysqli_fetch_array($out);
 $admin_name = $array['name'];
 $admin_channel = $array['channel'];
 $charge = $array['charge'];
 //$code = $array['id'];
 $token = $array['token'];
 $code = 1;
 if($_SESSION['error']){
 	 $msg = $_SESSION['error'];
 }
 if($_SESSION['success']){
  	$msg = $_SESSION['success'];
 }
 if(!isset($_POST['submit'])){
  	 echo'<form id="form" action="" method="POST" autocomplete="off">
  	<h2>BEST PAYTM LIFAFA MAKER PANEL 2022</h2>
  	<h3>Provided By :- '.$admin_name.'</h3><font color="red">'.$msg.'</font>
  	<!-- <input type="text" name="code" class="input" placeholder="Enter access code set by admin." minlength="1" maxlength="8" value="" required><br> -->  <input type="text" name="name" class="input" placeholder="Enter your name." minlength="1" maxlength="30" value="" required><br>
  	  <input type="number" name="per_user" class="input" placeholder="Amount each user." minlength="1" maxlength="3" value="" required><br> 
  	  <input type="number" name="total_user" class="input" placeholder="Enter total participants." minlength="1" maxlength="4" value=""required><br>
  	  <input type="link" name="channel" class="input" placeholder="Enter telegram url." minlength="6" maxlength="40" value=""required><br>  
  	  <input type="link" name="callback" class="input" placeholder="Enter callback url." minlength="6" maxlength="40" value=""required><br>
  	  <input type="link" name="info" class="input" placeholder="Enter Message." maxlength="30" value=""required><br>   	  
  	   <input type="submit" name="submit" class="submit" value="CREATE LIFAFA"><br><br>
  	    	<h2></h2>
  	 <span class="name">Create paytm lifafa from this panel</span><br><br>
  <span class="get">Join our telegram channel<a href="'.$admin_channel.'"> click here.</a></span><br>
    <div id="simpleToast">
  <i class="fas fa-exclamation-triangle">️</i><span id="message"></span>
</div>
  	 </form><br><br>'; 
  $_SESSION['error'] == "";
  $_SESSION['success'] == "";
  	unset($_SESSION['error']);
 		unset($_SESSION['success']);  	   	 
  	 }
  	   	if(!empty($_POST) && $_SERVER["REQUIEST_METHOD"] = "POST" && isset($_POST["submit"])){  	   		
  
  		// Enter your access code  	   
 //	$access = $_POST['code'];
    $access = 1;
   	$name = $_POST['name'];
  		$per_user = $_POST['per_user'];
  	 $total_user = $_POST['total_user'];
  	 	$callback = $_POST['callback'];	
	  	$channel = $_POST['channel'];
	  	$info = $_POST['info'];
   
   if($rows == 0){
   	 header("Location: index.php");
   	 $_SESSION['error'] = "Please set your full2sms creadentials before using lifafa panel.<br><br>";   	
   }else if($rows == 1){   
     if($code != $access){
     	header("Location: index.php");
   	 $_SESSION['error'] = "Wrong access code.<br><br>";
     }else if($code == $access){ 
 $total_amount = $per_user*$total_user;
 $amo = $total_amount / 100 * $charge;
 $amount = $total_amount+$amo;
   	 
 $oid = "ORDS".rand(111111,999999);
 $_SESSION['oid'] = $oid;
 $_SESSION['info'] = $info;
 $_SESSION['per_user'] = $per_user;
 $_SESSION['total_user'] = $total_user;
 $_SESSION['name'] = $name;
 $_SESSION['callback'] = $callback;
 $_SESSION['amount'] = $amount;
 $_SESSION['channel'] = $channel;
 
 
 $api = "https://full2sms.in/accept_payment_api.php?token=$token&amount=$amount&order_id=$oid";   
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL,$api);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER,true); 
 
   $msg = curl_exec($ch);
          curl_close($ch); 
echo "<font color='black'>$msg</font>";
     }
   }   	    
 }
?>
<script type="text/javascript">     
//alert("hi");

if (window.history.replaceState) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

<audio autoplay="autoplay" src="">

</body>
</html>