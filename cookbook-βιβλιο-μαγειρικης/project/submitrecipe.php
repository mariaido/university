<!DOCTYPE html> <!--Καθορίζει την έκδοση της HTML, Χρησημοποιούμε HTML 5-->
<html>
	<head>
		<title>Βιβλίο Μαγειρικής</title>
		<meta charset='utf-8' /> <!--Για να εμφανίζονται οι ελληνικοί χαρακτήρες-->
		<link rel='stylesheet' type='text/css' href='style.css' /> <!--Σύνδεση με την css-->
	</head>
	<body><div id="center"><br/>
	<?php
	
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
	
	$recipeNamedb=mysql_query("SELECT recipeName FROM recipes");
	$recipeName=$_POST['inputrecipename']; //Παίρνει το inputname μέσω της post και το καταχωρει στην μεταβλητή $recipeName
	$recipeCategory=$_POST['recipeCategory'];
	$recipeTime=$_POST['recipeTime'];
	$quantity1=$_POST['inputquantity1']; //Παίρνει το measurementunit μέσω της post και το καταχωρει στην μεταβλητή $quantity1
	$material1=$_POST['inputmaterial1']; //Παίρνει το inputquantity μέσω της post και το καταχωρει στην μεταβλητή $quantity
	$quantity2=$_POST['inputquantity2'];
	$material2=$_POST['inputmaterial2'];	
	$quantity3=$_POST['inputquantity3']; 
	$material3=$_POST['inputmaterial3']; 
	$quantity4=$_POST['inputquantity4']; 
	$material4=$_POST['inputmaterial4']; 
	$quantity5=$_POST['inputquantity5'];
	$material5=$_POST['inputmaterial5']; 
	$quantity6=$_POST['inputquantity6']; 
	$material6=$_POST['inputmaterial6']; 
	$quantity7=$_POST['inputquantity7']; 
	$material7=$_POST['inputmaterial7']; 
	$quantity8=$_POST['inputquantity8']; 
	$material8=$_POST['inputmaterial8']; 
	$quantity9=$_POST['inputquantity9']; 
	$material9=$_POST['inputmaterial9'];
	$quantity10=$_POST['inputquantity10'];
	$material10=$_POST['inputmaterial10']; 
	$quantity11=$_POST['inputquantity11']; 
	$material11=$_POST['inputmaterial11']; 
	$quantity12=$_POST['inputquantity12']; 
	$material12=$_POST['inputmaterial12']; 
	$quantity13=$_POST['inputquantity13']; 
	$material13=$_POST['inputmaterial13']; 
	$quantity14=$_POST['inputquantity14']; 
	$material14=$_POST['inputmaterial14']; 
	$quantity15=$_POST['inputquantity15']; 
	$material15=$_POST['inputmaterial15']; 
	$directions=$_POST['inputdirections']; //Παίρνει το inputdirections μέσω της post και το καταχωρει στην μεταβλητή $directions
	
	$key=0;
	while($row=mysql_fetch_array($recipeNamedb)) 
	{
		$recipeNamedb1 = $row["recipeName"];
			if($recipeName == $recipeNamedb1)
		{
			$key=1;
			exit("Υπάρχει συνταγή με αυτό το όνομα, παρακαλώ προσπαθήστε ξανά!");
		}
	}
	if($recipeName != NULL && $recipeTime != NULL && $quantity1 != NULL && $material1 != NULL)
	{
		mysql_query("INSERT INTO recipes (recipeName, recipeCategory, recipeTime, quantity1, material1, quantity2, material2, quantity3, material3, quantity4, material4, quantity5, material5, quantity6, material6, quantity7, material7, quantity8, material8, quantity9, material9, quantity10, material10, quantity11, material11,quantity12,material12,quantity13,material13,quantity14,material14,quantity15,material15,directions) VALUES ('".$recipeName."', '".$recipeCategory."', '".$recipeTime."','".$quantity1."','".$material1."','".$quantity2."','".$material2."','".$quantity3."','".$material3."','".$quantity4."','".$material4."','".$quantity5."','".$material5."','".$quantity6."','".$material6."','".$quantity7."','".$material7."','".$quantity8."','".$material8."','".$quantity9."','".$material9."','".$quantity10."','".$material10."','".$quantity11."','".$material11."','".$quantity12."','".$material12."','".$quantity13."','".$material13."','".$quantity14."','".$material14."','".$quantity15."','".$material15."','".$directions."')");//εισαγωγή των μεταβλητών στον πίνακα recipes
		echo("<b><i>Η συνταγή αποθηκεύτηκε με επιτυχια!</i></b>");
	}
	else
	{
		echo("Σφάλμα! Προσπαθήστε ξανά.");
	}
	
	?>
	<br/><br/></div>
	<form action='registerrecipe.php' method='post'>
	<br/><input class='optionstyle' type='submit' value='Επιστροφή' />
	</body>
</html>

