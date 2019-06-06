<!--categoria-->
<?php
  require('../conexion/conexion.php');
  if (isset($_POST['updateCat']))
  {
    $idCat = $_POST['updateId'];
    $nombreCat = $_POST['nombreCat'];
    $imgCat = addslashes(file_get_contents($_FILES['imgCat']['tmp_name']));

    if (empty($imgCat))
    {
      $query = "UPDATE categoria SET nombreCat = '$nombreCat' WHERE idCat = '$idCat'";
    }
    elseif (empty($nombreCat))
    {
      $query = "UPDATE categoria SET imgCat = '$imgCat' WHERE idCat = '$idCat'";
    }
    elseif (!empty($nombreCat) && !empty($imgCat))
    {
      $query = "UPDATE categoria SET nombreCat = '$nombreCat', imgCat = '$imgCat' WHERE idCat = '$idCat'";
    }

    $results = $conexion->query($query);

    if ($results)
    {
      header("location:../modelo/categoria.php");
    }
    else {
    }
  }
 ?>
 <!--menú-->
 <?php
   require('../conexion/conexion.php');
   if (isset($_POST['updateMenu']))
   {
     $idMenu = $_POST['updateIdm'];
     $nombreMenu = $_POST['nombreMenu'];


       $query = "UPDATE menu SET nombreMenu = '$nombreMenu' WHERE idMenu = '$idMenu'";


     $results = $conexion->query($query);

     if ($results)
     {
       echo '<script> alert("Data Deleted"); </script>';
       header("location:../modelo/menu.php");
     }
     else {
     }
   }
  ?>
  <!--platillo-->
  <?php
    session_start();
    require('../conexion/conexion.php');
    if (isset($_POST['updatePlat']))
    {
      $idPlat = $_POST['updateIdp'];
      $nombrePlat = $_POST['nombrePlat'];
      $imgPlat = addslashes(file_get_contents($_FILES['imgPlat']['tmp_name']));
      $precio = $_POST['precio'];
      $descripcionPlatillo = $_POST['descripcionPlatillo'];

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

      if (empty($imgPlat))
      {
        $query = "UPDATE platillo SET nombrePlat = '$nombrePlat', precio='$precio', descripcionPlat='$descripcionPlatillo', idMenu='$idMenu', idCat='$idCat'  WHERE idPlat = '$idPlat'";
      }
      else
      {
        $query = "UPDATE platillo SET nombrePlat = '$nombrePlat', imgPlat = '$imgPlat', precio='$precio', descripcionPlat='$descripcionPlatillo' , idMenu='$idMenu', idCat='$idCat' WHERE idPlat = '$idPlat'";
      }



      $results = $conexion->query($query);

      if ($results)
      {
        echo '<script> alert("Data Deleted"); </script>';
        header("location:../modelo/platillo.php");
      }
      else
      {
        echo "fail";
      }
    }
   ?>
