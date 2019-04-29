var dt; /* Falta Editar TODO */

function usuario() {
    $("#contenido").on("click", "button#actualizar", function () {
        var datos = $("#fusuario").serialize();
        $.ajax({
            type: "get",
            url: "./php/usuario/controladorUsuario.php",
            data: datos,
            dataType: "json"
        }).done(function (resultado) {
            if (resultado.respuesta) {
                swal(
                    'Actualizado!',
                    'Se actaulizaron los datos correctamente',
                    'success'
                )
                dt.ajax.reload();
                $("#titulo").html("Listado Usuarios");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#usuario").removeClass("hide");
                $("#usuario").addClass("show")
            } else {
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!'
                })
            }
        });
    })

    $("#contenido").on("click", "a.borrar", function () {
        //Recupera datos del formulario
        var codigo = $(this).data("codigo");

        swal({
            title: '¿Está seguro?',
            text: "¿Realmente desea borrar el usuario con codigo : " + codigo + " ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Borrarlo!'
        }).then((decision) => {
            if (decision.value) {

                var request = $.ajax({
                    method: "get",
                    url: "./php/usuario/controlador_usuario.php",
                    data: { codigo: codigo, accion: 'borrar' },
                    dataType: "json"
                })

                request.done(function (resultado) {
                    if (resultado.respuesta == 'correcto') {
                        swal(
                            'Borrado!',
                            'El usuario con codigo : ' + codigo + ' fue borrada',
                            'success'
                        )
                        dt.ajax.reload();
                    } else {
                        swal({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!'
                        })
                    }
                });

                request.fail(function (jqXHR, textStatus) {
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!' + textStatus
                    })
                });
            }
        })

    });

    $("#contenido").on("click", "button.btncerrar2", function () {
        $("#titulo").html("Listado Usuarios");
        $("#nuevo-editar").html("");
        $("#nuevo-editar").removeClass("show");
        $("#nuevo-editar").addClass("hide");
        $("#usuario").removeClass("hide");
        $("#usuario").addClass("show");

    })

    $("#contenido").on("click", "button.btncerrar", function () {
        $("#contenedor").removeClass("show");
        $("#contenedor").addClass("hide");
        $("#contenido").html('')
    })

    $("#contenido").on("click", "button#nuevo", function () {
        $("#titulo").html("Nueva Usuario");
        $("#nuevo-editar").load("./php/usuario/nuevo_usuario.php");
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#usuario").removeClass("show");
        $("#usuario").addClass("hide");
        $.ajax({
            type: "get",
            url: "./php/rol/controladorRol.php",
            data: { accion: 'listar' },
            dataType: "json"
        }).done(function (resultado) {
            //console.log(resultado.data)           
            $("#id_rol option").remove()
            $("#id_rol").append("<option selecte value=''>Seleccione un rol</option>")
            $.each(resultado.data, function (index, value) {
                $("#id_rol").append("<option value='" + value.id_rol + "'>" + value.nom_Rol + "</option>")
            });
        });
    })

    $("#contenido").on("click", "button#grabar", function () {
        /*var id_Rol = $("#id_Rol").attr("value");
        var nom_Rol = $("#nom_Rol").attr("value");
        var id_rol = $("#id_rol").attr("value");
        var datos = "id_Rol="+id_Rol+"&nom_Rol="+nom_Rol+"&id_rol="+id_rol;*/

        var datos = $("#fusuario").serialize();
        $.ajax({
            type: "get",
            url: "./php/usuario/controlador_usuario.php",
            data: datos,
            dataType: "json"
        }).done(function (resultado) {
            if (resultado.respuesta) {
                swal(
                    'Grabado!!',
                    'El registro se grabó correctamente',
                    'success'
                )
                dt.ajax.reload();
                $("#titulo").html("Listado Usuarios");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#usuario").removeClass("hide");
                $("#usuario").addClass("show")
            } else {
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!'
                })
            }
        });
    });


    $("#contenido").on("click", "a.editar", function () {
        $("#titulo").html("Editar Usuario");
        //Recupera datos del fromulario
        var codigo = $(this).data("codigo");
        var rol;
        $("#nuevo-editar").load("./php/usuario/editar_usuario.php");
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#usuario").removeClass("show");
        $("#usuario").addClass("hide");
        $.ajax({
            type: "get",
            url: "./php/usuario/controlador_usuario.php",
            data: { codigo: codigo, accion: 'consultar' },
            dataType: "json"
        }).done(function (usuario) {
            if (usuario.respuesta === "no existe") {
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Usuario no existe!!!!!'
                })
            } else {
                $("#id_Rol").val(usuario.codigo);
                $("#nom_Rol").val(usuario.usuario);
                rol = usuario.rol;
            }
        });

        $.ajax({
            type: "get",
            url: "./php/rol/controlador_rol.php",
            data: { accion: 'listar' },
            dataType: "json"
        }).done(function (resultado) {
            $("#id_Rol option").remove();
            $.each(resultado.data, function (index, value) {

                if (rol === value.id_Rol) {
                    $("#id_Rol").append("<option selected value='" + value.id_Rol + "'>" + value.nom_Rol + "</option>")
                } else {
                    $("#id_Rol").append("<option value='" + value.id_Rol + "'>" + value.nom_Rol + "</option>")
                }
            });
        });

    })
}

$(document).ready(() => {
    $("#contenido").off("click", "a.editar");
    $("#contenido").off("click", "button#actualizar");
    $("#contenido").off("click", "a.borrar");
    $("#contenido").off("click", "button#nuevo");
    $("#contenido").off("click", "button#grabar");
    $("#titulo").html("Listado de Usuarios");
    dt = $("#tabla").DataTable({
        "ajax": "php/usuario/controlador_usuario.php?accion=listar",
        "columns": [
            { "data": "id_Rol" },
            { "data": "nom_Rol" },
            { "data": "nom_Rol" },
            {
                "data": "id_Rol",
                render: function (data) {
                    return '<a href="#" data-codigo="' + data +
                        '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>'
                }
            },
            {
                "data": "id_Rol",
                render: function (data) {
                    return '<a href="#" data-codigo="' + data +
                        '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>';
                }
            }
        ]
    });
    usuario();
});