
<?php
   include('asession.php');
if(isset($_POST['accdelete']))
{
     $conn=new mysqli('127.0.0.1','root','','vs');
    $user=$_POST['id'];    
    $sql="DELETE FROM users WHERE username='$user'";
    $conn->query($sql) ;
    $conn->close();
   echo "<script>
javascript:alert('User deleted!');
</script>";
    header("location:awelcome.php#menu0");
    
}
if(isset($_POST['rdelete']))
{
   $id=$_POST['id']; 
$conn=new mysqli('127.0.0.1','root','','vs'); 
    $sql="UPDATE fvideos SET report='0' WHERE id=$id";
    $conn->query($sql) ;
    $conn->close();
    echo "<script>javascript:alert('Request deleted!');
</script>";
    header("location:awelcome.php#menu6");
        
}

if(isset($_POST['add']))
{
   $user=$_POST['user'];
    $pass=$_POST['pass'];  
    $conn=new mysqli('127.0.0.1','root','','vs');
    $sql="INSERT INTO admin(user,password) VALUES('$user','$pass')";
    $conn->query($sql);
    $conn->close();
    echo "<script>
javascript:alert('admin added');
</script>";
    header("location:awelcome.php");
    exit();
    }
    
if ((isset($_POST["action"]) && $_POST["action"] == "submit"))
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
mysqli_query($conn,"INSERT INTO videos(id,username,name,url,turl,subject,Time) VALUES ('','admin','$name','$url','$turl','$sub','$Time')");
}
header("location:auploaded.html");
exit();
}
else
echo "<script>
javascript:alert('no videos found!');
</script>";
    
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
    header("location:awelcome.php");
    exit();
}
if (isset ($_POST['publish']))
{
    $id=$_POST['id'];
    $conn=new mysqli('127.0.0.1','root','','vs');
    $sql="select id,username,name,url,turl,subject from videos WHERE id=$id";
    $result=$conn->query($sql);
    $row = $result->fetch_assoc();
    $id=$row["id"];
    $username=$row["username"];
    $name=$row["name"];
    $url=$row["url"];
    $turl=$row["turl"];
    $subject=$row["subject"];
    mysqli_query($conn,"INSERT INTO fvideos(id,username,name,url,turl,subject) VALUES ('','$username','$name','$url','$turl','$subject')");
     $sql="DELETE FROM videos WHERE id=$id";
    $conn->query($sql);
    $conn->close();
    echo "<script>
javascript:alert('published!');
</script>";
    
     
}

?>
<!doctype html>
<html>
    <head>
        <title>VIDEOS</title>
<script>function b(){var b=document.getElementById("search-text-input").value;window.location="result.php?id="+b; }</script>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
        <script>
            
            function deletev()
{
    window.location="<?php $_php_self?>";
}
        </script>
        <link rel="stylesheet" type="text/css" href="css/welcome.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" type="text/css" href="css/welcome.css">
    </head>
    
    
    
    
<body style="background-color:lightgray">
<div id="top">
<a href="index.php"><img src="images/5.png" alt="video" class="img-responsive" title="video" height=80px width=80px></a>

<div style="position:fixed;left:400px;top:7px;">

    <input type="text" placeholder='Search...' id="search-text-input" />
    <div id="button-holder" onclick="b()"><img src="images/magnifying_glass.png"/>
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
		
        
         <ul class="nav nav-pills">

               
                <li class="active"> <br><a data-toggle="pill" href="#menu1" >PENDING VIDEOS</a></li>
				
			
                <li ><br><a data-toggle="pill" href="#menu2" >PUBLISHED VIDEOS</a></li>
			
			
                <li ><br><a data-toggle="pill" href="#menu3" >UPLOAD VIDEO</a></li>
                
			
                <li ><br><a data-toggle="pill" href="#menu4" >ADD ADMIN</a></li>
			
			
                <li ><br><a data-toggle="pill" href="#menu5" >ANALYTICS</a></li>
              <li ><br> <a data-toggle="pill"  href="#menu0">PROFILES</a></li>
             <li><br><a data-toggle="pill"     href="#menu6">REPORTED VIDEOS</a></li>

		
		        
            
        </ul>
        
    
    <div class="tab-content">
                                    <div id="menu0" class="tab-pane fade" align="right" class="form-group" role="form" style="background:white;left:250px;position:fixed;top:100px;width:1100px;height:460px;">
        
                                        <centeR><h2><u>ALL USERS INFO</u></h2>
                                       <table style="width:900px;" class="table table-hover"> 
   
   <thead> 
      <tr class="danger"> 
         <th>User Name</th> 
         <th>E-mail</th> 
         <th>Action</th> 
      </tr> 
   </thead> 
   <tbody> 
      
       <?php
       $conn=new mysqli('127.0.0.1','root','','vs');
       $sql="select * from users";
    $result=$conn->query($sql);
    $count = mysqli_num_rows($result);
    for($i=0;$i<$count;$i++)
    {
          $row = $result->fetch_assoc();
        $username=$row['username'];
     echo " <tr class='success'> 
         <td>".$row['username']."</td> 
         <td>".$row['email']."</td> 
         <td><form method='post'>
<input type='hidden' value=$username name='id'>
<input class='btn btn-danger btn-sm' name='accdelete' type='submit' value='delete'></form></td> 
      </tr> ";
    }
    ?>
    
   </tbody> 
</table>                           
                                        </centeR>
                                        
        </div>


                    <div id="menu5" class="tab-pane fade" align="right" class="form-group" role="form" style="background:white;left:250px;position:fixed;top:100px;width:1100px;height:460px;">
        <?php
                        $conn=new mysqli('127.0.0.1','root','','vs');
       $sql="select * from users";
    $result=$conn->query($sql);
    $count = mysqli_num_rows($result);
    ?>
            
                        <center><table border="1"><tr><td><h2> Total users : <?php echo $count ?> users<br><br></td>
     <?php
                        $conn=new mysqli('127.0.0.1','root','','vs');
       $sql="select * from fvideos";
    $result=$conn->query($sql);
    $count = mysqli_num_rows($result);
    ?>   
       
       
                            <tr><td><h2>Total published videos : <?php echo $count ?> videos</h2></td></tr><br> <br>
       <?php
                        $conn=new mysqli('127.0.0.1','root','','vs');
       $sql="select * from videos";
    $result=$conn->query($sql);
    $count = mysqli_num_rows($result);
    ?>   
       
       
                            <tr><td><h2>Total pending videos : <?php echo $count ?> videos<br><br></h2></td></tr>
       
      <?php
    $conn=new mysqli('127.0.0.1','root','','vs');
    $sql="select * from fvideos";
    $result=$conn->query($sql);
    $count = mysqli_num_rows($result);
       $view=0;
    for($i=0;$i<$count;$i++)
    {
          $row = $result->fetch_assoc();
          $view=$row['view']+$view;
    }
    ?>   
                            <tr><td><h2>Total views :<?php echo $view; ?></h2></td></tr></h2></tr></table>
        </center>
        
        
        </div>
        <div id="menu1" class="tab-pane fade in active" align="right" class="form-group" role="form" style="background:white;left:280px;position:fixed;top:100px;width:1050px;height:auto;"> <center> <h2>  <u> Pending videos</u></h2>
 <?php
$conn=new mysqli('127.0.0.1','root','','vs');
$result=$conn->query("SELECT * FROM videos");
$count = mysqli_num_rows($result);	
      if($count >= 1) {
while($row=$result->fetch_assoc())
{
$id=$row['id'];
$name=$row['name'];
$title=(substr($name,0,63)).".....";  
$url=$row['url'];
$turl=$row['turl'];
$Time=$row['Time'];
$username=$row['username'];
echo "<div class='col-lg-3'><div class='thumbnail'>
<a  title='$name' href='watch.php?id=$id'><img src=$turl><div style='width:200px;display:inline-block;margin-right:5px;'>$title</a>
<br><div align='left'>&nbspby $username<br>&nbspUploaded At : $Time</div>
<form method='post'>
<input type='hidden' value=$id name='id'>
<div class='btn-group'>
<input class='btn btn-success' type='submit' name='publish' value='publish'>
<input  class='btn btn-danger' type='submit' onclick='deletev()' name='delete' value='delete'>
</form></div></div></div></div>";
}}else{
          echo "<h3>no videos found!</h3>";
      }
             ?></center>
    </div>            
             
    <div id="menu2" class="tab-pane fade" align="right" class="form-group" role="form" style="background:white;left:280px;position:fixed;top:100px;width:1050px;height:auto;">   <center> 
        <h2>  <u> Published videos</u></h2>


    <?php
$conn=new mysqli('127.0.0.1','root','','vs');
$result=$conn->query("SELECT * FROM fvideos");
        $count=mysqli_num_rows($result);
        if($count==0){
            echo "<h3>no videos found!</h3>";
        }
        else
while($row=$result->fetch_assoc())
{
$id=$row['id'];
$name=$row['name'];
$title=(substr($name,0,51)).".....";  
$url=$row['url'];
$turl=$row['turl'];
$username=$row['username'];
$view=$row['view'];
$Time=$row['Time'];
echo "<div class='col-lg-3'><div class='thumbnail'>
<a  title=$name href='watch.php?id=$id'><img src=$turl><div style='width:200px;display:inline-block;margin-right:5px;'>$title</a>
<br><div align='left'>by $username<span style='float:right;'>&#x25cf;$view views</span><br>Uploaded At : $Time</div>


<form method='post'>
<input type='hidden' value=$id name='id'>
<input class='btn btn-danger btn-block' value='Delete' onclick='deletev()' name='delete' type='submit'></form>
</div></div></div>";
}
?>
    </div>
    
        <div id="menu4" class="tab-pane fade" align="right" class="form-group" role="form" style="background:white;left:280px;position:fixed;top:100px;width:1050px;height:460px;">
            <center><h2><u>New admin:</u></h2><br>
             <table>
             <form role="form" method="post" action="<?php $_php_SELF?>" ><div class="form-group">
                 <tr><td><label for="user name:">User name:</label></td><td><input type="text" class="form-control" required name="user" placeholder="eg. raj.kumar"></td></tr>
        <tr><td><br></td></tr>
                 <tr><td><label for="Password:">Password:</label></td><td><input type="password" placeholder="eg. 9Afbh" class="form-control" name="pass"></td></tr></div>
             </table><br>
                 <input type="submit" value="add admin" class="btn btn-default btn-lg" name="add"></form>
                 
            </center>   
    </div>
    
    
    <div  id="menu3" class="tab-pane fade" align="right" class="form-group" role="form" style="background:white;left:250px;position:fixed;top:100px;width:1100px;height:460px;;">
<form method="post"   action="<?php $_php_SELF?>" name="upload" enctype="multipart/form-data">
 
<center> <h2>  <u> Upload videos</u></h2><table  border="0" style="padding:10px">
 
<tr>
 <br><br><br><br><br><br><br>
<Td></td></tr>
    
<Tr><td>
    <script>
        function a()
        {
        var sub=document.getElementById("subject").value;
        if (sub=="")
            alert("Enter subject's name:");
        else
         upload.submit();   
        }
    </script>
    <input type="text" required id="subject" name="subject" placeholder="Enter subject's name:" class="form-control"><br>
   <input type="file" class="btn btn-success" name="file[]" multiple accept="video/*" onchange="a()">
 <input type="hidden" name="action" value="submit" />
    </td>  </Tr>
    </table></center>
 
</form>
</div>
                                     <div id="menu6" class="tab-pane fade" align="right" class="form-group" role="form" style="background:white;left:250px;position:fixed;top:100px;width:1100px;height:auto;">
                                         <center> <h2><u> Reported videos</u></h2>


    <?php
$conn=new mysqli('127.0.0.1','root','','vs');
$result=$conn->query("SELECT * FROM fvideos WHERE report='1'");
$count=mysqli_num_rows($result);
                   if($count==0)
                   {echo "<h3>no reported video found!</h3>";}
                   else{
while($row=$result->fetch_assoc())
{
$id=$row['id'];
$name=$row['name'];
$title=(substr($name,0,51)).".....";  
$url=$row['url'];
$turl=$row['turl'];
$username=$row['username'];
$view=$row['view'];
$Time=$row['Time'];
echo "<div class='col-lg-3'><div class='thumbnail'>
<a  title=$name href='watch.php?id=$id'><img src=$turl><div style='width:200px;display:inline-block;margin-right:5px;'>$title</a>
<br><div align='left'>by $username<span style='float:right;'>&#x25cf;$view views</span><br>Uploaded At : $Time</div>


<form method='post'>
<input type='hidden' value=$id name='id'>
<input class='btn btn-danger btn-block' value='Delete video' onclick='deletev()' name='delete' type='submit'>
<input class='btn btn-danger btn-block' value='Delete request'  name='rdelete' type='submit'>
</form>
</div></div></div>";
}}
?>
                                         
        </div>
    
    </div></div></body></html>