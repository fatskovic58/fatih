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

		echo "<form action='update-klant3.php' method='post'>";
			foreach ($klanten as $klant) 
			{
				//klanten id mag niet gewijzigd worden
				echo "klantid:" . $klant["klantid"] . "<input type='hidden' name='klantidvak' value=' "  	. $klant["klantid"] 		. " '>	<br />";

				echo "klantnaam: 					   <input type='text' name='klantnaamvak' value=' "  	. $klant["klantnaam"] 		. " '> 	<br />";

				echo "klantadres: 					   <input type='text' name='klantadresvak' value=' " 	. $klant["klantadres"] 		. " '> 	<br />";

				echo "klantpostcode: 				   <input type='text' name='klantpostcodevak' value=' " . $klant["klantpostcode"] 	. " '> 	<br />";

				echo "klantplaats: 					   <input type='text' name='klantplaatsvak' value=' "   . $klant["klantplaats"] 	. " '> 	<br />";

			}
			echo "<input type='submit'>";
			echo "</form>";
			
	?>
</body>
</html>