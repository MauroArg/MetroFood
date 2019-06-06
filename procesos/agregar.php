<!--categoria-->
<?php
  require('../conexion/conexion.php');
  if (isset($_POST['insertCat']))
  {
    $nombreCat = $_POST['nombreCat'];
    $imgCat = addslashes(file_get_contents($_FILES['imgCat']['tmp_name']));

    $query = "INSERT INTO categoria (nombreCat, imgCat) VALUES ('$nombreCat', '$imgCat')";
    $results = $conexion->query($query);

    if ($results)
    {
      echo '<script> alert("Data Saved"); </script>';
      header('location: ../modelo/categoria.php');
    }
    else
    {
    }
  }
 ?>
 <!--menu-->
 <?php
   require('../conexion/conexion.php');
   if (isset($_POST['insertMenu']))
   {
     $nombreMenu = $_POST['nombreMenu'];


     $query = "INSERT INTO menu (nombreMenu) VALUES ('$nombreMenu')";
     $results = $conexion->query($query);

     if ($results)
     {
       echo '<script> alert("Data Saved"); </script>';
       header('location: ../modelo/menu.php');
     }
     else
     {
     }
   }
  ?>
  <!--platillo-->
  <?php
    require('../conexion/conexion.php');
    if (isset($_POST['insertPlat']))
    {
      session_start();
      $nombrePlat = $_POST['nombrePlat'];
      $imgPlat = addslashes(file_get_contents($_FILES['imgPlat']['tmp_name']));
      $precio = $_POST['precio'];
      $descripcionPlat = $_POST['descripcionPlat'];

      $nombreMenu = $_POST['nameMenu'];
      $queryMenu = "SELECT idMenu FROM menu WHERE nombreMenu='$nombreMenu'";
      $resultadoMenu = $conexion->query($queryMenu);
      $resultsMenu = $resultadoMenu->fetch_assoc();
      $idMenu = $resultsMenu['idMenu'];

      $nombreCat = $_POST['nameCat'];
      $queryCat = "SELECT idCat FROM categoria WHERE nombreCat = '$nombreCat'";
      $resultadoCat = $conexion->query($queryCat);
      $resultsCat = $resultadoCat->fetch_assoc();
      $idCat = $resultsCat['idCat'];

      $idUsu = $_SESSION['idUsuario'];
      $queryRest = "SELECT * FROM restaurante WHERE idUsu = '$idUsu'";
      $resultadoRest = $conexion->query($queryRest);
      $resultsRest = $resultadoRest->fetch_assoc();
      $idRest = $resultsRest['idRest'];


      $query = "INSERT INTO platillo (nombrePlat, imgPlat, precio, descripcionPlat, idMenu, idCat, idRest) VALUES ('$nombrePlat', '$imgPlat', '$precio', '$descripcionPlat', '$idMenu', '$idCat', $idRest)";
      $results = $conexion->query($query);

      if ($results)
      {
        echo '<script> alert("Data Saved"); </script>';
        header('location: ../modelo/platillo.php');
      }
      else
      {
        echo "La cagaste pendejo";
      }
    }
   ?>
