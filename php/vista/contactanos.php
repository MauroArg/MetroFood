<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-escale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/contactanos.css">
    <link rel="stylesheet" type="text/css" href="../../css/index.css">
    <link rel="icon" type="image/png" href="../../img/logomf.png" />
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

    <title>Contactanos</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <a class="navbar-brand" href="../../index.php"><img class="img-responsive" img src="../../img/logomf.png" style="width: 43px; height: 43px; float: left; margin-top: -10px; padding-bottom: 2px; margin-right: 3px;">Metro<span class="icono">Food</span></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </header>

    <h1 class="titulo">Contactanos</h1>
    <div class="container-fluid cuerpo">
        <div class="row ">
            <h2 class="texto2">Nosotros como MetroFood siempre trataremos de ser la mejor plataforma de servicio para comida rapida, a lo largo de todo el país, estar siempre a la vanguardia ante la competencia y brindarte la mejor atención porque sabemos que tú lo mereces.</h2>
            <hr class="texto">
            <p class="texto">EN CASO QUE NECESITES SOLVENTAR CUALQUIER DUDA O QUIERAS REPORTAR ALGÚN PROBLEMA PUEDES CONTACTARTE CON NOSOTROS POR LOS SIGUIENTES MEDIOS:</p>
            <br>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="border-top:3px solid #DF9A06 ;">
                <h3 class="titulo2">Nuestro Correo Electrónico:</h3>
                <br>
                <p class="texto">Metrofrood@gmail.com</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="border-bottom:3px solid #DF9A06;">
                <h3 class="titulo2">Nuestros números de atención al cliente:</h3>
                <br>
                <p class="texto">(+503) 2299-2134</p>
                <br>
                <p class="texto">(+503) 2299-2135</p>
                <br>
                <p class="texto">(+503) 2299-2136</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="border-top:3px solid #DF9A06;">
                <h3 class="titulo2">La dirección de nuestras oficinas:</h3>
                <br>
                <p class="texto">Km. 11 Carretera a Santa Tecla. Rutas de Buses: 101 B, 101 A directo, R 79 </p>
            </div>
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
