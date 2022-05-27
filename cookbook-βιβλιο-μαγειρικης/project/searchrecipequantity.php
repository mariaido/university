<!DOCTYPE html> <!--Καθορίζει την έκδοση της HTML, Χρησημοποιούμε HTML 5-->
<html>
	<head>
		<title>Βιβλίο Μαγειρικής</title>
		<meta charset='utf-8' /> <!--Για να εμφανίζονται οι ελληνικοί χαρακτήρες-->
		<link rel='stylesheet' type='text/css' href='style.css' /> <!--Σύνδεση με την css-->
	</head>
	<body>
	<h1>Προτεινόμενες Συνταγές</h1>
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
	
	$i=$_POST['i'];
	for($j=0;$j<$i; $j++)
	{
		$quantity[$j]=$_POST['inputmaterial'.$j];
		if($quantity[$j] != 0)
		{
			$id[$j]=$_POST['id'.$j];
		}
		else
		{
			$id[$j]=0;
		}
		//echo $quantity[$j]." ".$id[$j]."<br/>";
	}
	$all_rows=mysql_query("SELECT * FROM recipes");
	while($row=mysql_fetch_array($all_rows)) 
	{
		$iddb[0]=$row['material1'];
		$iddb[1]=$row['material2'];
		$iddb[2]=$row['material3'];
		$iddb[3]=$row['material4'];
		$iddb[4]=$row['material5'];
		$iddb[5]=$row['material6'];
		$iddb[6]=$row['material7'];
		$iddb[7]=$row['material8'];
		$iddb[8]=$row['material9'];
		$iddb[9]=$row['material10'];
		$iddb[10]=$row['material11'];
		$iddb[11]=$row['material12'];
		$iddb[12]=$row['material13'];
		$iddb[13]=$row['material14'];
		$iddb[14]=$row['material15'];
		$quantitydb[0]=$row['quantity1'];
		$quantitydb[1]=$row['quantity2'];
		$quantitydb[2]=$row['quantity3'];
		$quantitydb[3]=$row['quantity4'];
		$quantitydb[4]=$row['quantity5'];
		$quantitydb[5]=$row['quantity6'];
		$quantitydb[6]=$row['quantity7'];
		$quantitydb[7]=$row['quantity8'];
		$quantitydb[8]=$row['quantity9'];
		$quantitydb[9]=$row['quantity10'];
		$quantitydb[10]=$row['quantity11'];
		$quantitydb[11]=$row['quantity12'];
		$quantitydb[12]=$row['quantity13'];
		$quantitydb[13]=$row['quantity14'];
		$quantitydb[14]=$row['quantity15'];
		$recipeid=$row['ID'];
		
		$a=array_intersect($id, $iddb);
		$containsSearch = count(array_intersect($id, $iddb)) == count($id);
		$tmp = array_count_values($id);
		$cnt = $tmp[0];
		$b=count($id)-$cnt;
		$tmp = array_count_values($iddb);
		$cnt = $tmp[0];
		$c= 15-$cnt;
		echo ("<div id='index'>");
		if($containsSearch && ($b == $c))
		{
			$key=1;
			for($z=0;$z<$i;$z++)
			{
				if($id[$z]==$iddb[$z] && $quantity[$z]<$quantitydb[$z])
				{
					$key=0;
				}
			}
			if($key==1)
			{
				echo ("<a href='openrecipe.php?id=".$recipeid."'>".$row['recipeName']."</a><br/>");
			}
		}
		echo ("</div>");
	}
?>
	</body>
</html>
