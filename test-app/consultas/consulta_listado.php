<?php include('../templates/header.html');   ?>

<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

	#$tipo = $_POST["tipo_elegido"];
	#$nombre = $_POST["nombre_pokemon"];

 	$query = "SELECT nombre_artista, telefono_artista FROM Artistas";
	$result = $db -> prepare($query);
	$result -> execute();
	$artistas = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>Nombre_artista</th>
      <th>Telefono_artista</th>
    </tr>
  <?php
	foreach ($artistas as $artista) {
  		echo "<tr> <td>$artista[0]</td> <td>$artista[1]</td> </tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
