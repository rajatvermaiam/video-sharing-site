
<!doctype html>
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
    
    </div><div class="row" style="background-color:white;height:auto;left:290px;position:fixed;top:100px;width:1050px;">
<?php
if(isset($_REQUEST['id']))
{
$search=trim($_REQUEST['id']);
$conn=new mysqli('127.0.0.1','root','','vs');
$search = mysqli_real_escape_string($conn,$search);
echo "<h3>&nbspShowing results for<b> '$search'</b></h1>";

$result=$conn->query("SELECT * FROM fvideos WHERE name LIKE '%".$search."%'");

while($row=$result->fetch_assoc())
{
$id=$row['id'];
$name=$row['name'];
$title=(substr($name,0,-4));  
$url=$row['url'];
$turl=$row['turl'];
$username=$row['username'];
$view=$row['view'];
$Time=$row['Time'];
echo "<div style='padding-bottom:15px' class='col-md-12'>
<a  title=$name href='watch.php?id=$id'><img src=$turl>
<div style='width:500px;display:inline-block;margin-left:10px;position:absolute'><b>$title</b></a><br>by $username<span>   &nbsp&nbsp &#x25cf;    $view views</span><br>Uploaded At : $Time </div><br>
</div><br>";
}
exit();
} 
    ?></div></body></html>