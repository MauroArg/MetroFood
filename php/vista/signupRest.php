<!--sesion y conexion -->

<?php
    session_start();
    require('../../conexion/conexion.php');
    if (!isset($_SESSION['rol'])) {
        header('location: login.php');
    }
    if (isset($_SESSION['rol'])) {
    switch($_SESSION['rol'])
    {
        case "Cliente":
            header('location: homeClient.php');
        break;
        default:
    }
  }
?>

<?php
  if (isset($_POST['enviar']))
  {
    $nombreRest = $_POST["nombreRest"];
    $imgRest = addslashes(file_get_contents($_FILES['imgRest']['tmp_name']));
    $descRest = $_POST["descRest"];
    $direcRest = $_POST["direcRest"];
    $telRest = $_POST["telRest"];
    $idUsu = $_SESSION["idUsuario"];

    $results=$conexion->query("SELECT * FROM restaurante WHERE nombreRest='$nombreRest' or telRest='$telRest'");
    $exist = $results->num_rows;

    if ($exist>0)
    {
      $mensaje = '<i> Este restaurante ya existe </i>';
    }
    else
    {
      $consulta = "INSERT INTO restaurante(nombreRest, imgRest, descRest, direcRest, telRest, idUsu) VALUES ('$nombreRest','$imgRest','$descRest','$direcRest','$telRest','$idUsu')";
      $resultado = $conexion->query($consulta);
      header('location: homeRest.php');
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

    <title>Registro</title>
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

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-2 hidden-xs"></div>
            <div class="col-md-6 col-sm-8 col-xs-12">
                <form class="form-container" id="formRest" action="signupRest.php" enctype="multipart/form-data" method="POST">
                    <h1>Ingresa la informacion de tu restaurante </h1><br>
                    <div class="form-group">
                        <label for="nombreRest">Nombre de Restaurante</label>
                        <input type="text" class="form-control" id="nombreRest" name="nombreRest" required placeholder="Ingresa tu nombre de Restaurante">
                    </div>
                    <div class="form-group">
                        <label for="direcRest">Dirección del Restaurante</label>
                        <input type="text" name="direcRest" class="form-control" id="direcRest" required placeholder="Ingrese su Dirección">
                    </div>
                    <div class="form-group">
                        <label for="telRest"> Teléfono del Restaurante</label>
                        <input type="text" class="form-control" pattern="[0-9]{8}" id="telRest" name="telRest" required placeholder="Ingresa tu Número Teléfono">
                    </div>
                    <div class="form-group">
                        <label for="descRest"> Descripción del Restaurante</label>
                        <textarea rows="5" form="formRest" maxlength="100" class="form-control"  id="descRest" name="descRest" required placeholder="Descripcion del Restaurante"></textarea>
                    </div>
                    <div class="form-group" zise>
                        <label for="imgRest">Imágen del Restaurante</label>
                        <input type="file" name="imgRest" class="form-control" id="imgRest" required placeholder="Ingresa tu Imágen de Restaurante">
                    </div>

                    <br>

                    <?php if(!empty($mensaje)): ?>
                    <p> <?= $mensaje ?></p>
                    <?php endif; ?>
                    <button type="submit" name="enviar" class="btn btn-success btn-block" style="width: 40%; margin: 0 auto; font-weight: bold;">Registrate</button>

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
