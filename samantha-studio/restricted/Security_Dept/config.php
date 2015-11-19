<?
 
//set up the names of the database and table
 
$db_name ="ansia_sam";
$table_name ="sam_authorize";

$server = "localhost";
$dbusername = "ansia_admin";
$dbpassword = "Apple1234";
//set redirect target if login is unsuccessful
$login_error = "http://www.829media.com/projects/samantha/restricted/";

//set redirect target if login is successful
$login_success = "http://www.829media.com/projects/samantha/restricted/index2.php";

//domain information
$domain = "http://www.829media.com/projects/samantha/";

//Change to "0" to turn off the login log
$log_login = "1";

//base_dir is the location of the files, ie http://www.yourdomain/login
$base_dir = "http://www.829media.com/projects/samantha/";

//length of time the cookie is good for - 7 is the days and 24 is the hours
//if you would like the time to be short, say 1 hour, change to 60*60*1
$duration = time()+(60*60*2);

//the site administrator's email address
$adminemail = "chun.jin.ling@gmail.com";

//sets the time to EST
$zone=3600*-7;
?>
