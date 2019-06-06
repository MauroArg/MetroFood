<!--categoria-->
<?php
  require('../conexion/conexion.php');
  if (isset($_POST['deleteCat']))
  {
    $idCat = $_POST['deleteId'];

    $query = "DELETE FROM categoria WHERE idCat='$idCat'";
    $results = $conexion->query($query);

    if ($results)
    {
      echo '<script> alert("Data Deleted"); </script>';
      header("location:../modelo/categoria.php");
    }
    else {
    }
  }
 ?>
 <!--restaurante-->
 <?php
   require('../conexion/conexion.php');
   if (isset($_POST['deleteRest']))
   {
     $idRest = $_POST['deleteIdr'];

     $query = "DELETE FROM restaurante WHERE idUsu='$idRest'";
     $results = $conexion->query($query);
     $query2 = "DELETE FROM usuario WHERE idUsu='$idRest'";
     $results2 = $conexion->query($query2);

     if ($results && $results2)
     {
       echo '<script> alert("Data Deleted"); </script>';
       header("location:../modelo/restaurante.php");
     }
     else {
     }
   }
  ?>
  <!--cliente-->
  <?php
    require('../conexion/conexion.php');
    if (isset($_POST['deleteCliente']))
    {
      $idCliente = $_POST['deleteIdc'];

      $query = "DELETE FROM cliente WHERE idUsu='$idCliente'";
      $results = $conexion->query($query);
      $query2 = "DELETE FROM usuario WHERE idUsu='$idCliente'";
      $results2 = $conexion->query($query2);

      if ($results && $results2)
      {
        echo '<script> alert("Data Deleted"); </script>';
        header("location:../modelo/cliente.php");
      }
      else {
      }
    }
   ?>
   <!--menu-->
   <?php
     require('../conexion/conexion.php');
     if (isset($_POST['deleteMenu']))
     {
       $idMenu = $_POST['deleteIdm'];

       $query = "DELETE FROM menu WHERE idMenu='$idMenu'";
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
      require('../conexion/conexion.php');
      if (isset($_POST['deletePlat']))
      {
        $idPlat = $_POST['deleteIdp'];

        $query = "DELETE FROM platillo WHERE idPlat= $idPlat";
        $results = $conexion->query($query);


        if ($results)
        {
          echo '<script> alert("Data Deleted"); </script>';
          header("location:../modelo/platillo.php");
        }
        else {
        }
      }
     ?>
