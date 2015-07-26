<?php
	session_start();		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ΕΟΠΥΥ - Υπηρεσίες Ιστοτόπου</title>
<link rel="stylesheet" type="text/css" href="main.css" />
<link rel="shortcut icon" href="favicon.png" type="image/png" />
<script src="/js/more-show-hide.js" type="text/javascript"></script>
</head>

<body>


<div id="container" >

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
					<li><a href="general_information.php">Υπηρεσίες Ιστοτόπου</a></li>
				</ul>
			</li>
			<li id="anakoinwseis">
			<a href="#">Ανακοινώσεις</a>
			</li>
		</ul>
	</div>



<!--div for main page-->
<div id="doctor_information_main">
		<?php
			include ("./db-api/txt-db-api.php"); 
			$db = new Database("database_EAM");
			
			$e_mail = $_GET['mail'];
			
			$result = $db->executeQuery("SELECT onoma,epitheto,nomos,polh,tk,email,eidikothta,dieu8_iatreiou FROM doctor WHERE email='$e_mail';");
			$result->next();
			list($onoma,$epitheto,$nomos,$polh,$tk,$mail,$eidikothta,$dieu8_iatreiou)=$result->getCurrentValues();
			echo'<div id="doctor_details">
					<p id="p_doctor_details">Παρακάτω εμφανίζονται τα στοιχεία του γιατρού:<br/> κ. '.$epitheto.' '.$onoma.'</p><hr/>
					<table id="table_details" border="1" cellspacing="0" bordercolor="#666666">
						<tr>
						 <th id="result_header_style" colspan="2">Στοιχεία Ιατρού</th>
						 </tr>
						<tr>
						<td>Όνομα</td>
						<td>',$onoma,'</td>
						</tr>
						<tr>
						<td>Επίθετο</td>
						<td>',$epitheto,'</td>
						</tr>
						<tr>
						<td>Νομός</td>
						<td>',$nomos,'</td>
						</tr>
						<tr>
						<td>Πόλη</td>
						<td>',$polh,'</td>
						</tr>
						<tr>
						<td>Ταχυδρομικός κώδικας</td>
						<td>',$tk,'</td>
						</tr>
						<tr>
						<td>email</td>
						<td>',$mail,'</td>
						</tr>
						<tr>
						<td>Ειδικότητα</td>
						<td>',$eidikothta,'</td>
						</tr>
						<tr>
						<td>Διεύθυνση ιατρείου</td>
						<td>',$dieu8_iatreiou,'</td>
						</tr>
					</table><hr>
					<table>
					<table>
					<tr>
						<td><img src="services_medical.png" style="float:right"/></td>
						<td><a href="#">Κλείσιμο ραντεβού ηλεκτρονικά</a><br/><i style="font-size:16px">(Μόνο για εγγεγραμμένους χρήστες</i>)</td>
					<tr>
					<tr>
						<td>Αξιολόγηση:</td>
						<td><img src="5-star-rating.png"> <img src="5-star-rating.png"> <img src="5-star-rating.png"> <img src="5-star-rating.png"> <img src="5-star-rating.png"> (5/5 - από 4 χρήστες)</td>
					<tr>
					</table>
				</div>';
			
			switch($dieu8_iatreiou) {
				
				case "ΘΗΒΩΝ 99":
					echo'
						<div id="doctor_map">
						<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=%CE%98%CE%97%CE%92%CE%A9%CE%9D+99,+%CE%91%CE%98%CE%97%CE%9D%CE%91&amp;aq=&amp;sll=37.968561,23.719139&amp;sspn=0.137765,0.336113&amp;ie=UTF8&amp;hq=&amp;hnear=Thivon+99,+Pireas,+Greece&amp;t=m&amp;z=14&amp;ll=37.96171,23.656922&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=%CE%98%CE%97%CE%92%CE%A9%CE%9D+99,+%CE%91%CE%98%CE%97%CE%9D%CE%91&amp;aq=&amp;sll=37.968561,23.719139&amp;sspn=0.137765,0.336113&amp;ie=UTF8&amp;hq=&amp;hnear=Thivon+99,+Pireas,+Greece&amp;t=m&amp;z=14&amp;ll=37.96171,23.656922" style="color:#0000FF;text-align:left">View Larger Map</a></small>
			</div>';
					break;
				case "ΔΑΜΑΣΚΟΥ 34":
					echo'
						<div id="doctor_map">
				<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=%CE%88%CE%B2%CF%81%CE%BF%CF%85+19,+%CE%98%CE%B5%CF%83%CF%83%CE%B1%CE%BB%CE%BF%CE%BD%CE%AF%CE%BA%CE%B7,+%CE%95%CE%BB%CE%BB%CE%AC%CE%B4%CE%B1&amp;aq=&amp;sll=40.644303,22.947278&amp;sspn=0.008287,0.021007&amp;ie=UTF8&amp;hq=&amp;hnear=Evrou,+Thessaloniki,+Greece&amp;t=m&amp;z=14&amp;ll=40.644303,22.947278&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=%CE%88%CE%B2%CF%81%CE%BF%CF%85+19,+%CE%98%CE%B5%CF%83%CF%83%CE%B1%CE%BB%CE%BF%CE%BD%CE%AF%CE%BA%CE%B7,+%CE%95%CE%BB%CE%BB%CE%AC%CE%B4%CE%B1&amp;aq=&amp;sll=40.644303,22.947278&amp;sspn=0.008287,0.021007&amp;ie=UTF8&amp;hq=&amp;hnear=Evrou,+Thessaloniki,+Greece&amp;t=m&amp;z=14&amp;ll=40.644303,22.947278" style="color:#0000FF;text-align:left">View Larger Map</a></small>
				</div>';
					break;
				case "ΔΕΡΒΕΝΙΩΝ 50":
					echo'
						<div id="doctor_map">
					<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=%CE%94%CE%B5%CF%81%CE%B2%CE%B5%CE%BD%CE%AF%CF%89%CE%BD+50,+%CE%91%CE%B8%CE%AE%CE%BD%CE%B1,+%CE%9A%CE%B5%CE%BD%CF%84%CF%81%CE%B9%CE%BA%CF%8C%CF%82+%CE%A4%CE%BF%CE%BC%CE%AD%CE%B1%CF%82+%CE%91%CE%B8%CE%B7%CE%BD%CF%8E%CE%BD,+%CE%95%CE%BB%CE%BB%CE%AC%CE%B4%CE%B1&amp;aq=0&amp;oq=%CE%94%CE%95%CE%A1%CE%92%CE%95%CE%9D%CE%99%CE%A9%CE%9D+50&amp;sll=40.644303,22.947278&amp;sspn=0.008287,0.021007&amp;ie=UTF8&amp;hq=&amp;hnear=Dervenion+50,+Athina,+Kentrikos+Tomeas+Athinon,+Greece&amp;t=m&amp;z=14&amp;ll=37.986432,23.736448&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=%CE%94%CE%B5%CF%81%CE%B2%CE%B5%CE%BD%CE%AF%CF%89%CE%BD+50,+%CE%91%CE%B8%CE%AE%CE%BD%CE%B1,+%CE%9A%CE%B5%CE%BD%CF%84%CF%81%CE%B9%CE%BA%CF%8C%CF%82+%CE%A4%CE%BF%CE%BC%CE%AD%CE%B1%CF%82+%CE%91%CE%B8%CE%B7%CE%BD%CF%8E%CE%BD,+%CE%95%CE%BB%CE%BB%CE%AC%CE%B4%CE%B1&amp;aq=0&amp;oq=%CE%94%CE%95%CE%A1%CE%92%CE%95%CE%9D%CE%99%CE%A9%CE%9D+50&amp;sll=40.644303,22.947278&amp;sspn=0.008287,0.021007&amp;ie=UTF8&amp;hq=&amp;hnear=Dervenion+50,+Athina,+Kentrikos+Tomeas+Athinon,+Greece&amp;t=m&amp;z=14&amp;ll=37.986432,23.736448" style="color:#0000FF;text-align:left">View Larger Map</a></small>
					</div>';
					break;
				
				case "ΛΑΜΠΡΟΥ ΚΑΤΣΩΝΗ 6":
					echo'
						<div id="doctor_map">
					<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=%CE%9B%CE%AC%CE%BC%CF%80%CF%81%CE%BF%CF%85+%CE%9A%CE%B1%CF%84%CF%83%CF%8E%CE%BD%CE%B7+6,+%CE%91%CE%B8%CE%AE%CE%BD%CE%B1,+%CE%9A%CE%B5%CE%BD%CF%84%CF%81%CE%B9%CE%BA%CF%8C%CF%82+%CE%A4%CE%BF%CE%BC%CE%AD%CE%B1%CF%82+%CE%91%CE%B8%CE%B7%CE%BD%CF%8E%CE%BD,+%CE%95%CE%BB%CE%BB%CE%AC%CE%B4%CE%B1&amp;aq=0&amp;oq=%CE%9B%CE%91%CE%9C%CE%A0%CE%A1%CE%9F%CE%A5+%CE%9A%CE%91%CE%A4%CE%A3%CE%A9%CE%9D%CE%97+6&amp;sll=37.986432,23.736448&amp;sspn=0.008608,0.021007&amp;ie=UTF8&amp;hq=&amp;hnear=Lamprou+Katsoni+6,+Athina,+Kentrikos+Tomeas+Athinon,+Greece&amp;ll=37.986439,23.736455&amp;spn=0.008608,0.021007&amp;t=m&amp;z=14&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=%CE%9B%CE%AC%CE%BC%CF%80%CF%81%CE%BF%CF%85+%CE%9A%CE%B1%CF%84%CF%83%CF%8E%CE%BD%CE%B7+6,+%CE%91%CE%B8%CE%AE%CE%BD%CE%B1,+%CE%9A%CE%B5%CE%BD%CF%84%CF%81%CE%B9%CE%BA%CF%8C%CF%82+%CE%A4%CE%BF%CE%BC%CE%AD%CE%B1%CF%82+%CE%91%CE%B8%CE%B7%CE%BD%CF%8E%CE%BD,+%CE%95%CE%BB%CE%BB%CE%AC%CE%B4%CE%B1&amp;aq=0&amp;oq=%CE%9B%CE%91%CE%9C%CE%A0%CE%A1%CE%9F%CE%A5+%CE%9A%CE%91%CE%A4%CE%A3%CE%A9%CE%9D%CE%97+6&amp;sll=37.986432,23.736448&amp;sspn=0.008608,0.021007&amp;ie=UTF8&amp;hq=&amp;hnear=Lamprou+Katsoni+6,+Athina,+Kentrikos+Tomeas+Athinon,+Greece&amp;ll=37.986439,23.736455&amp;spn=0.008608,0.021007&amp;t=m&amp;z=14" style="color:#0000FF;text-align:left">View Larger Map</a></small>
					</div>';
					break;
					
				case "ΠΑΝΑΓΙΑΣ ΣΟΥΜΕΛΑ 20":
					echo'
						<div id="doctor_map">
					<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=%CE%A0%CE%B1%CE%BD%CE%B1%CE%B3%CE%AF%CE%B1%CF%82+%CE%A3%CE%BF%CF%85%CE%BC%CE%B5%CE%BB%CE%AC+20,+%CE%A0%CE%B1%CF%8D%CE%BB%CE%BF%CF%82+%CE%9C%CE%B5%CE%BB%CE%AC%CF%82,+%CE%98%CE%B5%CF%83%CF%83%CE%B1%CE%BB%CE%BF%CE%BD%CE%AF%CE%BA%CE%B7,+%CE%95%CE%BB%CE%BB%CE%AC%CE%B4%CE%B1&amp;aq=0&amp;oq=%CE%A0%CE%91%CE%9D%CE%91%CE%93%CE%99%CE%91%CE%A3+%CE%A3%CE%9F%CE%A5%CE%9C%CE%95%CE%9B%CE%91+20&amp;sll=40.668221,22.94368&amp;sspn=0.008284,0.021007&amp;ie=UTF8&amp;hq=&amp;hnear=Panagias+Soumela+20,+Pavlos+Melas,+Thessaloniki,+Greece&amp;ll=40.668221,22.94368&amp;spn=0.008284,0.021007&amp;t=m&amp;z=14&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=%CE%A0%CE%B1%CE%BD%CE%B1%CE%B3%CE%AF%CE%B1%CF%82+%CE%A3%CE%BF%CF%85%CE%BC%CE%B5%CE%BB%CE%AC+20,+%CE%A0%CE%B1%CF%8D%CE%BB%CE%BF%CF%82+%CE%9C%CE%B5%CE%BB%CE%AC%CF%82,+%CE%98%CE%B5%CF%83%CF%83%CE%B1%CE%BB%CE%BF%CE%BD%CE%AF%CE%BA%CE%B7,+%CE%95%CE%BB%CE%BB%CE%AC%CE%B4%CE%B1&amp;aq=0&amp;oq=%CE%A0%CE%91%CE%9D%CE%91%CE%93%CE%99%CE%91%CE%A3+%CE%A3%CE%9F%CE%A5%CE%9C%CE%95%CE%9B%CE%91+20&amp;sll=40.668221,22.94368&amp;sspn=0.008284,0.021007&amp;ie=UTF8&amp;hq=&amp;hnear=Panagias+Soumela+20,+Pavlos+Melas,+Thessaloniki,+Greece&amp;ll=40.668221,22.94368&amp;spn=0.008284,0.021007&amp;t=m&amp;z=14" style="color:#0000FF;text-align:left">View Larger Map</a></small>
					</div>';
					break;
				default:
					break;
			}
		?>
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
