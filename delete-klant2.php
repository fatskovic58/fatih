<!DOCTYPE html>
<html>
<head>
	<title>update klant 2</title>
</head>
<body>
	<h1>garage delete klant2</h1>
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

		//klantgegevens in een nieuwe formulier laten zien -----------------

		echo "<form action='delete-klant3.php' method='post'>";

				//klanten id mag niet gewijzigd worden
				echo "<input type='hidden' name='klantidvak'    value=$klantid> ";
				//Waarde 0 doorgegeven als er niet gecheckt wordt
				echo "<input type='hidden' name='verwijdervak'  value='0'> ";

				echo "<input type='checkbox' name='verwijdervak' value='1'> ";

				echo "Verwijder deze klant. <br />";

			echo "<input type='submit'>";
			echo "</form";
			
	?>
</body>
</html>