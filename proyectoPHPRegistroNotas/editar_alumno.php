<?php
include("db.php");

$nombre = '';
$apellido= '';
$curso1 = '';
$curso2 = '';
$curso3 = '';
$curso4 = '';
$login= '';
$pass= '';



if  (isset($_GET['cod_alumno'])) {

  $cod_alumno = $_GET['cod_alumno'];

  $query = "SELECT * from tb_alumno WHERE cod_alumno=$cod_alumno";
  $resultado_actualizado = mysqli_query($conexion, $query);

  if (mysqli_num_rows($resultado_actualizado) == 1) {
    $row = mysqli_fetch_array($resultado_actualizado);

    $nombre = $row['nom_alumno'];
    $apellido = $row['apell_alumno'];
    $curso1 = $row['curso1'];
    $curso2 = $row['curso2'];
    $curso3 = $row['curso3'];
    $curso4 = $row['curso4'];
    $login = $row['login'];
    $pass = $row['pass'];
  }
}

if (isset($_POST['update'])) {
  $cod_alumno = $_GET['cod_alumno'];

    $nombre = $_POST['nom_alumno'];
    $apellido = $_POST['apell_alumno'];
    $curso1 = $_POST['curso1'];
    $curso2 = $_POST['curso2'];
    $curso3 = $_POST['curso3'];
    $curso4 = $_POST['curso4'];
    $login = $_POST['login'];
    $pass = $_POST['pass'];
 

  $query = "UPDATE tb_alumno set   nom_alumno = '$nombre',
                                   apell_alumno = '$apellido',
                                   curso1 = '$curso1',
                                   curso2 = '$curso2',
                                   curso3 = '$curso3',
                                   curso4 = '$curso4',
                                   login = '$login',
                                   pass = '$pass'
                        
                              WHERE cod_alumno=$cod_alumno";

  mysqli_query($conexion, $query);

  $_SESSION['message'] = 'Alumno(a) Actualizado(a)!';
  $_SESSION['message_type'] = 'warning';
  header('Location: 1-ALUMNOS.php');
}

?>


<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">

      <!--boton regresars-->
      <a href="1-ALUMNOS.php" class="btn btn-secondary">
           <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
        </a>

       <!--Contenedor-->
      <div class="card card-body">


      <form name="form1" action="editar_alumno.php?cod_alumno=<?php echo $_GET['cod_alumno']; ?>" method="POST" onsubmit="return validar()">

      <h1 class="text-center">Actualización de Alumno</h1>
      <h6 class="text-center">--------------------------------------------</h6>

        <div class="form-group">
        <h6>Nombre(s):</h6>
          <input name="nom_alumno" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Ingresar Nombre :">
          <label id="error" style="color:red"></label>
        </div>



        <div class="form-group">
        <h6>Apellido(s):</h6>
          <input name="apell_alumno" type="text" class="form-control" value="<?php echo $apellido; ?>" placeholder="Ingresar apellido :">
          <label id="error" style="color:red"></label>
        </div> 



        <div class="form-group">
        <h6>Curso 1: <label for="curso1" class="col-sm-2 control-label"></label></h6>
					
          	 <!--<input type="text" name="curso_usuario" class="form-control" style="text-align:center" value="<?php echo $curso; ?>" style="border:none;" readonly>-->	
		      	<select class="form-control" id="curso1" name="curso1">
              <option value="" <?php if($row['curso1']=='') echo 'selected'; ?>>Seleccione..</option>
							<option value="Ingles" <?php if($row['curso1']=='Ingles') echo 'selected'; ?>>Ingles</option>
              <option value="No cursa" <?php if($row['curso1']=='No cursa') echo 'selected'; ?>>No lleva este curso</option>
						</select><label id="error" style="color:red"></label>	
			</div>



      <div class="form-group">
        <h6>Curso 2: <label for="curso2" class="col-sm-2 control-label"></label></h6>
					
          	 <!--<input type="text" name="curso_usuario" class="form-control" style="text-align:center" value="<?php echo $curso; ?>" style="border:none;" readonly>-->	
		      	<select class="form-control" id="curso2" name="curso2">
              <option value="" <?php if($row['curso2']=='') echo 'selected'; ?>>Seleccione..</option>
							<option value="Matematicas" <?php if($row['curso2']=='Matematicas') echo 'selected'; ?>>Matematicas</option>
              <option value="No cursa" <?php if($row['curso2']=='No cursa') echo 'selected'; ?>>No lleva este curso</option>
						</select><label id="error" style="color:red"></label>	
			</div>


      <div class="form-group">
        <h6>Curso 3: <label for="curso3" class="col-sm-2 control-label"></label></h6>
					
          	 <!--<input type="text" name="curso_usuario" class="form-control" style="text-align:center" value="<?php echo $curso; ?>" style="border:none;" readonly>-->	
		      	<select class="form-control" id="curso3" name="curso3">
              <option value="" <?php if($row['curso3']=='') echo 'selected'; ?>>Seleccione..</option>
							<option value="Informatica" <?php if($row['curso3']=='Informatica') echo 'selected'; ?>>Informatica</option>
              <option value="No cursa" <?php if($row['curso3']=='No cursa') echo 'selected'; ?>>No lleva este curso</option>
						</select><label id="error" style="color:red"></label>	
			</div>


      <div class="form-group">
        <h6>Curso 4: <label for="curso4" class="col-sm-2 control-label"></label></h6>
					
          	 <!--<input type="text" name="curso_usuario" class="form-control" style="text-align:center" value="<?php echo $curso; ?>" style="border:none;" readonly>-->	
		      	<select class="form-control" id="curso4" name="curso4">
              <option value="" <?php if($row['curso4']=='') echo 'selected'; ?>>Seleccione..</option>
              <option value="IOS" <?php if($row['curso4']=='IOS') echo 'selected'; ?>>IOS</option>
              <option value="No cursa" <?php if($row['curso4']=='No cursa') echo 'selected'; ?>>No lleva este curso</option>
						</select><label id="error" style="color:red"></label>	
			</div>




        <div class="form-group">
        <h6>Usuario:</h6>
          <input name="login" type="text" class="form-control" value="<?php echo $login; ?>" placeholder="Ingresar usuario :">
          <label id="error" style="color:red"></label>
        </div> 

        
        <div class="form-group">
        <h6>Contraseña:</h6>
          <input name="pass" type="text" class="form-control" value="<?php echo $pass; ?>" placeholder="Ingresar clave :">
          <label id="error" style="color:red"></label>
        </div> 



        <button class="btn-success" name="update" onclick="borrar_titulo(); borrar_descripcion();">
          Actualizar
        </button>

        
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>

  <!--<script src = 'validacion/formNoticias.js'></script>-->