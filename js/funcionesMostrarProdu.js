var dt;
var arrayCompras = [];
var arrayP = {};


function mostrarProducto(){
    $("#contenido").on("click","a.carrito",function(){
        //Recupera datos del fromulario
        var codigo = $(this).data("codigo");
        $.ajax({
            type:"get",
            url:"../../php/producto/controladorProducto.php",
            data: {codigo: codigo, accion:'consultarP'},
            dataType:"json"
            }).done(function( producto ) {        
                 if(producto.respuesta === "no existe"){
                     swal({
                       type: 'error',
                       title: 'Oops...',
                       text: 'Producto no existe!!!!!'                         
                     })
                 } else {
                     arrayP = {
                         codigo: producto.codigo,
                         nombre: producto.producto,
                         precio: producto.precio,
                         cantidad: producto.stock,
                         proveedor: producto.proveedor,
                         tipo: producto.tipo
                     } 
                     arrayCompras = JSON.stringify(arrayP);
                     //console.log(arrayCompras);
                     swal(
                        'Añadido!',
                        'El producto con codigo : ' + codigo + ' fue Añadido',
                        'success'
                    )   
                 }
            });
        });

    $("#estes").on("click","a.carro",function(){
        console.log(arrayCompras['codigo']);
        
            /*$.ajax({
                type:"get",
                url:"../../php/producto/home.php",
                data: {array: arrayCompras},
                dataType:"json"
            });*/
            
              dt = $("#tablas").DataTable({
                  "destroy": true,
                  "ajax": "",
                  "columns": [
                      { "data":arrayP.codigo} ,
                      { "data":(arrayP.nombre)},
                      { "data":(arrayP.precio)},
                      { "data":(arrayP.cantidad)},
                      { "data":(arrayP.proveedor)},
                      { "data":(arrayP.tipo)},
                      { "data":(arrayP.codigo),
                          render: function (data) {
                                    return '<a href="#" data-codigo="'+ data + 
                                           '" class="btn btn-success btn-sm borrar"> <i class="fa fa-cart-plus"></i></a>' 
                          }
                      }
                  ]
            });
        });


}
    


$(document).ready(() => {
    $("#contenido").off("click", "a.editar");
    $("#contenido").off("click", "button#actualizar");
    $("#contenido").off("click","a.borrar");
    $("#contenido").off("click","button#nuevo");
    $("#contenido").off("click","button#grabar");
    $("#titulo").html("Listado de Productos");
    dt = $("#tablas").DataTable({
          "ajax": "../../php/producto/controladorProducto.php?accion=listar",
          "columns": [
              { "data": "produ_codi"} ,
              { "data": "produ_nomb" },
              { "data": "produ_precio" },
              { "data": "produ_stock" },
              { "data": "prove_nomb_comer" },
              { "data": "tipo_prod_nomb"},
              { "data": "produ_codi",
                  render: function (data) {
                            return '<a href="#" data-codigo="'+ data + 
                                   '" class="btn btn-success btn-sm carrito"> <i class="fa fa-cart-plus"></i></a>' 
                  }
              }
          ]
    });
    mostrarProducto();
  });