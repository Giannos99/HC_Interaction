<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	session_start();		
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ΕΟΠΥΥ - Υπηρεσίες Ιστοτόπου</title>
<link rel="stylesheet" type="text/css" href="main.css" />
<link rel="shortcut icon" href="favicon.png" type="image/png" />
<style type="text/css">

.AccordionTitle, .AccordionContent, .AccordionContainer
{
  position:relative;
  width:700px;
  
}

.AccordionTitle
{
  height:20px;
  overflow:hidden;
  cursor:pointer;
  font-family:Arial;
  font-size:12pt;
  font-weight:bold;
  vertical-align:middle;
  text-align:center;
  background-repeat:repeat-x;
  display:table-cell;
  background-color: #999;
  -moz-user-select:none;
 
	border-style: ridge;
	border-width:1px;
	border-color: #999;/* #633;*/
	border-radius:0px 0px 0px 0px;
	box-shadow: 0px -2px 4px  #FF3300;

}

.AccordionContent
{
	position:relative;
	margin-left:15px;
	width:685px;
  height:0px;
  overflow:auto;
  display:none; 
}

.AccordionContainer
{
 box-shadow: 0px 2px 10px  #003399;
	
  margin-top:40px;
}


</style>
<script >
var ContentHeight = 150;
var TimeToSlide = 250.0;

var openAccordion = '';

function runAccordion(index)
{
  var nID = "Accordion" + index + "Content";
  if(openAccordion == nID)
    nID = '';
    
  setTimeout("animate(" + new Date().getTime() + "," + TimeToSlide + ",'" 
      + openAccordion + "','" + nID + "')", 33);
  
  openAccordion = nID;
}

function animate(lastTick, timeLeft, closingId, openingId)
{  
  var curTick = new Date().getTime();
  var elapsedTicks = curTick - lastTick;
  
  var opening = (openingId == '') ? null : document.getElementById(openingId);
  var closing = (closingId == '') ? null : document.getElementById(closingId);
 
  if(timeLeft <= elapsedTicks)
  {
    if(opening != null)
      opening.style.height = ContentHeight + 'px';
    
    if(closing != null)
    {
      closing.style.display = 'none';
      closing.style.height = '0px';
    }
    return;
  }
 
  timeLeft -= elapsedTicks;
  var newClosedHeight = Math.round((timeLeft/TimeToSlide) * ContentHeight);

  if(opening != null)
  {
    if(opening.style.display != 'block')
      opening.style.display = 'block';
    opening.style.height = (ContentHeight - newClosedHeight) + 'px';
  }
  
  if(closing != null)
    closing.style.height = newClosedHeight + 'px';

  setTimeout("animate(" + curTick + "," + timeLeft + ",'" 
      + closingId + "','" + openingId + "')", 33);
}

</script>
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

		
	<table align=center border=1>	
		<div id="website_services" style="height:500px;">
		<div id="path">Είστε εδώ: "Αρχική" > "Περί τον ΕΟΠΥΥ" > <span id="path_final_link">"Γενικές Πληροφορίες"</span></div>
		<hr />
		<div><p style="font-size:16px;">Εδώ θα βρείτε γενικές πληροφορίες για τον ΕΟΠΥΥ! Πατήστε κάποια από τις ερωτήσεις παρακάτω και θα εμφανιστoύν οι αντίστοιχες πληροφορίες:</p></div>
	<div align=center id="basic-accordian" ><!--Parent of the Accordion-->
		<div id="AccordionContainer" class="AccordionContainer" style="text-align:left">
		
		  <div onclick="runAccordion(1);" >
			<div class="AccordionTitle" onselectstart="return false;">
			   Τί είναι ο ΕΟΠΥΥ και ποιούς αφορά;
			</div>
		  </div>
		  <div id="Accordion1Content" class="AccordionContent" >
			<p>ΕΟΠΥΥ Είναι ο Εθνικός Οργανισμός Παροχής Υπηρεσιών Υγείας, με φιλοδοξία να επαναφέρει τον ασφαλισμένο στο επίκεντρο των υπηρεσιών υγείας. </p>
			
			<p>Αφορά τους ασφαλισμένους των ταμείων ΙΚΑ-ΕΤΑΜ, ΟΑΕΕ, ΟΠΑΔ/ΤΥΔΚΥ, ΟΓΑ και τα μέλη των οικογενειών τους που έχουν ασφαλιστική κάλυψη. Πιο αναλυτικά οι δικαιούχοι αναφέρονται στο Άρθρο 3 του ΦΕΚ 2456 3/11/2011 του Ενιαίου Κανονισμού Παροχών Υγείας (ΕΚΠΥ).</p>
			</div>
		<br/>
<!--		  <div onclick="runAccordion(2);">
			<div class="AccordionTitle" onselectstart="return false;">
			  Πως μπορώ να βρώ τον ιατρό και το νοσοκομείο που επιθυμώ;
			</div>
		  </div>
		  <div id="Accordion2Content" class="AccordionContent">
				<p>Στον χρήστη δίνετε η δυνατότητα μέσω αυτού του ιστοτόπου να αναζητήσει άμεσα τον γιατρό ή το νοσοκομείο που επιθυμεί. <br />
				α)Εάν γνωρίζω ήδη τον γιατρό ή το νοσοκομείο:
					Στην αρχική σελίδα ο χρήστης μπορεί συμπληρώνοντας την φόρμα αναζήτησης να ενημερωθεί σχετικά.<br />
				β)Εάν δέν γνωρίζω τον γιατρό ή το νοσοκομείο αλλά ψάχνω με βάση την ειδικότητα-περιοχή:
					Για εκτενέστερη αναζήτηση γιατρών και νοσοκομείων ο χρήστης μπορεί να μεταβεί στον σύνδεσμο
					Εύρεση->Γιατρών αναζητώντας κάποιον γιατρό μιας συγκεκριμένης ειδικότητας και στην περιοχή που ο ίδιος επιθυμεί 
					ή Εύρεση->Νοσοκομείων/κλινικών στον Νομό που επιθυμεί καθώς επίσης να ενημερωθεί για επιπλέον πληροφορίες.</p>
		  </div>
		<br/>
		
		  <div onclick="runAccordion(3);">
			<div class="AccordionTitle" onselectstart="return false;">
			  Πως γίνομαι μέλος
			</div>
		  </div>
		  <div id="Accordion3Content" class="AccordionContent">
			<p>Εάν κάποιος χρήστης επιθυμεί να γίνει μέλος αυτού του ιστοτόπου, τότε μπορεί να μεταβεί εδώ.
			Εναλλακτικά μπορεί στο πάνω δξιά μέρος της σελίδας να πατήσει τον σύνδεσμο εγγραφείτε.
			Πριν την εγγραφή σας στο σύστημα παρακαλούμε διαβάστε και ενημερωθείται σχετικά με το τί είναι ο ΕΟΠΥΥ και ποιους αφορά!</p>
		  </div>
			<br/>
-->
		  <div onclick="runAccordion(2);">
			<div class="AccordionTitle" onselectstart="return false;">
			  Με ποια κριτήρια συμβάλλεται κάποιος γιατρός με τον ΕΟΠΥΥ;
			</div>
		  </div>
		  <div id="Accordion2Content" class="AccordionContent">
			<p> Για να συμβληθεί ένας ιατρός με τον ΕΟΠΥΥ θα πρέπει να είχε ενεργή σύμβαση με τον ΟΑΕΕ και τον ΟΠΑΔ μέχρι 31/12/11 
			σύμφωνα με την πράξη νομοθετικού περιεχομένου 262/16-12-11. Η συγκεκριμένη διάταξη αφορά στο μεταβατικό στάδιο λειτουργίας του Οργανισμού. </p>
			<p>Οι συμβεβλημένοι γιατροί του ΕΟΠΥΥ δεν δικαιούνται καμία επιπλέον αμοιβή από τους δικαιούχους, για τους πρώτους 50 ασθενείς που εξετάζουν κάθε εβδομάδα και για τους 200 του μήνα.  
			Επιπλέον αν κάποιος γιατρός δεν συμπληρώσει τις 50 επισκέψεις την εβδομάδα, μεταφέρεται το υπόλοιπό του την επόμενη εβδομάδα, 
			με ανώτατο όριο τις 200 επισκέψεις το μήνα. </p>
		  </div>
		  <br/>
		  <div onclick="runAccordion(3);">
			<div class="AccordionTitle" onselectstart="return false;">
			  Πώς κλείνω ραντεβού σε γιατρό του ΕΟΠΥΥ; Ποιά είναι τα αντίστοιχα τηλέφωνα;
			</div>
		  </div>
		  <div id="Accordion3Content" class="AccordionContent">
			<p>  Ραντεβού στον ΕΟΠΥΥ μπορείτε να κλείσετε τηλεφωνικά μέσω των αριθμών:<br />
				<span style="display:list-item; list-style-type:none">14554 (από VODAFONE & ΣΤΑΘΕΡΑ: 0,98€/κλήση, ΚΙΝΗΤΑ 1,86€/κλήση - τιμές με ΦΠΑ)</span>
				<span style="display:list-item; list-style-type:none">14784 (από ΣΤΑΘΕΡΑ: 1,07€/κλήση, ΚΙΝΗΤΑ 1,18€/λεπτό - τιμές με ΦΠΑ),</span>
				<span style="display:list-item; list-style-type:none">14884 (από ΣΤΑΘΕΡΑ: 0,99€/κλήση, ΚΙΝΗΤΑ 1,18€/λεπτό - τιμές με ΦΠΑ),</span>
				<span style="display:list-item; list-style-type:none">14900 (από ΣΤΑΘΕΡΑ: 1,08€/κλήση, ΚΙΝΗΤΑ 1,18€/λεπτό - τιμές με ΦΠΑ)</span>
				[για τις δομές του Ε.Ο.Π.Υ.Υ. (πρώην ΙΚΑ)]
				Α)Με απ’ απευθείας τηλεφωνική συνεννόηση με τον συμβεβλημένο γιατρό. 
				Θα ενημερώνομαι υποχρεωτικά από αυτόν εκ των προτέρων για το εάν θα υπάρχει οικονομική επιβάρυνση (εάν έχει συμπληρώσει το πλαφόν ή πότε μπορεί να με δεχθεί).

				Β) Σε σχηματισμούς του ΕΣΥ: 1535
				   Για ραντεβού με τα συμβεβλημένα διαγνωστικά εργαστήρια και συμβεβλημένους ιατρούς, ο δικαιούχος επικοινωνεί απ’ ευθείας με τα εργαστήρια ή τους συμβεβλημένους ιατρούς αντίστοιχα. </p>
				   
			<p >Γ) Μπορείτε να κλείσετε και ηλεκτρονικά τα ραντεβού σας μεσω της ιστοσελίδας του ΕΟΠΥΥ για το συμβεβλημένο γιατρό που ενδιαφέρεστε, 
				τις ώρες που επιθυμείτε και χωρίς καμια χρέωση! Για να χρησιμοποιήσετε αυτή τη δυνατότητα απαιτείται να εχετε λογαριασμο χρηστη. 
				Πατήστε εδω για να κάνετε την εγγραφή σας άμεσα!</p>
		  </div>
		  <br/>
		  
		  <div onclick="runAccordion(4);">
			<div class="AccordionTitle" onselectstart="return false;">
			  Από ποιούς παρέχονται οι υπηρεσίες του ΕΟΠΥΥ;
			</div>
		  </div>
		  <div id="Accordion4Content" class="AccordionContent">
				<p>Οι Ιατρικές Υπηρεσίες του ΕΟΠΥΥ, αρχίζουν θεωρητικά από την 1η Ιανουαρίου 2012 και θα παρέχονται στήν Ελλάδα από 4 τομείς:
				<span style="display:list-item; list-style-type:none">(α) Κρατικά Νοσοκομεία του ΕΣΥ. Λίστα στό διαδίκτυο:[3] και http://www.yyka.gov.gr/</span>
				<span style="display:list-item; list-style-type:none">(β) Κέντρα Υγείας του ΕΣΥ. Λίστα στό διαδίκτυο: http://www.yyka.gov.gr/</span>
				<span style="display:list-item; list-style-type:none">(γ) Κέντρα Υγείας Αστικού Τύπου (τέως Ιατρεία ΙΚΑ). Λίστα στό διαδίκτυο:http://www.ika.gr/gr/infopages/healthservices/184_step2.cfm?cl_districtid=1</span>
				<span style="display:list-item; list-style-type:none">(δ) Συμβεβλημένοι Ελευθεροεπαγγελματίες Ιατροί με τον ΕΟΠΥΥ. Η Λίστα είναι εδώ [4]</span>
				<span style="display:list-item; list-style-type:none">(ε) Μή Συμβεβλημένοι Ελευθεροεπαγγελματίες Ιατροί (με χρέωση ασθενούς)</span>
	
				Οι δικαιούχοι εξυπηρετούνται από:

				- Συμβεβλημένους ιδιώτες γιατρούς http://www.eopyy.gov.gr/MedSupplier/Index
				- Μη συμβεβλημένους αλλά πιστοποιημένους για συνταγογράφηση γιατρούς (μόνο για συνταγογράφηση φαρμάκων-εξετάσεων)
				- Πολυϊατρεία και ιατρεία του Οργανισμού (Μονάδες Υγείας πρώην ΙΚΑ-ΕΤΑΜ)
				- Κέντρα Υγείας, Περιφερειακά και Αγροτικά Ιατρεία
				- Εξωτερικά ιατρεία των Νοσοκομείων του ΕΣΥ
			</p>
		  </div>
		<br/>
		  
	</div>

</div>
	
	</div>
	
	</table>
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
