<!DOCTYPE html>
<html>
<head>
	<title>read-klant.php</title>
</head>
<body>
	<h1>garage read klant</h1>
	<p>
		Dit zijn alle gegevens uit de
		tabel klanten van de database garage.
	</p>
	<?php  
		///tabel uitlezen en netjes afdrukken-------------------------------------

		require_once "connect.php";

		$klanten = $conn->prepare("SELECT klantid, klantnaam, klantadres, klantpostcode, klantplaats FROM klant");
		$klanten->execute();

		echo "<table>";
		foreach ($klanten as $rij) 
		{
			echo "<tr>";
			echo "<td>" . $rij["klantid"] . "<td>";
			echo "<td>" . $rij["klantnaam"] . "<td>";
			echo "<td>" . $rij["klantadres"] . "<td>";
			echo "<td>" . $rij["klantpostcode"] . "<td>";
			echo "<td>" . $rij["klantplaats"] . "<td>";
			echo "</tr>";

				$auto = $conn->prepare("SELECT  autokenteken, automerk, autotype, autokmstand, klantid FROM auto WHERE klantid = :klantid");
				$auto->execute(["klantid" => $rij["klantid"]]);
			echo "<table>";
			foreach ($auto as $row) 
			{
				echo "<tr>";
					echo "<td>" . $row["klantid"] 		. "<td>";
					echo "<td>" . $row["autokenteken"] 	. "<td>";
					echo "<td>" . $row["automerk"] 		. "<td>";
					echo "<td>" . $row["autotype"] 		. "<td>";
					echo "<td>" . $row["autokmstand"] 	. "<td>";
				echo "</tr>";
			}
			echo "</table>";
		}
		echo "</table>";
		echo "<a href='menu.php'> terug naar het menu</a>";
	?>
</body>
</html>