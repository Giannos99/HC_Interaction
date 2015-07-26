<?php
	session_start();		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ΕΟΠΥΥ - Αρχική Σελίδα</title>
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
     <?php 
	 if (!isset($_SESSION["uname"]))
		{
		?>
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
		<span>ή <a href="create_account.php
">Εγγραφείτε</a> αν δεν έχετε λογαριασμό.</span>
	</div>
    <?php }
	if (isset($_SESSION["uname"])){
		$nm=$_SESSION["uname"];
		echo "$nm";
		?>
		<a href="./profile.php">προφίλ</a>
        <a href="./logout.php">Logout</a>
        <?php
	}
	?>
     <?php 
		
		
		if(sizeof($_GET) != 0 ){
			
			$er1=$_GET['er'] ;
			
			echo "$er1";
		}
		
		?>
</div>
<!--div for menu-->
	<div id="navigation">
		<ul>
			<li id="arxikh">
			<a  href="index.php">Αρχική</a>
			</li>
<!--			<li id="eyresh_giatrwn">
			<a href="#">Εύρεση Γιατρών</a>
				<ul>
					<li><a href="#">submenu item 3</a></li>
					<li><a href="#">submenu item 4</a></li>
				</ul>
			</li>
			<li id="eyresh_nosokomeiwn">
			<a href="#">Εύρεση Νοσοκομείων/Κλινικών</a>
				<ul>
					<li><a href="#">submenu item 5</a></li>
					<li><a href="#">submenu item 6</a></li>
				</ul>
			</li>
-->
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
					<li><a href="general_information.php">Υπηρεσίες Ιστοτόπου</a></li>
				</ul>
			</li>
			<li id="anakoinwseis">
			<a href="#">Ανακοινώσεις</a>
			</li>
		</ul>
	</div>

<!--<div id="path">Μονοπάτι: <span id="path_final_link">Αρχική</span></div>-->

<!--div for quick search-->
	<div id="quick_search">
		<div>
			<fieldset class="fieldset">
			<legend class="legend">
			Αναζητήστε γρήγορα πληροφορίες για κάποιο γιατρό που ήδη γνωρίζετε:</legend>
			<form method="post" action="#">
			<br />
			<div class="field_names">
			Επώνυμο Γιατρού:<br />
			Όνομα Γιατρού:
			</div>
			<div>
			<input class="input" type="text" name="epitheto" autocomplete="off"><br />
			<input class="input" type="text" name="name" autocomplete="off"><br />
			<input class="submit" type="submit" value="Αναζήτηση">
			</div>
		</form>
		</fieldset>
		</div>
		<br /><br />
		<div>
			<fieldset class="fieldset">
			<legend class="legend">
			Αναζητήστε γρήγορα πληροφορίες για κάποιο συγκεκριμένο νοσοκομείο που επιθυμείτε:</legend>
			<form method="post" action="#">
			<br />
			<div class="field_names">
			Όνομα Νοσοκομείου:<br />
			Πόλη:
			</div>
			<div>
			 <input class="input" type="text" name="name" autocomplete="off"><br />
			<input class="input" type="text" name="polh" autocomplete="off"><br />
			<input class="submit" type="submit" value="Αναζήτηση" autocomplete="off">
			</div>
		</form>
		</fieldset>
		</div>
	</div>

<!--div for main page-->
	<div id="main_page">
		<div id="path">Είστε εδώ: <span id="path_final_link">"Αρχική"</span></div>
		<hr />
		<p id="welcome">Καλώς ήρθατε στη σελίδα του ΕΟΠΥΥ!
		<img src="happy-patient-kid.png" alt="happy kid" style="float:right" /></p>
		<p >Ο ΕΟΠΥΥ προέκυψε από τη συνένωση των περισσότερων και μεγαλύτερων ασφαλιστικών ταμείων στην Ελλάδα: ΙΚΑ, ΟΓΑ, ΟΑΕΕ, ΟΠΑΔ, ΤΥΔΚΥ, ΤΑΥΤΕΚΩ, ΕΤΑΑ, ΕΤΑΠ-ΜΜΕ και Οίκος Ναύτου.</p><p> Αποτελεί το νέο ενιαίο σύστημα με φιλοδοξία να επαναφέρει τον ασφαλισμένο στο επίκεντρο των υπηρεσιών υγείας και με σκοπό την απόλυτη ισοτιμία μεταξύ όλων των ασφαλισμένων!</p>
		<p id="main_page_thlefwna" style="float:right"><a href="#">Σημείωση: Ο ιστότοπος του ΕΟΠΥΥ έχει αναβαθμιστεί. Δείτε εδώ τις επιπλέον δυνατότητες που σας παρέχονται πλέον μέσω της εγγραφής σας στον ιστότοπο.</p>
		</p>
	</div>
	
<!--div for right side
	<div id="right_side">
		se auto to div tha mpei to right side
	</div>
-->
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
