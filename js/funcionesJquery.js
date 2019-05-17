function Inicio(){
	$("#opciones a").click(function(e){
     	e.preventDefault();
        var url = $(this).attr("href");
        $.post( url,function(resultado) {
        		if(url!="#")
        			$("#contenedor").removeClass("hide");
        			$("#contenedor").addClass("show");
                	$("#contenido").html(resultado);
        });
     });
}

function login(){ //para el login
	$("#este a").click(function(e){
     	e.preventDefault();
        var url = $(this).attr("href");
        $.post( url,function(resultado) {
        		if(url!="#")
						$("#contenedor").removeClass("hide");
						$("#contenedor").addClass("show");
                		$("#contenido").html(resultado);
        });
	  });
	}
function loginP(){
	$("a.login").click(function(e){
		e.preventDefault();
	   var url = $(this).attr("href");
	   console.log(url);
	   /*$.post( url,function(resultado) {
			   if(url!="#")
					   $("#contenedor").removeClass("hide");
					   $("#contenedor").addClass("show");
					   $("#contenido").html(resultado);
	   });*/
	 });
}




