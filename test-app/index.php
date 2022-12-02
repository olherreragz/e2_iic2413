<?php include('templates/header.html');   ?>

<body>
  <h1 align="center">Biblioteca Artistas </h1>
  <p style="text-align:center;">Aquí encontrarás todo sobre los artistas.</p>

  <br>

  <h3 align="center"> ¿Quieres ver el nombre y telefono de todos los artistas?</h3>

  <form align="center" action="consultas/consulta_listado.php" method="post">
    <input type="submit" value="Ver listado">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center"> ¿Quieres ver el número de entradas de cortesia según artista?</h3>

  <?php
  #Primero obtenemos todos los artistas
  require("config/conexion.php");
  $result = $db -> prepare("SELECT DISTINCT nombre_artista FROM Artistas;");
  $result -> execute();
  $dato = $result -> fetchAll();
  ?>

  <form align="center" action="consultas/consulta_numero.php" method="post">
    Seleccionar un artista:
    <select name="artista_elegido">
      <?php
      #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
      foreach ($dato as $f) {
        echo "<option value=$f[0]>$f[0]</option>";
      }
      ?>
    </select>
    <br><br>
    <input type="submit" value="Buscar por artista">
  </form>

  <br>
  <br>
  <br>
  <br>

  <h3 align="center"> ¿Quieres conocer el último tour de un artista ?</h3>

  <form align="center" action="consultas/consulta_ultimo_tour.php" method="post">
    Artista:
    <input type="text" name="artista_elegido">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>


  <h3 align="center"> ¿Quieres ver los países visitados según tour?</h3>

  <?php
  #Primero obtenemos todos los nombres de tour
  require("config/conexion.php");
  $result = $db -> prepare("SELECT DISTINCT nombre_tour FROM Tours;");
  $result -> execute();
  $dataCollected = $result -> fetchAll();
  ?>

  <form align="center" action="consultas/consulta_paises_visitados.php" method="post">
    Seleccinar un tour:
    <select name="tour_elegido">
      <?php
      #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
      foreach ($dataCollected as $d) {
        echo "<option value=$d[0]>$d[0]</option>";
      }
      ?>
    </select>
    <br><br>
    <input type="submit" value="Buscar por tour">
  </form>

  <br>
  <br>
  <br>
  <br>

  <h3 align="center"> ¿Quieres ver las productoras con las que trabajó un artista?</h3>

  <?php
  #Primero obtenemos todos los nombres artistas
  require("config/conexion.php");
  $result = $db -> prepare("SELECT DISTINCT nombre_artista FROM artistas;");
  $result -> execute();
  $dataCollected = $result -> fetchAll();
  ?>

  <form align="center" action="consultas/consulta_productoras.php" method="post">
    Seleccinar un artista:
    <select name="artista_elegido">
      <?php
      #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
      foreach ($dataCollected as $d) {
        echo "<option value=$d[0]>$d[0]</option>";
      }
      ?>
    </select>
    <br><br>
    <input type="submit" value="Buscar por artista">
  </form>

  <br>
  <br>
  <br>
  <br>

  <h3 align="center"> ¿Quieres ver los hoteles en los que se hospedó un artista?</h3>

  <?php
  #Primero obtenemos todos los nombres artistas
  require("config/conexion.php");
  $result = $db -> prepare("SELECT DISTINCT nombre_artista FROM artistas;");
  $result -> execute();
  $dataCollected = $result -> fetchAll();
  ?>

  <form align="center" action="consultas/consulta_hoteles.php" method="post">
    Seleccinar un artista:
    <select name="artista_elegido">
      <?php
      #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
      foreach ($dataCollected as $d) {
        echo "<option value=$d[0]>$d[0]</option>";
      }
      ?>
    </select>
    <br><br>
    <input type="submit" value="Buscar por artista">
  </form>

  <br>
  <br>
  <br>
  <br>

  <h3 align="center"> ¿Quieres conocer el artista que ha entregado mayor cantidad de entradas de cortesia?</h3>

  <form align="center" action="consultas/consulta_mayor_cantidad.php" method="post">
    <input type="submit" value="Buscar artista">
  </form>
  <br>
  <br>
  <br>
</body>
</html>
