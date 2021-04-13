<?php

include("./controladores/logica.php");

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
</head>
<body>
<table class="text-center m-5 bordess">
        <thead >
            <tr class="bordess">
            <td>id</td>
            <td>Fecha</td>
            <td>Médico</td>
            <td>Paciente</td>
            <td>Diagnóstico</td>
            <td>Tratamiento</td>
            <td>costo</td>
            </tr>
            
        </thead>
        <tbody id="datos">
            <?php 
            foreach ($query as $row){ ?>
                <tr>
                    <td><?php echo$row['id'];?></td>
                    <td><?php echo$row['Fecha'];?></td>
                    <td><?php echo$row['Medico'];?></td>
                    <td><?php echo$row['Paciente'];?></td>
                    <td><?php echo$row['Diagnostico'];?></td>
                    <td><?php echo$row['Tratamiento'];?></td>
                    <td><?php echo$row['Costo'];?></td>
                </tr>
       
        </tbody>
        <?php
         }
         ?>
    </table>
</body>
</html>