<!DOCTYPE html> <!--Καθορίζει την έκδοση της HTML, Χρησημοποιούμε HTML 5-->
<html>
	<head>
		<title>Βιβλίο Μαγειρικής</title>
		<meta charset='utf-8' /> <!--Για να εμφανίζονται οι ελληνικοί χαρακτήρες-->
		<link rel='stylesheet' type='text/css' href='style.css' /> <!--Σύνδεση με την css-->
	</head>
	<body>
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
	$name=$_POST['inputrecipename'];
	$id=$_POST['inputrecipeid'];
	$quantity=$_POST['inputrecipequantity'];
	$all_rows=mysql_query("SELECT * FROM materials WHERE ID LIKE '".$id."'");
	while($row=mysql_fetch_array($all_rows)) 
		{
				$namedb = $row['name'];
				$quantitydb = $row['quantity'];
		}
	$a=mysql_query("UPDATE materials SET name='".$name."', quantity='".$quantity."' WHERE name='".$namedb."' AND quantity='".$quantitydb."'");
	echo ("<div id='center'><br/>");
	if($a)
	{
		echo "<i><b>Η τροποποίηση έγινε με επιτυχία!</i></b>";
	}
	else
	{
		echo "fatal error";
	}
	echo ("<br/><br/></div>");

?>
	</body>
</html>