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
		if(!$link) //αν αποτύχει η σύνδεση μύνημα σφάλματος
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
		
		$username=$_POST['username']; //Παίρνει το username μέσω της post και το καταχωρει στην μεταβλητή $name
		$password=$_POST['password']; //Παίρνει το password μέσω της post και το καταχωρει στην μεταβλητή $measurementunit
		echo ("<div id='center'></br>");
		if($username == NULL || $password == NULL)
		{
			echo ("Παρακαλώ συμπληρώστε τα στοιχεία σας!");
		}
		else
		{
			$key=0;
			$key=mysql_query("SELECT * FROM users WHERE username = '".$username."'");
			$rowkey=mysql_num_rows($key);
			while($row=mysql_fetch_array($key)) 
			{
				echo $row["username"]." ".$row["password"]."<br/>";
			}
			
			if($rowkey == 1)
			{
				echo("Υπάρχει ήδη λογαριασμός με αυτό το όνομα!");
			}
			else
			{
				mysql_query("INSERT INTO users (username,password) VALUES ('".$username."', '".$password."')"); 
				echo("Η εγγραφή ολοκληρώθηκε με επιτυχία!");
			}
		}
		echo ("<br/><br/>");
		
	?>
	</div>
	<form action='index.php' method='post'><br/>
	<input class='optionstyle' type='submit' value='Επιστροφή' />
	</body>
</html>