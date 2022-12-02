<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $artista = $_POST["artista_elegido"];

 	$query = "SELECT nombre_artista, nombre_hotel, Count(nombre_artista) AS cantidad
                FROM HOSPEDAJES AS  HOS
                INNER JOIN Artistas ON HOS.id_artist = Artistas.id_artist
                WHERE nombre_artista = '$artista'
                GROUP BY nombre_artista, nombre_hotel
                ORDER BY cantidad DESC;";
	$result = $db -> prepare($query);
	$result -> execute();
	$hoteles = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>Nombre</th>
      <th>Nombre Hotel</th>
      <th>Cantidad</th>
    </tr>
  <?php
	foreach ($hoteles as $h) {
        echo "<tr> <td>$h[0]</td> <td>$h[1]</td> <td>$h[2]</td> </tr>";
} 
  ?>
	</table>

<?php include('../templates/footer.html'); ?>