<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $artista = $_POST["artista_elegido"];

 	$query = "SELECT nombre_productora
                FROM Artistas AS AR
                INNER JOIN Participaciones ON AR.id_artist = Participaciones.id_artist
                INNER JOIN ProduccionDelEvento ON Participaciones.id_eve = ProduccionDelEvento.id_eve
                INNER JOIN Productoras ON ProduccionDelEvento.id_productora = Productoras.id_productora
                WHERE nombre_artista = '$artista';";
	$result = $db -> prepare($query);
	$result -> execute();
	$productoras = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>Nombre</th>
    </tr>
  <?php
	foreach ($productoras as $p) {
    echo "<tr><td>$p[0]</td></tr>";
}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>