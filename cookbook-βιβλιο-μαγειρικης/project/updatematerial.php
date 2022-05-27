<!DOCTYPE html> <!--Καθορίζει την έκδοση της HTML, Χρησημοποιούμε HTML 5-->
<html>
	<head>
		<title>Βιβλίο Μαγειρικής</title>
		<meta charset='utf-8' /> <!--Για να εμφανίζονται οι ελληνικοί χαρακτήρες-->
		<link rel='stylesheet' type='text/css' href='style.css' /> <!--Σύνδεση με την css-->
	</head>
	<body>
<?php
	$id=$_GET["id"];
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
	$all_rows=mysql_query("SELECT * FROM materials where ID like ".$id."");
	while($row=mysql_fetch_array($all_rows)) 
		{
				$name = $row['name'];
				$quantity = $row['quantity'];
		}
		echo"<div id='center'><br/>
		<form action='updatematerial2.php' method='post'>
		<b>Υλικό</b> <input class='optionstyle' name='inputrecipename'  size='15' value=".$name." />
		<b>Ποσότητα</b> <input class='optionstyle' name='inputrecipequantity' size='4' value=".$quantity." /><br/><br/></div><br/>
		<input type='hidden' name='inputrecipeid' value='".$id."'>
		<input class='optionstyle' type='submit' value='Τροποποίηση'/>
				
		";
?>
	</body>
</html>