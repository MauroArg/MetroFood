<?php
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
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title> MetroFood </title>
    <link rel="icon" type="image/png" href="../../img/logomf.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/categorias.css">


    <style type="text/css">
        .carousel-caption h2 {
            font-size: 60px;
            text-transform: uppercase;
            font-weight: 900;
        }

    </style>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        var cero = 0;
        $(document).ready(function()
        {
            $(window).on('scroll', function()
            {
                $('.navbar-inverse').toggleClass('hide', $(window).scrollTop() > cero);
                //cero= $(window).scrollTop()
            }
          )
        }
      )

    </script>
  </head>
  <body>
    <header>

        <nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img class="img-responsive" img src="../../img/logomf.png" style="width: 43px; height: 43px; float: left; margin-top: -10px; padding-bottom: 2px; margin-right: 3px;">Metro<span class="icono">Food</span></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav navbar-right">
                      <li><a href="homeClient.php" class="active">Inicio</a></li>
                      <li><a href="restaurante.php" class="active">Restaurantes</a></li>
                      <li><a href="categorias.php" class="active">Categorias</a></li>
                      <li><a href="contactanos.php" class="active">Contactanos</a></li>
                      <li><a href="../../conexion/cerrar.php" class="active">Cerrar sesión</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
      </header>

<!--muestreo de categorias-->
      <?php
      $i=0;
        include("../../conexion/conexion.php");
        $idCat = $_REQUEST['idCat'];
        $query = "SELECT * FROM platillo WHERE idCat='$idCat'";
        $resultado = $conexion->query($query);
        ?>
        <div class="container-fluid cuerpo">
        </div>
        <div class="container-fluid cuerpo">
        </div>
        <div class="titulo3">
          PLATILLOS
        </div>
        <?php
        while ($row = $resultado->fetch_assoc())
        {
      ?>
               <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                 <h3 class="titulo2"> <?php echo $row['nombrePlat']; ?> </h3>
                 <br>
                 <br>
                   <a href="#"><img class="cateimg"  src="data:image/png;base64,<?php echo base64_encode($row['imgPlat']); ?>" alt=""></a>
                   <br>
                   <br>
                   <div class="titulo2">
                     <?php echo $row['descripcionPlat']; ?>
                   </div>
                   <br>
                   <br>
                   <div class="titulo2">
                     <?php echo "$". $row['precio']; ?>
                   </div>
                   <div class="button">
                     <center> <button type="button" class="btn btn-primary" name="agregar"> Agregar Al Pedido </button> </center>
                   </div>
               </div>
      <?php
      $i++;
      if ($i%2==0) {
      ?>
      <div class="container-fluid cuerpo">
      </div>
      <?php
      }
        }
        ?>

        <div class="container-fluid cuerpo">
        </div>
<!--pie de pagina-->
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
