//load: función de búsqueda para formar la tabla de tareas
function load() {

    $.ajax({
        url: './ajax/buscar_tareas.php?action=ajax',
        success: function (data) {
            $(".outer_div").html(data).fadeIn('slow');
            $('#loader').html('');
        }
    });
}
//permite eliminar un elemento a través de las acciones en pantalla
function eliminar(id) {
    var q = $("#q").val();
    if (confirm("Realmente deseas eliminar la tarea")) {
        $.ajax({
            type: "GET",
            url: "./ajax/buscar_tareas.php",
            data: "id=" + id, "q": q,
            beforeSend: function (objeto) {
                $("#resultados").html("Mensaje: Cargando...");
            },
            success: function (datos) {
                $("#resultados").html(datos);
                load(1);
            }
        });
    }
}


//guarda los datos a través del archivo nuevaTarea.php en la carpeta ajax
function guardar() {
    var n = $("#nombre").val();
    var d = $("#definicion").val();
    var p = $("#prioridad").val();
    var f_i = $("#f_inicio").val();
    var f_f = $("#f_fin").val();
    $.ajax({
        type: "POST",
        url: "ajax/NuevaTarea.php",
        data: "nombre=" + n + "&definicion=" + d + "&prioridad=" + p + "&f_inicio=" + f_i + "&f_fin=" + f_f,

        success: function (datos) {
            $('#guardar_datos').attr("disabled", false);
            load();
        }
    });
}

//mostrar los datos obtenidos en la función búsqueda de tareas y mostrarlos en la ventana de modificación

function obtener_datos(id) {
    var id_tarea = $("#id_tarea" + id).val();
    var nombre_tarea = $("#nombre_tarea" + id).val();
    var definicion_tarea = $("#definicion_tarea" + id).val();
    var priorida_tarea = $("#priorida_tarea" + id).val();
    var estado_tarea = $("#estado_tarea" + id).val();
    var f_inicio_tarea = $("#f_inicio_tarea" + id).val();
    var f_fin_tarea = $("#f_fin_tarea" + id).val();

    $("#mod_id").val(id_tarea);
    $("#nombre2").val(nombre_tarea);
    $("#mod_definicion").val(definicion_tarea);
    $("#mod_priorida2").val(priorida_tarea);
    $("#mod_estado2").val(estado_tarea);
    $("#mod_f_inicio").val(f_inicio_tarea);
    $("#mod_f_fin").val(f_fin_tarea);
}
//nos permite editar la base de datos a través del archivo editar_tareas.php de la carpeta ajax
function editar() {
    var id = $("#mod_id").val();
    var n = $("#nombre2").val();
    var d = $("#mod_definicion").val();
    var p = $("#mod_priorida2").val();
    var e = $("#mod_estado2").val();
    var f_i = $("#mod_f_inicio").val();
    var f_f = $("#mod_f_fin").val();
    $.ajax({
        type: "POST",
        url: "ajax/editar_tarea.php",
        data: "nombre=" + n + "&definicion=" + d + "&prioridad=" + p + "&estado=" + e + "&f_inicio=" + f_i + "&f_fin=" + f_f + "&id=" + id,

        success: function (datos) {
            $('#guardar_datos').attr("disabled", false);
            load();
        }
    });
}
