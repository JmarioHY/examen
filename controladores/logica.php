<?php

   

require 'conexion.php';

$consultar ="SELECT * FROM consulta";
$query = mysqli_query($conexion,$consultar);
$array =mysqli_fetch_array($query);


$agrupar ="SELECT * FROM consulta GROUP BY 'Fecha'";
$que= mysqli_query($conexion,$agrupar);
$arrayy =mysqli_fetch_array($que);

function verfecha($vfecha)
{
$fch=explode("-",$vfecha);
$tfecha=$fch[2]."-".$fch[1]."-".$fch[0];
return $tfecha;
}

?>