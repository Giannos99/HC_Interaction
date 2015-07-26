<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>ΕΟΠΥΥ - Λάθος εισαγωγή στοιχείων</title>
<link rel="stylesheet" type="text/css" href="main.css" />
<link rel="shortcut icon" href="favicon.png" type="image/png" />
</head>

<body>


<div id="container">

<div id="header">
<!-- div for logo-->
	<div id="logo">
	<div id="image_logo">
		<a href="index.php">
		<img   alt="Λογότυπο ΕΟΠΥΥ" src="logo_eopyy.png"/>
		</a>
		</div>
		<div id="p_logo">Εθνικός Οργανισμός Παροχής Υπηρεσιών Υγείας</div>
	</div>



<!--div for login-->
	<div id="login">
	<fieldset class="fieldset">
			<legend class="legend">
			Σύνδεση Χρήστη:</legend>
		<form method="post" action="login.php">
			<br />
			<div class="field_names">
			Όνομα χρήστη:<br />
			Κωδικός:
			</div>
			<div>
			<input class="input" type="text" name="name" autocomplete="off"><br />
			<input class="input" type="password" name="password" autocomplete="off"><br />
			<input class="submit" type="submit" value="Σύνδεση">
			</div>
		</form>
		</fieldset>
		<span>ή <a href="create_account.php">Εγγραφείτε</a> αν δεν έχετε λογαριασμό.</span>
	</div>
</div>
<!--div for menu-->
	<div id="navigation">
		<ul>
			<li id="arxikh">
			<a  href="index.php">Αρχική</a>
			</li>
			<li id="eyresh">
			<a href=""><div id="before_velaki_euresh">Εύρεση</div><div id="velaki"><img alt="velaki" src="arrow-down.png" /></div></a>
				<ul>
					<li><a href="search_doctor.php">Γιατρών</a></li>
					<li><a href="#">Νοσοκομείων/Κλινικών</a></li>
				</ul>
			</li>
			<li id="peri_ton_eopyy">
			<a href=""><div id="before_velaki_eopyy">Περί τον ΕΟΠΥΥ</div><div id="velaki"><img alt="velaki" src="arrow-down.png" /></div></a>
				<ul>
					<li><a href="#">Γενικές Πληροφορίες</a></li>
					<li><a href="website_services.php">Υπηρεσίες Ιστοτόπου</a></li>
				</ul>
			</li>
			<li id="anakoinwseis">
			<a href="#">Ανακοινώσεις</a>
			</li>
		</ul>
	</div>

<!--<div id="path">Μονοπάτι: <span id="path_final_link">Αρχική</span></div>-->

<!--div for sign_up-->
	<div id="sfalma">
    <?php
include ("./db-api/txt-db-api.php"); 
 $db = new Database("database_EAM");
$a=0;
$sign_up = $_POST['sign_up'];
$username = $_POST['username'];
$password = $_POST['password'];
$ar_taut = $_POST['ar_taut'];
$onoma = $_POST['onoma'];
$epitheto = $_POST['epitheto'];
$nomos = $_POST['nomos'];
$polh = $_POST['polh'];
$dieu8unsh = $_POST['dieu8unsh'];
$tk = $_POST['tk'];
$mail = $_POST['eMail'];
$space='\n';
if($sign_up=='doctor'){
	$ar_ad = $_POST['arithmos_adeias'];
	$eidikothta = $_POST['eidikothta'];
	$dieu8_iatreiou = $_POST['dieu8_iatreiou'];
	//$dieu8_iatreiou=$dieu8_iatreio.$space;
	if (preg_match("/^[a-zA-Z0-9\s,.'-\pL]+$/u", $dieu8_iatreiou)) {
   		 # valid name
	} else {
    	echo " Δώσατε λάθος αριθμό αδείας. \n<br>";
		$a=1;
	}
	if (preg_match("/^[a-zA-Z\s,.'-\pL]+$/u", $eidikothta)) {
   		 # valid name
	} else {
    	echo " Δώσατε λάθος ειδικότητα. \n<br>";
		$a=1;
	}
	if (preg_match("/^[a-zA-Z 0-9\s,.'-\pL]+$/u", $dieu8_iatreiou)) {
   		 # valid name
	} else {
    	echo " Δώσατε λάθος διεύθυνση ιατρείου. \n<br>";
		$a=1;
	}
}else
{	
	//$mm=$mail;
	//$mail=$mm.$space;
}
$oroi_xrhshs = $_POST['oroi_xrhshs'];
$oroi_xrhshs1 = $_POST['oroi_xrhshs1'];
$regex = "/^[a-zA-Z\s,.'-\pL]+$/u";
$regex1 ="/^[a-zA-Z 0-9\s,.'-\pL]+$/u";
$regex2 = "/^[a-zA-Z0-9_\s,.'-\pL]+$/u";

if (preg_match($regex2, $username)) {
    # valid name
} else {
    echo " Δώσατε λάθος username. \n<br>";
	$a=1;
}
if (preg_match("/^[a-zA-Z\s,.'-\pL]+$/u", $onoma)) {
    # valid name
} else {
    echo " Δώσατε λάθος όνομα. \n<br>";
	$a=1;
}

if (preg_match($regex, $epitheto)) {
    # valid name
} else {
    echo " Δώσατε λάθος επίθετο.\n<br>";
	$a=1;
}
if (preg_match("/^[a-zA-Z0-9\s,.'-\pL]+$/u", $ar_taut)) {
    # valid name
} else {
    echo " Δώσατε λάθος ΑΜΚΑ. \n<br>";
	$a=1;
}
if (preg_match($regex, $nomos)) {
    # valid name
} else {
    echo " Δώσατε λάθος Νομό. \n<br>";
	$a=1;
}
if (preg_match($regex, $polh)) {
    
} else {
    echo " Δώσατε λάθος πόλη. \n<br>";
	$a=1;
}
if (preg_match($regex1, $dieu8unsh)) {
    # valid name
} else {
    echo " Δώσατε λάθος διεύθυνση. \n<br>";
	$a=1;
}
if (is_numeric ($tk)) 
 {
 } else {
 echo " Δώσατε λάθος ταχυδρομικό κώδικα.\n<br>";
 $a=1;
 }
if($oroi_xrhshs!=NULL AND $oroi_xrhshs1!=NULL AND $sign_up=='user' AND $a!=1){

	$resultset=$db->executeQuery("INSERT INTO user  VALUES ('".$username."','".$password."','".$ar_taut."','".$onoma."','".$epitheto."','".$nomos."','".$polh."','".$dieu8unsh."','".$tk."','".$mail."') ");
}
if($oroi_xrhshs!=NULL AND $oroi_xrhshs1!=NULL AND $sign_up=='doctor' AND $a!=1){
	/*$resultset1=$db->executeQuery("SELECT COUNT(*) FROM doctor");
	(username, password, ar_taut, onoma, epitheto, nomos, polh, dieu8unsh, tk,email)
	(username, password, ar_taut, onoma, epitheto, nomos, polh, dieu8unsh, tk,email, eidikothta, dieu8_iatreiou) 
	printf("resultset1= %d ",$resultset1);*/
	$resultset=$db->executeQuery("INSERT INTO doctor VALUES ('".$username."','".$password."','".$ar_taut."','".$onoma."','".$epitheto."','".$nomos."','".$polh."','".$dieu8unsh."','".$tk."','".$mail."','".$ar_ad."','".$eidikothta."','".$dieu8_iatreiou."') ");
}
if($oroi_xrhshs==NULL || $oroi_xrhshs1==NULL){
	printf("Δεν έχετε συμφωνήσει με τους όρους χρήσης\n");
	$a=1;
}
if($a!=1){
	echo "<br/><br/><br/>DOCTORS<br/>";
	$rs=$db->executeQuery("SELECT * FROM doctor;");
	//get all rows

	while($rs->next())
	{
	//read next line
	list($username,$password,$ar_taut,$onoma,$epitheto,$nomos,$polh,$dieu8unsh,$tk,$mail,$ar_ad,$eidikothta,$dieu8_iatreiou)=$rs->getCurrentValues();
	//do whatever you wish...
	echo "$username | $password | $ar_taut | $onoma | $epitheto | $nomos | $polh | $dieu8unsh | $tk | $mail | $ar_ad | $eidikothta | DIEU8UNSH= $dieu8_iatreiou<br/>";
	/*echo "$nr. $name $prename (age $age) has address $address<br/>";*/
	}
	echo "<br/><br/><br/>USERS<br/>";
	$rs=$db->executeQuery("SELECT * FROM user;");
	//get all rows

	while($rs->next())
	{
	//read next line
	list($username,$password,$ar_taut,$onoma,$epitheto,$nomos,$polh,$dieu8unsh,$tk,$mail)=$rs->getCurrentValues();
	//do whatever you wish...
	echo "$username | $password | $ar_taut | $onoma | $epitheto | $nomos | $polh | $dieu8unsh | $tk | $mail <br/>";
	/*echo "$nr. $name $prename (age $age) has address $address<br/>";*/
	}
}/* if(a!=1)*/
?>
<br />
<a href="create_account.php">Επιστροφή στην εγγραφή χρήστη</a>
    
	</div>
<!--footer-->
	<div id="footer">
		<a  href="#"
		<span id="subfooterleft">Όροι Χρήσης</span>
		</a>
		<a  href="#"
		<span id="subfooterleft">Γραφεία ΕΟΠΥΥ</span>
		</a>
		<a  href="#"
		<span id="subfooterleft">Συχνές Ερωτήσεις</span>
		</a>
		<span id="subfooterright"> Copyright &copy; 2013 Π. Σπύρου, Ι. Κουτουλάκης, Χ. Κροτσέτης</span>
	</div>
</div>
</body>
</html>
