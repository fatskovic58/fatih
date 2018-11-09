<!DOCTYPE html>
<html>
<head>
	<title>update auto 2</title>
</head>
<body>
	<h1>garage update auto 2</h1>
	<p>
		Dit formulier wordt gebruikt om autogegevens te wijzigen
		in de tabel auto van de database garage.
	</p>
	<?php  
		//klantid uit het formulier halen ------------
		$kenteken = $_GET["kentekenvak"];

		//klantgegevens uit tabel halen --------------
		require_once "connect.php";

		$klanten = $conn->prepare("SELECT klantid, autokenteken, automerk, autotype, autokmstand FROM auto WHERE autokenteken = :kenteken");
		$klanten->execute(["kenteken" => $kenteken]);

		//klantgegevens in een nieuwe formulier laten zien -----------------

		echo "<form action='update-auto3.php' method='post'>";
			foreach ($klanten as $klant) 
			{
				//klanten id mag niet gewijzigd worden
				echo "klantid:" . $klant["autokenteken"] . "<input type='hidden' name='autokentekenvak' value=' "  	. $klant["autokenteken"] 		. " '>	<br />";

				echo "klantnaam: 					   <input type='text' name='automerkvak' value=' "  	. $klant["automerk"] 		. " '> 	<br />";

				echo "klantadres: 					   <input type='text' name='autotypevak' value=' " 	. $klant["autotype"] 		. " '> 	<br />";

				echo "klantpostcode: 				   <input type='text' name='autokmstandvak' value=' " . $klant["autokmstand"] 	. " '> 	<br />";

				echo "klantplaats: 					   <input type='text' name='klantidvak' value=' "   . $klant["klantid"] 	. " '> 	<br />";

			}
			echo "<input type='submit'>";
			echo "</form>";
			
	?>
</body>
</html>