<!DOCTYPE html> <!--Καθορίζει την έκδοση της HTML, Χρησημοποιούμε HTML 5-->
<html>
	<head>
		<title>Βιβλίο Μαγειρικής</title>
		<meta charset='utf-8' /> <!--Για να εμφανίζονται οι ελληνικοί χαρακτήρες-->
		<link rel='stylesheet' type='text/css' href='style.css' /> <!--Σύνδεση με την css-->
	</head>
	<body><div id="center"><br/>
		<form action='home.php' method='post'> <!--φόρμα για εισαγωγή των στοιχείων-->
		Όνομα <input class='optionstyle'name='username' /><br/> <!--αντικείμενο τύπου input-->
		Κωδικός <input class='optionstyle'name='password' type='password'/><br/><br/> <!--αντικείμενο τύπου input-->
		<input class='optionstyle' type='submit' value='Είσοδος' />
		<a class='optionstyle' href='registeruser.php' >Εγγραφή</a>
	</div></body>
</html>