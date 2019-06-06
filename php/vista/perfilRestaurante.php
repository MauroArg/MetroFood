<?php
  error_reporting(E_ALL ^ E_NOTICE);
  session_start();
  require("../../conexion/conexion.php");

  if (isset($_POST['modificarUsu']))
  {
    $idUsu = $_SESSION['idUsuario'];
    $nombreUsu = $_POST['nombreUsu'];
    $emailUsu = $_POST['emailUsu'];
    $query = "UPDATE usuario set nombreUsu = '$nombreUsu', emailUsu = '$emailUsu' WHERE idUsu = '$idUsu'";
    $results = $conexion->query($query);
    header('location:perfilRestaurante.php');
  }
  elseif (isset($_POST['modificarRest']))
  {
    $idUsu = $_SESSION['idUsuario'];
    $nombreRest = $_POST['nombreRest'];
    $direcRest = $_POST['direcRest'];
    $telRest = $_POST['telRest'];
    $descRest = $_POST['descRest'];
    $imgRest = addslashes(file_get_contents($_FILES['imgRest']['tmp_name']));
    if (empty($imgRest))
    {
      $query = "UPDATE restaurante set nombreRest = '$nombreRest', direcRest = '$direcRest', telRest = '$telRest', descRest = '$descRest' WHERE idUsu = '$idUsu'";
      $results = $conexion->query($query);
      header('location:perfilRestaurante.php');
    }
    else
    {
      $query = "UPDATE restaurante set nombreRest = '$nombreRest', cimgRest = '$imgRest', direcRest = '$direcRest', telRest = '$telRest', descRest = '$descRest' WHERE idUsu = '$idUsu'";
      $results = $conexion->query($query);
      header('location:perfilRestaurante.php');
    }
  }
 ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-escale=1">

    <link rel="shortcut icon"  href="../../img/logomf.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/signup.css">
    <link rel="stylesheet" type="text/css" href="../../css/index.css">

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        var cero = 0;
        $(document).ready(function() {
            $(window).on('scroll', function() {
                $('.navbar-inverse').toggleClass('hide', $(window).scrollTop() > cero);
            })
        })

    </script>

    <title>Perfil</title>
</head>

<body>


    <header>
        <nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="../../index.php"><img class="img-responsive imgsize" img src="../../img/logomf.png" style="width: 43px; height: 43px; float: left; margin-top: -10px; padding-bottom: 2px; margin-right: 3px;">Metro<span class="icono">Food</span></a>
                </div>
            </div><!-- /.container-fluid -->
        </nav>
    </header>
    <?php
      if (isset($_SESSION['idUsuario']))
      {
        $idUsu = $_SESSION['idUsuario'];
        $queryRest = "SELECT * FROM restaurante WHERE idUsu = '$idUsu'";
        $resultadoRest = $conexion->query($queryRest);
        $resultsRest = $resultadoRest->fetch_assoc();

        $queryUsu = "SELECT * FROM usuario WHERE idUsu = '$idUsu'";
        $resultadoUsu = $conexion->query($queryUsu);
        $resultsUsu = $resultadoUsu->fetch_assoc();

        $idRest = $resultsRest['idRest'];
        $nombreRest = $resultsRest['nombreRest'];
        $direcRest = $resultsRest['direcRest'];
        $telRest = $resultsRest['telRest'];
        $descRest = $resultsRest['descRest'];
        $imgRest = $resultsRest['imgRest'];
        $nombreUsu = $resultsUsu['nombreUsu'];
        $emailUsu = $resultsUsu['emailUsu'];
      }
     ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-2 hidden-xs"></div>
            <div class="col-md-6 col-sm-8 col-xs-12">
                <form class="form-container" action="perfilRestaurante.php" method="POST">
                    <h1>Tu Información</h1><br>
                    <div class="form-group">
                        <label for="nombreUsu">Nombre de Usuario</label>
                        <input type="text" class="form-control" id="nombreUsu" name="nombreUsu" required value="<?php echo $nombreUsu; ?>">
                    </div>
                    <div class="form-group">
                        <label for="emailUsu">Correo</label>
                        <input type="text" class="form-control" id="emailUsu" name="emailUsu" required value="<?php echo $emailUsu; ?>">
                    </div>


                    <br>
                    <button type="submit" name="modificarUsu" class="btn btn-success btn-block" style="width: 40%; margin: 0 auto; font-weight: bold;">Actualizar información</button>

                </form>
            </div>
            <div class="col-md-3 col-sm-2 hidden-xs"></div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-2 hidden-xs"></div>
            <div class="col-md-6 col-sm-8 col-xs-12">
                <form class="form-container" id="updateRest" action="perfilRestaurante.php" enctype="multipart/form-data" method="POST">
                    <h1> Tu Restaurante </h1><br>
                    <div class="form-group">
                        <label for="nombreRest">Nombre de Restaurante</label>
                        <input type="text" class="form-control" id="nombreRest" name="nombreRest" required value="<?php echo $nombreRest; ?>">
                    </div>
                    <div class="form-group">
                        <label for="direcRest">Dirección del Restaurante</label>
                        <input type="text" name="direcRest" class="form-control" id="direcRest" required value="<?php echo $direcRest; ?>">
                    </div>
                    <div class="form-group">
                        <label for="telRest"> Teléfono del Restaurante</label>
                        <input type="number" class="form-control" id="telRest" name="telRest" required value="<?php echo $telRest; ?>">
                    </div>
                    <div class="form-group">
                        <label for="descRest"> Descripción del Restaurante</label>
                        <textarea rows="5" form="updateRest" maxlength="100" class="form-control"  id="descRest" name="descRest"><?php echo $descRest; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="imgRest">Imágen del Restaurante</label>
                        <input type="file" name="imgRest" class="form-control" id="imgRest" placeholder="Modifica la Imágen de tu Restaurante">
                    </div>

                    <br>

                    <?php if(!empty($mensaje)): ?>
                    <p> <?= $mensaje ?></p>
                    <?php endif; ?>
                    <button type="submit" name="modificarRest" class="btn btn-success btn-block" style="width: 40%; margin: 0 auto; font-weight: bold;">Actualizar información</button>
                </form>
            </div>
            <div class="col-md-3 col-sm-2 hidden-xs"></div>
        </div>
    </div>


    <footer class="foot">
        <div class="container-fluid">
            <div class="row">
                <div class="text-center">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <a class="pie" href="http://www.facebook.com/" target="_blank"><img src="../../img/facebook2.png" width="10%" height="10%" onmouseover="this.src='../../img/facebook.png'"; onmouseout="this.src='../../img/facebook2.png'";></a>
                    </div>
                </div>
                <div class="text-center">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <a class="pie" href="https://www.instagram.com/" target="_blank"><img src="../../img/instagram2.png" width="10%" height="10%" onmouseover="this.src='../../img/instagram.png'"; onmouseout="this.src='../../img/instagram2.png'";></a>
                    </div>
                </div>
                <div class="text-center">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <a class="pie" href="https://www.youtube.com/" target="_blank"><img src="../../img/youtube2.png" width="10%" height="10%" onmouseover="this.src='../../img/youtube.png'"; onmouseout="this.src='../../img/youtube2.png'";></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
