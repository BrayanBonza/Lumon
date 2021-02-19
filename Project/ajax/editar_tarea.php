<?php
//se llaman las variables en JavaScript tareas.js, y se modifica la base de datos.
require_once ("../configuracion/db.php"); //Contiene las variables de configuracion para conectar a la base de datos
require_once ("../configuracion/conexion.php");

$id = mysqli_real_escape_string($con, (strip_tags($_POST["id"], ENT_QUOTES)));
$nombre = mysqli_real_escape_string($con, (strip_tags($_POST["nombre"], ENT_QUOTES)));
$definicion = mysqli_real_escape_string($con, (strip_tags($_POST["definicion"], ENT_QUOTES)));
$prioridad = mysqli_real_escape_string($con, (strip_tags($_POST["prioridad"], ENT_QUOTES)));
$estado = mysqli_real_escape_string($con, (strip_tags($_POST["estado"], ENT_QUOTES)));
$date_inicio = mysqli_real_escape_string($con, (strip_tags($_POST["f_inicio"], ENT_QUOTES)));
$fin = mysqli_real_escape_string($con, (strip_tags($_POST["f_fin"], ENT_QUOTES)));

$sql = "UPDATE tarea SET  nombre_tarea='$nombre', descripcion_tarea='$definicion', prioridad='$prioridad', fecha_fin='$fin', estado='$estado' WHERE id_tarea='$id'";
$query_new_insert = mysqli_query($con, $sql);

?>