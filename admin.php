<?php
session_start();
if(isset($_SESSION['admin']))
      header("location:awelcome.php");
else
if(isset($_REQUEST['ok']))
{
$user=$_REQUEST['user'];
$password=$_REQUEST['password'];
    $conn = new mysqli('127.0.0.1','root','','vs');
    $sql="SELECT * FROM admin WHERE password='$password' and user='$user'";
    $result = $conn->query($sql);
$row = $result->fetch_assoc();
     $count = mysqli_num_rows($result);	
      if($count == 1) {
         
         $_SESSION['admin'] = $user;
         header('location:awelcome.php');
      }else {
         echo "<script>javascript:alert('Invalid!');window.location='admin.php'</script>";
          
             }exit();
exit();
}
?>
<!DOCTYPE html>
<html class=" -webkit-"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <title>Login</title>

    <style>
@import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
@import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

body{
	margin: 0;
	padding: 0;
	background: #fff;

	color: #fff;
	font-family: Arial;
	font-size: 12px;
    overflow: hidden;
}

.body{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;
	background-image: url(../vs/images/adbg.jpg);
	background-size: cover;
	-webkit-filter: blur(3px);
	z-index: 0;
}

.grad{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
	z-index: 1;
	opacity: 0.7;
}

.header{
	position: absolute;
	top: calc(50% - 35px);
	left: calc(50% - 255px);
	z-index: 2;
}

.header div{
	float: left;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 35px;
	font-weight: 200;
}

.header div span{
	color: #5379fa !important;
}

.login{
	position: absolute;
	top: calc(50% - 75px);
	left: calc(50% - 50px);
	height: 150px;
	width: 350px;
	padding: 10px;
	z-index: 2;
}

.login input[type=text]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
}

.login input[type=password]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
	margin-top: 10px;
}

.login input[type=submit]{
	width: 260px;
	height: 35px;
	background: #fff;
	border: 1px solid #fff;
	cursor: pointer;
	border-radius: 2px;
	color: #a18d6c;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 6px;
	margin-top: 10px;
}

.login input[type=submit]:hover{
	opacity: 0.8;
}

.login input[type=submit]:active{
	opacity: 0.6;
}

.login input[type=text]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=password]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=submit]:focus{
	outline: none;
}

::-webkit-input-placeholder{
   color: rgba(255,255,255,0.6);
}

::-moz-input-placeholder{
   color: rgba(255,255,255,0.6);
}
</style>

    <script src="js/Random Login Form - CodePen_files/prefixfree.min.js"></script>

<style>				.askemmy {					background: #fff url(chrome-extension://gllmlkidgbagkcikijiljllpdloelocn/logo_housefly_new.png) no-repeat right 5px bottom 5px;					background-size: 45px;				}				.askemmy {				    z-index: 10000;				    position: fixed;				    display: block;				    width: 350px;				    height: 145px;				    background-color: white;				    border-radius: 2px;				    box-shadow: rgb(133, 133, 133) 0px 0px 25px 1px;				    margin: 0 auto;				    text-align: center;				    margin-left: 35%;				    margin-top: 10%;				}				.askemmy p#msg {				    font-size: 1.1em;				    font-weight: 600;				    margin-top: 31px;				    margin-bottom: 20px;				}				.askemmy .error-msg {					color: #FF5600;					padding-top: 10px;				}				.askemmy .success-msg {					color: green;					padding-top: 10px;				}				.askemmy input {				    padding: .5em .6em;				    display: inline-block;				    border: 1px solid #ccc;				    box-shadow: inset 0 1px 3px #ddd;				    border-radius: 4px;				    vertical-align: middle;				    -webkit-box-sizing: border-box;				    box-sizing: border-box;				    line-height: normal;				    -webkit-appearance: textfield;				    cursor: auto;				 }				 .askemmy input[type="submit"] {				    font-family: inherit;				    font-size: 100%;				    padding: .5em 1em;				    color: white;				    font-weight: 600;				    border: 1px solid #999;				    border: 0 rgba(0,0,0,0);				    background-color: rgba(31, 196, 255, .8);				    text-decoration: none;				    border-radius: 2px;				    display: inline-block;				    zoom: 1;				    line-height: normal;				    white-space: nowrap;				    vertical-align: middle;				    text-align: center;				    cursor: pointer;				    -webkit-user-drag: none;				    -webkit-user-select: none;				    user-select: none;				    -webkit-box-sizing: border-box;				    box-sizing: border-box;				 }				.askemmy .closebox {				    display: inline-block;				    height: 16px;				    width: 16px;				    position: absolute;				    right: 4px;				    top: 4px;				    cursor: pointer;				    background: url(chrome-extension://gllmlkidgbagkcikijiljllpdloelocn/close_box.png)				}				</style></head>

<body>

  <div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>Ad<span>min</span></div>
		</div>
		<br>
		<div class="login">
            <form method="post" action="<?php $_php_SELF?>">
				<input type="text" placeholder="username" name="user" required><br>
				<input type="password" placeholder="password" name="password" required><br>
                <input type="submit" name="ok" ac value="Login" ></form>
		</div>

  <script src="js/Random Login Form - CodePen_files/jquery.js"></script>



</body></html>