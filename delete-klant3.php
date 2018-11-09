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
		$verwijderen = 	 $_POST["verwijdervak"];

		//klantgegevens verwijderen
		if ($verwijderen) 
		{
			require_once "connect.php";

			$sql = $conn->prepare("DELETE FROM klan WHERE klantid = :klantid");
			$sql->execute(["klantid" => $klantid]);
			echo "De gegevens zijn verwijdered. <br />";
		}
		else{
			echo "De gegevens zijn niet verwijderd. <br />";
		}

		echo "<a href='menu.php'> terug naar het menu </a>";
	?>

</body>
</html>