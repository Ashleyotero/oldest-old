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
 
$about_num=$_POST['about_num']; 
$about_quote=$_POST['about_quote'];
$about_m_text=$_POST['about_m_text'];  
$about_text1=$_POST['about_text1'];
$about_text2=$_POST['about_text2'];   

$about_m_photo=$_FILES['userfile0']['name'];	
$about_m_photo_old=$_POST['about_m_photo_old'];
$about_m_photo_delete=$_POST['userfile0_delete'];  

$about_photo1=$_FILES['userfile1']['name'];	
$about_photo1_old=$_POST['about_photo1_old'];
$about_photo1_delete=$_POST['userfile1_delete'];  

$about_photo2=$_FILES['userfile2']['name'];	
$about_photo2_old=$_POST['about_photo2_old'];
$about_photo2_delete=$_POST['userfile2_delete'];  

$query="UPDATE sam_about SET
about_quote='".$about_quote."',
about_m_text='".$about_m_text."',
about_text1='".$about_text1."',
about_text2='".$about_text2."'
where about_num='1'"; 
$result = mysql_query($query);

if ($about_m_photo != ''){ $query2="UPDATE sam_about SET about_m_photo='".$about_m_photo."' WHERE index_num='$index_num'"; mysql_query($query2);}
if ($about_m_photo_delete == 'Delete' || ($about_m_photo != $about_m_photo_old && $about_m_photo != '' && $about_m_photo_old != '')) {
	$filedelete = "../images/"."$about_m_photo_old";
	if (file_exists($filedelete)) {
		echo "$about_m_photo_old has been deleted.<br />";
		unlink($filedelete);
	}
}
if ($about_m_photo_delete == 'Delete') { $query="UPDATE sam_about SET about_m_photo='' WHERE index_num='$index_num'"; mysql_query($query); }

if ($about_photo1 != ''){ $query2="UPDATE sam_about SET about_photo1='".$about_photo1."' WHERE index_num='$index_num'"; mysql_query($query2);}
if ($about_photo1_delete == 'Delete' || ($about_photo1 != $about_photo1_old && $about_photo1 != '' && $about_photo1_old != '')) {
	$filedelete = "../images/"."$about_photo1_old";
	if (file_exists($filedelete)) {
		echo "$about_photo1_old has been deleted.<br />";
		unlink($filedelete);
	}
}
if ($about_photo1_delete == 'Delete') { $query="UPDATE sam_about SET about_photo1='' WHERE index_num='$index_num'"; mysql_query($query); }

if ($about_photo2 != ''){ $query2="UPDATE sam_about SET about_photo2='".$about_photo2."' WHERE index_num='$index_num'"; mysql_query($query2);}
if ($about_photo2_delete == 'Delete' || ($about_photo2 != $about_photo2_old && $about_photo2 != '' && $about_photo2_old != '')) {
	$filedelete = "../images/"."$about_photo2_old";
	if (file_exists($filedelete)) {
		echo "$about_photo2_old has been deleted.<br />";
		unlink($filedelete);
	}
}
if ($about_photo2_delete == 'Delete') { $query="UPDATE sam_about SET about_photo2='' WHERE index_num='$index_num'"; mysql_query($query); }

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
    <td valign="top" id="content"><h3>Update About Page</h3>
      <p>Home page updated!  <a href="http://www.829media.com/projects/samantha/about.php" target="_blank">Click here</a> to view the changes in a new window.</p>
    </td>
  </tr>
  <tr>
    <td colspan="2" class="padding"><? include("includes/admin_footer.php"); ?></td>
  </tr>
</table>
</body>
</html>
