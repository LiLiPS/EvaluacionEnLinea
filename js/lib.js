$(document).ready(function(){

    // termine la carga de la página
    $("#total").hide();
    $("#calificacion_final").hide();
    $("#id_examen").hide();
    $(".pk_pregunta").hide();
    $(".p").hide();
    $(".c").hide();
    $(".t").hide();
    $(".palabras_").hide();
    $(".totales").hide();
    $("#envio").hide();
    

    $("#boton").on('click', function(){
        $("#boton").attr('disabled', true);
        $(".pk_resp").attr('disabled', true);
        $("#envio").val('1');
        $(".carga").attr("hidden", false);
        $(".preguntas").each(function(){
            console.log($(this).find('.pk_pregunta').val());
            console.log($(this).find('.pk_resp').val());
            let idExamen = $("#id_examen").val();
            let pk_pregunta = $(this).find('.pk_pregunta').val();
            let pk_respuesta = $(this).find('.pk_resp').val();
            let porcentaje = $(this).find('#p_'+pk_pregunta);
            let palabras_clave = $(this).find('#palabras_'+pk_pregunta);

            $.ajax({
                url: '/EvaluacionEnLinea/php/alumno/procesarRespuesta.php', //Donde está mi web service
                type: "POST", // MÉTODO DE ACCESO
                dataType: "HTML", // FORMATO DE LOS DATOS
                data: {
                    "pk_pregunta": pk_pregunta,
                    "respuesta": pk_respuesta,
                    "idExamen": idExamen 
                },
                success: function (data) {
                    console.log(data);
                    porcentaje.html("Palabras clave: " + data + '%');
                    palabras_clave.val(data);
                    console.log(porcentaje);
                },
                error: function (xhr, status) {
                    alert("Ha ocurrido un error! " + status);
                    console.log(xhr);
                }
            });
        });
    });

    $("body").on('keypress', function (event) {
        if ($("#envio").val() == 1) {
            let calificacion;
            /*A-97-100%
              S-115-50%
              D-100-0%
            */
            if (event.which == 97) {
                calificacion = 40;
            } else if (event.which == 115) {
                calificacion = 20;
            } else if (event.which == 100) {
                calificacion = 0;
            } else{
                calificacion = -1;
            }

            // verificar que se presione una tecla válida
            if (calificacion != -1) {
                let contador = 0;
                $(".preguntas").each(function(){
                    contador++;
                });
                
                let no_pregunta = 0;
                $(".preguntas").each(function(){
                    no_pregunta ++;
                    // encontrar una pregunta que no tenga valor
                    let pk = $(this).find('.pk_pregunta').val();
                    let valor_actual = $(this).find('#c_' + pk).html();
                    if (valor_actual == '') {
                        $(this).find('#i_' + pk).attr("hidden", true);
                        $(this).find('#p_'+pk).show(500);
                        $(this).find('#c_' + pk).html("Coherencia: " + calificacion + '%');
                        $(this).find('#c_' + pk).show(500);
                        let palabras_valor = $(this).find('#palabras_' + pk).val();
                        let total_pregunta = parseInt(palabras_valor) + parseInt(calificacion);
                        $(this).find('#total_p_' + pk).val(total_pregunta);
                        $(this).find('#t_' + pk).html("Total: " + total_pregunta + '%');
                        $(this).find('#t_' + pk).show(500);

                        console.log(no_pregunta);
                        console.log(contador);
                        if (no_pregunta == contador) {
                            let cal_total = 0;
                            let promedio = 0;
                            $(".totales").each(function(){
                                cal_total +=  parseInt($(this).val());
                            });
                            promedio = cal_total/contador;
                            $("#total").html('Calificación final: '+ promedio);
                            $("#total").show(500);
                            $("#calificacion_final").val(promedio);
                            $("#boton").attr("hidden", true);
                            $("#btn_terminar").attr("hidden", false);
                        }
                        return false;
                    }
                });
            }
        }       
    });

    $("#btn_terminar").on('click', function(){
        let idExamen = $("#id_examen").val();
        let resultado_final = $("#calificacion_final").val();
        let id_aplicacion = $("#aplicacion").val();
        $.ajax({
            url: '/EvaluacionEnLinea/php/alumno/revisarExamen.php', //Donde está mi web service
            type: "POST", // MÉTODO DE ACCESO
            dataType: "HTML", // FORMATO DE LOS DATOS
            data: {
                "idExamen": idExamen,
                "resultado_final": resultado_final,
                "id_aplicacion" : id_aplicacion 
            },
            success: function (data) {
                window.location.href = "/EvaluacionEnLinea/php/alumno/inicio.php"
            },
            error: function (xhr, status) {
                alert("Ha ocurrido un error! " + status);
                console.log(xhr);
            }
        });
    });
});