<?php



//check we have username post var
if(isset($_POST["username"]))
{
	//check if its ajax request, exit script if its not
	if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
		die();
	}
	
	//try connect to db
	include 'include/connect.php';
	
	//trim and lowercase username
	$username =  strtolower(trim($_POST["username"])); 
	
	//sanitize username
	$username = filter_var($username, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
	
	//check username in db
	$results = mysql_query("SELECT id FROM info WHERE id='$username'");
	
	//return total count
	$username_exist = mysql_num_rows($results); //total records
	
	//if value is more than 0, username is not available
	if($username_exist>=1)
	 {
		die('<img src="imgs/not-available.png" />');
	}
	else
	{
		die('<img src="imgs/available.png" />');
	}
	
	//close db connection
	mysqli_close($connecDB);
}
?>

