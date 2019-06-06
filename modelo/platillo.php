<?php
	session_start();
	require('../conexion/conexion.php');
	if (!isset($_SESSION['rol'])) {
			header('location: php/vista/login.php');
	}
	if (isset($_SESSION['rol'])) {
	switch($_SESSION['rol'])
	{
			case "Admin":
					header('location: ../php/vista/homeAdmin.php');
			break;
			case "Cliente":
					header('location: ../php/vista/homeClient.php');
			break;
			default:
	}
	}
 ?>

 <!DOCTYPE html>
 <html lang="es">
 <head>
 	<meta charset="UTF-8">
 	<title>Platillo</title>
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 	<!-- Estilos -->
 	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
 	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
 	<link rel="stylesheet" type="text/css" href="../css/style.css">
 	<!-- Javascript -->
 	<script src="../js/popper.min.js"></script>
 </head>
 <body>
   <!-- AGREGAR -->
   <div class="modal fade" id="platilloagregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title">Agregar Platillo</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <form action="../procesos/agregar.php" id='formAddPlat' method="POST" enctype="multipart/form-data">
         <div class="modal-body">
             <div class="form-group">
               <label for="nombrePlat">Nombre de Platillo</label>
               <input type="text" required class="form-control" name="nombrePlat" id="nombrePlat" placeholder="Inserte un nombre de platillo">
             </div>
             <div class="form-group">
               <label for="imgPlat">Imagen de Platillo</label>
               <input type="file" required class="form-control" name="imgPlat" id="imgPlat">
             </div>
             <div class="form-group">
               <label for="precio">Precio de Platillo</label>
               <input type="text" required class="form-control" name="precio" id="precio" placeholder="Inserte el precio de Platillo">
             </div>
             <div class="form-group">
               <label for="descripcionPlat">Descripción de Platillo</label>
							 <br>
               <textarea name="descripcionPlat" id="descripcionPlat" class="form-group" form="formAddPlat" rows="5" cols="57"></textarea>
             </div>
						 <div class="form-group">
							 <?php
								 $query = "SELECT * FROM menu";
								 $nombreMenu = $conexion->query($query);
								 ?>
            <label for="nombreMenu">Menu</label>
            <select required class="form-control" name="nameMenu" id="nombreMenu" >
							<?php
					    while ( $rowsito = $nombreMenu->fetch_array() )
					    {
							$nombreMen = str_replace(" ","",$rowsito['nombreMenu'] );
					        ?>

					        <option name="nombreMenu" id="nombreMenu" value="<?php echo $nombreMen ?>" >
					        <?php echo $nombreMen; ?>
					        </option>

					        <?php
					    }
					    ?>
            </select>
          </div>
					<div class="form-group">
						<?php
							$query = "SELECT * FROM categoria";
							$nombreCat = $conexion->query($query);
							?>
				 <label for="nombreCat">Categoria</label>
				 <select required class="form-control" name="nameCat" id="nombreCat" >
					 <?php
					 while ( $rowsito2 = $nombreCat->fetch_array() )
					 {
						 $nombreCa = str_replace(" ","",$rowsito2['nombreCat']);
							 ?>

							 <option name="nombreCat" id="nombreCat" value="<?php echo $nombreCa?>" >
							 <?php echo $nombreCa; ?>
							 </option>

							 <?php
					 }

					 ?>
				 </select>
			 </div>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
           <button type="submit" name="insertPlat" class="btn btn-primary">Agregar Platillo</button>
         </div>
         </form>
       </div>
     </div>
   </div>

   <!-- EDITAR -->
   <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title">Editar Platillo</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>

         <form action="../procesos/update.php" id="formEditPlat" method="POST" enctype="multipart/form-data">
         <div class="modal-body">
					 <div class="form-group">
     				<input type="hidden" name="updateIdp" id="updateIdp">
					 </div>
             <div class="form-group">
               <label for="nombrePlat">Nombre de Platillo</label>
               <input type="text" class="form-control" name="nombrePlat" id="nombrePlat" placeholder="Inserte un nombre de platillo">
             </div>
             <div class="form-group">
               <label for="imgPlat">Imagen de Platillo</label>
               <input type="file"class="form-control" name="imgPlat" id="imgPlat">
             </div>
             <div class="form-group">
               <label for="precio">Precio de Platillo</label>
               <input type="text" required class="form-control" name="precio" id="precio" placeholder="Inserte el precio de Platillo">
             </div>
             <div class="form-group">
               <label for="descripcionPlat">Descripción de Platillo</label>
               <textarea rows="5" form="formEditPlat" maxlength="100" class="form-control"  id="descripcionPlatillo" name="descripcionPlatillo" required placeholder="Descripcion del Platillo"></textarea>
             </div>
						 <div class="form-group">
 							<?php
 								$query = "SELECT * FROM menu";
 								$nombreMenu = $conexion->query($query);
 								?>
 					 <label for="nombreMenu">Menu</label>
 					 <select required class="form-control" name="nameMenu" id="nombreMenu" >
 						 <?php
 						 while ( $rowsito = $nombreMenu->fetch_array() )
 						 {
 						 $nombreMen = str_replace(" ","",$rowsito['nombreMenu'] );
 								 ?>

 								 <option name="nombreMenu" id="nombreMenu" value="<?php echo $nombreMen ?>" >
 								 <?php echo $nombreMen; ?>
 								 </option>

 								 <?php
 						 }
 						 ?>
 					 </select>
 				 </div>
 				 <div class="form-group">
 					 <?php
 						 $query = "SELECT * FROM categoria";
 						 $nombreCat = $conexion->query($query);
 						 ?>
 				<label for="nombreCat">Categoria</label>
 				<select required class="form-control" name="nameCat" id="nombreCat" >
 					<?php
 					while ( $rowsito2 = $nombreCat->fetch_array() )
 					{
 						$nombreCa = str_replace(" ","",$rowsito2['nombreCat']);
 							?>

 							<option name="nombreCat" id="nombreCat" value="<?php echo $nombreCa?>" >
 							<?php echo $nombreCa; ?>
 							</option>

 							<?php
 					}

 					?>
 				</select>
 			</div>
 				</div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
           <button type="submit" name="updatePlat" class="btn btn-primary">Editar Platillo</button>
         </div>
         </form>
       </div>
     </div>
   </div>

   <!-- ELIMINAR -->
   <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>

         <form action="../procesos/delete.php" method="POST" enctype="multipart/form-data">
         <div class="modal-body">

   				<input type="hidden" name="deleteIdp" id="deleteId">
   				<h4> Quieres eliminar este Platillo? </h4>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
           <button type="submit" name="deletePlat" class="btn btn-primary">SI</button>
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
   	      <a class="nav-item nav-link active" href="#" style="color: white;">Platillo <span class="sr-only">(current)</span></a>
   	      <a class="nav-item nav-link" href="../php/vista/homeAdmin.php" style="color: white;">Regresar</a>
   	    </div>
   	  </div>
   	</nav>
   	<br><br>
      	<div class="container">
        	<div class="row">
           <div class="col-xs-12 col-md-12 col-lg-12">
             <h1 style="border-bottom: 2px solid; border-color: #DF9A06; text-transform: uppercase; font-weight: bold; color: #DF9A06;">platillo</h1>
           </div>
         	</div>

             <div class="card-body">
               <br>
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#platilloagregar">+</button>
             </div>

           <br> <br>
           <div class="card">
             <div class="card-body">
                <br>
                <?php
									$rest = $_SESSION['restaurante'];
								  $query = "SELECT * FROM platillo inner join menu on platillo.idMenu = menu.idMenu
																					 				inner join categoria on platillo.idCat = categoria.idCat WHERE idRest = $rest";
                  $results = $conexion->query($query);
                  ?>
               <table class="table">
                 <thead>
                   <tr>
                     <th scope="col"><center>ID</center></th>
                     <th scope="col"><center>Nombre Platillo</center></th>
                     <th scope="col"><center>Imagen Platillo</center></th>
                     <th scope="col"><center>Precio Platillo</center></th>
                     <th scope="col"><center>Descripción Platillo</center></th>
	 									<th scope="col"><center>Menu al que pretenece</center></th>
	 									<th scope="col"><center>Categoria</center></th>
                     <th scope="col" colspan="2"><center>Comandos</center> </th>
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
                     <td> <center> <?php echo $row['idPlat']; ?> </center> </td>
                     <td> <center> <?php echo $row['nombrePlat'];  ?> </center> </td>
                     <?php $imagen = $row['imgPlat']; ?>
   									<?php $nombrePlat = $row['nombrePlat']; ?>
                     <td> <center> <?php echo '<img height="60" width="60" src="data:image/png;base64,'.base64_encode($imagen) .' "/>'; ?> </center> </td>
                     <td> <center> <?php echo $row['precio']; ?> </center> </td>
                     <td> <center> <?php echo $row['descripcionPlat']; ?> </center> </td>
										 <td> <center> <?php echo $row['nombreMenu']; ?> </center> </td>
										 <td> <center> <?php echo $row['nombreCat']; ?> </center></td>
                     <td> <center>
                         <button type="button" class="btn btn-success editbtn" name="editPlat"> EDITAR  </button>
                     </center> </td>
                     <td>
   											<button type="button" class="btn btn-danger deletebtn" name="deletePlat"> ELIMINAR  </button>
                    </td>
                   </tr>
                 </tbody>
                 <?php
               }
             }
             else
             {
                 echo "No hay platillos aun.";
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

   							$('#deleteId').val(data[0]);
           });
         });
       </script>

   		<script>
         $(document).ready(function(){
           $('.editbtn').on('click', function(){

             $('#editmodal').modal('show');

                 $tr = $(this).closest('tr');

                 var data = $tr.children("td").map(function() {
                   return $(this).text();
                 }).get();

                 console.log(data);

   							$('#updateIdp').val(data[0]);
           });
         });
       </script>
     </body>
   </html>
