<?php
   include('session.php');
$conn=new mysqli('127.0.0.1','root','','vs');
if(isset($_POST['add']))
{
    $user=$login_session;  
    $nuser=$_POST['user'];
    $npass=$_POST['pass'];
    $sql="UPDATE users SET username='$nuser',password='$npass' WHERE username='$user'"; 
    ($conn->query($sql));
    $_SESSION['login_user'] = $nuser;
    header("location:welcome.php");

    
}


if(isset($_POST['accdelete']))
{
     $conn=new mysqli('127.0.0.1','root','','vs');
    $user=$login_session;    
    $sql="DELETE FROM users WHERE username='$user'";
    $conn->query($sql) ;
    $conn->close();
   echo "<script>
javascript:alert('User deleted!');
</script>";
    header("location:logout.php");
    
}

if (isset ($_POST['delete']))
{
    $id=$_POST['id'];
    $conn=new mysqli('127.0.0.1','root','','vs');
    $sql="select name,turl from videos WHERE id=$id";
    $result=$conn->query($sql);
    $row = $result->fetch_assoc();
    $name=$row["name"];
    $turl=$row["turl"];
    $turl=substr($turl,20);
    $vpath="videos/".$name;
    $sql="DELETE FROM videos WHERE id=$id";
    $conn->query($sql);
    $sql="DELETE FROM fvideos WHERE id=$id";
    $conn->query($sql);
    unlink($vpath);
    unlink($turl);
    $conn->close();
    header("location:welcome.php");
    exit();
}


if (isset ($_POST["video"] ))
{
if( $_FILES['file']['name']!= "" )
{
     for($i=0;$i<count($_FILES['file']['name']);$i++) 
{
$sub=$_POST['subject'];   
$name=$_FILES['file']['name'][$i];
$tname=substr($_FILES['file']['name'][$i],0,-4);
$temp=$_FILES['file']['tmp_name'][$i];
    $ffmpeg="c:\\ffmpeg\\bin\\ffmpeg.exe";
    $getfromsecond=20;
    $size="196*110";
    $imagename="C:/xampp/htdocs/vs/thumbnail/".(preg_replace("/[^a-zA-Z0-9]/",'',$tname).".png");
    $fi=(preg_replace("/[^a-zA-Z0-9]/",'',$tname).".png");
    $cmd="$ffmpeg -i $temp -an -ss $getfromsecond -s $size $imagename";
    shell_exec($cmd);
move_uploaded_file($temp,"videos/".$name);
$url="http://127.0.0.1/vs/videos/$name";
$turl="http://127.0.0.1/vs/thumbnail/$fi"; 
 $Time=date('Y/m/d H:i:s');        
mysqli_query($conn,"INSERT INTO videos(id,username,name,url,turl,subject,Time) VALUES ('','$login_session','$name','$url','$turl','$sub','$Time')");
}
header("location:uploaded.html");
exit();
}
else
echo "<script>
javascript:alert('no videos found!');
</script>";
}


    

    
?>
<html>
   
   <head>
        <title>VIDEOS</title>
<script>function a(){var b=document.getElementById("search-text-input").value;window.location="result.php?id="+b; }</script>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/index.css">
       <link rel="stylesheet" type="text/css" href="css/welcome.css">
       <script>
            
            function deletev()
{
    window.location="<?php $_php_self?>";
}
        </script>
    </head>
   
   <body style="background-color:lightgray">
<div id="top">
<a href="index.php"><img src="images/5.png" alt="video" class="img-responsive" title="video" height=80px width=80px></a>

<div style="position:fixed;left:400px;top:7px;">

    <input type="text" placeholder='Search...' id="search-text-input" />
    <div id="button-holder" onclick="a()"><img src="images/magnifying_glass.png"/>
            </div>

<div style="position:fixed;left:1250px;top:0px;"><br><button type="button" onclick="window.location='logout.php';" class="btn btn-default">Log-out</button</some text..</p>
</div>
    </div>
    </div> 
       
	<div id="DIV_1" class="container" style="top:100px">
	 <li id="LI_3">
			<ul id="UL_4">
				<li id="LI_5">
					<h3 id="H3_6">
						<a id="A_7"></a><span id="SPAN_8"></span>
					</h3>
				</li>
				<li id="LI_9">
					<ul id="UL_10">
					</ul>
				</li>
				<li id="LI_11">
					<a href="#" id="A_12"><span id="SPAN_13"></span></a>
				</li>
				<li id="LI_14">
					<span id="SPAN_15"></span>
				</li>
			</ul>
        </li>
		
        
         <ul class="nav nav-pills" >

                <li class="active"><br> <a data-toggle="pill"  href="#menu0">PROFILE</a></li>
				
			
                <li > <br><a data-toggle="pill" href="#menu1" >PUBLISHED VIDEOS</a></li>
				
			
                <li ><br><a data-toggle="pill" href="#menu2" >PENDING VIDEOS</a></li>
			
			
                <li ><br><a data-toggle="pill" href="#menu3" >UPLOAD VIDEO</a></li>
                
			
                <li ><br><a data-toggle="pill" href="#menu4" >ANALYTICS</a></li>
			
			
                

		
		        
            
        </ul>
        
        
       <div class="tab-content" >
            <div id="menu0" class="tab-pane fade in active" align="right" class="form-group" role="form" style="background:white;left:250px;position:fixed;top:100px;width:1100px;height:460px;">
                
                
                
           <center><h2>Edit profile:</h2><br>
             <table>
             <form role="form" method="post" action="<?php $_php_SELF?>" ><div class="form-group">
                 <tr><td><label for="user name:">User name:</label></td><td>
                     <?php
   $result=$conn->query("SELECT * FROM users WHERE username='$login_session'");
while($row=$result->fetch_assoc())
{
  $pass=$row['password'];  
}
    echo "<input type='text' class='form-control' required name='user' placeholder='eg. raj.kumar' value=$login_session></td></tr>
        <tr><td><br></td></tr>
                 <tr><td><label for='Password:'>Password:</label></td><td><input type='password' value=$pass placeholder='eg. 9Afbh' class='form-control' name='pass'>";
                     ?>
                     </td></tr></div>
             </table><br>
                 <input type="submit" value="Confirm" class="btn btn-default btn-lg" name="add">
                 <input type="submit" value="Delete account" class="btn btn-danger btn-lg" name="accdelete">
                 </form>
                 
            </center> 
           
           </div>
           
       
 <div id="menu2" class="tab-pane fade" align="right" class="form-group" role="form" style="background:white;left:280px;position:fixed;top:100px;width:1050px;height:auto;">     <center>
 
     <h2><u>Your pending videos</u></h2>
<?php
$result=$conn->query("SELECT * FROM videos WHERE username='$login_session'");
$count = mysqli_num_rows($result);	
      if($count >= 1) {
while($row=$result->fetch_assoc())
{
$id=$row['id'];
$name=$row['name'];
    $title=(substr($name,0,51)).".....";
$url=$row['url'];
$turl=$row['turl'];
    $Time=$row['Time'];
    
echo "<div class='col-lg-3'><div class='thumbnail'>
<a  title=$name href='watch.php?id=$id'><img src=$turl><div style='width:200px;display:inline-block;margin-right:5px;'>$title</a><br>Uploaded At : $Time<br>
<form method='post'>
<input type='hidden' value=$id name='id'>
<input class='btn btn-danger btn-block' value='Delete' onclick='deletev()' name='delete' type='submit'></form>
</div></div></div>";
}}

     ?></center></div><br>
           
           
     <div  id="menu1" class="tab-pane fade" align="right" class="form-group" role="form" style="background:white;left:250px;position:fixed;top:100px;width:1100px;height:auto;"><center>
       
         <h2><u>Your published videos</u></h2>
<?php
$result=$conn->query("SELECT * FROM fvideos WHERE username='$login_session'");
         $count = mysqli_num_rows($result);	
      if($count >= 1) {
while($row=$result->fetch_assoc())
{
$id=$row['id'];
$name=$row['name'];
    $title=(substr($name,0,51)).".....";
$url=$row['url'];
$turl=$row['turl'];
     $Time=$row['Time'];
echo "<div class='col-lg-3'><div class='thumbnail'>
<a  title=$name href='watch.php?id=$id'><img src=$turl><div style='width:200px;display:inline-block;margin-right:5px;'>$title</a>
<br>Uploaded At : $Time<br>
<form method='post'>
<input type='hidden' value=$id name='id'>
<input class='btn btn-danger btn-block' value='Delete' onclick='deletev()' name='delete' type='submit'></form>
</div></div></div>";
}}else{
          echo "<h3>no videos found!</h3>";
      }
?>
  </div>     
      
    
         
         
         
     
<div  id="menu3" class="tab-pane fade" align="right" class="form-group" role="form" style="background:white;left:250px;position:fixed;top:100px;width:1100px;height:460px;;">
<form method="post"   action="<?php $_php_SELF?>" enctype="multipart/form-data">
 
<center><table  border="0" style="padding:10px">
 
<tr>
 <br><br><br><br><br><br><br>
<Td>Upload  Video</td></tr>
    
<Tr><td>
    <input type="text" required id="subject" name="subject" placeholder="Enter subject's name:" class="form-control"><br>
   <input type="file" class="btn btn-success" name="file[]" multiple accept="video/*">
 <br>
    <input type="submit" name="video" class="btn btn-success">
    </td>  </Tr>
    </table></center>
 
</form>
</div>
         
         
         
         
         
         <div id="menu4" class="tab-pane fade" align="right" class="form-group" role="form" style="background:white;left:250px;position:fixed;top:100px;width:1100px;height:460px;">
          <center><h2>
       <?php
                        $conn=new mysqli('127.0.0.1','root','','vs');
       $sql="select * from fvideos WHERE username='$login_session'";
    $result=$conn->query($sql);
    if ((mysqli_error($conn)))
    {
      $count=0;
    }else
    { $count = mysqli_num_rows($result);}
      
    ?>   Total published videos : <?php echo $count ?> videos<br><br>
 
       <?php
                        $conn=new mysqli('127.0.0.1','root','','vs');
       $sql="select * from videos WHERE username='$login_session'";
    $result=$conn->query($sql);
    if ((mysqli_error($conn)))
    {
      $count=0;
    }else
    { $count = mysqli_num_rows($result);}
      
    ?>   Total pending videos : <?php echo $count ?> videos<br><br>
              
              <?php
    $conn=new mysqli('127.0.0.1','root','','vs');
    $sql="select * from fvideos WHERE username='$login_session'";
    $result=$conn->query($sql);
    $count = mysqli_num_rows($result);
       $view=0;
    for($i=0;$i<$count;$i++)
    {
          $row = $result->fetch_assoc();
          $view=$row['view']+$view;
    }
    ?>   
       Total views :<?php echo $view; ?>
 
         </div>
         
         
         <br><br><br>
         <br>    </div></div></body></html>