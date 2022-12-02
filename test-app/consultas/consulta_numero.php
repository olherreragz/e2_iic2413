<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $arti = $_POST["artista_elegido"];

    $query = "SELECT nombre_artista, COUNT(nombre_artista) AS cantidad
                  FROM EntradasDeCortesia AS EN
                  INNER JOIN Artistas ON EN.id_artist = Artistas.id_artist
                  WHERE nombre_artista = '$arti'
                  GROUP BY nombre_artista
                  ORDER BY cantidad DESC;";
  $result = $db -> prepare($query);
  $result -> execute();
  $num = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>Nombre</th>
      <th>Número Entradas</th>
    </tr>
  <?php
  foreach ($num as $n) {
        echo "<tr><td>$n[0]</td><td>$n[1]</td></tr>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>