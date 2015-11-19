<? 
header("Expires: Sat, 01 Jan 2000 00:00:00 GMT"); header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT"); header("Cache-Control: post-check=0, pre-check=0",false); session_cache_limiter(); session_start();
if (ucfirst($_SESSION[authority]) != "Administrator"){  include('index.php');  exit;}

function do_upload($upload_dir, $upload_url,$e) {
	$temp_name = $_FILES["$e"]['tmp_name'];
	$file_name = $_FILES["$e"]['name']; 
  	$file_name = str_replace("\\","",$file_name);
	$file_name = str_replace("'","",$file_name);
	$file_path = $upload_dir.$file_name;
  if ( $file_name =="") { 
  	$message = "Invalid File Name Specified";
  	return $message;  }
	$result  =  move_uploaded_file($temp_name, $file_path);
  if (!chmod($file_path,0777))
   	$message = "change permission to 777 failed.";
  else
    $message = ($result)?"$file_name uploaded successfully." :
     	      "Somthing is wrong with uploading a file.";
  return $message;
  } 
 
///////////////////////////////////////////////////////////////////////////////    

require ("Security_Dept/config.php");
@ $db = mysql_connect($server, $dbusername, $dbpassword) or die(mysql_error()); mysql_select_db($db_name);
 
$gallery_num=$_POST['gallery_num']; 
$gallery_name=$_POST['gallery_name']; 

$gallery_photo1=$_FILES['userfile0']['name'];	
$gallery_photo1_old=$_POST['gallery_photo1_old'];
$gallery_photo1_delete=$_POST['userfile0_delete'];  

$gallery_photo2=$_FILES['userfile1']['name'];	
$gallery_photo2_old=$_POST['gallery_photo2_old'];
$gallery_photo2_delete=$_POST['userfile1_delete'];  

$gallery_photo3=$_FILES['userfile2']['name'];	
$gallery_photo3_old=$_POST['gallery_photo3_old'];
$gallery_photo3_delete=$_POST['userfile2_delete'];  

$gallery_photo4=$_FILES['userfile3']['name'];	
$gallery_photo4_old=$_POST['gallery_photo4_old'];
$gallery_photo4_delete=$_POST['userfile3_delete']; 

$gallery_photo1=$_FILES['userfile4']['name'];	
$gallery_photo1_old=$_POST['gallery_photo1_old'];
$gallery_photo1_delete=$_POST['userfile4_delete'];  

$gallery_photo2=$_FILES['userfile5']['name'];	
$gallery_photo2_old=$_POST['gallery_photo2_old'];
$gallery_photo2_delete=$_POST['userfile5_delete'];  

$gallery_photo3=$_FILES['userfile6']['name'];	
$gallery_photo3_old=$_POST['gallery_photo3_old'];
$gallery_photo3_delete=$_POST['userfile6_delete'];  

$gallery_photo4=$_FILES['userfile7']['name'];	
$gallery_photo4_old=$_POST['gallery_photo4_old'];
$gallery_photo4_delete=$_POST['userfile7_delete']; 

$gallery_photo1=$_FILES['userfile8']['name'];	
$gallery_photo1_old=$_POST['gallery_photo1_old'];
$gallery_photo1_delete=$_POST['userfile8_delete'];  

$gallery_photo2=$_FILES['userfile9']['name'];	
$gallery_photo2_old=$_POST['gallery_photo2_old'];
$gallery_photo2_delete=$_POST['userfile9_delete'];  

$gallery_photo3=$_FILES['userfile10']['name'];	
$gallery_photo3_old=$_POST['gallery_photo3_old'];
$gallery_photo3_delete=$_POST['userfile10_delete'];  

$gallery_photo4=$_FILES['userfile11']['name'];	
$gallery_photo4_old=$_POST['gallery_photo4_old'];
$gallery_photo4_delete=$_POST['userfile11_delete'];  

$query="UPDATE sam_gallery SET
gallery_name='".$gallery_name."'
where gallery_num='5'"; 
$result = mysql_query($query);


if ($gallery_photo1 != ''){ $query2="UPDATE sam_gallery SET gallery_photo1='".$gallery_photo1."' WHERE gallery_num='$gallery_num'"; mysql_query($query2);}
if ($gallery_photo1_delete == 'Delete' || ($gallery_photo1 != $gallery_photo1_old && $gallery_photo1 != '' && $gallery_photo1_old != '')) {
	$filedelete = "../images/"."$gallery_photo1_old";
	if (file_exists($filedelete)) {
		echo "$gallery_photo1_old has been deleted.<br />";
		unlink($filedelete);
	}
}
if ($gallery_photo1_delete == 'Delete') { $query="UPDATE sam_gallery SET gallery_photo1='' WHERE gallery_num='$gallery_num'"; mysql_query($query); }

if ($gallery_photo2 != ''){ $query2="UPDATE sam_gallery SET gallery_photo2='".$gallery_photo2."' WHERE gallery_num='$gallery_num'"; mysql_query($query2);}
if ($gallery_photo2_delete == 'Delete' || ($gallery_photo2 != $gallery_photo2_old && $gallery_photo2 != '' && $gallery_photo2_old != '')) {
	$filedelete = "../images/"."$gallery_photo2_old";
	if (file_exists($filedelete)) {
		echo "$gallery_photo2_old has been deleted.<br />";
		unlink($filedelete);
	}
}
if ($gallery_photo2_delete == 'Delete') { $query="UPDATE sam_gallery SET gallery_photo2='' WHERE gallery_num='$gallery_num'"; mysql_query($query); }

if ($gallery_photo3 != ''){ $query2="UPDATE sam_gallery SET gallery_photo3='".$gallery_photo3."' WHERE gallery_num='$gallery_num'"; mysql_query($query2);}
if ($gallery_photo3_delete == 'Delete' || ($gallery_photo3 != $gallery_photo3_old && $gallery_photo3 != '' && $gallery_photo3_old != '')) {
	$filedelete = "../images/"."$gallery_photo3_old";
	if (file_exists($filedelete)) {
		echo "$gallery_photo3_old has been deleted.<br />";
		unlink($filedelete);
	}
}
if ($gallery_photo3_delete == 'Delete') { $query="UPDATE sam_gallery SET gallery_photo3='' WHERE gallery_num='$gallery_num'"; mysql_query($query); }

if ($gallery_photo4 != ''){ $query2="UPDATE sam_gallery SET gallery_photo4='".$gallery_photo4."' WHERE gallery_num='$gallery_num'"; mysql_query($query2);}
if ($gallery_photo4_delete == 'Delete' || ($gallery_photo4 != $gallery_photo4_old && $gallery_photo4 != '' && $gallery_photo4_old != '')) {
	$filedelete = "../images/"."$gallery_photo4_old";
	if (file_exists($filedelete)) {
		echo "$cgallery_photo4_old has been deleted.<br />";
		unlink($filedelete);
	}
}
if ($gallery_photo4_delete == 'Delete') { $query="UPDATE sam_gallery SET gallery_photo4='' WHERE gallery_num='$gallery_num'"; mysql_query($query); }

if ($gallery_photo5 != ''){ $query2="UPDATE sam_gallery SET gallery_photo5='".$gallery_photo5."' WHERE gallery_num='$gallery_num'"; mysql_query($query2);}
if ($gallery_photo5_delete == 'Delete' || ($gallery_photo5 != $gallery_photo5_old && $gallery_photo5 != '' && $gallery_photo5_old != '')) {
	$filedelete = "../images/"."$gallery_photo5_old";
	if (file_exists($filedelete)) {
		echo "$gallery_photo5_old has been deleted.<br />";
		unlink($filedelete);
	}
}
if ($gallery_photo5_delete == 'Delete') { $query="UPDATE sam_gallery SET gallery_photo5='' WHERE gallery_num='$gallery_num'"; mysql_query($query); }

if ($gallery_photo6 != ''){ $query2="UPDATE sam_gallery SET gallery_photo6='".$gallery_photo6."' WHERE gallery_num='$gallery_num'"; mysql_query($query2);}
if ($gallery_photo6_delete == 'Delete' || ($gallery_photo6 != $gallery_photo6_old && $gallery_photo6 != '' && $gallery_photo6_old != '')) {
	$filedelete = "../images/"."$gallery_photo6_old";
	if (file_exists($filedelete)) {
		echo "$gallery_photo6_old has been deleted.<br />";
		unlink($filedelete);
	}
}
if ($gallery_photo6_delete == 'Delete') { $query="UPDATE sam_gallery SET gallery_photo6='' WHERE gallery_num='$gallery_num'"; mysql_query($query); }

if ($gallery_photo7 != ''){ $query2="UPDATE sam_gallery SET gallery_photo7='".$gallery_photo7."' WHERE gallery_num='$gallery_num'"; mysql_query($query2);}
if ($gallery_photo7_delete == 'Delete' || ($gallery_photo7 != $gallery_photo7_old && $gallery_photo7 != '' && $gallery_photo7_old != '')) {
	$filedelete = "../images/"."$gallery_photo7_old";
	if (file_exists($filedelete)) {
		echo "$gallery_photo7_old has been deleted.<br />";
		unlink($filedelete);
	}
}
if ($gallery_photo7_delete == 'Delete') { $query="UPDATE sam_gallery SET gallery_photo7='' WHERE gallery_num='$gallery_num'"; mysql_query($query); }

if ($gallery_photo8 != ''){ $query2="UPDATE sam_gallery SET gallery_photo8='".$gallery_photo8."' WHERE gallery_num='$gallery_num'"; mysql_query($query2);}
if ($gallery_photo8_delete == 'Delete' || ($gallery_photo8 != $gallery_photo8_old && $gallery_photo8 != '' && $gallery_photo8_old != '')) {
	$filedelete = "../images/"."$gallery_photo8_old";
	if (file_exists($filedelete)) {
		echo "$cgallery_photo8_old has been deleted.<br />";
		unlink($filedelete);
	}
}
if ($gallery_photo8_delete == 'Delete') { $query="UPDATE sam_gallery SET gallery_photo8='' WHERE gallery_num='$gallery_num'"; mysql_query($query); }

if ($gallery_photo9 != ''){ $query2="UPDATE sam_gallery SET gallery_photo9='".$gallery_photo9."' WHERE gallery_num='$gallery_num'"; mysql_query($query2);}
if ($gallery_photo9_delete == 'Delete' || ($gallery_photo9 != $gallery_photo9_old && $gallery_photo9 != '' && $gallery_photo9_old != '')) {
	$filedelete = "../images/"."$gallery_photo9_old";
	if (file_exists($filedelete)) {
		echo "$gallery_photo9_old has been deleted.<br />";
		unlink($filedelete);
	}
}
if ($gallery_photo9_delete == 'Delete') { $query="UPDATE sam_gallery SET gallery_photo9='' WHERE gallery_num='$gallery_num'"; mysql_query($query); }

if ($gallery_photo10 != ''){ $query2="UPDATE sam_gallery SET gallery_photo10='".$gallery_photo10."' WHERE gallery_num='$gallery_num'"; mysql_query($query2);}
if ($gallery_photo10_delete == 'Delete' || ($gallery_photo10 != $gallery_photo10_old && $gallery_photo10 != '' && $gallery_photo10_old != '')) {
	$filedelete = "../images/"."$gallery_photo10_old";
	if (file_exists($filedelete)) {
		echo "$gallery_photo10_old has been deleted.<br />";
		unlink($filedelete);
	}
}
if ($gallery_photo10_delete == 'Delete') { $query="UPDATE sam_gallery SET gallery_photo10='' WHERE gallery_num='$gallery_num'"; mysql_query($query); }

if ($gallery_photo11 != ''){ $query2="UPDATE sam_gallery SET gallery_photo11='".$gallery_photo11."' WHERE gallery_num='$gallery_num'"; mysql_query($query2);}
if ($gallery_photo11_delete == 'Delete' || ($gallery_photo11 != $gallery_photo11_old && $gallery_photo11 != '' && $gallery_photo11_old != '')) {
	$filedelete = "../images/"."$gallery_photo11_old";
	if (file_exists($filedelete)) {
		echo "$gallery_photo11_old has been deleted.<br />";
		unlink($filedelete);
	}
}
if ($gallery_photo11_delete == 'Delete') { $query="UPDATE sam_gallery SET gallery_photo11='' WHERE gallery_num='$gallery_num'"; mysql_query($query); }

if ($gallery_photo12 != ''){ $query2="UPDATE sam_gallery SET gallery_photo12='".$gallery_photo12."' WHERE gallery_num='$gallery_num'"; mysql_query($query2);}
if ($gallery_photo12_delete == 'Delete' || ($gallery_photo12 != $gallery_photo12_old && $gallery_photo12 != '' && $gallery_photo12_old != '')) {
	$filedelete = "../images/"."$gallery_photo12_old";
	if (file_exists($filedelete)) {
		echo "$cgallery_photo12_old has been deleted.<br />";
		unlink($filedelete);
	}
}
if ($gallery_photo12_delete == 'Delete') { $query="UPDATE sam_gallery SET gallery_photo12='' WHERE gallery_num='$gallery_num'"; mysql_query($query); }

/////////////////////////////////////////////////////////////////////////////////////   
 
for($k=0;$k<1;$k++)
{
	 $e = 'userfile'."$k"; 
	$p[]=$_FILES["$e"]['name'];	

if($p[$k]!=''){

//vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv
//   You may change maxsize, and allowable upload file types.
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
//Mmaximum file size. You may increase or decrease.
$MAX_SIZE = 2000000000;
                            
//Allowable file Mime Types. Add more mime types if you want
$FILE_MIMES = array('image/jpeg','image/jpg','image/gif'
                   ,'image/png','application/msword','application/pdf','video/quicktime','video/mpeg','video/x-msvideo','application/octet-stream'  ,'application/x-shockwave-flash' 	);

//Allowable file ext. names. you may add more extension names.            
$FILE_EXTS  = array('.jpg','.JPG','.GIF','.png','.gif'); 

//Allow file delete? no, if only allow upload only
$DELETABLE  = true;                               


//vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv
//   Do not touch the below if you are not confident.
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
/************************************************************
 *     Setup variables
 ************************************************************/
$site_name = $_SERVER['HTTP_HOST'];
$url_dir = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
$url_this =  "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];

$upload_dir = "../images/";


$upload_url = "http://www.829media.com/projects/samantha/images/";
$message ="";
/************************************************************
 *     Create Upload Directory
 ************************************************************/
if (!is_dir($upload_dir)) {
  if (!mkdir($upload_dir))
  	die ("upload_files directory doesn't exist and creation failed");
  if (!chmod($upload_dir,0755))
  	die ("change permission to 755 failed.");
}


/************************************************************
 *     Process User's Request
 ************************************************************/
if ($_REQUEST[del] && $DELETABLE)  {
  $resource = fopen("log.txt","a");
  fwrite($resource,date("Ymd h:i:s")."DELETE - $_SERVER[REMOTE_ADDR]"."$_REQUEST[del]\n");
  fclose($resource);
  
  if (strpos($_REQUEST[del],"/.")>0);                  //possible hacking
  else if (strpos($_REQUEST[del],$upload_dir) === false); //possible hacking
  else if (substr($_REQUEST[del],0,6)==$upload_dir) {
    unlink($_REQUEST[del]);
	  echo "$message <br>";
  }
}
else if ($_FILES["$e"]) {
  

	$file_type = $_FILES["$e"]['type']; 
  $file_name = $_FILES["$e"]['name'];
  $file_ext = strtolower(substr($file_name,strrpos($file_name,".")));

  //File Size Check
 if ( $_FILES["$e"]['size'] > $MAX_SIZE) {
  $filesize = $_FILES["$e"]['size'];
     $message = "The file size is "."$filesize"." bytes and need to be less than 20K or 20000 bytes";}
   //File Type/Extension Check
  else if (!in_array($file_type, $FILE_MIMES) 
          && !in_array($file_ext, $FILE_EXTS) )
     $message = "Sorry, $file_name($file_type) is not allowed to be uploaded.";
  else
     $message = do_upload($upload_dir, $upload_url,$e);
     echo "$message <br>";
}
else if (!$_FILES["$e"]);
else 
	$message = "Invalid File Specified.";

/************************************************************
 *     List Files
 ************************************************************/
$handle=opendir($upload_dir);
$filelist = "";
while ($file = readdir($handle)) {
   if(!is_dir($file) && !is_link($file)) {
      $filelist .= "<a href='$upload_dir$file'>".$file."</a>";
      if ($DELETABLE)
        $filelist .= " <a href='?del=$upload_dir$file' title='delete'>x</a>";
      $filelist .= "<sub><small><small><font color=grey>  ".date("d-m H:i", filemtime($upload_dir.$file))
                   ."</font></small></small></sub>";
      $filelist .="<br>";
   }
}


}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Samantha's Studio || Administration Panel</title> 
<style type="text/css">
<!--
@import url("includes/ss_style.css");
-->
</style>
</head>
<body>
<table width="900" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="260" id="header"><? include("includes/logo.php"); ?></td>
    <td width="638" valign="bottom"><div align="right">
        <h2><span class="teal">administration</span> panel</h2>
      </div></td>
  </tr>
  <tr>
    <td valign="top"><? include("includes/admin_nav.php"); ?></td>
    <td valign="top" id="content"><h3>Update Jewelry Gallery</h3>
      <p>Home page updated!  <a href="http://www.829media.com/projects/samantha/portraits.php" target="_blank">Click here</a> to view the changes in a new window.</p>
    </td>
  </tr>
  <tr>
    <td colspan="2" class="padding"><? include("includes/admin_footer.php"); ?></td>
  </tr>
</table>
</body>
</html>
