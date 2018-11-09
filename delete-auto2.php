<!DOCTYPE html>
<html>
<head>
	<title>update klant 2</title>
</head>
<body>
	<h1>garage delete klant2</h1>
	<p>
		Dit formulier wordt gebruikt om autogegevens te wijzigen
		in de tabel auto van de database garage.
	</p>
	<?php  
		//klantid uit het formulier halen ------------
		$autokenteken = $_GET["kentekenvak"];

		//klantgegevens uit tabel halen --------------
		require_once "connect.php";

		$auto = $conn->prepare("SELECT autokenteken, automerk, autotype, autokmstand, klantid FROM auto WHERE autokenteken = :autokenteken");
		$auto->execute(["autokenteken" => $autokenteken]);


		echo "<table>";
		foreach ($auto as $rij) 
		{
			echo "<tr>";
				echo "<td>" . $rij["autokenteken"] 	. "<td>";
				echo "<td>" . $rij["automerk"] 		. "<td>";
				echo "<td>" . $rij["autotype"] 		. "<td>";
				echo "<td>" . $rij["autokmstand"] 	. "<td>";
				echo "<td>" . $rij["klantid"] 		. "<td>";
			echo "</tr>";

		}
		echo "</table>";

		//autogegevens in een nieuwe formulier laten zien -----------------

		echo "<form action='delete-auto3.php' method='post'>";

				//kenteken mag niet gewijzigd worden
				echo "<input type='hidden' name='autokentekenvak'    value=$autokenteken> ";
				//Waarde 0 doorgegeven als er niet gecheckt wordt
				echo "<input type='hidden' name='verwijdervak'  value='0'> ";

				echo "<input type='checkbox' name='verwijdervak' value='1'> ";

				echo "Verwijder deze auto. <br />";

			echo "<input type='submit'>";
			echo "</form";
			
	?>
</body>
</html>