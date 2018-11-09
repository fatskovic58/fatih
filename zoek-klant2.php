<!DOCTYPE html>
<html>
<head>
	<title>update klant 2</title>
</head>
<body>
	<h1>garage update klant2</h1>
	<p>
		Dit formulier wordt gebruikt om klantgegevens te wijzigen
		in de tabel klant van de database garage.
	</p>
	<?php  
		//klantid uit het formulier halen ------------
		$klantid = $_GET["klantidvak"];

		//klantgegevens uit tabel halen --------------
		require_once "connect.php";

		$klanten = $conn->prepare("SELECT klantid, klantnaam, klantadres, klantpostcode, klantplaats FROM klant WHERE klantid = :klantid");
		$klanten->execute(["klantid" => $klantid]);

		//klantgegevens in een nieuwe formulier laten zien -----------------

		echo "<table>";
		foreach ($klanten as $rij) 
		{
			echo "<tr>";
				echo "<td>" . $rij["klantid"] 		. "<td>";
				echo "<td>" . $rij["klantnaam"] 	. "<td>";
				echo "<td>" . $rij["klantadres"] 	. "<td>";
				echo "<td>" . $rij["klantpostcode"] . "<td>";
				echo "<td>" . $rij["klantplaats"] 	. "<td>";
			echo "</tr>";

		}
		echo "</table>";
		echo "<a href='menu.php'> terug naar het menu </a>";
			
	?>
</body>
</html>