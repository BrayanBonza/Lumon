<?php //conexción a la base de datos
require_once ("./configuracion/db.php"); //Contiene las variables de configuración para conectar a la base de datos
require_once ("./configuracion/conexion.php"); //Contiene función que conecta a la base de datos
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <!--Se importan algunos elementos de estilo-->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Tareas</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/estilos.css">  
    </head>
    <body onload="load()">
        <div class="contenedor">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="btn-group pull-right">
                        <button type='button'class="btn btn-info" data-toggle="modal" data-target="#nuevaTarea" ><span class="glyphicon glyphicon-plus" ></span> Nueva Tarea</button>
                    </div>
                    <h4 > Tareas</h4>
                </div>
                <div class="panel-body">


                    <span id="loader"></span> 
                    <div id="resultados"></div><!-- Carga los datos ajax -->
                    <div class='outer_div'></div><!-- Carga los datos ajax -->		
                </div>
            </div>
        </div>
        <script type="text/javascript" src="js/tareas.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


        <div class="modal fade" id="nuevaTarea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar nueva tarea</h4>
                    </div>
                    <div class="modal-body">

                        <form class="form-horizontal" method="post" id="guardar_tareas" name="guardar_tareas">
                            
                            <div class="form-group">
                                <label for="nombre" class="col-sm-3 control-label">Nombre de la tarea</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la tarea">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="definicion" class="col-sm-3 control-label">Definicion de la tarea</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" id="definicion" name="definicion" placeholder="Definicion de la tarea" required></textarea>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="priorida" class="col-sm-3 control-label">Prioridad</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="prioridad" name="prioridad" required>
                                        <option value="">-- Seleccionar Prioridad--</option>                                    
                                        <option value="Alta">Alta</option>                                    
                                        <option value="Media">Media</option>                                    
                                        <option value="Baja">Baja</option>  
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="f_inicio" class="col-sm-3 control-label">Fecha Registro</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" id="f_inicio" name=f_inicio"  value="<?php echo date("Y-m-d"); ?>" disabled>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="f_fin" class="col-sm-3 control-label">Fecha finalización</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" id="f_fin" name=f_fin"  required min="<?php echo date("Y-m-d"); ?>">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button class="btn btn-primary" id="guardar_datos" onclick="guardar()">Guardar datos</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="editarTarea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar tarea</h4>
                    </div>
                    <div class="modal-body">

                        <form class="form-horizontal" method="post" id="editar_tareas" name="editar_tareas">
                            <input type="hidden" name="mod_id" id="mod_id">
                            <div class="form-group">
                                <label for="nombre2" class="col-sm-3 control-label">Nombre de la tarea</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="nombre2" name="nombre2" placeholder="Nombre de la tarea">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="mod_definicion" class="col-sm-3 control-label">Definición de la tarea</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" id="mod_definicion" name="mod_definicion" placeholder="Definicion de la tarea" required></textarea>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="mod_priorida2" class="col-sm-3 control-label">Prioridad</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="mod_priorida2" name="mod_priorida2" required>
                                        <option value="">-- Seleccionar Prioridad--</option>                                    
                                        <option value="Alta">Alta</option>                                    
                                        <option value="Media">Media</option>                                    
                                        <option value="Baja">Baja</option>  
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mod_estado2" class="col-sm-3 control-label">Estado</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="mod_estado2" name="mod_estado2" required>
                                        <option value="">-- Seleccionar Estado--</option>                                    
                                        <option value="Completado">Completado</option>                                    
                                        <option value="Incompleta">Incompleta</option> 
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mod_f_inicio" class="col-sm-3 control-label">Fecha Registro</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="mod_f_inicio" name="mod_f_inicio" disabled>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mod_f_fin" class="col-sm-3 control-label">Fecha finalización</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" id="mod_f_fin" name=mod_f_fin"  required min="<?php echo date("Y-m-d"); ?>">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button type ="submit" class="btn btn-primary" id="actulizar" onclick="editar()">Guardar datos</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
