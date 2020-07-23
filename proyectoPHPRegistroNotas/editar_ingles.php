<?php
include("db.php");

$nota1 = '';
$nota2= '';
$nota3 = '';
$nota4= '';




if  (isset($_GET['cod_ingles'])) {

  $cod_ingles = $_GET['cod_ingles'];

  $query = "SELECT s.cod_ingles,u.nom_alumno, u.apell_alumno,s.nota1, s.nota2, s.nota3, s.nota4, s.promedio from tb_ingles s inner join tb_alumno u on s.cod_alumno = u.cod_alumno WHERE cod_ingles=$cod_ingles";
  $resultado_actualizado = mysqli_query($conexion, $query);

  if (mysqli_num_rows($resultado_actualizado) == 1) {
    $row = mysqli_fetch_array($resultado_actualizado);

    $nombre = $row['nom_alumno'];
    $apellido = $row['apell_alumno'];
    $nota1 = $row['nota1'];
    $nota2 = $row['nota2'];
    $nota3 = $row['nota3'];
    $nota4 = $row['nota4'];
    $promedio = $row['promedio'];

  }
}

if (isset($_POST['update'])) {
  $cod_ingles = $_GET['cod_ingles'];

    $nota1 = $_POST['nota1'];
    $nota2 = $_POST['nota2'];
    $nota3 = $_POST['nota3'];
    $nota4 = $_POST['nota4'];
 

  $query = "UPDATE tb_ingles set  nota1 = '$nota1',
                                  nota2 = '$nota2',
                                  nota3 = '$nota3',
                                  nota4 = '$nota4'
                        
                              WHERE cod_ingles=$cod_ingles";

  mysqli_query($conexion, $query);

  $_SESSION['message'] = 'Nota(s) Actualizada(s)!';
  $_SESSION['message_type'] = 'warning';
  header('Location: 2-INGLES.php');
}

?>


<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">

      <!--boton regresars-->
      <a href="2-INGLES.php" class="btn btn-secondary">
           <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
        </a>

       <!--Contenedor-->
      <div class="card card-body">


      <form name="form1" action="editar_ingles.php?cod_ingles=<?php echo $_GET['cod_ingles']; ?>" method="POST" onsubmit="return validar()">

      <h1 class="text-center">Actualización de notas</h1>
      <h6 class="text-center">--------------------------------------------</h6>
      <h6 class="text-center">ALUMNO(A)</h6>
      <h6>Nombre :  
        <input name="nom_alumno" type="text" placeholder="<?php echo $row['nom_alumno'] ?>"  style="border:none;"></h6>
      <h6>Apellido :  
        <input name="apell_alumno" type="text" placeholder="<?php echo $row['apell_alumno'] ?>"  style="border:none;"></h6>
      <h6 class="text-center">--------------------------------------------</h6>



      <div class="form-group">
            <div class="row">
              <div class="col-md-4">
                <input type="text" style="width:100px;" name="nota1" class="form-control" placeholder="NOTA 1:" autofocus readonly>
              </div>
              <div class="col-md-7">
                <input name="nota1" type="text" class="form-control" value="<?php echo $nota1; ?>" placeholder="NOTA 1 :">
                <label id="error4" style="color:red"></label>
              </div> 
             </div>
        </div>  

        
        <div class="form-group">
            <div class="row">
              <div class="col-md-4">
                <input type="text" style="width:100px;" name="nota2" class="form-control" placeholder="NOTA 2:" autofocus readonly>
              </div>
              <div class="col-md-7">
                <input name="nota2" type="text" class="form-control" value="<?php echo $nota2; ?>" placeholder="NOTA 2 :">
                <label id="error4" style="color:red"></label>
              </div> 
             </div>
        </div>  



       <div class="form-group">
            <div class="row">
              <div class="col-md-4">
                <input type="text" style="width:100px;" name="nota3" class="form-control" placeholder="NOTA 3:" autofocus readonly>
              </div>
              <div class="col-md-7">
                <input name="nota3" type="text" class="form-control" value="<?php echo $nota3; ?>" placeholder="NOTA 4 :">
                <label id="error4" style="color:red"></label>
              </div> 
             </div>
        </div>  

        
        <div class="form-group">
            <div class="row">
              <div class="col-md-4">
                <input type="text" style="width:100px;" name="nota4" class="form-control" placeholder="NOTA 4:" autofocus readonly>
              </div>
              <div class="col-md-7">
                <input name="nota4" type="text" class="form-control" value="<?php echo $nota4; ?>" placeholder="NOTA 4 :">
                <label id="error4" style="color:red"></label>
              </div> 
             </div>
        </div>  



        <div class="form-group">
        <h6>Promedio :  </h6>
        <input name="promedio" type="text" class="form-control" value="<?php echo $promedio; ?>" placeholder="PROMEDIO :">
        <label id="error2" style="color:red"></label>
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