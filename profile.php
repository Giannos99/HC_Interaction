<?php
	session_start();		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ΕΟΠΥΥ - Προφίλ Χρήστη</title>
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
	<div id="logout">
	<p>Welcome <?php $nm=$_SESSION["uname"]; echo "$nm"; ?></p>
	<a href="./profile.php">προφίλ</a>
    <a href="./logout.php">Logout</a>
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
					<li><a href="#">Γιατρών</a></li>
					<li><a href="#">Νοσοκομείων/Κλινικών</a></li>
				</ul>
			</li>
			<li id="peri_ton_eopyy">
			<a href=""><div id="before_velaki_eopyy">Περί τον ΕΟΠΥΥ</div><div id="velaki"><img alt="velaki" src="arrow-down.png" /></div></a>
				<ul>
					<li><a href="#">Γενικές Πληροφορίες</a></li>
					<li><a href="#">Υπηρεσίες Ιστοτόπου</a></li>
				</ul>
			</li>
			<li id="anakoinwseis">
			<a href="#">Ανακοινώσεις</a>
			</li>
		</ul>
	</div>

<!--<div id="path">Μονοπάτι: <span id="path_final_link">Αρχική</span></div>-->

<!--div for quick search-->
	<div id="profile_menu">
		<table id="profile_menu_table" cellspacing="0" cellpadding="2">
			<tr>
				<td id="selected">Προφίλ</td>
			</tr>
			<tr>
				<td><a href="#">Ιστορικό Περιήγησης</a></td>
			</tr>
			<tr>
				<td><a href="#">Κλεισμένα Ραντεβού-Ακύρωση Ραντεβού</a></td>
			</tr>
			<tr >
				<td><a href="#">Αξιολόγηση Γιατρών</a></td>
			</tr>
			<tr>
				<td><a href="#">Εξελιγμένη Αναζήτηση Γιατρών και Νοσοκομείων</a></td>
			</tr>
			<tr>
				<td><a href="#">Hλεκτρονική διάγνωση</a></td>
			</tr>
		</table>
		<div>
		</div>
	</div>

<!--div for main page-->
	<div id="main_page">
		<div id="path">Είστε εδώ: <span>"User Name" </span> > <span id="path_final_link"> "Προφίλ"</span></div>
		<hr />
		<p id="profil">
						Τελευταία επίσκεψη: <br>
						Ημερομηνία Δημιουργίας προφίλ: <br>
						Όνομα: <br> <!-- me session ursn kai pss kai oti allo xreiazete-->
						Επώνυμο: <br>
		</p>
		<p> <a  href="#"
		<span id="subfooterleft">Επεξεργασία προφίλ</span><p>
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
