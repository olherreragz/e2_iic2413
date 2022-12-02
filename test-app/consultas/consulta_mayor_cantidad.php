<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #$artista = $_POST["artista_elegido"];

 	$query = "SELECT nombre_artista , COUNT(nombre_artista) AS cantidad
                FROM EntradasDeCortesia AS  EN
                INNER JOIN Artistas ON EN.id_artist = Artistas.id_artist
                GROUP BY nombre_artista 
                ORDER BY cantidad DESC LIMIT 1;";
	$result = $db -> prepare($query);
	$result -> execute();
	$artist = $result-> fetchAll();
  ?>

	<table>
    <tr>
      <th>Nombre</th>
      <th>Cantidad</th>
    </tr>
  <?php
  foreach ($artist as $a) {
    echo "<tr><td>$a[0]</td><td>$a[1]</td> </tr>";
  }
  ?>
	</table>

<?php include('../templates/footer.html'); ?>