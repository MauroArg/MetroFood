<?php
  if (isset($_POST['enviar']))
  {
    $nombreRest = $_POST["nombreRest"];
    $direcRest = $_POST["direcRest"];
    $telRest = $_POST["telRest"];
    $imgRest = addslashes(file_get_contents($_FILES['imgRest']['tmp_name']));
    $idUsu = $_SESSION["idUsuario"];

    $query = "INSERT INTO restaurante(nombreRest, imgRest, direcRest, telRest, idUsu) VALUES ('$nombreRest','$imgRest','$direcRest','$telRest','$idUsu')";
    $resultado = $conexion->query($query);
  }
 ?>
