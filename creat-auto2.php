<!DOCTYPE html>
<html>
<head>
	<title>garage create auto 2</title>
</head>
<body>
	<h1>garage greate auto 2</h1>
	<p>
		Een auto toevoegen aan de tabel
		auto in de database garage.
	</p>
	<?php
		//klant gegevens uit het formulier halen--------------------

		$autokenteken = $_POST["autokentekenvak"];
		$automerk 	  = $_POST["automerkvak"];
		$autotype 	  = $_POST["autotypevak"];
		$autokmstand  = $_POST["autokmstandvak"];		
		$klantid 	  =	$_POST["klantidvak"];

		//autogegevens invoeren in de tabel
		require_once "connect.php";

		$sql = $conn->prepare("INSERT INTO auto SET :autokenteken, :automerk, :autotype, :autokmstand, :klantid");
		
		$sql = $conn->bindParam(":autokenteken", 	$autokenteken);
		$sql = $conn->bindParam(":automerk", 		$automerk);
		$sql = $conn->bindParam(":autotype", 		$autotype);
		$sql = $conn->bindParam(":autokmstand", 	$autokmstand);
		$sql = $conn->bindParam(":klantid", 		$klantid);

		$sql->execute();

		echo "De auto is toegevoegd <br />";
		echo "<a href='menu.php'> terug naar het menu</a>";


	?>

</body>
</html>