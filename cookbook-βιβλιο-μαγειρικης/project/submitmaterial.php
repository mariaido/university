<!DOCTYPE html> <!--Καθορίζει την έκδοση της HTML, Χρησημοποιούμε HTML 5-->
<html>
	<head>
		<title>Βιβλίο Μαγειρικής</title>
		<meta charset='utf-8' /> <!--Για να εμφανίζονται οι ελληνικοί χαρακτήρες-->
		<link rel='stylesheet' type='text/css' href='style.css' /> <!--Σύνδεση με την css-->
	</head>
	<body>
	<?php
	$name=$_POST['inputname']; //Παίρνει το inputname μέσω της post και το καταχωρει στην μεταβλητή $name
	$measurementunit=$_POST['measurementunit']; //Παίρνει το measurementunit μέσω της post και το καταχωρει στην μεταβλητή $measurementunit
	$quantity=$_POST['inputquantity']; //Παίρνει το inputquantity μέσω της post και το καταχωρει στην μεταβλητή $quantity
	echo ("<div id='index'>");
	echo ("Έχετε εισάγει το Υλικό: <b>".$name."</b> με Μονάδα μέτρησης: <b>");
	if($measurementunit == 0) //measurementunit έχει τιμές 0 = μονάδες, 1 = γραμμάρια
	{
		echo "Τεμάχια</b>";
	}
	else
	{
		echo "Γραμμάρια</b>";
	}
	echo ("</div><br/>");
	
	
	$link=mysql_connect("localhost", "root", ""); //σύνδεση με τη βάση δεδομένων
	if(!$link) //αν αποτύχει η σύνδεση μύνημα σφάλαμτος
	{
		die("Could not connect to host");
	}
	$seldb=mysql_select_db("2931_3748"); //σύνδεση με τη βάση δεδομένων
	if(!$seldb) //αν αποτύχει η σύνδεση μύνημα σφάλαμτος
	{
		die("Could not connect to database");
	}
	mysql_query("SET NAMES 'utf8'"); //ελληνικοί χαρακτήρες
	mysql_query("SET CHARACTER SET 'utf8'"); //ελληνικοί χαρακτήρες
	
	mysql_query("INSERT INTO materials (name, measurementUnit, quantity) VALUES ('".$name."', '".$measurementunit."', '".$quantity."')"); 
	//εισαγωγή των μεταβλητών στο πίνακα materials
	?>
	<form action="insertmaterials.php">
		<input class='optionstyle' type="submit" value="Επιστροφή" />
	</form>
	</body>
</html>

