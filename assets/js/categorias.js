var baseurl = 'http://localhost/dieta/';
var actualpaciente = 0;
var nombreactualpaciente = "";

var totalcalorias = 0;

var iddia= 0;
var idplatos= 0;

//variables de paciente para reportes
var idactualpacientereporte = 0;
var nombreactualpacientereporte = "";


//variable para el control sobre los clicks de los platos
var contadorclick = 0;

var alimentos = {
    listos: []
};

var idselecciongr = 0;
var nombrecombinacion = "";

$(document).ready(function(){

    $("#salir").hide();
    $("#bienvenidapaciente").hide();

    //capturamos lo ingresado desde el teclado y realizamos la consulta a la bd
    $("#identificarse").click(function () {

        $(this).hide();
        $("#salir").show();

        var contenido = "";
        contenido += '<span class="bigBox-fondo "></span>';
        contenido +='<div class="bigBox-contenedor"  align="center">';
        contenido +='<span class="bigBox-Entrada"><input  class="text-accent-2" id="capturapaciente" placeholder="Ingresa tu nombre" type="text"></span>';
        contenido +='<span  id="resultadoBusqueda"></span>';
        contenido +='<button class="bigBox-Boton btn btn-default">Aceptar</button>';
        contenido +='</div>';

        $("#caja").append(contenido);



        $("#resultadoBusqueda").hide();
        $(".bigBox-Boton").hide();

        var consulta;
        //hacemos focus al campo de búsqueda
        $("#capturapaciente").focus();
        //comprobamos si se pulsa una tecla
        $("#capturapaciente").keyup(function(e){
            //obtenemos el texto introducido en el campo de búsqueda
            consulta = $("#capturapaciente").val();
            //hace la búsqueda
            if (consulta != "") {
                $.post(baseurl+'paciente/busquedapaciente', {nombre: consulta}, function(mensaje) {
                    if (mensaje!= '') {
                        $("#resultadoBusqueda").show();
                        $("#resultadoBusqueda").html(mensaje);
                    } else{
                        $("#resultadoBusqueda").html('');
                    };
                });
            }
        });

        $(".respaciente").live('click', function(e){
            e.preventDefault();
            var idpaciente = $(this).data("id");
            var nombrepaciente = $(this).data("nombre");

            actualpaciente = idpaciente;
            nombreactualpaciente = nombrepaciente;

            $("#capturapaciente").val(nombrepaciente);
            $("#resultadoBusqueda").remove();
            $(".bigBox-Boton").show();
        });

        $(".bigBox-Boton").live('click', function () {

            $(".bigBox-fondo").remove();
            $(".bigBox-contenedor").remove();
            $("#resultadoBusqueda").remove();

            $("#bienvenidapaciente").show();
            $("#bienvenidapaciente").text("Bienvenid@ "+ nombreactualpaciente +"");





        });

    });

    $("#salir").click(function () {

        swal({
                title: "La aplicación será reiniciada, tendrás que identificarte de nuevo" ,
                text: "Estás seguro de esto?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Sí, Continuar!",
                cancelButtonText: "No, Cancelar!",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function(isConfirm){
                if (isConfirm) {

                    swal("Haza salido correctamente!", "Debes identificarte para volver a iniciar", "success");
                    window.location = baseurl+'paciente';


                }

            });




    });


    $("li.platoslunes").hide();
    $("li.platosmartes").hide();
    $("li.platosmiercoles").hide();
    $("li.platosjueves").hide();
    $("li.platosviernes").hide();
    $("li.platossabado").hide();
    $("li.platosdomingo").hide();

    $("li.selplato").hide();

    $("#cargar_json").click(function(e){

        if (actualpaciente===0){

            e.preventDefault();

            swal("Aún no estás identificado!", "Presiona el botón Identificarse e ingresa tu nombre", "error")
        }else
            if (idplatos===0){

                e.preventDefault();

                swal("Aún no haz seleccionado ningún plato!", "Selecciona tu plato primero", "error")
            }else{

            e.preventDefault();

            $.post(baseurl + 'paciente/categorias_json', function (data) {

                var result = JSON.parse(data);

                console.log(result);

                $.each(result, function (i, val) {

                    $("#contenedor_categorias").append('<ul data-id=' + val.IDCategoria + ' id=categoria class=list-group-item>' + val.Nombre + '</ul>');

                });
            });
            $(this).hide();
            $("#contenedor_categorias").prepend('<a href="" class="ocultar custom-select">Ocultar</a>');

            $(".ocultar").live('click', function () {
                $(this).remove();

                $("#contenedor_categorias").html('');
                $("#cargar_json").show();

            });
        }
    }); //FIN #cargar_json(cargar categorias)

    $("#categoria").live('click', function(){

        //var id = 
        //corregido el bug de sumar 1 al id de la categoria
        var dato = $(this).data("id");

       idcategoria =dato;

        // console.log(dato);

        $.ajax({
            type: "POST",
            url: baseurl+'paciente/alimentos_json',
            dataType: 'json',
            data: {id: dato},
            success: function(res){console.log(res);
                if (res) {
                    $.each(res, function ( j, val) {

                        //corregido el bug de la variable para asignar el id de alimento
                        $("#contenedor_subcategorias").append('<li data-id=' + val.IDAlimento + ' data-imagen='+ val.img + ' data-categoria=' + val.IDCategoria + ' data-calorias=' + val.Calorias + ' id=alimento class=list-group-item>' + val.Nombre + ', ' + val.Calorias + '</li>').hover(function(){

    $(this).css("cursor", "pointer");
    }, function(){
    $(this).css("cursor", "hand");
});
                    });

                }
            }
        });
            $("li#alimento").hide();
            $('ul#categoria').hide();
            $(".ocultar").hide();
            $("#cargar_json").show();

    });//FIN #categoria (cargar_subcategorias)


    //cuando se de click sobre cada alimento
    $("#alimento").live('click', function(){

        //var idalimento = 
        //corregido el bug de sumar 1 al id del alimento
        var id = $(this).data("id");

        //capturamos la imagen de cada alimento
        var archivo = $(this).data("imagen");

        var cantidad = parseInt($(this).data("calorias"));

        var idcategoria = $(this).data("categoria");




        swal({
                title: "Esto no se puede deshacer",
                text: "Estás seguro de esto?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Sí, Continuar!",
                cancelButtonText: "No, Cancelar!",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function (isConfirm) {
                if (isConfirm) {

                    totalcalorias =  totalcalorias + cantidad;

                    $("#lblcalorias").text("Total de calorias para este plato: "+ totalcalorias +"");




                    //cada alimento es agregado al ojbeto json
                    alimentos.listos.push({
                        "idcombinacion" : idselecciongr,
                        "nombrecombinacion" : nombrecombinacion,
                        "idalimento"    : id,
                        "idcategoria"   : idcategoria,
                        "idpaciente"    : actualpaciente,
                        "iddia"         : iddia,
                        "idplato"       : idplatos


                    });

                    var imagen = archivo;
                    //var imagen2 = "tortillas";
                    
                    //variables para las urls de las imagenes
                    var url = "assets/img/alimentos/"+imagen+".png";
                    //var url2 = "assets/img/alimentos/"+ imagen2 + ".png";

                    var tl = new TimelineMax(); //variabla para la animacion

                    // console.log(id);

                 if (idselecciongr ==1 ){

                    if (idcategoria ==2 ) {
                        // $("#imgc5").attr('src', url);
                        // tl.from("#imgc5", 1.3, { x: "+=850px", ease: Bounce.easeOut })
                        //     .from("#imgc5", 1, {opacity:0}, "-=1.3" );

                        var cuenta= 0;

                        $("#imgc5").append('<img  style="border-radius: 150px; height: 50px; width: 50px; margin-top: 60px; margin-left: 425px;"  class="img-fluid" alt="Dieta del Plato">').attr('src', url);



                    }else
                    if (idcategoria == 3){

                        $("#imgc2").attr('src', url);
                        tl.from("#imgc2", 1.3, { x: "+=850px", ease: Bounce.easeOut })
                            .from("#imgc2", 1, {opacity:0}, "-=1.3" );

                    }else
                     if (idcategoria == 4){
                         $("#imgc1").attr('src', url);
                        tl.from("#imgc1", 1.3, { x: "+=850px", ease: Bounce.easeOut })
                            .from("#imgc1", 1, {opacity:0}, "-=1.3" );
                        }
                        else
                            if (idcategoria == 5){
                                $("#imgc3").attr('src', url);
                                tl.from("#imgc3", 1.3, { x: "+=850px", ease: Bounce.easeOut })
                                .from("#imgc3", 1, {opacity:0}, "-=1.3" );
                            }
                            else
                            if (idcategoria > 5){
                                $("#imgc4").attr('src', url);
                                tl.from("#imgc4", 1.3, { x: "+=850px", ease: Bounce.easeOut })
                                    .from("#imgc4", 1, {opacity:0}, "-=1.3" );
                            }
                            else
                            if (idcategoria == 1){
                                $("#imgc4").attr('src', url);
                                tl.from("#imgc4", 1.3, { x: "+=850px", ease: Bounce.easeOut })
                                    .from("#imgc4", 1, {opacity:0}, "-=1.3" );
                            }

                    
                    swal("Alimento agregado", "Su alimento fue agregado al plato", "success");
                    console.log(imagen);
                 } //fin del if (idselecciongr ==1 )

                    if (idselecciongr ==2 ){

                        if (idcategoria ==2 ) {
                            // $("#imgc5").attr('src', url);
                            // tl.from("#imgc5", 1.3, { x: "+=850px", ease: Bounce.easeOut })
                            //     .from("#imgc5", 1, {opacity:0}, "-=1.3" );

                            var cuenta= 0;

                            $("#imgc5").append('<img  style="border-radius: 150px; height: 50px; width: 50px; margin-top: 60px; margin-left: 425px;"  class="img-fluid" alt="Dieta del Plato">').attr('src', url);



                        }else
                        if (idcategoria == 3){

                            $("#imgc2").attr('src', url);
                            tl.from("#imgc2", 1.3, { x: "+=850px", ease: Bounce.easeOut })
                                .from("#imgc2", 1, {opacity:0}, "-=1.3" );

                        }else
                        if (idcategoria == 4){
                            $("#imgc1").attr('src', url);
                            tl.from("#imgc1", 1.3, { x: "+=850px", ease: Bounce.easeOut })
                                .from("#imgc1", 1, {opacity:0}, "-=1.3" );
                        }
                        /*else
                        if (idcategoria == 5){
                            $("#imgc3").attr('src', url);
                            tl.from("#imgc3", 1.3, { x: "+=850px", ease: Bounce.easeOut })
                                .from("#imgc3", 1, {opacity:0}, "-=1.3" );
                        }*/
                        else
                        if (idcategoria > 5){
                            $("#imgc4").attr('src', url);
                            tl.from("#imgc4", 1.3, { x: "+=850px", ease: Bounce.easeOut })
                                .from("#imgc4", 1, {opacity:0}, "-=1.3" );
                        }
                        else
                        if (idcategoria == 1){
                            $("#imgc4").attr('src', url);
                            tl.from("#imgc4", 1.3, { x: "+=850px", ease: Bounce.easeOut })
                                .from("#imgc4", 1, {opacity:0}, "-=1.3" );
                        }


                        swal("Alimento agregado", "Su alimento fue agregado al plato", "success");
                        console.log(imagen);
                    } //fin del if (idselecciongr ==2 )

                    if (idselecciongr ==3 ){

                        if (idcategoria ==2 ) {
                            // $("#imgc5").attr('src', url);
                            // tl.from("#imgc5", 1.3, { x: "+=850px", ease: Bounce.easeOut })
                            //     .from("#imgc5", 1, {opacity:0}, "-=1.3" );

                            var cuenta= 0;

                            $("#imgc5").append('<img  style="border-radius: 150px; height: 50px; width: 50px; margin-top: 60px; margin-left: 425px;"  class="img-fluid" alt="Dieta del Plato">').attr('src', url);



                        }else
                        if (idcategoria == 3){

                            $("#imgc2").attr('src', url);
                            tl.from("#imgc2", 1.3, { x: "+=850px", ease: Bounce.easeOut })
                                .from("#imgc2", 1, {opacity:0}, "-=1.3" );

                        }/*else
                        if (idcategoria == 4){
                            $("#imgc1").attr('src', url);
                            tl.from("#imgc1", 1.3, { x: "+=850px", ease: Bounce.easeOut })
                                .from("#imgc1", 1, {opacity:0}, "-=1.3" );
                        }*/
                        else
                        if (idcategoria == 5){
                            $("#imgc3").attr('src', url);
                            tl.from("#imgc3", 1.3, { x: "+=850px", ease: Bounce.easeOut })
                                .from("#imgc3", 1, {opacity:0}, "-=1.3" );
                        }
                        else
                        if (idcategoria > 5){
                            $("#imgc4").attr('src', url);
                            tl.from("#imgc4", 1.3, { x: "+=850px", ease: Bounce.easeOut })
                                .from("#imgc4", 1, {opacity:0}, "-=1.3" );
                        }
                        else
                        if (idcategoria == 1){
                            $("#imgc4").attr('src', url);
                            tl.from("#imgc4", 1.3, { x: "+=850px", ease: Bounce.easeOut })
                                .from("#imgc4", 1, {opacity:0}, "-=1.3" );
                        }


                        swal("Alimento agregado", "Su alimento fue agregado al plato", "success");
                        console.log(imagen);
                    } //fin del if (idselecciongr ==3 )

                    if (idselecciongr ==4 ){

                        if (idcategoria ==2 ) {
                            // $("#imgc5").attr('src', url);
                            // tl.from("#imgc5", 1.3, { x: "+=850px", ease: Bounce.easeOut })
                            //     .from("#imgc5", 1, {opacity:0}, "-=1.3" );

                            var cuenta= 0;

                            $("#imgc5").append('<img  style="border-radius: 150px; height: 50px; width: 50px; margin-top: 60px; margin-left: 425px;"  class="img-fluid" alt="Dieta del Plato">').attr('src', url);



                        }else
                        if (idcategoria == 3){

                            $("#imgc2").attr('src', url);
                            tl.from("#imgc2", 1.3, { x: "+=850px", ease: Bounce.easeOut })
                                .from("#imgc2", 1, {opacity:0}, "-=1.3" );

                        }/*else
                        if (idcategoria == 4){
                            $("#imgc1").attr('src', url);
                            tl.from("#imgc1", 1.3, { x: "+=850px", ease: Bounce.easeOut })
                                .from("#imgc1", 1, {opacity:0}, "-=1.3" );
                        }
                        else
                        if (idcategoria == 5){
                            $("#imgc3").attr('src', url);
                            tl.from("#imgc3", 1.3, { x: "+=850px", ease: Bounce.easeOut })
                                .from("#imgc3", 1, {opacity:0}, "-=1.3" );
                        }*/
                        else
                        if (idcategoria > 5){
                            $("#imgc4").attr('src', url);
                            tl.from("#imgc4", 1.3, { x: "+=850px", ease: Bounce.easeOut })
                                .from("#imgc4", 1, {opacity:0}, "-=1.3" );
                        }
                        else
                        if (idcategoria == 1){
                            $("#imgc4").attr('src', url);
                            tl.from("#imgc4", 1.3, { x: "+=850px", ease: Bounce.easeOut })
                                .from("#imgc4", 1, {opacity:0}, "-=1.3" );
                        }


                        swal("Alimento agregado", "Su alimento fue agregado al plato", "success");
                        console.log(imagen);
                    } //fin del if (idselecciongr ==4 )
                }
            });


    }); //FIN #alimento(seleccionar algun alimento)


    $(".btnlunes").click(function (e) {


        if (actualpaciente===0){
            e.preventDefault();

            swal("Aún no estás identificado!", "Presiona el botón Identificarse e ingresa tu nombre", "error")
        }else {
            e.preventDefault();

            var dia = $(this).data("id");


            if (iddia != 0) {

                if (iddia != dia)
                    swal("Ya haz seleccionado un día!", "Debes finalizar los 7 platos para poder elegir otro día", "error")

                return false;

            } else {

                swal({
                        title: "Haz seleccionado el día: " + dia,
                        text: "Estás seguro de esto?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Sí, Continuar!",
                        cancelButtonText: "No, Cancelar!",
                        closeOnConfirm: false,
                        closeOnCancel: true
                    },
                    function (isConfirm) {
                        if (isConfirm) {

                            iddia = dia;

                            $("li.platoslunes").show();
                            $("li.platosmartes").hide();
                            $("li.platosmiercoles").hide();
                            $("li.platosjueves").hide();
                            $("li.platosviernes").hide();
                            $("li.platossabado").hide();
                            $("li.platosdomingo").hide();
                            swal("Día confirmado!", "Ahora selecciona tus platos", "success");


                        }
                    });

            }
        }



    });// FIN .btnlunes


    $(".btnmartes").click(function (e) {



        if (actualpaciente===0){
            e.preventDefault();

            swal("Aún no estás identificado!", "Presiona el botón Identificarse e ingresa tu nombre", "error")
        }else {
            e.preventDefault();

            var dia = $(this).data("id");


            if (iddia != 0) {

                if (iddia != dia)
                    swal("Ya haz seleccionado un día!", "Debes finalizar los 7 platos para poder elegir otro día", "error")

                return false;

            } else {

                swal({
                        title: "Haz seleccionado el día: " + dia,
                        text: "Estás seguro de esto?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Sí, Continuar!",
                        cancelButtonText: "No, Cancelar!",
                        closeOnConfirm: false,
                        closeOnCancel: true
                    },
                    function (isConfirm) {
                        if (isConfirm) {

                            iddia = dia;

                            $("li.platosmartes").show();
                            $("li.platoslunes").hide();
                            $("li.platosmiercoles").hide();
                            $("li.platosjueves").hide();
                            $("li.platosviernes").hide();
                            $("li.platossabado").hide();
                            $("li.platosdomingo").hide();
                            swal("Día confirmado!", "Ahora selecciona tus platos", "success");


                        }
                    });

            }
        }

    });//FIN btnmartes


    $(".btnmiercoles").click(function (e) {



        if (actualpaciente===0){
            e.preventDefault();

            swal("Aún no estás identificado!", "Presiona el botón Identificarse e ingresa tu nombre", "error")
        }else {
            e.preventDefault();

            var dia = $(this).data("id");


            if (iddia != 0) {

                if (iddia != dia)
                    swal("Ya haz seleccionado un día!", "Debes finalizar los 7 platos para poder elegir otro día", "error")

                return false;

            } else {

                swal({
                        title: "Haz seleccionado el día: " + dia,
                        text: "Estás seguro de esto?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Sí, Continuar!",
                        cancelButtonText: "No, Cancelar!",
                        closeOnConfirm: false,
                        closeOnCancel: true
                    },
                    function (isConfirm) {
                        if (isConfirm) {

                            iddia = dia;

                            $("li.platosmiercoles").show();
                            $("li.platoslunes").hide();
                            $("li.platosmartes").hide();
                            $("li.platosjueves").hide();
                            $("li.platosviernes").hide();
                            $("li.platossabado").hide();
                            $("li.platosdomingo").hide();
                            swal("Día confirmado!", "Ahora selecciona tus platos", "success");


                        }
                    });

            }
        }

    });// FIN btnmiercoles


    $(".btnjueves").click(function (e) {



        if (actualpaciente===0){
            e.preventDefault();

            swal("Aún no estás identificado!", "Presiona el botón Identificarse e ingresa tu nombre", "error")
        }else {
            e.preventDefault();

            var dia = $(this).data("id");


            if (iddia != 0) {

                if (iddia != dia)
                    swal("Ya haz seleccionado un día!", "Debes finalizar los 7 platos para poder elegir otro día", "error")

                return false;

            } else {

                swal({
                        title: "Haz seleccionado el día: " + dia,
                        text: "Estás seguro de esto?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Sí, Continuar!",
                        cancelButtonText: "No, Cancelar!",
                        closeOnConfirm: false,
                        closeOnCancel: true
                    },
                    function (isConfirm) {
                        if (isConfirm) {

                            iddia = dia;

                            $("li.platosjueves").show();
                            $("li.platoslunes").hide();
                            $("li.platosmartes").hide();
                            $("li.platosmiercoles").hide();
                            $("li.platosviernes").hide();
                            $("li.platossabado").hide();
                            $("li.platosdomingo").hide();
                            swal("Día confirmado!", "Ahora selecciona tus platos", "success");


                        }
                    });

            }
        }

    });//FIN btnjueves


    $(".btnviernes").click(function (e) {



        if (actualpaciente===0){
            e.preventDefault();

            swal("Aún no estás identificado!", "Presiona el botón Identificarse e ingresa tu nombre", "error")
        }else {
            e.preventDefault();

            var dia = $(this).data("id");


            if (iddia != 0) {

                if (iddia != dia)
                    swal("Ya haz seleccionado un día!", "Debes finalizar los 7 platos para poder elegir otro día", "error")

                return false;

            } else {

                swal({
                        title: "Haz seleccionado el día: " + dia,
                        text: "Estás seguro de esto?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Sí, Continuar!",
                        cancelButtonText: "No, Cancelar!",
                        closeOnConfirm: false,
                        closeOnCancel: true
                    },
                    function (isConfirm) {
                        if (isConfirm) {

                            iddia = dia;

                            $("li.platosviernes").show();
                            $("li.platoslunes").hide();
                            $("li.platosmartes").hide();
                            $("li.platosmiercoles").hide();
                            $("li.platosjueves").hide();
                            $("li.platossabado").hide();
                            $("li.platosdomingo").hide();
                            swal("Día confirmado!", "Ahora selecciona tus platos", "success");


                        }
                    });

            }
        }

    });// FIN btnviernes


    $(".btnsabado").click(function (e) {



        if (actualpaciente===0){
            e.preventDefault();

            swal("Aún no estás identificado!", "Presiona el botón Identificarse e ingresa tu nombre", "error")
        }else {
            e.preventDefault();

            var dia = $(this).data("id");


            if (iddia != 0) {

                if (iddia != dia)
                    swal("Ya haz seleccionado un día!", "Debes finalizar los 7 platos para poder elegir otro día", "error")

                return false;

            } else {

                swal({
                        title: "Haz seleccionado el día: " + dia,
                        text: "Estás seguro de esto?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Sí, Continuar!",
                        cancelButtonText: "No, Cancelar!",
                        closeOnConfirm: false,
                        closeOnCancel: true
                    },
                    function (isConfirm) {
                        if (isConfirm) {

                            iddia = dia;

                            $("li.platossabado").show();
                            $("li.platoslunes").hide();
                            $("li.platosmartes").hide();
                            $("li.platosmiercoles").hide();
                            $("li.platosjueves").hide();
                            $("li.platosviernes").hide();
                            $("li.platosdomingo").hide();
                            swal("Día confirmado!", "Ahora selecciona tus platos", "success");


                        }
                    });

            }
        }

    });// FIN btnsabado


    $(".btndomingo").click(function (e) {



        if (actualpaciente===0){
            e.preventDefault();

            swal("Aún no estás identificado!", "Presiona el botón Identificarse e ingresa tu nombre", "error")
        }else {
            e.preventDefault();

            var dia = $(this).data("id");


            if (iddia != 0) {

                if (iddia != dia)
                    swal("Ya haz seleccionado un día!", "Debes finalizar los 7 platos para poder elegir otro día", "error")

                return false;

            } else {

                swal({
                        title: "Haz seleccionado el día: " + dia,
                        text: "Estás seguro de esto?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Sí, Continuar!",
                        cancelButtonText: "No, Cancelar!",
                        closeOnConfirm: false,
                        closeOnCancel: true
                    },
                    function (isConfirm) {
                        if (isConfirm) {

                            iddia = dia;

                            $("li.platosdomingo").show();
                            $("li.platoslunes").hide();
                            $("li.platosmartes").hide();
                            $("li.platosmiercoles").hide();
                            $("li.platosjueves").hide();
                            $("li.platosviernes").hide();
                            $("li.platossabado").hide();
                            swal("Día confirmado!", "Ahora selecciona tus platos", "success");


                        }
                    });

            }
        }

    });// FIN btndomingo



    //capturamos el id del plato
    $(".btn-amber").click(function () {
        //cacheamos el valor del this
        var that = this;

        var nombreplato = $(this).data("nombre");

        var idplato = $(this).data("id");




        //si el usuario presiona sobre otro plato le notificamos que hay otro plato sin finalizar
        //en el primer if verificamos que ya exista un primer plato
        if (idplatos > 0){
            if (idplatos!=idplato) {

                swal("Plato en proceso!", "Debes finalizar tu plato para poder elegir otro.", "error");
                return false;
            }
        }
        else {

            swal({
                    title: "Haz seleccionado el plato: " + nombreplato,
                    text: "Estás seguro de esto?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Sí, Continuar!",
                    cancelButtonText: "No, Cancelar!",
                    closeOnConfirm: false,
                    closeOnCancel: true
                },
                function (isConfirm) {
                    if (isConfirm) {

                        //agregamos el plato seleccionado a la variable global idplatos
                        idplatos = idplato;

                        that.disabled = true;
                        //$("#plato"+idplato).remove();
                        //ocultamos los elementos
                        //$("li").find(".platos").hide();
                        swal("Plato confirmado!", "Estás listo para seleccionar sus alimentos.", "success");

                    }

                });
        }
    });







    $("li#finalizar").click(function () {

        //verificamos que existan ya alimentos seleccionados
        var boton=0;

        var nombreboton = $(this).data("nombre");

        if (alimentos.listos.length <=0){
            swal("Plato vacío!", "Debe de agregar alimentos a su plato.", "error");
        }else
        swal({
                title: "Estás seguro?",
                text: "Esta operación no se puede deshacer!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Sí, Enviar!",
                cancelButtonText: "No, Cancelar envío!",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function(isConfirm){
                if (isConfirm) {



                    var alimentosJSON = JSON.stringify(alimentos.listos);
                    // Realizamos la petición al servidor
                    $.post(baseurl+'paciente/insertaralimentos', {alimentos: alimentosJSON},
                        function(respuesta) {
                            console.log(respuesta);
                        }).error(
                        function(){
                            console.log('Error al ejecutar la petición');
                        }
                    );

                    totalcalorias = 0;


                    idplatos= 0;

                    alimentos = {
                        listos: []
                    };

                    //regresamos las imagenes iniciales a cada plato
                    var url = "assets/img/alimentos/mas.png";    
                    $("#imgc1").attr('src', url);
                    $("#imgc2").attr('src', url);
                    $("#imgc3").attr('src', url);

                    $("#lblcalorias").text("Total de calorias para este plato: "+ totalcalorias +"");
                    //$("li").find(".platos").show();
                    swal("Datos enviados!", "Su información ha sido almacenada.", "success");

                    boton++;
                    contadorclick=contadorclick+boton;

                    $("li#alimento").hide();

                    if (contadorclick===7){
                        //reiniciamos la variable que contiene el id del día seleccionado
                        iddia= 0;

                        //reiniciamos el contador interno
                        boton=0;

                        //reiniciamos el contador general
                        contadorclick=0;

                        //$("li").find(".platos").hide();
                        $("li").find(".platos"+ nombreboton).hide();


                        $("a.btn"+ nombreboton).attr('href', '').css({'cursor': 'wait', 'pointer-events' : 'none',  'background': 'red'});





                    }
                    console.log(contadorclick);

                }

            });

    });

//reportes


//realiazar busqueda de paciente para reporte
//hacemos focus al campo de búsqueda
        $("#pacientereporte").focus();
        //comprobamos si se pulsa una tecla
        $("#pacientereporte").keyup(function(e){



        var contenido = "";

       
        contenido +='<ul class="list-group" id="pacientesreportes"></ul>';
       
        $("#cargabusqueda").append(contenido);

            var consulta;
            //obtenemos el texto introducido en el campo de búsqueda
            consulta = $("#pacientereporte").val();
            //hace la búsqueda
            if (consulta != "") {
                $.post(baseurl+'paciente/busquedapaciente', {nombre: consulta}, function(mensaje) {
                    if (mensaje!= '') {
                        $("#pacientesreportes").show();
                        $("#pacientesreportes").html(mensaje);
                        console.log(mensaje);
                    } else{
                        $("#pacientesreportes").html('');
                    };
                });
            }
        });

        $(".cargarpaciente").live('click', function(e){
            e.preventDefault();
            var idpaciente = $(this).data("id");
            var nombrepaciente = $(this).data("nombre");

            idactualpacientereporte = idpaciente;
            nombreactualpacientereporte = nombrepaciente;

            
            $("#pacientereporte").val(nombrepaciente);
            $("#pacientesreportes").remove();
            
        });


        //capturamos el click sobre cualquier plato seleccionado
        $(".platosreporte").click(function(){

            if (idactualpacientereporte===0) {
                 swal("Paciente no exite", "Debes elegir un paciente primero", "error")

                 return false;
            }else{

            

            var elemento = this;
            elemento.disabled=true;

             var diaseleccionado = $(this).data("dia");
             var idplatoseleccionado = $(this).data("idplato");

             $.ajax({
            type: "POST",
            url: baseurl+'admin/buscardatospaciente',
            dataType: 'json',
            data: {idpaciente: idactualpacientereporte, dia: diaseleccionado, elplato: idplatoseleccionado},
            
            success: function(res){console.log(res);
                if (res) {

                    
                    var resultadocalorias =0;
                    
       
        $.each(res, function (j, val) {

                        var convertidas = parseInt(val.calorias);
                        resultadocalorias = resultadocalorias + convertidas;

                        $("table#"+diaseleccionado+idplatoseleccionado).append( '<tr class="list-group-item-info"><td>' + val.alimento + '</td><td>' + val.nombrecategoria + '</td><td>' + val.calorias + '</td></tr>' ); 
                        
                        
                    });

                var texto= "Total calorias ";    //variable solo para imprimir
                var vacio = "";
                $("table#"+diaseleccionado+idplatoseleccionado).append( '<tr><td>'+ texto + '</td><td>' + resultadocalorias + '</td><td>' + vacio + '</td></tr>' ); 

                }else{

                    swal("Ops", "Este plato no contiene alimentos", "error")
                }
            }
        });

    }//fin else

        });

    $("#btnlimmpiarreporte").click(function () {

        window.location = baseurl+'admin';
    });

    $("#btnimprimir").click(function () {


        window.open(baseurl + 'admin/reportepdf/' + idactualpacientereporte, '_blank')

    });


    //elegir platos
    $(".btnselplato").click(function (e) {

        e.preventDefault();
        $("li.selplato").show();


    });

    //detectamos que tipo de plato tomamos
    $(".btn-light-green").click(function () {

        var idseleccion = $(this).data("id");
        var combinacion = $(this).data("nombre");

        idselecciongr = idseleccion;
        nombrecombinacion = combinacion;

        var url = "assets/img/plato.png";
        var url2 = "assets/img/proteinasproteinas.png";
        var url3 = "assets/img/verdurasverduras.png";
        var url4 = "assets/img/verdurasverdurasproteinasproteinas.png";



        if (idselecciongr == 1 ){
            $("#fondoprincipal").attr('src', url);

        }
        if (idselecciongr == 2 ){
            $("#fondoprincipal").attr('src', url2);

        }

        if (idselecciongr == 3 ){
            $("#fondoprincipal").attr('src', url3);

        }

        if (idselecciongr == 4 ){
            $("#fondoprincipal").attr('src', url4);

        }


        console.log(idseleccion);
        console.log(combinacion);

    });


       
        //DETECTAMOS TECLAS PRESIONADAS SOBRE EL INPUT DE BUSCAR ALIMENTO Y REALIZAMOS LA BUSQUEDA
       $("#receta").focus();
        //comprobamos si se pulsa una tecla
        $("#receta").keyup(function(e){



        var contenido3 = "";

       
        contenido3 +='<ul class="list-group" id="findrecetas"></ul>';
       
        $("#recetaencontrada").append(contenido3);

            var consulta3;
            //obtenemos el texto introducido en el campo de búsqueda
            consulta3 = $("#receta").val();
            //hace la búsqueda
            if (consulta3 != "") {
                $.post(baseurl+'paciente/buscaralimentoreceta', {alimento: consulta3}, function(mensaje) {
                    if (mensaje!= '') {
                        $("#findrecetas").show();
                        $("#findrecetas").html(mensaje);
                        console.log(mensaje);
                    } else{
                        $("#findrecetas").html('');
                    };
                });
            }
        });

        $(".cargaralimento").live('click', function(e){
            e.preventDefault();
            var idalimento = $(this).data("id");
            var nombrealimento = $(this).data("nombre");
            var idreceta = $(this).data("receta");

            //idactualpacientereporte = idpaciente;
            //nombreactualpacientereporte = nombrepaciente;

            
            $("#receta").val(nombrealimento);
            $("#findrecetas").remove();

            $.ajax({
            type: "POST",
            url: baseurl+'paciente/getreceta',
            dataType: 'json',
            data: {idreceta: idreceta},
            
            success: function(res){console.log(res);
                if (res) {

                    
                    //var resultadocalorias =0;

                    
       
        $.each(res, function (j, val) {

                        //var convertidas = parseInt(val.calorias);
                        //resultadocalorias = resultadocalorias + convertidas;

                        //$("table#"+diaseleccionado+idplatoseleccionado).append( '<tr class="list-group-item-info"><td>' + val.alimento + '</td><td>' + val.nombrecategoria + '</td><td>' + val.calorias + '</td></tr>' ); 
                        
                        
                    });

                //var texto= "Total calorias ";    //variable solo para imprimir
                //var vacio = "";
                //$("table#"+diaseleccionado+idplatoseleccionado).append( '<tr><td>'+ texto + '</td><td>' + resultadocalorias + '</td><td>' + vacio + '</td></tr>' ); 

                }else{

                    //swal("Ops", "Este plato no contiene alimentos", "error")
                }
            }
        });
            
        });





    var movingWithinSite = false;

    function userMovingWithinSite() {
        movingWithinSite = true;
    }

    $(window).bind('beforeunload', function(){
        return 'Seguro deseas salir?';
    });





});


