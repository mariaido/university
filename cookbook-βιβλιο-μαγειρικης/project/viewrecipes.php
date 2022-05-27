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
	
	echo ("<h1 id='par2'>Παρακαλώ επιλέξτε μια συνταγή</h1>
		<ul id='list2'> <!--Ορίζει μια μη αριθμημένη λιστα, <li> για εισαγωγή στοιχείου στη λίστα-->");
			
	$key=0;
	$key=mysql_query("SELECT * FROM recipes order by recipeTime ASC");
	echo ("<table><tr><td><b><u>Όνομα</u></b></td><td><b><u>Κατηγορία</u></b></td><td><b><u>Χρόνος Εκτέλεσης</u></b></td></tr>");
		while($row=mysql_fetch_array($key)) 
		{
			$recipeID = $row['ID'];
			$recipeName = $row['recipeName'];
			$recipeCategory = $row['recipeCategory'];
			$recipeTime = $row['recipeTime'];
			switch ($recipeCategory)
			{
				case 0:
					$Category=(" Ορεκτικά");
					break;
				case 1:
					$Category= (" Ζυμαρικά");
					break;
				case 2:
					$Category=(" Θαλασσινά");
					break;
				case 3:
					$Category= (" Κρέας");
					break;
				case 4:
					$Category= (" Λαχανικά");
					break;
				case 5:
					$Category= (" Σούπες");
					break;
				case 6:
					$Category= (" Γλυκά");
					break;
				case 7:
					$Category= (" Νηστίσιμα");
					break;
			}
		
			echo ("<tr><td><a href='openrecipe.php?id=".$recipeID."/style.css'>".$recipeName."</a></td><td>".$Category."</td><td> ".$recipeTime." </td></tr>");
			
			
		}
	echo ("</table>");
	?>
	</body>
</html>

