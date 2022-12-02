<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $artista = $_POST["artista_elegido"];

 	$query = "SELECT Tours.id_tour, nombre_tour, fecha_inicio_tour, fecha_termino_tour
                FROM Tours 
                INNER JOIN EventosDeTours AS EVT ON EVT.id_tour = Tours.id_tour
                INNER JOIN Eventos ON EVT.id_eve = Eventos.id_eve
                INNER JOIN Participaciones AS PAR ON EVT.id_eve = PAR.id_eve
                INNER JOIN Artistas ON PAR.id_artist = Artistas.id_artist
                WHERE nombre_artista = '$artista'
                ORDER BY fecha_evento DESC
                LIMIT 1;";
                
	$result = $db -> prepare($query);
	$result -> execute();
	$tours = $result -> fetchAll();
  ?>
	<table>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Fecha inicio</th>
      <th>Fecha termino</th>
    </tr>
  <?php
	foreach ($tours as $tour) {
  		echo "<tr><td>$tour[0]</td><td>$tour[1]</td><td>$tour[2]</td><td>$tour[3]</td></tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>