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

		$klanten = $conn->prepare("SELECT klantid, autokenteken, automerk, autotype, autokmstand FROM auto");
		
		$klanten->execute();

		echo "<table>";
		foreach ($klanten as $rij) 
		{
			echo "<tr>";
			echo "<td>" . $rij["klantid"] . "<td>";
			echo "<td>" . $rij["autokenteken"] . "<td>";
			echo "<td>" . $rij["automerk"] . "<td>";
			echo "<td>" . $rij["autotype"] . "<td>";
			echo "<td>" . $rij["autokmstand"] . "<td>";
			echo "</tr>";

		}
		echo "</table>";
		echo "<a href='menu.php'> terug naar het menu</a>";
	?>
</body>
</html>