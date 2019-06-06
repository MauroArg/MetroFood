<?php
    error_reporting(E_ALL ^ E_NOTICE);
    session_start();
    if (isset($_SESSION['rol'])) {
    switch($_SESSION['rol'])
    {
        case "Restaurante":
            header('location: php/vista/homeRest.php');
        break;

        case "Cliente":
            header('location: php/vista/homeClient.php');
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
    <link rel="icon" type="image/png" href="img/logomf.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">


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
        $(document).ready(function() {
            $(window).on('scroll', function() {
                $('.navbar-inverse').toggleClass('hide', $(window).scrollTop() > cero);
                //cero= $(window).scrollTop()
            })
        })

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
                    <a class="navbar-brand" href="index.php"><img class="img-responsive" img src="img/logomf.png" style="width: 43px; height: 43px; float: left; margin-top: -10px; padding-bottom: 2px; margin-right: 3px;">Metro<span class="icono">Food</span></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php" class="active">Inicio</a></li>
                        <li><a href="php/vista/login.php">Iniciar Sesión</a></li>
                        <li><a href="php/vista/signup.php">Regístrate</a></li>
                        <li><a href="php/vista/contactanos.php">Contáctanos</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <!-- SLIDER -->
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <div class="banner" style="background-image: url(img/city1.jpg);"></div>
                    <div class="carousel-caption">
                        <h2>Metro<span>Food</span></h2>
                        <h3>Servicio de comida a domicilio</h3>
                        <p><a href="php/vista/contactanos.php">Contáctanos</a></p>
                    </div>
                </div>
                <div class="item">
                    <div class="banner" style="background-image: url(img/city4.jpg);"></div>
                    <div class="carousel-caption">
                        <h2>Somos <span>Innovación</span></h2>
                        <h3>Servicio de comida a domicilio</h3>
                        <p> <a href="php/vista/signup.php"> Registrate </a> </p>
                    </div>
                </div>
                <div class="item">
                    <div class="banner" style="background-image: url(img/res.jpg);"></div>
                    <div class="carousel-caption">
                        <h2>Somos el <span>Futuro</span></h2>
                        <h3>Servicio de comida a domicilio</h3>
                        <p> <a href="php/vista/login.php">Inicia Sesion</a></p>
                    </div>
                </div>
                <!--...-->
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </header>


    <div class="container-fluid cuerpo">
        <!--***************CONTENEDOR DESCRIPCION*******************-->
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="border-top:3px solid #DF9A06;">
                <h1>MetroFood</h1>
                <p>Asóciate con MetroFood para acceder a una nueva manera de generar ganancias en tu negocio de comida, darte a conocer a nuevos clientes y llevar alimento a la mesa de tus clientes de siempre.Mediante el servicio empleado en MetroFood se logra efectuar el papel de intermediarios eficaces entre cliente y empresa o negocio, proporcionando de esta manera, beneficios para ambos.</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="border-bottom:3px solid #DF9A06;">
                <h1>Servicio a domicilio</h1>
                <p>Con MetroFood te ofrecemos el mejor servicio de comida a domicilio. presentamos una experiencia única para hacer crecer tu negocio, siendo de esta manera, tu restaurante a domicilio. Así mismo se logran alcanzar los niveles máximos de satisfacción de todos los clientes de tu empresa y consumidores de nuestro servicio empleado en nuestra aplicación.</p><br><br>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="border-top:3px solid #DF9A06;">
                <h1>Mejora tu experiencia</h1>
                <p>La innovación y tecnología que ofrece los servicios de MetroFood bridará a tu negocio una nueva experiencia. Con nuestra app tus clientes tendrán la oportunidad de gestionar pedidos a domicio. Gracias a nuestra aplicación y pagina web, se facilita generar un incremento en el nivel de ingresos a negocios de comida aliadas, todo esto, mediante el servicio etico, profesional e innovador que ofrecemos a cada uno de los clientes.</p>
            </div>
        </div>
    </div>
    <div class="container-fluid cuerpo2">
        <!--***************CONTENEDOR IMAGENES*******************-->
        <div class="clear-fix"></div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <img class="img-responsive imgRes" img src="img/res3.jpg"><br><br>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <img class="img-responsive imgRes" img src="img/res4.jpg"><br><br>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <img class="img-responsive imgRes" img src="img/res5.jpg"><br><br>
            </div>
        </div>
    </div>
    <div class="container-fluid cuerpo2">
        <!--***************CONTENEDOR SERVICIOS*******************-->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border-bottom:3px solid #DF9A06;">
                <h1>Nuestros Servicios</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <br>
                <p>Mediante el servicio empleado en MetroFood se logra efectuar el papel de intermediarios eficaces entre cliente y empresa, proporcionando de esta manera, beneficios para ambos. Gracias a nuestra aplicación y pagina web, se facilita generar un incremento en el nivel de ingresos a negocios de comida aliadas, todo esto, mediante el servicio etico, profesional e innovador que ofrecemos a cada uno de los clientes. Asi mismo se logran alcanzar los niveles maximos de satisfacción de todos nuestros clientes y consumidores de nuestro servicio empleado en nuestra pagina web.</p>
            </div>
        </div>
    </div>
    <div class="clear-fix"></div>
    <div class="container-fluid cuerpo2">
        <!--***************RECUADRO PARA LG Y MD*******************-->
        <div class="row" style="background-color: #DF9A06;">
            <div class="col-lg-3 col-md-3 hidden-sm hidden-xs" style="padding: 0px;">

                <h1 class="text-center" style="color: white; font-size: 50px; padding-top: 15%;"><b>¿Todo listo para empezar?</b></h1><br>
                <p class="text-center" style="color: white; font-size: 20px; padding: 10px, 0px;">Asóciate con MetroFood para acceder a una nueva manera de generar ganancias en tu negocio de comida y darte a conocer a nuevos clientes o pide deliciosos platillos desde el restaurante de tú elección.</p><br>
                <center> <a href="php/vista/signup.php"><button type="submit" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#signupModal">Empezar ahora</button></a></center>

            </div>
            <div class="col-lg-9 col-md-9 hidden-sm hidden-xs" style="padding: 0px;">

                <img src="img/res2.jpg" style="width: 100%; height: 600px;" class="img-responsive">

            </div>
        </div>
    </div>
    <div class="clear-fix"></div>
    <div class="container-fluid cuerpo">
        <!--***************RECUADRO PARA SM Y XS*******************-->
        <div class="row" style="background-color: #DF9A06;">
            <div class="hidden-lg hidden-md col-sm-12 col-xs-12" style="padding: 0px;">

                <h1 class="text-center" style="color: white; font-size: 40px; padding-top: 5%;"><b>¿Todo listo para empezar?</b></h1><br>
                <p class="text-center" style="color: white; font-size: 25px; padding: 10px;">Asóciate con MetroFood para acceder a una nueva manera de generar ganancias en tu negocio de comida y darte a conocer a nuevos clientes o pide deliciosos platillos desde el restaurante de tú elección.</p><br><br>
                <center> <a href="php/vista/signup.php"><button type="submit" class="btn btn-primary btn-lg" style="margin-bottom: 5%;" data-toggle="modal" data-target="#signupModal">Empezar ahora</button></a></center>

            </div>
            <div class="hidden-lg hidden-md col-sm-12 col-xs-12" style="padding: 0px;">
                <img src="img/rest4.jpg" style="width: 100%; height: 600px;" class="img-responsive">
            </div>
        </div>
    </div>


    <footer class="foot">
        <div class="container-fluid">
            <div class="row">
                <div class="text-center">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <a class="pie" href="http://www.facebook.com/" target="_blank"><img src="img/facebook2.png" width="10%" height="10%" onmouseover="this.src='img/facebook.png'"; onmouseout="this.src='img/facebook2.png'";></a>
                    </div>
                </div>
                <div class="text-center">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <a class="pie" href="https://www.instagram.com/" target="_blank"><img src="img/instagram2.png" width="10%" height="10%" onmouseover="this.src='img/instagram.png'"; onmouseout="this.src='img/instagram2.png'";></a>
                    </div>
                </div>
                <div class="text-center">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <a class="pie" href="https://www.youtube.com/" target="_blank"><img src="img/youtube2.png" width="10%" height="10%" onmouseover="this.src='img/youtube.png'"; onmouseout="this.src='img/youtube2.png'";></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>
