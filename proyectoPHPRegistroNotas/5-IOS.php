<?php include("db.php"); ?>

<?php include('includes/header_ios.php'); ?>

<br>
<h1 class="text-center">Lista de Alumnos(as)</h1>
<br>

<main class="container p-4">
  <div class="row">




    <div class="col-md">



        <!-- MENSAJE DE GUARDADO-->
        <?php if (isset($_SESSION['message'])) { ?>
         <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
          <?= $_SESSION['message']?>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
         </button>
         </div>
        <?php session_unset(); } ?>




      <table class="table table-hover table-bordered" id="table">
				<thead class="thead-dark text-center">
					<tr>
              <th>CODIGO</th>
							<th>NOMBRES</th>
						  <th>APELLIDO</th>
						  <th>NOTA1</th>
						  <th>NOTA2</th>
							<th>NOTA3</th>
							<th>NOTA4</th>
							<th>PROMEDIO</th>
							<th>ACCION</th>
					</tr>
				</thead>


        <tbody>

          <?php
          $query = "SELECT s.cod_ios,u.nom_alumno, u.apell_alumno,s.nota1, s.nota2, s.nota3, s.nota4, s.promedio from tb_ios s inner join tb_alumno u on s.cod_alumno = u.cod_alumno";
          $resultado_insert = mysqli_query($conexion, $query);    
          while($row = mysqli_fetch_assoc($resultado_insert)) { ?>


       <tbody class="text-center">

				<tr>
            <td><?php echo $row['cod_ios']; ?></td>
            <td><?php echo $row['nom_alumno']; ?></td>
            <td><?php echo $row['apell_alumno']; ?></td>
            <td><?php echo $row['nota1']; ?></td>
            <td><?php echo $row['nota2']; ?></td>
            <td><?php echo $row['nota3']; ?></td>
            <td><?php echo $row['nota4']; ?></td>
            <td><?php echo $row['promedio']; ?></td>
            <td>
              <a href="editar_ios.php?cod_ios=<?php echo $row['cod_ios']?>" class="btn btn-secondary">
                 <i class="fas fa-marker"></i>
               </a>

               <a href="eliminar_ios.php?cod_ios=<?php echo $row['cod_ios']?>" class="btn btn-danger">
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
