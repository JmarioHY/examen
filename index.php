<?php
include("./controladores/conexion.php");
session_start();
if(isset($_SESSION['id_usuario'])){
	header("Location:admin.php");
}
//insertar



if(isset($_POST["registrar"])){
	$nombre =mysqli_real_escape_string($conexion,$_POST['nombre']);
	$correo =mysqli_real_escape_string($conexion,$_POST['correo']);
	$usuario =mysqli_real_escape_string($conexion,$_POST['user']);
	$password =mysqli_real_escape_string($conexion,$_POST['pass']);

    $password_encriptada = sha1($password); 
    $sqluser = "SELECT idusuario FROM usuarios WHERE usuario ='$usuario'";
    $resultadouser= $conexion->query($sqluser);
    $filas = $resultadouser->num_rows;
    if ($filas > 0){
    	echo"<script>
    	alert('El usuario ya existe');
    	window.location='index.php';
    	</script>";

    }else{
    	//insertar informacion del usuario
    	$sqlusuario="INSERT INTO usuarios(Nombre,Correo,Usuario,Password)
    	VALUES ('$nombre','$correo','$usuario','$password_encriptada')";
    	$resultadousuario =$conexion->query($sqlusuario);
    	if($resultadousuario > 0){
    		echo"<script>
    		alert('Registro exito');
    		window.location = 'index.php';
    		</script>";
    	}else{
    		echo"<script>
    		alert('Error al registrarse');
    		window.location = 'index.php';
    		</script>";
    	}
                   
    }


}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen</title>
     <!-- Font Awesome -->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    

<div class="container">
<div class="row">
    <div class="col-2"></div>
        <div class="col-8">
    <!--insertar -->
    <form class="text-center border border-light p-5" action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST" >

    <h1 class="h1 mb-4">Capturar</h1>

    

    <!-- Fecha-->
    <p>Fecha</p>
    <input type="date" name="fecha" class="form-control mb-4" placeholder="Fecha">
<!-- Medicos-->
    <p>Seleccione un medico del siguiente menú:</p>
    <p>Médicos:
      <select class="form-control mb-4">
        <option value="0">Seleccione:</option>
        <?php
          $query = $conexion -> query ("SELECT * FROM medicos");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores['id_medico'].'">'.$valores['nombre'].'</option>';
          }
        ?>
      </select>
<!-- pacientes -->
<p>Seleccione un paciente del siguiente menú:</p>
    <p>Pacientes:
      <select class="form-control mb-4">
        <option value="0">Seleccione:</option>
        <?php
          $query = $conexion -> query ("SELECT * FROM pacientes");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores['id_paciente'].'">'.$valores['nombre'].'</option>';
          }
        ?>
      </select>

      <!-- Diagnostico -->
<p>Seleccione un diagnostico del siguiente menú:</p>
    <p>Diagnostico:
      <select class="form-control mb-4">
        <option value="0">Seleccione:</option>
        <?php
          $query = $conexion -> query ("SELECT * FROM diagnosticos");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores['id'].'">'.$valores['descripcion'].'</option>';
          }
        ?>
      </select>

   
    

    
    <button class="btn btn-info my-4 btn-block" type="submit">Guardar</button>
    
    </form>


        </div>
    <div class="col-2"></div>
</div>    

</div>






  <!-- -------------------------------- -->
    <!-- jQuery -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
</body>
</html>