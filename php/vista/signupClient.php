<?php
    error_reporting(E_ALL ^ E_NOTICE);
    session_start();
    if (!isset($_SESSION['rol'])) {
        header('location: login.php');
    }
    if (isset($_SESSION['rol'])) {
    switch($_SESSION['rol'])
    {
        case "Restaurante":
            header('location: homeRest.php');
        break;
        default:
    }
  }

  function conectar()
      {
          try {
              $HOST   = 'localHost';
              $DBNAME = 'metrofood';
              $USER   = 'root';
              $PASS   = '';
              $con    = new PDO("mysql:host={$HOST}; dbname={$DBNAME}", $USER, $PASS);
              $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $con->exec('SET CHARACTER SET UTF8');
          } catch (PDOException $e) {
              echo $e->getMessage();
          }
          return $con;
      }

  	$conexion=conectar();
?>

<?php
if (isset($_POST['enviar']))
{
  $nombreClient = $_POST["nombreClient"];
  $apellidoClien = $_POST["apellidoClien"];
  $direcClient = $_POST["direcClient"];
  $edadClient = $_POST["edadClient"];
  $telClient = $_POST["telClient"];
  $idUsu = $_SESSION["idUsuario"];

  $exist=$conexion->query("SELECT * FROM cliente WHERE telCLient='$telClient'");
  $query = "SELECT * FROM cliente WHERE nombreClient = '$nombreClient'";
  $resultado = $conexion->query($query);

  if ($exist->rowCount()>0)
  {
    $mensaje = '<i> Este numero ya esta en uso </i>';
  }
  else
  {
    $consulta1 = "INSERT INTO cliente(nombreClient, apellidoClien, direcClient, edadClient, telCLient, idUsu) VALUES ('$nombreClient','$apellidoClien','$direcClient','$edadClient','$telClient','$idUsu')";
    $resultado = $conexion->query($consulta1);
    header('location: homeClient.php');
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
                <form class="form-container" action="signupClient.php" method="POST">
                    <h1>Registrate</h1><br>
                    <div class="form-group">
                        <label for="nombreClient">Nombre</label>
                        <input type="text" class="form-control" id="nombreClient" name="nombreClient" required placeholder="Ingresa tu Nombre">
                    </div>
                    <div class="form-group">
                        <label for="apellidoClien">Apellido</label>
                        <input type="text" name="apellidoClien" class="form-control" id="apellidoClien" required placeholder="Ingresa tu Apellido">
                    </div>
                    <div class="form-group">
                        <label for="direcClient">Dirección</label>
                        <input type="text" name="direcClient" class="form-control" id="direcClient" required placeholder="Ingresa tu Dirección">
                    </div>
                    <div class="form-group">
                        <label for="edadClient">Edad</label>
                        <input type="number" class="form-control" id="edadClient" name="edadClient" required placeholder="Ingresa tu edad">
                    </div>
                    <div class="form-group">
                        <label for="telClient">Teléfono</label>
                        <input type="text" class="form-control" id="telClient" pattern="[0-9]{8}" name="telClient" required placeholder="Ingresa tu teléfono">
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
