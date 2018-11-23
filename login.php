<?php
session_start();
if(isset($_SESSION['login_user']))
      header("location:welcome.php");
else
if (isset($_POST['signupsubmit']))
{
$username=$_POST["usernamesignup"];
$email=$_POST["emailsignup"];
$password=$_POST["passwordsignup_confirm"];
$conn = new mysqli('127.0.0.1','root','','vs');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql="INSERT INTO users (username,email,password) VALUES ('$username','$email','$password')";
if ($conn->query($sql) === TRUE) {
   header('location:signup.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
exit();
}
if (isset($_POST['loginsubmit']))
{
$username=$_POST["username"];
$password=$_POST["password"];
$conn = new mysqli('127.0.0.1','root','','vs');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql="SELECT * FROM users WHERE password='$password' and username='$username' OR email='$username'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

      $count = mysqli_num_rows($result);	
      if($count == 1) {
         
         $_SESSION['login_user'] = $username;
         header('location:welcome.php');
      }else {
         header('location:invalid.php');
             }exit();
   
}
?>
<!DOCTYPE html>

    <head>
        <title>SIGN-in</TITLE>
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body  style="overflow:hidden;">
        <div class="container">
            
            <header>
                <h1> <span></span></h1>
				
            </header>
            <section>				
                <div id="container_demo" >
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="<?php $_php_self?>" method="post" autocomplete="on"> 
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Your email or username </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="myusername or mymail@mail.com"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <p class="keeplogin"> 
								
					
								</p>
                                <p class="login button"> 
                                    <input type="submit" name="loginsubmit" value="Login" /> 
								</p>
                                <p class="change_link">
									Not a member yet ?
									<a href="#toregister" class="to_register">Join us</a>
								</p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form  action="<?php $_php_self?>" method="post" autocomplete="on"> 
                                <h1> Sign up </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Your username</label>
                                    <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="mysuperusername690" />
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
                                    <input id="emailsignup" name="emailsignup" required="required" type="email" placeholder="mysupermail@mail.com"/> 
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                                    <input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
                                    <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p class="signin button"> 
									<input type="submit" name="signupsubmit" value="Sign up"/> 
								</p>
                                <p class="change_link">  
									Already a member ?
									<a href="#tologin" class="to_register"> Go and log in </a>
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>