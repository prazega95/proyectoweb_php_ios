<?php
include("db.php");

$nombre = '';
$apellido= '';
$curso = '';
$login= '';
$pass= '';



if  (isset($_GET['idUsuario'])) {

  $idUsuario = $_GET['idUsuario'];

  $query = "SELECT * from tb_usuario WHERE idUsuario=$idUsuario";
  $resultado_actualizado = mysqli_query($conexion, $query);

  if (mysqli_num_rows($resultado_actualizado) == 1) {
    $row = mysqli_fetch_array($resultado_actualizado);

    $nombre = $row['nom_usuario'];
    $apellido = $row['ape_usuario'];
    $curso = $row['curso_usuario'];
    $login = $row['login_usuario'];
    $pass = $row['pass_usuario'];
  }
}

if (isset($_POST['update'])) {
  $idUsuario = $_GET['idUsuario'];

    $nombre = $_POST['nom_usuario'];
    $apellido = $_POST['ape_usuario'];
    $curso = $_POST['curso_usuario'];
    $login = $_POST['login_usuario'];
    $pass = $_POST['pass_usuario'];
 

  $query = "UPDATE tb_usuario set  nom_usuario = '$nombre',
                                   ape_usuario = '$apellido',
                                   curso_usuario = '$curso',
                                   login_usuario = '$login',
                                   pass_usuario = '$pass'
                        
                              WHERE idUsuario=$idUsuario";

  mysqli_query($conexion, $query);

  $_SESSION['message'] = 'Usuario(a) Actualizado(a)!';
  $_SESSION['message_type'] = 'warning';
  header('Location: 6-ADMINISTRADORES.php');
}

?>


<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">

      <!--boton regresars-->
      <a href="6-ADMINISTRADORES.php" class="btn btn-secondary">
           <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
        </a>

       <!--Contenedor-->
      <div class="card card-body">


      <form name="form1" action="editar_usuario.php?idUsuario=<?php echo $_GET['idUsuario']; ?>" method="POST" onsubmit="return validar()">

      <h1 class="text-center">Actualización de usuario</h1>
      <h6 class="text-center">--------------------------------------------</h6>

        <div class="form-group">
        <h6>Nombre(s):</h6>
          <input name="nom_usuario" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Ingresar Nombre :">
          <label id="error" style="color:red"></label>
        </div>



        <div class="form-group">
        <h6>Apellido(s):</h6>
          <input name="ape_usuario" type="text" class="form-control" value="<?php echo $apellido; ?>" placeholder="Ingresar apellido :">
          <label id="error" style="color:red"></label>
        </div> 



        <div class="form-group">
        <h6>Curso: <label for="curso_usuario" class="col-sm-2 control-label"></label></h6>
					
          	 <!--<input type="text" name="curso_usuario" class="form-control" style="text-align:center" value="<?php echo $curso; ?>" style="border:none;" readonly>-->	
		      	<select class="form-control" id="curso_usuario" name="curso_usuario">
              <option value="" <?php if($row['curso_usuario']=='') echo 'selected'; ?>>Seleccione..</option>
              <option value="Administrador" <?php if($row['curso_usuario']=='Administrador') echo 'selected'; ?>>Administrador</option>
							<option value="Ingles" <?php if($row['curso_usuario']=='Ingles') echo 'selected'; ?>>Ingles</option>
							<option value="Matematicas" <?php if($row['curso_usuario']=='Matematicas') echo 'selected'; ?>>Matematicas</option>
							<option value="Informatica" <?php if($row['curso_usuario']=='Informatica') echo 'selected'; ?>>Informatica</option>
              <option value="IOS" <?php if($row['curso_usuario']=='IOS') echo 'selected'; ?>>IOS</option>
						</select><label id="error" style="color:red"></label>	
			</div>




        <div class="form-group">
        <h6>Usuario:</h6>
          <input name="login_usuario" type="text" class="form-control" value="<?php echo $login; ?>" placeholder="Ingresar usuario :">
          <label id="error" style="color:red"></label>
        </div> 

        
        <div class="form-group">
        <h6>Contraseña:</h6>
          <input name="pass_usuario" type="text" class="form-control" value="<?php echo $pass; ?>" placeholder="Ingresar clave :">
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