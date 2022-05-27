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
		if(!$link) //αν αποτύχει η σύνδεση μήνυμα σφάλματος
		{
			die("Could not connect to host");
		}
		$seldb=mysql_select_db("2931_3748"); //σύνδεση με τη βάση δεδομένων
		if(!$seldb) //αν αποτύχει η σύνδεση μύνημα σφάλματος
		{
			die("Could not connect to database");
		}
		mysql_query("SET NAMES 'utf8'"); //ελληνικοί χαρακτήρες
		mysql_query("SET CHARACTER SET 'utf8'"); //ελληνικοί χαρακτήρες
		
		
		$username=$_POST['username']; //Παίρνει το username μέσω της post και το καταχωρει στην μεταβλητή $username
		$password=$_POST['password']; //Παίρνει το password μέσω της post και το καταχωρει στην μεταβλητή $password
		$usernamedb=mysql_query("SELECT username FROM users WHERE username LIKE '".$username."'",$link);
		$passworddb=mysql_query("SELECT password FROM users WHERE username LIKE '".$username."'",$link);
		$usernamedb1=NULL;
		$passworddb1=NULL;
		while($row=mysql_fetch_array($usernamedb)) 
		{
			$usernamedb1 = $row["username"];
		}
		while($row=mysql_fetch_array($passworddb)) 
		{
			$passworddb1 = $row["password"];
		}
		if(($username != $usernamedb1 or $password != $passworddb1) or ($username != $usernamedb1 and $password != $passworddb1))
		{
			echo("<div id='center'><br/>Λάθος συνδιασμός username/password<br/></br></div>");
		}
		else
		{
			echo("
			<h1 id='header1'>Καλως ήρθατε <span id='username'> ".$username." </span>στο βιβλίο μαγειρικής</h1><br/><br/>
			<div id='home'></br>
			<a href='registerrecipe.php' id='l1'>Εισαγωγή νέας συνταγής</a></br>
			<a href='searchrecipe.php' id='l1'>Αναζήτηση συνταγής</a></br>
			<a href='viewrecipes.php' id='l1'>Προβολή των συνταγών</a></br>
			<a href='insertmaterials.php' id='l1'>Εισαγωγή υλικού</a></br>
			<a href='viewmaterials.php' id='l1'>Προβολή υλικών</a></br></br>
		</div>
			");
		}
		?>
	</body>
</html>