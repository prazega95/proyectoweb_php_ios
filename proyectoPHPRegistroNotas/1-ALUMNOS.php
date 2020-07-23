<?php include("db.php"); ?>
<?php include('includes/header.php'); ?>
<script src = 'validacion/formNoticias.js'></script>


<br>
<h1 class="text-center">LISTA DE ALUMNOS(AS)</h1>
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

        <form name="form1" action="insertar_alumno.php" method="POST" onsubmit="return validar()">


          <div class="form-group">
            <input type="text" name="nom_alumno" class="form-control" placeholder="Nombre(s):"  autofocus>
            <label id="error" style="color:red"></label>
          </div>
          <div class="form-group" >
            <input type="text" name="apell_alumno" class="form-control" placeholder="Apellido(s):" autofocus>
            <label id="error2" style="color:red"></label>
          </div>



          <div class="form-group">
        <h6>Curso 1: <label for="curso1" class="col-sm-2 control-label"></label></h6>
          	 <!--<input type="text" name="curso_usuario" class="form-control" style="text-align:center" value="<?php echo $curso; ?>" style="border:none;" readonly>-->	
		      	<select class="form-control" id="curso1" name="curso1">
              <option value="">Seleccione..</option>
							<option value="Ingles">Ingles</option>
              <option value="No cursa">No lleva este curso</option>
						</select><label id="error" style="color:red"></label>	
	    		</div>


          <div class="form-group">
        <h6>Curso 2: <label for="curso2" class="col-sm-2 control-label"></label></h6>
          	 <!--<input type="text" name="curso_usuario" class="form-control" style="text-align:center" value="<?php echo $curso; ?>" style="border:none;" readonly>-->	
		      	<select class="form-control" id="curso2" name="curso2">
              <option value="">Seleccione..</option>
							<option value="Matematicas">Matematicas</option>
              <option value="No cursa">No lleva este curso</option>
						</select><label id="error" style="color:red"></label>	
	    		</div>



          <div class="form-group">
        <h6>Curso 3: <label for="curso3" class="col-sm-2 control-label"></label></h6>
          	 <!--<input type="text" name="curso_usuario" class="form-control" style="text-align:center" value="<?php echo $curso; ?>" style="border:none;" readonly>-->	
		      	<select class="form-control" id="curso3" name="curso3">
              <option value="">Seleccione..</option>
							<option value="Informatica">Informatica</option>
              <option value="No cursa">No lleva este curso</option>
						</select><label id="error" style="color:red"></label>	
	    		</div>



          <div class="form-group">
        <h6>Curso 4: <label for="curso4" class="col-sm-2 control-label"></label></h6>
          	 <!--<input type="text" name="curso_usuario" class="form-control" style="text-align:center" value="<?php echo $curso; ?>" style="border:none;" readonly>-->	
		      	<select class="form-control" id="curso4" name="curso4">
              <option value="">Seleccione..</option>
              <option value="IOS">IOS</option>
              <option value="No cursa">No lleva este curso</option>
						</select><label id="error" style="color:red"></label>	
	    		</div>



          <div class="form-group">
            <input type="text" name="login" class="form-control" placeholder="Usuario:"  autofocus>
            <label id="error4" style="color:red"></label>
          </div>
          <div class="form-group">
            <input type="text" name="pass" class="form-control" placeholder="Clave:"  autofocus>
            <label id="error4" style="color:red"></label>
          </div>
    

          <input type="submit" name="grabar_tb_alumno" class="btn btn-success btn-block" 
                 onclick="borrar_nombre(); borrar_fono(); borrar_usuario(); borrar_contra();"
                 value="REGISTRAR NUEVO">

        </form>
      </div>
    </div>











    <div class="col-md-8">
    <table class="table table-hover table-bordered">
        <thead thead class="thead-dark text-center ">
          <tr>
              <th>ID</th>
							<th>NOMBRE(S)</th>
							<th>APELLIDO(S)</th>
							<th>CURSO1</th>
							<th>CURSO2</th>
              <th>CURSO3</th>			
              <th>CURSO4</th>
              <th>Usuario</th>
              <th>Clave</th>
							<th>ACCION</th>

          </tr>
        </thead>


        <tbody>

          <?php
          $query = "SELECT * FROM tb_alumno";
          $resultado_insert = mysqli_query($conexion, $query);    
          while($row = mysqli_fetch_assoc($resultado_insert)) { ?>

          <tr>
            <td><?php echo $row['cod_alumno']; ?></td>
            <td><?php echo $row['nom_alumno']; ?></td>
            <td><?php echo $row['apell_alumno']; ?></td>
            <td><?php echo $row['curso1']; ?></td>
            <td><?php echo $row['curso2']; ?></td>
            <td><?php echo $row['curso3']; ?></td>
            <td><?php echo $row['curso4']; ?></td>
            <td><?php echo $row['login']; ?></td>
            <td><?php echo $row['pass']; ?></td>


            <td>

              <a href="editar_alumno.php?cod_alumno=<?php echo $row['cod_alumno']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>

              <a href="eliminar_alumno.php?cod_alumno=<?php echo $row['cod_alumno']?>"  class="btn btn-danger">
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
