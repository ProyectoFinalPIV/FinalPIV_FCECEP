var dt;

function persona(){
    $("#contenido").on("click","button#actualizar",function(){
         var datos=$("#flogin").serialize();
         $.ajax({
            type:"get",
            url:"./php/login/controladorLogin.php",
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
                $("#titulo").html("Listado persona");
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
              text: "¿Realmente desea borrar el persona con codigo : " + codigo + " ?",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, Borrarlo!'
        }).then((decision) => {
                if (decision.value) {

                    var request = $.ajax({
                        method: "get",
                        url: "./php/login/controladorLogin.php",
                        data: {codigo: codigo, accion:'borrar'},
                        dataType: "json"
                    })

                    request.done(function( resultado ) {
                        if(resultado.respuesta == 'correcto'){
                            swal(
                                'Borrado!',
                                'El persona con codigo : ' + codigo + ' fue borrado',
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

    /*$("#contenido").on("click","button.btncerrar2",function(){
        $("#titulo").html("Listado de persona");
        $("#nuevo-editar").html("");
        $("#nuevo-editar").removeClass("show");
        $("#nuevo-editar").addClass("hide");
        $("#login").removeClass("hide");
        $("#login").addClass("show");

    })*/

    $("#contenido").on("click","button.btncerrar2",function(){
        $("#contenedor").removeClass("show");
        $("#contenedor").addClass("hide");
        $("#contenido").html('')
    })

    $("#contenido").on("click","button#nuevo",function(){
        $("#titulo").html("Nuevo Persona");
        $("#nuevo-editar" ).load("./php/login/nuevoLogin.php"); 
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#login").removeClass("show");
        $("#login").addClass("hide");
         $.ajax({
             type:"get",
             url:"./php/login/controladorLogin.php",
             data: {accion:'listar'},
             dataType:"json"
           }).done(function( resultado ) {   
              //console.log(resultado.data)           
              $("#esta_civi_codi option").remove()       
              $("#esta_civi_codi").append("<option selecte value=''>Seleccione un estado civil</option>")
              $.each(resultado.data, function (index, value) { 
                $("#esta_civi_codi").append("<option value='" + value.esta_civi_codi + "'>" + value.esta_civi_nomb + "</option>")
              });
           });
    })

    $("#contenido").on("click","button#grabar",function(){
        /*var comu_codi = $("#comu_codi").attr("value");
        var comu_nomb = $("#comu_nomb").attr("value");
        var muni_codi = $("#muni_codi").attr("value");
        var datos = "comu_codi="+comu_codi+"&comu_nomb="+comu_nomb+"&muni_codi="+muni_codi;*/
      
      var datos=$("#flogin").serialize();
      console.show(datos);

      $.ajax({
            type:"get",
            url:"./php/login/controladorLogin.php",
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
                $("#titulo").html("Listado persona");
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
       $("#titulo").html("Editar Persona");
       //Recupera datos del fromulario
       var codigo = $(this).data("codigo");
       var estado, documento, municipio, barrio, genero, sangre;
       
        $("#nuevo-editar").load("./php/login/editarLogin.php");
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#login").removeClass("show");
        $("#login").addClass("hide");
       $.ajax({
           type:"get",
           url:"./php/login/controladorLogin.php", 
           data: {codigo: codigo, accion:'consultar'},
           dataType:"json"
           }).done(function( persona ) {
                if(persona.respuesta === "no existe"){
                    swal({
                      type: 'error',
                      title: 'Oops...',
                      text: 'Persona no existe!'                         
                    })
                } else {
                    $("#perso_codi").val(persona.codigo);                   
                    $("#perso_nomb").val(persona.persona);
                    $("#perso_apel").val(persona.persona);
                    $("#perso_apel_2").val(persona.persona);
                    estado = persona.estado;
                    documento = persona.documento;
                    municipio = persona.municipio;
                    barrio = persona.barrio;
                    $("#perso_dire").val(persona.persona);
                    $("#perso_tele_casa").val(persona.persona);
                    $("#perso_tele_ofic").val(persona.persona);
                    $("#perso_celu").val(persona.persona);
                    $("#perso_mail").val(persona.persona);
                    $("#ocup_codi").val(persona.persona);
                    genero = persona.genero;
                    sangre = persona.sangre;

                }
           });

           $.ajax({
             type:"get",
             url:"./php/login/controladorLogin.php",
             data: {accion:'listar'},
             dataType:"json"
           }).done(function( resultado ) {                     
              $("#esta_civi_codi option").remove();
              $.each(resultado.data, function (index, value) { 
                
                if(estado === value.esta_civi_codi){
                  $("#esta_civi_codi").append("<option selected value='" + value.esta_civi_codi + "'>" + value.esta_civi_nomb + "</option>")
                }else {
                  $("#esta_civi_codi").append("<option value='" + value.esta_civi_codi + "'>" + value.esta_civi_nomb + "</option>")
                }
              });
           })
           .done(function( resultado ) {                     
            $("#docu_codi option").remove();
            $.each(resultado.data, function (index, value) { 
              
              if(documento === value.docu_codi){
                $("#docu_codi").append("<option selected value='" + value.docu_codi + "'>" + value.docu_nomb + "</option>")
              }else {
                $("#docu_codi").append("<option value='" + value.docu_codi + "'>" + value.docu_nomb + "</option>")
              }
            });
         })
         .done(function( resultado ) {                     
          $("#muni_codi_exte option").remove();
          $.each(resultado.data, function (index, value) { 
            
            if(municipio === value.muni_codi_exte){
              $("#muni_codi_exte").append("<option selected value='" + value.muni_codi_exte + "'>" + value.muni_nomb + "</option>")
            }else {
              $("#muni_codi_exte").append("<option value='" + value.muni_codi_exte + "'>" + value.muni_nomb + "</option>")
            }
          });
       })
       .done(function( resultado ) {                     
        $("#gene_codi option").remove();
        $.each(resultado.data, function (index, value) { 
          
          if(genero === value.gene_codi){
            $("#gene_codi").append("<option selected value='" + value.gene_codi + "'>" + value.gene_nomb + "</option>")
          }else {
            $("#gene_codi").append("<option value='" + value.gene_codi + "'>" + value.gene_nomb + "</option>")
          }
        });
     })
     .done(function( resultado ) {                     
      $("#sang_codi option").remove();
      $.each(resultado.data, function (index, value) { 
        
        if(sangre === value.sang_codi){
          $("#sang_codi").append("<option selected value='" + value.sang_codi + "'>" + value.sang_nomb + "</option>")
        }else {
          $("#sang_codi").append("<option value='" + value.sang_codi + "'>" + value.sang_nomb + "</option>")
        }
      });
   });


       })
}

$(document).ready(() => {
  $("#contenido").off("click", "a.editar"); 
  $("#contenido").off("click", "button#actualizar");
  $("#contenido").off("click","a.borrar");
  $("#contenido").off("click","button#nuevo");
  $("#contenido").off("click","button#grabar");

  
  $("#titulo").html("Listado de Nuevo Persona"); 
  
  dt = $("#tabla").DataTable({
        
        "columns": [
        $("#titulo").html("Nuevo Persona"),
        $("#nuevo-editar" ).load("./php/login/nuevoLogin.php"),
        $("#opciones2").html(""),
        $("#opciones2").removeClass("hide"),
        $("#opciones2").addClass("show"),
        $("#nuevo-editar").removeClass("hide"),
        $("#nuevo-editar").addClass("show"),
        $("#login").removeClass("show"),
        $("#login").addClass("hide"),
         $.ajax({
             type:"get",
             url:"./php/login/controladorLogin.php",
             data: {accion:'listar'},
             dataType:"json"
           }).done(function( resultado ) {   
              //console.log(resultado.data)           
              $("#esta_civi_codi option").remove()       
              $("#esta_civi_codi").append("<option selecte value=''>Seleccione un estado civil</option>")
              $.each(resultado.data, function (index, value) { 
                $("#esta_civi_codi").append("<option value='" + value.esta_civi_codi + "'>" + value.esta_civi_nomb + "</option>")
              });
           })
           .done(function( resultado ) {   
            //console.log(resultado.data)           
            $("#docu_codi option").remove()       
            $("#docu_codi").append("<option selecte value=''>Seleccione Tipo Documento</option>")
            $.each(resultado.data, function (index, value) { 
              $("#docu_codi").append("<option value='" + value.docu_codi + "'>" + value.docu_nomb + "</option>")
            });
         })
         .done(function( resultado ) {   
          //console.log(resultado.data)           
          $("#muni_codi_expe option").remove()       
          $("#muni_codi_expe").append("<option selecte value=''>Seleccione Municipio Expedicion</option>")
          $.each(resultado.data, function (index, value) { 
            $("#muni_codi_expe").append("<option value='" + value.muni_codi_expe + "'>" + value.muni_nomb + "</option>")
          });
       })
       .done(function( resultado ) {   
        //console.log(resultado.data)           
        $("#barr_codi option").remove()       
        $("#barr_codi").append("<option selecte value=''>Seleccione un Barrio</option>")
        $.each(resultado.data, function (index, value) { 
          $("#barr_codi").append("<option value='" + value.barrio_codi + "'>" + value.barr_nomb + "</option>")
        });
     })
     .done(function( resultado ) {   
      //console.log(resultado.data)           
      $("#gene_codi option").remove()       
      $("#gene_codi").append("<option selecte value=''>Seleccione Genero</option>")
      $.each(resultado.data, function (index, value) { 
        $("#gene_codi").append("<option value='" + value.gene_codi + "'>" + value.gene_nomb + "</option>")
      });
   })
   .done(function( resultado ) {   
    //console.log(resultado.data)           
    $("#sang_codi option").remove()       
    $("#sang_codi").append("<option selecte value=''>Seleccione Tipo Sangre</option>")
    $.each(resultado.data, function (index, value) { 
      $("#sang_codi").append("<option value='" + value.sang_codi + "'>" + value.sang_nomb + "</option>")
    });
 })
  ]
  });

  persona();
});