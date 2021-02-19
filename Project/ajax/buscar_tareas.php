<?php
require_once ("../configuracion/db.php"); //Contiene las variables de configuracion para conectar a la base de datos
require_once ("../configuracion/conexion.php"); //Contiene funcion que conecta a la base de datos

$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if (isset($_GET['id'])) {
    $id_tareas = intval($_GET['id']);

    $count = 0;
   //se dan alertas a través de PHP y HTML
    if ($delete1 = mysqli_query($con, "DELETE FROM tarea WHERE id_tarea='" . $id_tareas . "'")) {
        ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Aviso!</strong> Datos eliminados exitosamente.
        </div>
        <script language="javascript">
            var me = "¡Aviso! Datos eliminados exitosamente.";
            alert(me);</script>
        <?php
    } else {
        ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Error!</strong> Lo siento algo ha salido mal intenta nuevamente.
        </div>
        <script language="javascript">
            var me = " Error! Lo sentimos algo ha salido mal intenta nuevamente.";
            alert(me);</script>
        <?php
    }
}
if ($action == 'ajax') {
    //se construye la tabla de tareas
    $count_query = mysqli_query($con, "SELECT count(*) AS numrows FROM tarea WHERE 1");
    $row = mysqli_fetch_array($count_query);
    $numrows = $row['numrows'];
    $reload = './index.php';
    $sql = "SELECT * FROM tarea WHERE 1";
    $query = mysqli_query($con, $sql);
    if ($numrows > 0) {
        ?>
        <div class="table-responsive">
            <table class="table">
                <tr class="info">
                    <th>Tarea</th>                    
                    <th>Definición</th>
                    <th>Fecha de registro</th>
                    <th>Fecha de finalización</th>
                    <th>Prioridad</th>
                    <th>Estado</th>
                    <th>ACCIONES</th>

                </tr>
                <?php
                while ($row = mysqli_fetch_array($query)) {
                    $id = $row['id_tarea'];
                    $nombre = $row['nombre_tarea'];
                    $definicion = $row['descripcion_tarea'];
                    $f_inicio = date('d/m/Y', strtotime($row['fecha_registro']));
                    $f_fin = date('d/m/Y', strtotime($row['fecha_fin']));
                    $prioridad = $row['prioridad'];
                    $estado = $row['estado'];
                    //Se envía la información al JavaScript a través de input type=hidden
                    ?>
                    
                    <input type="hidden" value="<?php echo $id; ?>" id="id_tarea<?php echo $id; ?>">
                    <input type="hidden" value="<?php echo $nombre; ?>" id="nombre_tarea<?php echo $id; ?>">
                    <input type="hidden" value="<?php echo $definicion; ?>" id="definicion_tarea<?php echo $id; ?>">
                    <input type="hidden" value="<?php echo $f_inicio; ?>" id="f_inicio_tarea<?php echo $id; ?>">
                    <input type="hidden" value="<?php echo $f_fin; ?>" id="f_fin_tarea<?php echo $id; ?>">
                    <input type="hidden" value="<?php echo $prioridad; ?>" id="priorida_tarea<?php echo $id; ?>">
                    <input type="hidden" value="<?php echo $estado; ?>" id="estado_tarea<?php echo $id; ?>">

                    <tr style="white-space:nowrap;">
                        <td><?php echo $nombre; ?></td>                        
                        <td><?php echo $definicion; ?></td>
                        <td><?php echo $f_inicio; ?></td>                        
                        <td><?php echo $f_fin; ?></td>
                        <td><?php echo $prioridad; ?></td>
                        <td><?php echo $estado; ?></td>
                        <td>      

                            <a href="#" class='btn btn-default' title='Editar tarea' onclick="obtener_datos('<?php echo $id; ?>');" data-toggle="modal" data-target="#editarTarea"><i class="glyphicon glyphicon-edit"></i></a> 
                            <a href="#" class='btn btn-default' title='Borrar tarea' onclick="eliminar('<?php echo $id ?>')"><i class="glyphicon glyphicon-trash"></i> </a></span></td>

                    </tr>
                    <?php
                }
                ?>

            </table>
        </div>
        <?php
    } else {
        ?>

        <h3 class="mensaje-basio">No Hay Registros</h3>
        <?php
    }
}
?>