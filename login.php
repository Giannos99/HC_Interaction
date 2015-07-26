<?php
	
include ("./db-api/txt-db-api.php"); 
$db = new Database("database_EAM");



$a=0;
$username = $_POST['name'];
$password = $_POST['password'];
$er1="&nbsp &nbsp <font color=red>Invalid username/password</font>";
$redirect = "./index.php?er=$er1";

$rs=$db->executeQuery("SELECT * FROM user;");
	//get all rows

while($rs->next())
{
	//read next line
	list($usernam,$passwor)=$rs->getCurrentValues();
	//do whatever you wish...
	if($username==$usernam && $a!=2){
		$a=55;/*exei username apo thn vash user*/
		
		if($password==$passwor){
			$a=2;/*vrhkame ton xrhsth*/
			
			session_start();
			/*if (!isset($_SESSION['count'])) {
 			 	$_SESSION['count'] = 0;
			} else {
  				$_SESSION['count']++;
			}*/
			unset($_SESSION["login_message"]);
			$_SESSION["isLoggedIn"]=1; 
			$_SESSION["uname"]=$username;
			$_SESSION["type"]="user"; 
			$redirect = "./profile.php?name=$username";
			/*EDW MESA KANEI TO SESSION*/
		}
}
	/*echo "$nr. $name $prename (age $age) has address $address<br/>";*/
	}
$rs=$db->executeQuery("SELECT * FROM doctor;");
	//get all rows
if($a!=2){
	
	while($rs->next())
	{
		//read next line
		list($usernam,$passwor)=$rs->getCurrentValues();
		//do whatever you wish...
		if($username==$usernam && $a!=2 && $a!=4){
		
			if($a==55){
				$a=88;/*exei username user kai doctor*/
			}else{
				$a=101;/*exei username doctor mono*/
			}
			if($password==$passwor){
				$a=4;/*vrhkame ton xrhsth*/
				session_start();
				/*if (!isset($_SESSION['count'])) {
 			 		$_SESSION['count'] = 0;
				} else {
  					$_SESSION['count']++;
				}*/
				unset($_SESSION["login_message"]);
				$_SESSION["isLoggedIn"]=1;
				$_SESSION["type"]="doctor"; 
				$_SESSION["uname"]=$username;
				$redirect = "./profile.php?name=$username";/*den uparxei auto*/
				$_SESSION["logged_user"] = $username;
				/*EDW MESA KANEI TO SESSION*/
			}/*if($password==$passwor){*/
		}/*if($username==$usernam && $a!=2 && $a!=4){*/
		/*echo "$nr. $name $prename (age $age) has address $address<br/>";*/
	}/*while($rs->next())*/
}
	if(($a==55 || $a==88 || $a=101 || $a==0) && $a!=2 && $a!=4){ $_SESSION["login_message"] = "Λάθος username ή και password ";
	}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta HTTP-EQUIV="REFRESH" content="0; url=<?php echo $redirect;?>" />
<title>edit_profile.php</title>
</head>

<body>

</body>
</html>