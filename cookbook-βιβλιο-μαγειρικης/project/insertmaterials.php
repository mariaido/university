<!DOCTYPE html> <!--Καθορίζει την έκδοση της HTML, Χρησημοποιούμε HTML 5-->
<html>
	<head>
		<title>Βιβλίο Μαγειρικής</title>
		<meta charset='utf-8' /> <!--Για να εμφανίζονται οι ελληνικοί χαρακτήρες-->
		<link rel='stylesheet' type='text/css' href='style.css' /> <!--Σύνδεση με την css-->
	</head>
	<body>
	<h1 id='par3'>Παρακαλώ εισάγετε ένα υλικό</h1>
	<div id="index"></br>
	<form action='submitmaterial.php' method='post'> <!--φόρμα για εισαγωγή των στοιχείων-->
		Όνομα <input class='optionstyle' size='15' name='inputname' /> <!--αντικείμενο τύπου input-->
		Ποσότητα <input class='optionstyle' size='4' name='inputquantity'/> <!--αντικείμενο τύπου input-->
		Μονάδα μέτρησης <select class='optionstyle'class='optionstyle' name='measurementunit'> <!--αντικείμενο τύπου λίστας select-->
							<option class='optionstyle' value='0'>Τεμάχια</option>
							<option class='optionstyle' value='1'>Γραμμάρια</option>
						</select><br/><br/></div>
		
	<br/><input class='optionstyle' type='submit' value='Εισαγωγή'/> <!--κουμπί για καταχώρηση-->
	</form>
	</body>
</html>