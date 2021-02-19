<?php
//Se inserta una nueva tarea a través de php
require_once ("../configuracion/db.php"); //Contiene las variables de configuracion para conectar a la base de datos
require_once ("../configuracion/conexion.php");

$nombre = mysqli_real_escape_string($con, (strip_tags($_POST["nombre"], ENT_QUOTES)));
$definicion = mysqli_real_escape_string($con, (strip_tags($_POST["definicion"], ENT_QUOTES)));
$prioridad = mysqli_real_escape_string($con, (strip_tags($_POST["prioridad"], ENT_QUOTES)));
$date_inicio =mysqli_real_escape_string($con, (strip_tags($_POST["f_inicio"], ENT_QUOTES)));
$date_fin =mysqli_real_escape_string($con, (strip_tags($_POST["f_fin"], ENT_QUOTES)));

$sql = "INSERT INTO tarea (nombre_tarea, descripcion_tarea, prioridad, fecha_registro, fecha_fin, estado) VALUES ('$nombre','$definicion','$prioridad','$date_inicio','$date_fin','Incompleta')";
$query_new_insert = mysqli_query($con, $sql);

?>