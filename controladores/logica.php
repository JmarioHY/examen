<?php

   

require 'conexion.php';

$consultar ="SELECT * FROM consulta";
$query = mysqli_query($conexion,$consultar);
$array =mysqli_fetch_array($query);




?>