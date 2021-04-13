<?php
include("./controladores/conexion.php");

//insertar



if(isset($_POST["registrar"])){
	$fecha =mysqli_real_escape_string($conexion,$_POST['fecha']);
	$medico =mysqli_real_escape_string($conexion,$_POST['medicos']);
	$paciente =mysqli_real_escape_string($conexion,$_POST['pacientes']);
	$diagnostico =mysqli_real_escape_string($conexion,$_POST['diagnostico']);
	$tratamiento =mysqli_real_escape_string($conexion,$_POST['tratamiento']);
	$costo =mysqli_real_escape_string($conexion,$_POST['costo']);

/*     $costoInt =  intval($costo); */
    $sqlinsert = "INSERT INTO consulta (Fecha,Medico,Paciente,Diagnostico,Tratamiento,Costo) VALUES ('$fecha','$medico','$paciente','$diagnostico','$tratamiento','$costo')";
    $resultado =$conexion->query($sqlinsert) ;
    /* echo $fecha.$medico.$paciente.$diagnostico.$tratamiento.$costo; */
    if(! $resultado){
        echo "<script>
        alert('No se registro');
        window.location='index.php';
        </script>";
    }else{
        echo "<script>
    
        alert('Registro Exitoso!');
        window.location='consultas.php';
        </script>"; 
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

    
<div class="row">
    <div class="col-6">
        <!-- Fecha-->
    <p>Fecha</p>
    <input type="date" name="fecha" class="form-control mb-4" required>
    </div>
    <div class="col-6">
    <p>Fecha</p>
    <input type="number" name="costo" min="10" max="10000" class="form-control mb-4" maxlength="7" placeholder="$Costo" required> 
    </div>
</div>
    
<!-- Medicos 1000000-->
    <p>Seleccione un medico del siguiente menú:</p>
    <p>Médicos:
      <select class="form-control mb-4" name="medicos" required>
        <option value="0">Seleccione:</option>
        <?php
          $query = $conexion -> query ("SELECT * FROM medicos");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores['nombre'].'">'.$valores['nombre'].'</option>';
          }
        ?>
      </select>
<!-- pacientes -->
<p>Seleccione un paciente del siguiente menú:</p>
    <p>Pacientes:</p>
      <select class="form-control mb-4" name="pacientes" required>
        <option value="0">Seleccione:</option>
        <?php
          $query = $conexion -> query ("SELECT * FROM pacientes");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores['nombre'].'">'.$valores['nombre'].'</option>';
          }
        ?>
      </select>

      <!-- Diagnostico -->
<p>Seleccione un diagnostico del siguiente menú:</p>
    <p>Diagnostico:
      <select class="form-control mb-4" name="diagnostico" required>
        <option value="0">Seleccione:</option>
        <?php
          $query = $conexion -> query ("SELECT * FROM diagnosticos");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores['descripcion'].'">'.$valores['descripcion'].'</option>';
          }
        ?>
      </select>
      <!--Text area -->
      <p>Agregue un tratamiento para el paciente:</p>
   
      <textarea  name="tratamiento" rows="6" cols="60" placeholder="tratamiento" maxlength="250" required  style="text-transform:uppercase;"></textarea>
   
    

    
    <button class="btn btn-info my-4 btn-block" type="submit" name="registrar">Guardar</button>
    
    </form>


        </div>
    <div class="col-2"></div>
</div>    
<a href="consultas.php"><button class="btn btn-primary">consultas</button></a>
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