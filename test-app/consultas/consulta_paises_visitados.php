<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $tour = $_POST["tour_elegido"];

 	$query = "SELECT pais_eve 
                FROM EventosDeTours AS ET
                INNER JOIN Tours ON ET.id_tour = Tours.id_tour
                INNER JOIN Eventos AS EV ON ET.id_eve = EV.id_eve
                WHERE nombre_tour = '$tour';";
	$result = $db -> prepare($query);
	$result -> execute();
	$paises = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>Pais</th>
    </tr>
  <?php
	foreach ($paises as $pais) {
  		echo "<tr><td>$pais[0]</td></tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>