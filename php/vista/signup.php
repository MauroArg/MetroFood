<?php require_once '../code/registroCode.php'; ?>
<?php
	error_reporting(E_ALL ^ E_NOTICE);
	session_start();
	if (isset($_SESSION['rol'])) {
	switch($_SESSION['rol'])
	{
			case "Restaurante":
					header('location: signupRest.php');
			break;
			case "Cliente":
					header('location: signupClient.php');
			break;

			case "Admin":
					header('location: homeAdmin.php');
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
                <form class="form-container" action="signup.php" method="POST">
                    <h1>Registrate</h1><br>
                    <div class="form-group">
                        <label for="nombreUsu">Nombre de Usuario</label>
                        <input type="text" class="form-control" id="nombreUsu" name="nombreUsu" required placeholder="Ingresa tu nombre de usuario">
                    </div>
                    <div class="form-group">
                        <label for="passUsu">Contraseña</label>
                        <input type="password" name="passUsu" class="form-control" id="passUsu" required placeholder="Ingresa tu contraseña">
                    </div>
                    <div class="form-group">
                        <label for="passUsu">Confirmar contraseña</label>
                        <input type="password" name="confPass" class="form-control" id="confPass" required placeholder="Confirma tu contraseña">
                    </div>
                    <div class="form-group">
                        <label for="emailUsu">Correo</label>
                        <input type="email" class="form-control" id="emailUsu" name="emailUsu" required placeholder="Ingresa tu nombre Correo">
                    </div>
                    <div class="form-group ">
                        <label for="emailUsu">Ingresar como:</label>
                        <div class="drop">
                            <select class="form-control" required name="rolUsu">
                                <option></option>
                                <option value="Restaurante"> Restaurante</option>
                                <option value="Cliente">Cliente</option>
                            </select>
                        </div>
                    </div>

                    <br>

                    <?php if(!empty($mensaje)): ?>
                    <p> <?= $mensaje ?></p>
                    <?php endif; ?>
                    <button type="submit" name="enviar" class="btn btn-success btn-block" style="width: 40%; margin: 0 auto; font-weight: bold;">Siguiente</button>

                </form>
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
