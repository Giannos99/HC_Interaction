<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	session_start();		
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript">
// validates that the field value string has one or more characters in it

function validate(){
if (document.getElementById('oroi_xrhshs').checked){
         
}else{
alert("Δεν δεχτήκατε τους όρους χρήσης");
return false;
}
if (document.getElementById('oroi_xrhshs1').checked){
         
}else{
alert("Δεν δεχτήκατε ότι έγινε ορθή συμπλήρωση στοιχείων");
return false;
}
}

function isNotEmpty(elem) {
  var str = elem.value;
    var re = /.+/;
    if(!str.match(re)) {
        alert("Please fill in the required field.");
        setTimeout("focusElement('" + elem.form.name + "', '" + elem.name + "')", 0);
        return false;
    } else {
        return true;
    }
}
//validates that the entry is a positive or negative number
function isNumber(elem) {
  var str = elem.value;
    var re = /^[-]?\d*\.?\d*$/;
    str = str.toString();
    if (!str.match(re)) {
        alert("Enter only numbers into the field.");
        setTimeout("focusElement('" + elem.form.name + "', '" + elem.name + "')", 0);
        return false;
    }
    return true;
}
// validates that the entry is 16 characters long
function isLen16(elem) {
  var str = elem.value;
    var re = /\b.{5}\b/;
    if (!str.match(re)) {
        alert("Entry does not contain the required 5 characters.");
        setTimeout("focusElement('" + elem.form.name + "', '" + elem.name + "')", 0);
        return false;
    } else {
        return true;
    }
}
// validates that the entry is formatted as an e-mail address
function isEMailAddr(elem) {
  var str = elem.value;
    var re = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
    if (!str.match(re)) {
        alert("Verify the e-mail address format.");
        setTimeout("focusElement('" + elem.form.name + "', '" + elem.name + "')", 0);
        return false;
    } else {
        return true;
    }
}
// validate that the user made a selection other than default
function isChosen(select) {
    if (select.selectedIndex == 0) {
        alert("Please make a choice from the list.");
        return false;
    } else {
        return true;
    }
}

// validate that the user has checked one of the radio buttons
function isValidRadio(radio) {
    var valid = false;
    for (var i = 0; i < radio.length; i++) {
        if (radio[i].checked) {
            return true;
        }
    }
    alert("Make a choice from the radio buttons.");
    return false;
}

function focusElement(formName, elemName) {
    var elem = document.forms[formName].elements[elemName];
    elem.focus();
    elem.select();
}

	function enableFields()
	{
		document.forms[1].arithmos_adeias.disabled=false;
		document.forms[1].eidikothta.disabled=false;
		document.forms[1].dieu8_iatreiou.disabled=false;
	}
	
	function disableFields()
	{
		document.forms[1].arithmos_adeias.disabled=true;
		document.forms[1].eidikothta.disabled=true;
		document.forms[1].dieu8_iatreiou.disabled=true;
	}

	function displaytooltip(){}

// batch validation router
function validateForm(form) {
    if (isNotEmpty(form.name1)) {
        if (isNotEmpty(form.name2)) {
            if (isNotEmpty(form.eMail)) {
                if (isEMailAddr(form.eMail)) {
                    if (isChosen(form.continent)) {
                        if (isValidRadio(form.accept)) {
                            return true;
                        }
                    }
                }
            }
        }
    }
    return false;
}

</script>
<title>ΕΟΠΥΥ - Δημιουργία Λογαριασμού</title>
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

<!--div for sign_up-->
	<div id="sign_up">
		<p>Καλώς Ήρθατε στην Εγγραφή Χρήστη! Συμπληρώστε τα στοιχεία σας στη παρακάτω φόρμα για γίνετε ενεργό μέλος του δικτυακού μας τόπου.</p>
		<form method="post" action="insert_user-doctor.php" onsubmit="return validate();">
			<fieldset class="fieldset">
				<legend class="legend">Εγγραφή Νέου Χρήστη:</legend>
				
				<h3>Στοιχεία Λογαριασμού:</h3>
				<table class="table" width="50%" border="0">
  					<tr>
      					<td width="50%">Εγραφείτε ως: </td>
      					<td><select name="sign_up" autocomplete="off" onmouseover="displaytooltip()">
						<option value="user" name="user" selected="selected" onclick="disableFields()">Απλός Χρήστης</option>
						<option value="doctor" name="doctor" onclick="javascript:enableFields()">Ιατρός</option>
						</select></td>
    				</tr>
    				<tr>
      					<td width="50%">Username: </td>
      					<td><input class="input_table" type="username" size="30" name="username" onchange="if (isNotEmpty(this)) {isLen16(this)}" /><span style="color:#F00; font-size:13px">*</span></td>
    				</tr>
    				<tr>
      					<td width="50%">Password: </td>
     					<td><input class="input_table" type="password" size="30" name="password" onchange="if (isNotEmpty(this)) {isNumber(this)}"/><span style="color:#F00; font-size:13px">*</span></td>
    				</tr>
    				<tr>
      					<td>Αριθμός Μητρώου Κοινωνικής Ασφάλισης: </td>
      					<td><input class="input_table" type="text" size="30" name="ar_taut" /><span style="color:#F00; font-size:13px">*</span></td>
    				</tr>
				</table>
				
				<h3>Προσωπικά Στοιχεία:</h3>
				<table class="table" width="50%" border="0">
					<tr>
						<td width="50%">Όνομα: </td>
      					<td><input class="input_table" type="text" size="30"  name="onoma" onchange="if (isNotEmpty(this)) {isLen16(this)}" /><span style="color:#F00; font-size:13px">*</span></td>
    				</tr>
					<tr>
     					<td width="50%">Επώνυμο: </td>
      					<td><input class="input_table" type="text" size="30"  name="epitheto" onchange="if (isNotEmpty(this)) {isLen16(this)}" /><span style="color:#F00; font-size:13px">*</span></td>
    				</tr>
					<tr>
      					<td width="50%">Νομός:</td>
      					<td><input class="input_table" type="text" size="30" name="nomos" /></td>
    				</tr>
					<tr>
      					<td width="50%">Πόλη: </td>
      					<td><input class="input_table" type="text" size="30" name="polh" /></td>
    				</tr>
					<tr>
      					<td width="50%">Διεύθυνση: </td>
      					<td><input class="input_table" type="text" size="30" name="dieu8unsh" /></td>
    				</tr>
					<tr>
      					<td width="50%">Ταχυδρομικός κώδικας: </td>
      					<td><input class="input_table" type="number" size="10" name="tk" /></td>
    				</tr>
					<tr>
						<td width="50%">E-mail Address:  </td>
						<td><input class="input_table" type="email" size="10" name="eMail" onchange="if (isNotEmpty(this)) {isEMailAddr(this)}" /></td>
					</tr>
				</table>
				
				<div>
					<h3>Στοιχεία Ιατρού:</h3>
					<table class="table" width="50%" border="0">
						<tr>
							<td width="50%">Αριθμός Αδείας: </td>
							<td><input class="input_table" type="text" size="30" name="arithmos_adeias" disabled="disabled" /><span style="color:#F00; font-size:13px">*</span></td>
						</tr>
						<tr>
							<td width="50%">Ειδικότητα: </td>
							<td><input class="input_table" type="text" size="30" name="eidikothta" disabled="disabled" /><span style="color:#F00; font-size:13px">*</span></td>
						</tr>
						<tr>
							<td width="50%">Διεύθυνση ιατρείου: </td>
							<td><input class="input_table" type="text" size="30" name="dieu8_iatreiou" disabled="disabled" /></td>
						</tr>
						<tr>
							<td width="50%" colspan="2"><input type="checkbox" id="oroi_xrhshs" name="oroi_xrhshs" value="oroi" />Συμφωνώ και καταλαβαίνω τους <a href="#">όρους χρήσης.</a></td>
						</tr>
						
						<tr>
							<td width="50%" colspan="2"><input type="checkbox" id="oroi_xrhshs1" name="oroi_xrhshs1" value="oroi1" />Δηλώνω ότι τα παραπάνω στοιχεία είναι ακριβή και πραγματικά.</a></td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" value="Εγγραφή" /></td>
						<tr>
					  </table>
				</div>
			</fieldset>
		</form>
	</div>
	
	<form  name="registrationForm"  action="./javascript-formValidated.html" method="get" onSubmit="return validateForm(document.forms[0]);">
</form>
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
