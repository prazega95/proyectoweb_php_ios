<?php include("db.php");  ?>

<?php include('includes/header.php'); ?>
<script src = 'validacion/formAdministrador.js'></script>

<br>
<h1 class="text-center">LISTA DE USUARIOS</h1>
<br>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">


      <!-- MENSAJE DE GUARDADO-->
      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>





      <!-- INSERSION DE NUEVO CIUDADANO -->
      <div class="card card-body">

      <h5 class="text-center">Formulario de administracion</h5>
      <h6 class="text-center">----------------------------------------------------</h6><br>

        <form name="form1" action="insertar_usuario.php" method="POST" onsubmit="return validar()">


          <div class="form-group">
            <input type="text" name="nom_usuario" class="form-control" placeholder="Nombre:"  autofocus>
            <label id="error" style="color:red"></label>
          </div>
          <div class="form-group" >
            <input type="text" name="ape_usuario" class="form-control" placeholder="Apellido:" autofocus>
            <label id="error2" style="color:red"></label>
          </div>



          <div class="form-group">
        <h6>Curso: <label for="curso_usuario" class="col-sm-2 control-label"></label></h6>
          	 <!--<input type="text" name="curso_usuario" class="form-control" style="text-align:center" value="<?php echo $curso; ?>" style="border:none;" readonly>-->	
		      	<select class="form-control" id="curso_usuario" name="curso_usuario">
              <option value="">Seleccione..</option>
              <option value="Administrador">Administrador</option>
							<option value="Ingles">Ingles</option>
							<option value="Matematicas">Matematicas</option>
							<option value="Informatica">Informatica</option>
              <option value="IOS">IOS</option>
						</select><label id="error" style="color:red"></label>	
			</div>





          <div class="form-group">
            <input type="text" name="login_usuario" class="form-control" placeholder="Usuario:"  autofocus>
            <label id="error4" style="color:red"></label>
          </div>
          <div class="form-group">
            <input type="text" name="pass_usuario" class="form-control" placeholder="Clave:"  autofocus>
            <label id="error4" style="color:red"></label>
          </div>
    

          <input type="submit" name="grabar_tb_usuario" class="btn btn-success btn-block" 
                 onclick="borrar_nombre(); borrar_fono(); borrar_usuario(); borrar_contra();"
                 value="REGISTRAR NUEVO">

        </form>
      </div>
    </div>


    <div class="col-md-8">
      <table class="table table-bordered">
        <thead  class="thead-dark">
          <tr>
              <th>ID</th>
							<th>NOMBRES</th>
							<th>APELLIDOS</th>
							<th>TIPO/CURSO</th>
							<th>LOGIN</th>
              <th>PASSWORD</th>
							<th>ACCION</th>
          </tr>
        </thead>


        <tbody>

          <?php
          $query = "SELECT * FROM tb_usuario";
          $resultado_insert = mysqli_query($conexion, $query);    
          while($row = mysqli_fetch_assoc($resultado_insert)) { ?>

          <tr>
            <td><?php echo $row['idUsuario']; ?></td>
            <td><?php echo $row['nom_usuario']; ?></td>
            <td><?php echo $row['ape_usuario']; ?></td>
            <td><?php echo $row['curso_usuario']; ?></td>
            <td><?php echo $row['login_usuario']; ?></td>
            <td><?php echo $row['pass_usuario']; ?></td>
     

            <td>

              <a href="editar_usuario.php?idUsuario=<?php echo $row['idUsuario']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>

              <a href="eliminar_usuario.php?idUsuario=<?php echo $row['idUsuario']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>


            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
