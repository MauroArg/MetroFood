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
			case "Cliente":
					header('location: homeClient.php');
			break;
			default:
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
                <div class="form-container">
                    <h1 align="center">ADMINISTRADOR</h1><br>
                    <div class="form-group">
                        <a href="../../modelo/cliente.php" name="GestionarClientes" class="btn btn-success btn-block" style="width: 40%; margin: 0 auto; font-weight: bold;">Gestionar Clientes</a>
                    </div>
                    <br>
                    <div class="form-group">
                        <a href="../../modelo/restaurante.php" name="GestionarRestaurantes" class="btn btn-success btn-block" style="width: 40%; margin: 0 auto; font-weight: bold;">Gestionar Restaurantes</a>
                    </div>
                    <br>
                    <div class="form-group">
                        <a href="../../modelo/menu.php" name="GestionarMenús" class="btn btn-success btn-block" style="width: 40%; margin: 0 auto; font-weight: bold;">Gestionar Menús</a>
                    </div>
                    <br>
                    <div class="form-group">
                        <a href="../../modelo/categoria.php" name="GestionarCategorias" class="btn btn-success btn-block" style="width: 40%; margin: 0 auto; font-weight: bold;">Gestionar Categorias</a>
                    </div>
                    <br>
                    <div class="form-group ">
                        <a href="../../modelo/pedido.php"name="GestionarPedidos" class="btn btn-success btn-block" style="width: 40%; margin: 0 auto; font-weight: bold;">Gestionar Pedidos</a>
                        </div>
                        <br>
                    <div class="form-group ">
                        <a href="../../conexion/cerrar.php"name="Cerrar" class="btn btn-danger btn-block" style="width: 40%; margin: 0 auto; font-weight: bold;">Cerrar Sesión</a>
                    </div>
                    </div>

                </div>
            </div>
            <div class="col-md-3 col-sm-2 hidden-xs"></div>
        </div>
    </div>

    <footer class="foot">
        <div class="container-fluid">

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
    </footer>

</body>

</html>
