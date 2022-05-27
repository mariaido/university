<!DOCTYPE html> <!--Καθορίζει την έκδοση της HTML, Χρησημοποιούμε HTML 5-->
<html>
	<head>
		<title>Βιβλίο Μαγειρικής</title>
		<meta charset='utf-8' /> <!--Για να εμφανίζονται οι ελληνικοί χαρακτήρες-->
		<link rel='stylesheet' type='text/css' href='style.css' /> <!--Σύνδεση με την css-->
	</head>
	<body>
	<div id="index">
		<form action='submitrecipe.php' method='post'><br/> <!--φόρμα για εισαγωγή των στοιχείων-->
		Όνομα συνταγής <input class='optionstyle' name='inputrecipename' /><br/> <br/><!--αντικείμενο τύπου input-->
		
		Κατηγορία συνταγής <select class="optionstyle" name='recipeCategory'> <!--αντικείμενο τύπου λίστας select-->
							<option class="optionstyle" value='0'>Ορεκτικά</option>
							<option class="optionstyle" value='1'>Ζυμαρικά</option>
							<option class="optionstyle" value='2'>Θαλασσινά</option>
							<option class="optionstyle" value='3'>Κρέας</option>
							<option class="optionstyle" value='4'>Λαχανικά</option>
							<option class="optionstyle" value='5'>Σούπες</option>
							<option class="optionstyle" value='6'>Γλυκά</option>
							<option class="optionstyle" value='7'>Νηστίσιμα</option>
							</select>
		Χρόνος εκτέλεσης σε λεπτά <input class='optionstyle' name='recipeTime' size='4'/><br/> <br/>
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
								
								
							for($j=1; $j<16; $j++)
							{
								echo ("Υλικό <select class='optionstyle' name='inputmaterial".$j."'>
								<option class='optionstyle' value='0'>--</option>");							
								
								$key=mysql_query("SELECT * FROM materials;");
								$count=mysql_num_rows($key);
								for( $i = 0; $i<$count; $i++ )
								{
									$key2=mysql_query("SELECT * FROM materials LIMIT ".$i.",1",$link);
									while($row=mysql_fetch_array($key2)) 
									{
										$materialID = $row['ID'];
										$materialName = $row['name'];
									}
									echo "<option class='optionstyle' value=".$materialID.">".$materialName."</option>";
								}
								echo"</select>";
								
								echo ("Ποσότητα <input class='optionstyle' name='inputquantity".$j."' size='4' /> <!--αντικείμενο τύπου input-->");
								echo ("</select><br/>");
							}
							
						?>
						<br/>Εκτέλεση<br/><textarea class='optionstyle' name="inputdirections" rows="5" cols="70" onkeypress="if (this.value.length > 250) { return false; }" "></textarea><br />
						
	<input class='optionstyle' type='submit' value='Εισαγωγή'/> <br/><br/><br/><!--κουμπί για καταχώρηση-->
	</form>
	</div>
	</body>
</html>