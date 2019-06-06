<?php
error_reporting(0);
session_start();
if (isset($_SESSION['rol'])) {
switch($_SESSION['rol'])
{
    case "Restaurante":
        header('location: homeRest.php');
    break;
    case "Cliente":
        header('location: homeClient.php');
    break;

    case "Admin":
        header('location:homeAdmin.php');
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
	if (!empty($_POST['nombreUsu']) && !empty($_POST['passUsu']))
	{
	    $records = $conexion->prepare('SELECT * FROM usuario WHERE nombreUsu = :nombreUsu');
	    $records->bindParam(':nombreUsu', $_POST['nombreUsu']);
	    $records->execute();
	    $results = $records->fetch(PDO::FETCH_ASSOC);
	    $mensaje = '';
	    if (count($results) > 0 && password_verify($_POST['passUsu'], $results['passUsu']))
      {
            $rol = $results["rolUsu"];
            $_SESSION['rol'] = $rol;
            $id_Usu = $results['idUsu'];
            $_SESSION['idUsuario'] = $id_Usu;
            switch($_SESSION['rol'])
            {
                case "Restaurante":
                    header('location: ../vista/homeRest.php');
                break;

                case "Cliente":
                    header('location: ../vista/homeClient.php');
                break;
                case "Admin":
                    header('location: ../vista/homeAdmin.php');
                break;

                default:
            }
	    }
      else
      {
	      $mensaje = 'Lo sentimos, estas credenciales no coinciden.';
	    }
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-escale=1">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/login.css">
	<link rel="stylesheet" type="text/css" href="../../css/index.css">
	<link rel="shortcut icon"  href="../../img/logomf.png" />

	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

				<script type="text/javascript">
					var cero=0;
					$(document).ready(function(){
						$(window).on('scroll',function(){
							$('.navbar-inverse').toggleClass('hide', $(window).scrollTop()>cero);
						})
					})
				</script>

	<title>Log-In</title>
</head>
<body>
	<header>
		<nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
		  <div class="container">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <a class="navbar-brand" href="../../index.php"><img class="img-responsive imgsize" img src="../../img/logomf.png" style="width: 43px; height: 43px; float: left; margin-top: -10px; padding-bottom: 2px; margin-right: 3px;">Metro<span class="icono">Food</span></a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		  </div><!-- /.container-fluid -->
		</nav>
	</header>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3 col-sm-2 hidden-xs"></div>
			<div class="col-md-6 col-sm-8 col-xs-12">
				<form class="form-container" action="login.php" method="POST">
				  <h1>Log-In</h1><br>
				  <div class="form-group">
				    <label for="nombreUsu">Nombre de usuario</label>
				    <input type="text" class="form-control" id="nombreUsu" name="nombreUsu" required placeholder="Nombre de Usuario">
				  </div>
				  <div class="form-group">
				    <label for="passUsu">Contraseña</label>
				    <input type="password" class="form-control" id="passUsu" name="passUsu" required placeholder="Contraseña">
				  </div>
				  <br>
				  <?php if(!empty($mensaje)): ?>
				      <p> <?= $mensaje ?></p>
				  <?php endif; ?>
				  <button type="submit" class="btn btn-success btn-block">Iniciar Sesión</button>
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
