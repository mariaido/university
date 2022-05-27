<!DOCTYPE html> <!--Καθορίζει την έκδοση της HTML, Χρησημοποιούμε HTML 5-->
<html>
	<head>
		<title>Βιβλίο Μαγειρικής</title>
		<meta charset='utf-8' /> <!--Για να εμφανίζονται οι ελληνικοί χαρακτήρες-->
		<link rel='stylesheet' type='text/css' href='style.css' /> <!--Σύνδεση με την css-->
	</head>
	<body><div id="index">
		<form action='searchcategory.php' method='post'> <!--φόρμα για εισαγωγή των στοιχείων-->
		Κατηγορία για αναζήτηση: <select class="optionstyle"class="optionstyle" name='recipeCategory'> <!--αντικείμενο τύπου λίστας select-->
							<option class="optionstyle" value='0'>Ορεκτικά</option>
							<option class="optionstyle" value='1'>Ζυμαρικά</option>
							<option class="optionstyle" value='2'>Θαλασσινά</option>
							<option class="optionstyle" value='3'>Κρέας</option>
							<option class="optionstyle" value='4'>Λαχανικά</option>
							<option class="optionstyle" value='5'>Σούπες</option>
							<option class="optionstyle" value='6'>Γλυκά</option>
							<option class="optionstyle" value='7'>Νηστίσιμα</option>
							</select>
		<input class="optionstyle" type='submit' value='Αναζήτηση'/>
		</form></div>
		<hr /> 
		<h1>Επιλέξτε διαθέσιμα προϊόντα για αναζήτηση:</h1>
		

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
	$all_rows=mysql_query("SELECT * FROM materials"); //εμφανιζει ολα τα στοιχεια της συνταγης
	if (!$all_rows) 
	{ // add this check.
		die('Invalid query: ' . mysql_error());
	}
	$i =0;
	while($row=mysql_fetch_array($all_rows)) 
	{ 
		$material[$i]=$row["name"];
		$materialid[$i]=$row["ID"];
		$i=$i+1;
	}
	
	echo "<form action='searchrecipequantity.php' method='POST'>";
	echo "<table>";
	for($j=0;$j<$i;$j++)
	{
	echo"
		<tr><td>".$material[$j]."</td><td><input type='text' class='optionstyle' name='inputmaterial".$j."' size='10' value='0' /></td></tr>
		<input type='hidden' name='id".$j."' value='".$materialid[$j]."'>
	";
	
	}
	echo "</table>";
	echo"<br/>
	<input type='hidden' name='i' value='".$i."'>
	
	<input class='optionstyle' type='submit' value='Submit'>
	</form>";
?>
	</body>
</html>