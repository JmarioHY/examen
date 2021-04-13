<?php

include("./controladores/logica.php");

if(isset($_POST['export_data'])) {

    if(!empty($row)) {
    
    $filename = 'libros.xls';
    
    header('Content-Type: application/vnd.ms-excel');
    
    header('Content-Disposition: attachment; filename='.$query);
    $mostrar_columnas = false;
    foreach($query as $row) {
    if(!$mostrar_columnas) {
    echo implode('\t', array_keys($row)) . '\n';
    $mostrar_columnas = true;
    }
    echo implode('\t', array_values($row)) . '\n';
    }
    }else{
    echo "No hay datos a exportar";
    }
    exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consultas</title>
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

    <style>
        #gris{background-color: lightgray;}
        .cabecera{background-color: darkblue; color:white;font-weight: bolder;}
        .tam {font-size: .8em;}
        .tam1 {font-size: 1.5em; color:orangered}
    </style>
</head>
<body>
<nav class="navbar navbar-dark blue-gradient">
  <a class="navbar-brand" href="index.php">Inicio</a>
</nav>
   <div class="container">
     
       <div class="panel-body ">
       <form action=“ <?php echo $_SERVER['PHP_SELF']; ?>“ method=“post”>
    <table  id="gris" class="table table-bordered"> 
    <thead class="cabecera">
    <tr >
        <td><i class="fas fa-briefcase-medical"></i></td>
    <td>Fecha</td>
    <td>Médico</td>
    <td>Paciente</td>
    <td>Diagnóstico</td>
    <td>Tratamiento</td>
    <td>costo</td>
    </tr>
    </thead>
    <tbody >
    <?php 
            foreach ($query as $row){ ?>
    
        <tr>
        <td class="tam1"><i class="fas fa-user-md"></i></td>   
        <td class="tam"><?php $fechaesp=$row['Fecha']; echo verfecha($fechaesp);?></td>
        <td class="tam"><?php echo$row['Medico'];?></td>
        <td class="tam"><?php echo$row['Paciente'];?></td>
        <td class="tam"><?php echo$row['Diagnostico'];?></td>
        <td class="tam"><?php echo$row['Tratamiento'];?></td>
        <td class="tam"><?php 
        $iva=$row['Costo'];
        $masiva=$iva*1.16;
        echo"$".$masiva;

        ?></td>
        <?php
         }
         ?>
         </tr>
    </tbody>
    </table>
    
    </div>
    
    <button type="submit" id="export_data" name="export_data" value="Export to excel" class="btn btn-info">export data</button>
        </form>
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