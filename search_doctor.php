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


<script language="javascript">
var i;
function fill_Cities(i){
var form1 = document.getElementById("form1a");
document.form1aa.polh.options.length=3;
switch(i)
{
case 0:
document.form1aa.polh.options.length=3;
form1.polh.options[0] =new Option('Επιλέξτε...','no');
form1.polh.options[1] =new Option('Αθήνα','ΑΘΗΝΑ');
form1.polh.options[2] =new Option('Θεσσαλονίκη','ΘΕΣΣΑΛΟΝΙΚΗ');

break;
case 1:
delete form1.polh.options[0];
delete form1.polh.options[1];
delete form1.polh.options[2];
document.form1aa.polh.options.length=1;
form1.polh.options[0] =new Option('Αθήνα','ΑΘΗΝΑ');
break;
case 2:
delete form1.polh.options[0];
delete form1.polh.options[1];
delete form1.polh.options[2];
document.form1aa.polh.options.length=1;
form1.polh.options[0] =new Option('Θεσσαλονίκη','ΘΕΣΣΑΛΟΝΙΚΗ');
}
}

function fill_Nomous(i){
var form1 = document.getElementById("form1a");
document.form1aa.nomos.options.length=3;
switch(i)
{
case 0:
document.form1aa.nomos.options.length=3;
form1.nomos.options[0] =new Option('Επιλέξτε...','no');
form1.nomos.options[1] =new Option('Αττικής','ΑΤΤΙΚΗΣ');
form1.nomos.options[2] =new Option('Θεσσαλονίκης','ΘΕΣΣΑΛΟΝΙΚΗΣ');

break;
case 1:
delete form1.nomos.options[0];
delete form1.nomos.options[1];
delete form1.nomos.options[2];
form1.nomos.options[0] =new Option('Αττικής','ΑΤΤΙΚΗΣ');
document.form1aa.nomos.options.length=1;
break;

case 2:
delete form1.nomos.options[0];
delete form1.nomos.options[1];
delete form1.nomos.options[2];
form1.nomos.options[0] =new Option('Θεσσαλονίκης','ΘΕΣΣΑΛΟΝΙΚΗΣ');
document.form1aa.nomos.options.length=1;
}
}
</script>
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
			<li id="eyresh">
			<a href=""><div id="before_velaki_euresh">Εύρεση</div><div id="velaki"><img alt="velaki" src="arrow-down.png" /></div></a>
				<ul>
					<li><a href="./search_doctor.php">Γιατρών</a></li>
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

<div id="search_doctors">
		<div id="p_anazhthsh">Καλώς Ήρθατε στην Αναζήτηση Γιατρών του ΕΟΠΥΥ. Εισάγετε παρακάτω τα πεδία αναζήτησης που σας ενδιαφέρουν!</div>
		<div id="search_doctor_form" >
			<form  name="form1aa"  id="form1a"  method="post" action="search_doctor.php" >
				<fieldset class="fieldset">
					<legend>Αναζήτηση_ιατρού:</legend>
					Νομός:
					<select class="input_search_form" name="nomos" onchange=" fill_Cities (document.form1aa.nomos.selectedIndex);">
                    <option value="no" name="no" selected>Επιλέξτε...</option>
						<option value="ΑΤΤΙΚΗΣ" name="attikhs">Αττικής</option>
                        
						<option value="ΘΕΣΣΑΛΟΝΙΚΗΣ" name="thesallonikhs">Θεσσαλονίκης</option>
					</select>
					Πόλη:
					<select class="input_search_form" name="polh" onchange=" fill_Nomous (document.form1aa.polh.selectedIndex);">
                     <option value="no" name="no" selected>Επιλέξτε...</option>
                    <option value="ΑΘΗΝΑ" name="athina" >Αθήνα</option>
                    <option value="ΘΕΣΣΑΛΟΝΙΚΗ" name="thessalonikh" >Θεσσαλονίκη</option>
						
					</select>
					Ειδικότητα:
					<select class="input_search_form" name="eidikothta">
						<option value="ΠΑΘΟΛΟΓΟΣ" name="pathologos">Παθολόγος</option>
						<option value="ΟΦΘΑΛΜΙΑΤΡΟΣ" name="ofthalmiatros">Οφθαλμίατρος</option>
						<option value="ΟΔΟΝΤΙΑΤΡΟΣ" name="odontiatros">Οδοντίατρος</option>
					</select>
					<br />
					<br />
					<input type="submit" value="Αναζήτηση"><br>
					</fieldset>
					</form>
		</div><!--end of search_doctors_form div-->

		<div id="results_doctors">
			<?php
				include ("./db-api/txt-db-api.php");
				$db = new Database("database_EAM");
				$a=0;
				if( sizeof($_POST) != 0 ){
					
					$nomos = $_POST['nomos'];
					if($nomos!="no"){
					$polh = $_POST['polh'];
					$eidikothta = $_POST['eidikothta'];
				
				
					$result = $db->executeQuery("SELECT onoma,epitheto,nomos,polh,tk,email,eidikothta,dieu8_iatreiou FROM doctor WHERE nomos='$nomos' AND polh='$polh' AND eidikothta = '$eidikothta';");
					if($result->next()){
						$a=1;
						$result = $db->executeQuery("SELECT onoma,epitheto,nomos,polh,tk,email,eidikothta,dieu8_iatreiou FROM doctor WHERE nomos='$nomos' AND polh='$polh' AND eidikothta = '$eidikothta';");
					}
				
					if($a!=0){
						echo '<h3 style="width:200px; margin-left:auto; margin-right:auto;">',"~ΑΠΟΤΕΛΕΣΜΑΤΑ~",'</h3>';
						echo '<table cellpadding="4" cellspacing="0" border="1" style="margin-left:auto; margin-right:auto;">';
						echo '<tr id="result_header_style"><th>Όνομα</th><th>Επίθετο</th><th>Νομός</th><th>Πόλη</th><th>Ταχυδρομικός κώδικας</th><th>email</th><th>Ειδικότητα</th><th>Διεύθυνση ιατρείου</th><th>Εμφάνιση Αναλυτικής Καρτέλας</th></tr>';
						while($result->next()) {
							$a=1;
							//doctor.php?mail=$username
							echo '<tr>';
							list($onoma,$epitheto,$nomos,$polh,$tk,$mail,$eidikothta,$dieu8_iatreiou)=$result->getCurrentValues();
					  
							$output='<a href=doctor_information.php?mail='.$mail.'>Πατήστε εδώ</a>';
							echo '<td>',$onoma,'</td>';
							echo '<td>',$epitheto,'</td>';
							echo '<td>',$nomos,'</td>';
							echo '<td>',$polh,'</td>';
							echo '<td>',$tk,'</td>';
							echo '<td>',$mail,'</td>';
							echo '<td>',$eidikothta,'</td>';
							echo '<td>',$dieu8_iatreiou,'</td>';
							echo '<td>',$output,'</td>';
							echo '</tr>';
						}
						echo '</table><br />';	
					}
					if($a==0){
						echo'<h4 style="text-align:center; color:#F00">',"Δεν υπάρχουν καταχωρημένοι ιατροί στον Νομό: $nomos, Πόλη: $polh και με Ειδικότητα: $eidikothta.",'</h4>';
					}
				}
				else{
					echo '<h3 style="text-align:center; color:#F00">',"Δεν υπάρχουν αποτελέσματα προς το παρόν. Επιλέξτε τις τιμές που επιθυμείτε στα ανωτέρω πεδία και πατήστε 'Αναζήτηση'.",'</h3>';	
				}
				}
			?>
		</div> <!--end of results_doctors div-->
	</div><!--end of search_doctors div -->
	
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
