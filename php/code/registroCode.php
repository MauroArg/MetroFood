<?php
    session_start();
    if (isset($_SESSION['rol'])) {
    switch($_SESSION['rol'])
    {
        case "Restaurante":
            header('location: /vista/homeRest.php');
        break;

        case "Cliente":
            header('location: /vista/homeClient.php');
        break;

        default:
    }
  }
?>

<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../js/seetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../../css/sweetalert2.min.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>

<body>

   <script >
       Campos()
       {
           swal('malo');
       }
    </script>

    <script src=""></script>
    <?php
error_reporting(E_ALL ^ E_NOTICE);
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
if (isset($_POST['enviar']))
{

	$nombreUsu = $_POST['nombreUsu'];
	$passUsu = $_POST['passUsu'];
  $confPass = $_POST['confPass'];
	$emailUsu = $_POST['emailUsu'];
	$rolUsu = $_POST['rolUsu'];

	$exist=$conexion->query("SELECT * FROM usuario WHERE nombreUsu='$nombreUsu' or emailUsu='$emailUsu'");
  $query = "SELECT * FROM usuario WHERE nombreUsu = '$nombreUsu'";
  $resultado = $conexion->query($query);


	if ($exist->rowCount()>0)
  {
		$mensaje = '<i> Este usuario ya existe </i>';
	}
    else if ($_POST['passUsu'] != $_POST['confPass'])
    {
                $mensaje = '<i> Las contraseñas no coinciden</i>';
    }
	else
    {
		if (!empty($_POST['nombreUsu']) && !empty($_POST['passUsu']) && !empty($_POST['emailUsu']) && !empty($_POST['rolUsu']))
        {
	    $sql = "INSERT INTO usuario (nombreUsu, passUsu, emailUsu, rolUsu) VALUES (:nombreUsu, :passUsu, :emailUsu, :rolUsu)";
	    $stmt = $conexion->prepare($sql);
	    $stmt->bindParam(':nombreUsu', $_POST['nombreUsu']);
	    $stmt->bindParam(':emailUsu', $_POST['emailUsu']);
	    $stmt->bindParam(':rolUsu', $_POST['rolUsu']);
	    $passUsu = password_hash($_POST['passUsu'], PASSWORD_BCRYPT);
	    $stmt->bindParam(':passUsu', $passUsu);
	    if ($stmt->execute())
        {
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
                    $idUsu = $results["idUsu"];
                    $_SESSION["idUsuario"]=$idUsu;
                    switch($_SESSION['rol'])
                    {
                        case "Restaurante":
                            header('location: ../vista/signupRest.php');
                        break;

                        case "Cliente":
                            header('location: ../vista/signupClient.php');
                        break;

                        default:
                    }
             }
              else
              {
               $mensaje = 'Lo sentimos, estas credenciales no coinciden.';
             }
         }
        }
        else
        {
	      $mensaje = 'Lo sentimos, se ha ocasionado un error.';
	    }
	  }
	  }
	}
?>

</body>

</html>
