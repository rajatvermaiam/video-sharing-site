
duplicate

<head>
  <link href="css/1.css" rel="stylesheet">
  <script src="js/2.js"></script>
</head>

 &nbsp; <video id="my-video" class="video-js" controls preload="auto" width="640" height="400"
  poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
    <source src='$url' type='video/mp4'>
    <p class="vjs-no-js">
      To view this video please enable JavaScript, and consider upgrading to a web browser that
    </p>
  </video>

  <div id="DIV_28">
			<div id="DIV_29">
                <u>Sort by<span id="SPAN_30"></span></u>
			</div>
			<div id="DIV_31">
				<ul id="UL_32">
					<li id="LI_33">
						<span id="SPAN_37">Date</span>
					</li>
					<li id="LI_38">
						<span id="SPAN_42">views</span>
					</li>
                    <li id="LI_38">
						<span id="SPAN_42">Rating</span>
					</li>
					
				</ul>
			</div>
		</div>



  

   


    
if( $_FILES['file']['name']!= "" )
{
     for($i=0;$i<count($_FILES['file']['name']);$i++) 
{

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
mysqli_query($conn,"INSERT INTO fvideos(id,username,name,url,turl,subject,Time) VALUES ('','admin',$login_session,'$url','$turl','$sub','$Time')");
}
header("location:uploaded.html");
exit();







move_uploaded_file($temp,"videos/".$name);