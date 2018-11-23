

<!doctype html>
<html>
    <head>
        <title>VIDEOS</title>
<script>function a(){var b=document.getElementById("search-text-input").value;window.location="result.php?id="+b; }</script>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/navbar.css">
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/index.css">
    </head><body style="background-color:lightgray">
<div id="top">
<a href="index.php"><img src="images/5.png" alt="video" class="img-responsive" title="video" height=80px width=80px></a>

<div style="position:fixed;left:400px;top:7px;">

    <input type="text" placeholder='Search...' id="search-text-input" />
    <div id="button-holder" onclick="a()"><img src="images/magnifying_glass.png"/>
            </div>

<div style="position:fixed;left:1250px;top:0px;"><br><button type="button" onclick="window.location='admin.php';" class="btn btn-default">Admin</button</some text..</p>
</div>
    </div>
    
    <div id="DIV_1">
	<nav id="NAV_2">
		<div id="DIV_3">
			<div id="DIV_4">
				Create an account or sign in for uploading videos
            </div> <a href="login.php"><span id="SPAN_5">Sign Up / Sign In</span></a>
		</div>
		
		<div id="DIV_8">
			<div id="DIV_9">
                <u>subjects<span id="SPAN_10"></span></u>
			</div>
            <ul id='UL_11'>
           <?php
            $conn=new mysqli('127.0.0.1','root','','vs');
$result=$conn->query("SELECT * FROM (fvideos)");
                $nsub="";
while($row=$result->fetch_assoc())
{
    
    $sub=$row['subject'];
    if ($nsub!=$sub)
    {
echo "
			
				<li id='LI_12'>
					<a href='result.php?id=$sub'><span id='SPAN_14'>$sub</span></a>
				</li>
				";
   } $nsub=$sub;
}
           ?>
            
         </ul>   
		</div>
		
	</nav>
</div>
    
    
        <div style="position:fixed;left:290px;top:100px;background-color:white;height:1000px;width:1050px;padding:10px;>

  <div class="col-sm-9">
                       
   <?php
$conn=new mysqli('127.0.0.1','root','','vs');
$result=$conn->query("SELECT * FROM (fvideos)");
while($row=$result->fetch_assoc())
{
$id=$row['id'];
$name=$row['name'];
$title=(substr($name,0,45))."...";  
$url=$row['url'];
$turl=$row['turl'];
$username=$row['username'];
$view=$row['view'];
echo "<div  class='col-lg-3'>
<a  title=$name href='watch.php?id=$id'><img src=$turl><div style='width:210px;display:inline-block;margin-right:5px;'>$title</a><br>by $username          &nbsp;&nbsp;&nbsp;<span>&#x25cf;$view views</span></div></div>";
}
     ?>
                       </div></div>
  

</body>
</html>