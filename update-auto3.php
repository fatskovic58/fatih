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
		$autokenteken = 	 $_POST["autokentekenvak"];
		$automerk = 	 $_POST["automerkvak"];
		$autotype = $_POST["autotypevak"];
		$autokmstand = 	 $_POST["autokmstandvak"];

		//klantgegevens invoeren in de tabel
		require_once "connect.php";

		$sql = $conn->prepare("UPDATE auto SET automerk = :automerk, autotype = :autotype, autokmstand = :autokmstand, klantid = :klantid WHERE autokenteken = :autokenteken");
		$sql = $conn->bindParam(":automerk", 		$automerk);
		$sql = $conn->bindParam(":autotype", 		$autotype);
		$sql = $conn->bindParam(":autokmstand", 	$autokmstand);
		$sql = $conn->bindParam(":klantid", 		$klantid);
		$sql = $conn->bindParam(":autokenteken", 	$autoketeken);

		$sql->execute();

		echo "De auto is gewijzigd. <br />";
		echo "<a href='menu.php'> terug naar het menu</a>";


	?>

</body>
</html>