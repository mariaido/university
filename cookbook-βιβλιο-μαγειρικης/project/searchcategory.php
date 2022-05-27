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
	$category=$_POST['recipeCategory'];
	$all_rows=mysql_query("SELECT * FROM recipes WHERE recipeCategory='".$category."'"); //εμφανιζει ολα τα στοιχεια της συνταγης
	if (!$all_rows) 
	{ // add this check.
		die('Invalid query: ' . mysql_error());
	}
	while($row=mysql_fetch_array($all_rows)) 
	{ 
			
			$recipeName= $row["recipeName"];
			$recipeCategory= $row["recipeCategory"];
			$recipeTime= $row["recipeTime"];
			$quantity[1]=$row["quantity1"];
			$material[1]=$row["material1"];
			$quantity[2]=$row["quantity2"];
			$material[2]=$row["material2"];
			$quantity[3]=$row["quantity3"];
			$material[3]=$row["material3"];
			$quantity[4]=$row["quantity4"];
			$material[4]=$row["material4"];
			$quantity[5]=$row["quantity5"];
			$material[5]=$row["material5"];
			$quantity[6]=$row["quantity6"];
			$material[6]=$row["material6"];
			$quantity[7]=$row["quantity7"];
			$material[7]=$row["material7"];
			$quantity[8]=$row["quantity8"];
			$material[8]=$row["material8"];
			$quantity[9]=$row["quantity9"];
			$material[9]=$row["material9"];
			$quantity[10]=$row["quantity10"];
			$material[10]=$row["material10"];
			$quantity[11]=$row["quantity11"];
			$material[11]=$row["material11"];
			$quantity[12]=$row["quantity12"];
			$material[12]=$row["material12"];
			$quantity[13]=$row["quantity13"];
			$material[13]=$row["material13"];
			$quantity[14]=$row["quantity14"];
			$material[14]=$row["material14"];
			$quantity[15]=$row["quantity15"];
			$material[15]=$row["material15"];
			$directions=$row["directions"];
	echo ("<div id='index'>");
	echo ("<br/><span class='bold'>  Όνομα:  </span>".$recipeName."");
	echo ("  ".$recipeTime." (λεπτά)<br/>");
	echo ("</div><div id='index'><br/>");
		
		for($i=1;$i<16;$i++)
		{
			$a=$material[$i];
			$b=$quantity[$i];
			
			if ($a != 0)
			{
				$materialName= mysql_query("SELECT name, measurementUnit FROM materials WHERE ID='".$a."'");
				while($row=mysql_fetch_array($materialName)) 
				{
					$c=$row["name"];
					$d=$row["measurementUnit"];
				}
				echo ("<span class='bold'>Υλικό: </span> ".$b." ");
				
				if($d==0)
				{
					$e=(" (Τεμάχια)");
				}
				else
				{
					$e=(" (Γραμμάρια)");
				}
				echo ("".$e." ".$c." <br/>");
			}
			
		}
		echo ("<br/></div><div id='index'>");
		echo ("<span class='bold'><br/>Οδηγίες : </span>".$directions."<br/><br/>");
		echo ("</div><br/><br/>");
	}
	
?>
	</body>
</html>