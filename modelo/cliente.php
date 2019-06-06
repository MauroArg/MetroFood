<?php
	session_start();
	if (!isset($_SESSION['rol'])) {
			header('location: php/vista/login.php');
	}
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
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Clientes</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!-- Estilos -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<!-- Javascript -->
	<script src="../js/popper.min.js"></script>
</head>
<body>


<!-- ELIMINAR -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="../procesos/delete.php" method="POST" >
      <div class="modal-body">

				<input type="hidden" name="deleteIdc" id="deleteIdc">
				<h4> Quieres eliminar este Cliente? </h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
        <button type="submit" name="deleteCliente" class="btn btn-primary">SI</button>
      </div>
      </form>
    </div>
  </div>
</div>
	<!--MENU -->
	<nav class="navbar navbar-toggleable-md navbar-light bg-faded" style="background-color: #010F20; font-weight: 900;">
	  <a class="navbar-brand" style="color: white; font-size: 30px;" href="../php/vista/homeAdmin.php"><img class="img-responsive imglogo" img src="../img/logomf.png" style="margin-top: 1px; height: 50px; width: 50px;">Metro<span class="icono" style="color: #DF9A06; font-weight: 900; font-size: 30px;">Food</span></a>
	  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	    <div class="navbar-nav ml-auto">
	      <a class="nav-item nav-link active" href="#" style="color: white;">Clientes <span class="sr-only">(current)</span></a>
	      <a class="nav-item nav-link" href="../php/vista/homeAdmin.php" style="color: white;">Regresar</a>
	    </div>
	  </div>
	</nav>
	<br><br>
   	<div class="container">
     	<div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
          <h1 style="border-bottom: 2px solid; border-color: #DF9A06; text-transform: uppercase; font-weight: bold; color: #DF9A06;">Clientes</h1>
        </div>
      	</div>

        <br> <br>
        <div class="card">
          <div class="card-body">
             <br>
             <?php
               require('../conexion/conexion.php');
               $query = "SELECT * FROM cliente";
               $results = $conexion->query($query);
               ?>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col"><center>ID</center></th>
                  <th scope="col"><center>Nombre Cliente</center></th>
                  <th scope="col"><center>Apellido Cliente</center></th>
                  <th scope="col"><center>Dirección Cliente</center></th>
                  <th scope="col"><center>Edad Cliente</center></th>
                  <th scope="col"><center>Telefono Cliente</center></th>
                  <th scope="col"><center>IdUsuario Cliente</center></th>
                  <th scope="col"><center>Comandos</center> </th>
                </tr>
              </thead>
              <?php
                  if ($results)
                  {
                    while($row = $results->fetch_assoc())
                    {
                ?>
              <tbody>
                <tr>
                  <td> <center> <?php echo $row['idClient']; ?> </center> </td>
                  <td> <center> <?php echo $row['nombreClient'];  ?> </center> </td>
                  <td> <center> <?php echo $row['apellidoClien']; ?> </center> </td>
                  <td> <center> <?php echo $row['direcClient']; ?> </center> </td>
                  <td> <center> <?php echo $row['edadClient']; ?> </center> </td>
                  <td> <center> <?php echo $row['telClient']; ?> </center> </td>
                  <td> <center> <?php echo $row['idUsu']; ?> </center> </td>
                  <td> <center>
                    <button type="button" class="btn btn-danger deletebtn" name="deleteCliente"> ELIMINAR  </button>
                  </center> </td>
                </tr>
              </tbody>
              <?php
            }
          }
          else
          {
              echo "No hay clientes aun.";
          }
         ?>
            </table>
          </div>
        </div>
    </div>
    <br><br>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

		<script>
      $(document).ready(function(){
        $('.deletebtn').on('click', function(){

          $('#deletemodal').modal('show');

              $tr = $(this).closest('tr');

              var data = $tr.children("td").map(function() {
                return $(this).text();
              }).get();

              console.log(data);

							$('#deleteIdc').val(data[6]);
        });
      });
    </script>

  </body>
</html>
