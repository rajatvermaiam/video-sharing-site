
<!doctype html>
<html>
    <head>
        <title>VIDEOS</title>
        <link href="css/1.css" rel="stylesheet">
  <script src="js/2.js"></script>
<script>function a(){var b=document.getElementById("search-text-input").value;window.location="result.php?id="+b; }</script>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/index.css">
    </head>
<body style="background-color:lightgray">
<div id="top">
<a href="index.php"><img src="images/5.png" alt="video" class="img-responsive" title="video" height=80px width=80px></a>

<div style="position:fixed;left:400px;top:7px;">

    <input type="text" placeholder='Search...' id="search-text-input" />
    <div id="button-holder" onclick="a()"><img src="images/magnifying_glass.png"/>
            </div>

<div style="position:fixed;left:1250px;top:0px;"><br><button type="button" onclick="window.location='admin.php';" class="btn btn-default">Admin</button</some text..</p>
</div>
    </div>
    </div><br>
    
<?php
 if(isset($_POST['download']))
 {   
$file=$_POST['vname'];
  header('Content-type:video/mpeg4');
  header('content-disposition:attachment;filename="'.$file.'"') ;
     readfile('videos/'.$file);
 }   
    

     if(isset($_POST['report']))
 {   
         $id=$_GET['id'];
      $conn=new mysqli('127.0.0.1','root','','vs');
    $sql="UPDATE fvideos SET report='1' WHERE id=$id";
         $conn->query($sql);
         echo "<script>javascript:alert('REPORTED! to admin')</script>";
     }
    
if(isset($_GET['id']))
{
$id=$_GET['id'];
$conn=new mysqli('127.0.0.1','root','','vs');
$result=$conn->query("SELECT * FROM videos WHERE id='$id'");
$count=mysqli_num_rows($result);
if($count==1)
{
$row=$result->fetch_assoc();
$id=$row['id'];
$name=$row['name'];
    $title=substr($name,0,-4);
$vname=$row['name'];
$url=$row['url'];
$username=$row['username'];    
$view=$row['view']+1;
$sql="UPDATE fvideos SET view=$view WHERE id=$id";
$conn->query($sql);   
echo "<video style='top:0px;left:30px;' id='my-video' class='video-js' controls preload='auto' width='865' height='436'
   data-setup='{}' autoplay>
    <source src='$url' type='video/mp4'>
    <p class='vjs-no-js'>
      To view this video please enable JavaScript, and consider upgrading to a web browser that
    </p>
  </video>
  <script src='js/3.js'></script>";
}
else 
echo "<script>javascript:alert('SORRY! video not found.')</script>";
    

}
?>
 <div style="margin-top:10px;background-color:white;height:148px;left:30px;position:fixed;width:865px;">
    <h3><?php echo $title;?></h3>
     <h5>by <?php echo $username;?>  <span style="float:right;"><?php  echo $view.' views'?></span></h5>
     <form method="post"><?php echo "<input type='hidden' name='vname' value='$vname'>";?>
         <div class="btn-group btn-group-justified">
    <div class="btn-group">
      <button type="submit" class="btn btn-primary" name="download">Download</button>
    </div>
    <div class="btn-group">
      <button type="submit" class="btn btn-danger" name="report">Report</button>
    </div>
  </div>
     </form>
    </div>   
    
    <div class="row" style="margin-top:10px;background-color:white;height:596px;left:918px;position:fixed;width:500px;top:95px;"><div style="height:10px;"><h4>&nbsp;&nbsp;<u>Related videos</h4></u></div>
    <?php
        $id=$_GET['id'];
      $conn=new mysqli('127.0.0.1','root','','vs');
$result=$conn->query("SELECT * FROM (fvideos) WHERE id=$id ");
while($row=$result->fetch_assoc())
{
$id=$row['id'];
$name=$row['name'];
$title=(substr($name,0,40))."...";  
$url=$row['url'];
$turl=$row['turl'];
$username=$row['username'];
$view=$row['view'];
$Time=$row['Time'];
echo "<br><div style='padding-bottom:5px' class='col-md-12'>
<a  title=$name href='watch.php?id=$id'><img height='90px'; src=$turl>
<div style='width:230px;display:inline-block;margin-left:10px;position:absolute'><b>$title</b></a><br>by $username<span>   &nbsp&nbsp &#x25cf;    $view views</span><br>Uploaded At : $Time </div><br>
</div><br>";
}
      
      
      ?>
    </div>  
    
    
</body>
</html>