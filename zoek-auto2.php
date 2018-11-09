<!DOCTYPE html>
<html>
<head>
	<title>update auto 2</title>
</head>
<body>
	<h1>garage update auto 2</h1>
	<p>
		Dit formulier wordt gebruikt om autogegevens 
		in de tabel klant van de database garage.
	</p>
	<?php  
		//klantid uit het formulier halen ------------
		$kenteken= $_GET["kentekenvak"];

		//klantgegevens uit tabel halen --------------
		require_once "connect.php";

		$klanten = $conn->prepare("SELECT  autokenteken, automerk, autotype, autokmstand, klantid FROM auto WHERE autokenteken = :autokenteken");
		$klanten->execute(["autokenteken" => $kenteken]);

		//klantgegevens in een nieuwe formulier laten zien -----------------

		echo "<table>";
		foreach ($klanten as $rij) 
		{
			echo "<tr>";
				echo "<td>" . $rij["klantid"] 		. "<td>";
				echo "<td>" . $rij["autokenteken"] 	. "<td>";
				echo "<td>" . $rij["automerk"] 		. "<td>";
				echo "<td>" . $rij["autotype"] 		. "<td>";
				echo "<td>" . $rij["autokmstand"] 	. "<td>";
			echo "</tr>";

		}
		echo "</table>";
		echo "<a href='menu.php'> terug naar het menu </a>";
			
	?>
</body>
</html>