function Inicio() {
    $("#opciones a").click(function (e) {
        e.preventDefault();
        var url = $(this).attr("href");
        $.post(url, function (resultado) {
            if (url != "#")
                $("#contenedora").removeClass("hide");
            $("#contenedora").addClass("show");
            $("#contenido").html(resultado);
        });
    });
}