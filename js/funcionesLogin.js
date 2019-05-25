var dt;

function login(){
    $("#contenido").on("click","button#actualizar",function(){
         var datos=$("#flogin").serialize();
         console.log(datos);
         $.ajax({
            type:"get",
            url:"../login/controladorLogin.php",
            data: datos,
            dataType:"json"
          }).done(function( resultado ) {
              if(resultado.respuesta){
                swal(
                    'Actualizado!',
                    'Se actaulizaron los datos correctamente',
                    'success'
                )     
                dt.ajax.reload();
                $("#titulo").html("Listado Login");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#login").removeClass("hide");
                $("#login").addClass("show")
             } else {
                swal({
                  type: 'error',
                  title: 'Oops...',
                  text: 'Something went wrong!'                         
                })
            }
        });
    })

    $("#contenido").on("click","a.borrar",function(){
        //Recupera datos del formulario
        var codigo = $(this).data("codigo");

        swal({
              title: '¿Está seguro?',
              text: "¿Realmente desea borrar el Usuario con codigo : " + codigo + " ?",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, Borrarlo!'
        }).then((decision) => {
                if (decision.value) {

                    var request = $.ajax({
                        method: "get",
                        url: "../login/controladorLogin.php",
                        data: {codigo: codigo, accion:'borrar'},
                        dataType: "json"
                    })

                    request.done(function( resultado ) {
                        if(resultado.respuesta == 'correcto'){
                            swal(
                                'Borrado!',
                                'El Usuario con codigo : ' + codigo + ' fue borrado',
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
                     
                    request.fail(function( jqXHR, textStatus ) {
                        swal({
                          type: 'error',
                          title: 'Oops...',
                          text: 'Something went wrong!' + textStatus                          
                        })
                    });
                }
        })

    });

    $("#contenido").on("click","button.btncerrar",function(){
        $("#titulo").html("Listado de Usuarios");
        $("#nuevo-editar").html("");
        $("#nuevo-editar").removeClass("show");
        $("#nuevo-editar").addClass("hide");
        $("#login").removeClass("hide");
        $("#login").addClass("show");

    })

    $("#contenido").on("click","button.btncerrar2",function(){
        $("#contenedor").removeClass("show");
        $("#contenedor").addClass("hide");
        $("#contenido").html('')
    })

    $("#contenido").on("click","button#nuevo2",function(){
        $("#titulo").html("Nuevo Usuario");
        $("#nuevo-editar" ).load("../login/nuevoLogin2.php"); 
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#login").removeClass("show");
        $("#login").addClass("hide");
         $.ajax({
             type:"get",
             url:"../rol/controladorRol.php",
             data: {accion:'listar'},
             dataType:"json"
           }).done(function( resultado ) {   
              //console.log(resultado.data)           
              $("#rol_id option").remove()       
              $("#rol_id").append("<option selecte value=''>Seleccione un Rol</option>")
              $.each(resultado.data, function (index, value) { 
                $("#rol_id").append("<option value='" + value.rol_id + "'>" + value.rol_nom + "</option>")
              });
           });
    });

    //graba el cliente su usuario

    $("#contenido").on("click","button#grabar",function(){
        /*var comu_codi = $("#comu_codi").attr("value");
        var comu_nomb = $("#comu_nomb").attr("value");
        var muni_codi = $("#muni_codi").attr("value");
        var datos = "comu_codi="+comu_codi+"&comu_nomb="+comu_nomb+"&muni_codi="+muni_codi;*/
      
      var datos=$("#flogin").serialize();
      console.log(datos);

      $.ajax({
            type:"get",
            url:"php/login/controladorLogin.php",
            data: datos,
            dataType:"json"
            
          }).done(function( resultado ) {
              if(resultado.respuesta){
                swal(
                    'Grabado!!',
                    'El registro se grabó correctamente',
                    'success'
                )     
                dt.ajax.reload();
                $("#titulo").html("Listado Productos");
                $("#seccion-login").html("");
                $("#seccion-login").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#login").removeClass("hide");
                $("#login").addClass("show")
             } else {
                swal({
                  type: 'error',
                  title: 'Oops...',
                  text: 'Something went wrong!'                         
                })
            }
        });
    });

    //graba los usuarios creados por el adminFarma

    $("#contenidos").on("click","button#grabar2",function(){
      /*var comu_codi = $("#comu_codi").attr("value");
      var comu_nomb = $("#comu_nomb").attr("value");
      var muni_codi = $("#muni_codi").attr("value");
      var datos = "comu_codi="+comu_codi+"&comu_nomb="+comu_nomb+"&muni_codi="+muni_codi;*/
    
    var datos=$("#flogin").serialize();
    //console.log(datos);

    $.ajax({
          type:"get",
          url:"../login/controladorLogin.php",
          data: datos,
          dataType:"json"
          
        }).done(function( resultado ) {
            if(resultado.respuesta){
              swal(
                  'Grabado!!',
                  'El registro se grabó correctamente',
                  'success'
              )     
              dt.ajax.reload();
                $("#titulo").html("Listado de Usuarios");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#login").removeClass("hide");
                $("#login").addClass("show")
           } else {
              swal({
                type: 'error',
                title: 'Oops...',
                text: 'Something went wrong!'                         
              })
          }
      });
  });


    $("#contenido").on("click","a.editar",function(){     
       $("#titulo").html("Editar Usuario");
       //Recupera datos del fromulario
       var codigo = $(this).data("codigo");
       var rol;       
        $("#nuevo-editar").load("../login/editarLogin.php");
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#login").removeClass("show");
        $("#login").addClass("hide");
       $.ajax({
           type:"get",
           url:"../login/controladorLogin.php", 
           data: {codigo: codigo, accion:'consultar'},
           dataType:"json"
           }).done(function( login ) {
                if(login.respuesta === "no existe"){
                    swal({
                      type: 'error',
                      title: 'Oops...',
                      text: 'Persona no existe!'                         
                    })
                } else {
                    $("#login_codi").val(login.codigo);                   
                    $("#login_nick").val(login.usuario);
                    $("#login_pass").val(login.contrasena);
                    $("#login_esta").val(login.estado);
                    rol = login.rol;
                   }
           });

           $.ajax({
             type:"get",
             url:"../rol/controladorRol.php",
             data: {accion:'listar'},
             dataType:"json"
           }).done(function( resultado ) {                     
              $("#rol_id option").remove();
              $.each(resultado.data, function (index, value) { 
                
                if(rol === value.rol_id){
                  $("#rol_id").append("<option selected value='" + value.rol_id + "'>" + value.rol_nom + "</option>")
                }else {
                  $("#rol_id").append("<option value='" + value.rol_id + "'>" + value.rol_nom + "</option>")
                }
              });
           });
      });
}

$(document).ready(() => {
  $("#contenido").off("click", "a.editar"); 
  $("#contenido").off("click", "button#actualizar");
  $("#contenido").off("click","a.borrar");
  $("#contenido").off("click","button#nuevo");
  $("#contenido").off("click","button#grabar");
  $("#titulo").html("Listado de Usuarios"); 
  dt = $("#tabla").DataTable({
    "ajax": "../login/controladorLogin.php?accion=listar",
    "columns": [
        { "data": "login_codi"} ,
        { "data": "login_nick" },
        { "data": "login_pass" },
        { "data": "login_esta" },
        { "data": "rol_nom" },
        { "data": "login_codi",
            render: function (data) {
                      return '<a href="#" data-codigo="'+ data + 
                             '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>' 
            }
        },
        { "data": "login_codi",
            render: function (data) {
                      return '<a href="#" data-codigo="'+ data + 
                             '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>';
            }
        }
    ]
   });
login();
});