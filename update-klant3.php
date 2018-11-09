<!DOCTYPE html>
<html>
<head>
	<title>garage create klant 2</title>
</head>
<body>
	<h1>garage greate klant 2</h1>
	<p>
		Een klant toevoegen aan de tabel
		klant in de database garage.
	</p>
	<?php
		//klant gegevens uit het formulier halen--------------------
		$klantid = 		 $_POST["klantidvak"];
		$klantnaam = 	 $_POST["klantnaamvak "];
		$klantadres = 	 $_POST["klantadresvak"];
		$klantpostcode = $_POST["klantpostcodevak"];
		$klantplaats = 	 $_POST["klantplaatsvak"];

		//klantgegevens invoeren in de tabel
		require_once "connect.php";

		$sql = $conn->prepare("UPDATE klant SET klantnaam = :klantnaam, klantadres = :klantadres, klantpostcode = :klantpostcode, klantplaats = :klantplaats WHERE klantid = :klantid");
		$sql = $conn->bindParam(":klantid", 		$klantid);
		$sql = $conn->bindParam(":klantnaam", 		$klantnaam);
		$sql = $conn->bindParam(":klantadres", 		$klantadres);
		$sql = $conn->bindParam(":klantpostcode", 	$klantpostcode);
		$sql = $conn->bindParam(":klantplaats", 	$klantplaats);

		$sql->execute();

		echo "De klant is gewijzigd. <br />";
		echo "<a href='menu.php'> terug naar het menu</a>";


	?>

</body>
</html>