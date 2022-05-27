<!DOCTYPE html> <!--Καθορίζει την έκδοση της HTML, Χρησημοποιούμε HTML 5-->
<html>
	<head>
		<title>Βιβλίο Μαγειρικής</title>
		<meta charset='utf-8' /> <!--Για να εμφανίζονται οι ελληνικοί χαρακτήρες-->
		<link rel='stylesheet' type='text/css' href='style.css' /> <!--Σύνδεση με την css-->
	</head>
	<body>
	<h1>Αυτά είναι τα υλικά τα οποία είναι αποθηκευμένα στη βάση δεδομένων</h1>
	<table align='center'><tr><td><b><u>Ποσότητα</u></b></td><td><b><u>Μονάδα Μέτρησης</u></b></td><td><b><u>Όνομα</u></b></td></tr>
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
		$all_rows=mysql_query("SELECT * FROM materials");
		while($row=mysql_fetch_array($all_rows)) 
		{ 
			echo "<tr><td>".$row["quantity"]."</td><td>";
			if($row["measurementUnit"] == 0)
			{
				echo "Τεμάχια</td>";
			}
			else
			{
				echo "Γραμμάρια</td>";
			}
			echo "<td>".$row["name"]."</td><td><a href='./updatematerial.php?id=".$row["ID"]."'><img src='images/pencil.png' width='30px' height='30px'></a></td></tr>";
			
			//echo $row[0]." ".$row[1]."<br />";
		}
		echo "</table>";
?>
	</body>
</html>