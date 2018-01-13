var baseurl = 'http://localhost/dieta/';
var actualpaciente = 0;
var nombreactualpaciente = "";

var diasarray = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'];

var totalcalorias = 0;

var totalgrasas = 0;
var totalproteinas = 0;
var totalcarbohidratos = 0;

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

var clonados = {
    clonlistos: []
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

        $(document).on("click", ".respaciente", function (e) {

            e.preventDefault();
            var idpaciente = $(this).data("id");
            var nombrepaciente = $(this).data("nombre");

            actualpaciente = idpaciente;
            nombreactualpaciente = nombrepaciente;

            $("#capturapaciente").val(nombrepaciente);
            $("#resultadoBusqueda").remove();
            $(".bigBox-Boton").show();
        });

        $("#btnconfirmarpaciente").click( function () {


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

                    swal("Haz salido correctamente!", "Debes identificarte para volver a iniciar", "success");
                    window.location = baseurl+'paciente';


                }

            });


    });


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

                    $("#contenedor_categorias").append('<p data-id=' + val.IDCategoria + ' id=categoria class=list-group-item>' + val.Nombre + '</p>');

                });
            });
            $(this).hide();
            $("#contenedor_categorias").prepend('<a href="" class="ocultar custom-select btn-block">Ocultar</a>');

            $(".ocultar").live('click', function () {
                $(this).remove();

                $("#contenedor_categorias").html('');
                $("#cargar_json").show();

            });
        }
    }); //FIN #cargar_json(cargar categorias)



    //cuando se de click sobre cada alimento
    $(document).on("click", "#alimento", function () {


       var imgb64 = $(this).data("imgb64");
        //corregido el bug de sumar 1 al id del alimento
        var id = $(this).data("id");

        //capturamos la imagen de cada alimento
        var archivo = $(this).data("imagen");

        var grasas          = parseInt($(this).data("grasas"));
        var carbohidratos   = parseInt($(this).data("carbohidratos"));
        var proteinas       = parseInt($(this).data("proteinas"));

        var idcategoria = $(this).data("categoria");

        //var diasarray = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'];


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

                    totalgrasas =  totalgrasas + grasas;
                    totalcarbohidratos = totalcarbohidratos + carbohidratos;
                    totalproteinas = totalproteinas + proteinas;


                    $("#lblgrasas").text("Total de grasas para este plato: "+ totalgrasas +"");
                    $("#lblcarbohidratos").text("Total de carbohidratos para este plato: "+ totalcarbohidratos +"");
                    $("#lblproteinas").text("Total de proteinas para este plato: "+ totalproteinas +"");

                    //$( '.checkdias' ).on( 'click', function() {
                    if ($("#oplunes").prop('checked')) {

                        alimentos.listos.push({
                            "idcombinacion": idselecciongr,
                            "nombrecombinacion": nombrecombinacion,
                            "idalimento": id,
                            "idcategoria": idcategoria,
                            "idpaciente": actualpaciente,
                            "idplato": idplatos,
                            "iddia": "Lunes"


                        });

                    }
                    if ($("#opmartes").prop('checked')) {

                        alimentos.listos.push({
                            "idcombinacion": idselecciongr,
                            "nombrecombinacion": nombrecombinacion,
                            "idalimento": id,
                            "idcategoria": idcategoria,
                            "idpaciente": actualpaciente,
                            "idplato": idplatos,
                            "iddia": "Martes"


                        });

                    }
                    if ($("#opmiercoles").prop('checked')) {

                        alimentos.listos.push({
                            "idcombinacion": idselecciongr,
                            "nombrecombinacion": nombrecombinacion,
                            "idalimento": id,
                            "idcategoria": idcategoria,
                            "idpaciente": actualpaciente,
                            "idplato": idplatos,
                            "iddia": "Miercoles"


                        });

                    }
                    if ($("#opjueves").prop('checked')) {

                        alimentos.listos.push({
                            "idcombinacion": idselecciongr,
                            "nombrecombinacion": nombrecombinacion,
                            "idalimento": id,
                            "idcategoria": idcategoria,
                            "idpaciente": actualpaciente,
                            "idplato": idplatos,
                            "iddia": "Jueves"


                        });

                    }
                    if ($("#opviernes").prop('checked')) {

                        alimentos.listos.push({
                            "idcombinacion": idselecciongr,
                            "nombrecombinacion": nombrecombinacion,
                            "idalimento": id,
                            "idcategoria": idcategoria,
                            "idpaciente": actualpaciente,
                            "idplato": idplatos,
                            "iddia": "Viernes"


                        });

                    }
                    if ($("#opsabado").prop('checked')) {

                        alimentos.listos.push({
                            "idcombinacion": idselecciongr,
                            "nombrecombinacion": nombrecombinacion,
                            "idalimento": id,
                            "idcategoria": idcategoria,
                            "idpaciente": actualpaciente,
                            "idplato": idplatos,
                            "iddia": "Sabado"


                        });

                    }
                    if ($("#opdomingo").prop('checked')) {

                        alimentos.listos.push({
                            "idcombinacion": idselecciongr,
                            "nombrecombinacion": nombrecombinacion,
                            "idalimento": id,
                            "idcategoria": idcategoria,
                            "idpaciente": actualpaciente,
                            "idplato": idplatos,
                            "iddia": "Domingo"


                        });

                    }

                    if ($("#optodos").prop('checked')) {

                        $.each( diasarray, function( h, val ) {

                            alimentos.listos.push({
                                "idcombinacion": idselecciongr,
                                "nombrecombinacion": nombrecombinacion,
                                "idalimento": id,
                                "idcategoria": idcategoria,
                                "idpaciente": actualpaciente,
                                "idplato": idplatos,
                                "iddia": val


                            });

                        });



                    }


                    var imagen = archivo;



                    var url = "assets/img/alimentos/"+imagen+".png";


                    var tl = new TimelineMax(); //variabla para la animacion


                 //if (idselecciongr == 1 ){

                    if (idcategoria == 2 ) {

                        var cuenta= 0;
                        //div para lacteos

                        $("#c5").append('<li style="padding-top: 0px; padding-bottom: 0px;"><img class="img-fluid imgres" id=im'+ id +' style="border-radius: 150px; height: 50px; width: 50px;" src= "data:image/jpeg;base64,'+imgb64+'"></li>');
                       //$("img#img"+j).attr('src', 'data:image/jpeg;base64,'+val.imgb64+'');
                        tl.from("#im"+id, 1.3, { x: "+=850px", ease: Bounce.easeOut })
                            .from("#im"+id, 1, {opacity:0}, "-=1.3" );
                    }else
                    if (idcategoria == 3){

                        $("#c2").append('<li style="padding-top: 0px; padding-bottom: 0px;"><img class="img-fluid imgres" id=im'+ id +'  style="border-radius: 150px; height: 50px; width: 50px;" src= "data:image/jpeg;base64,'+imgb64+'"></li>');
                        //$("img#img"+j).attr('src', 'data:image/jpeg;base64,'+val.imgb64+'');
                        tl.from("#im"+id, 1.3, { x: "+=850px", ease: Bounce.easeOut })
                            .from("#im"+id, 1, {opacity:0}, "-=1.3" );

                    }else
                     if (idcategoria == 4){
                         $("#c1").append('<li style="padding-top: 0px; padding-bottom: 0px;"><img class="img-fluid imgres" id=im'+id+' style="border-radius: 150px; height: 50px; width: 50px;" src= "data:image/jpeg;base64,'+imgb64+'"></li>');
                         //$("img#img"+j).attr('src', 'data:image/jpeg;base64,'+val.imgb64+'');
                         tl.from("#im"+id, 1.3, { x: "+=850px", ease: Bounce.easeOut })
                             .from("#im"+id, 1, {opacity:0}, "-=1.3" );
                        }
                        else
                            if (idcategoria == 5 || idcategoria == 1){
                                $("#c3").append('<li style="padding-top: 0px; padding-bottom: 0px;"><img class="img-fluid imgres" id=im'+id+' style="border-radius: 150px; height: 50px; width: 50px;" src= "data:image/jpeg;base64,'+imgb64+'"></li>');
                                //$("img#img"+j).attr('src', 'data:image/jpeg;base64,'+val.imgb64+'');
                                tl.from("#im"+id, 1.3, { x: "+=850px", ease: Bounce.easeOut })
                                    .from("#im"+id, 1, {opacity:0}, "-=1.3" );
                            }
                            else
                            if (idcategoria >= 6){
                                $("#c4").append('<li style="padding-top: 0px; padding-bottom: 0px;"><img class="img-fluid imgres" id=im'+id+' style="border-radius: 150px; height: 50px; width: 50px;" src= "data:image/jpeg;base64,'+imgb64+'"></li>');
                                //$("img#img"+j).attr('src', 'data:image/jpeg;base64,'+val.imgb64+'');
                                tl.from("#im"+id, 1.3, { x: "+=850px", ease: Bounce.easeOut })
                                    .from("#im"+id, 1, {opacity:0}, "-=1.3" );
                            }




                    swal("Alimento agregado", "Su alimento fue agregado al plato", "success");
                    //console.log(imagen);
                 //} //fin del if (idselecciongr ==1 )





                }
            });


    }); //FIN #alimento(seleccionar algun alimento)


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


                    $.ajax({
                        type: "POST",
                        url: baseurl + 'paciente/insertaralimentos',
                        dataType: 'json',
                        data: {alimentos: alimentosJSON},
                        success: function (res) {
                            console.log(res);
                            if (res) {

                                console.log("Alimentos insertados correctamente")

                            }
                            else {
                                console.log("Error al enviar los alimentos")
                            }
                        }
                    });


                    totalcalorias = 0;
                    totalproteinas = 0;
                    totalcarbohidratos = 0;
                    totalgrasas = 0;


                    idplatos= 0;

                    alimentos = {
                        listos: []
                    };


                    $("img.imgres").remove();

                    //regresamos las imagenes iniciales a cada plato
                    var url = "assets/img/alimentos/mas.png";
                    $("#imgc1").attr('src', url);
                    $("#imgc2").attr('src', url);
                    $("#imgc3").attr('src', url);

                    $("#lblproteinas").text("Total de proteinas para este plato: "+ totalproteinas +"");
                    $("#lblcarbohidratos").text("Total de carbohidratos para este plato: "+ totalcarbohidratos +"");
                    $("#lblgrasas").text("Total de grasas para este plato: "+ totalgrasas +"");
                    //$("li").find(".platos").show();
                    swal("Datos enviados!", "Su información ha sido almacenada.", "success");

                    boton++;
                    contadorclick=contadorclick+boton;

                    $("li#alimento").hide();
                    $("#capturapaciente").val( '');
                    //$('input[type=checkbox]').prop('checked', false);
                    // ($("#oplunes").prop('checked', false));
                    // ($("#opmartes").prop('checked', false));
                    $('input[type=checkbox]').each(function()
                    {
                        $(this).prop('checked', false);
                    });

                    $(".opcion-plato").removeClass("disabled");
                    $(".opcplato").removeClass("disabled");

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


                }

            });

    });

//reportes


//realiazar busqueda de paciente para reporte
//hacemos focus al campo de búsqueda
        $("#pacientereporte").focus();
        //comprobamos si se pulsa una tecla
        $("#pacientereporte").keyup(function()
        {

          var contenido = "";
          contenido +='<ul class="list-group" id="pacientesreportes"></ul>';
          $("#cargabusqueda").append(contenido);

            var consulta;
            //obtenemos el texto introducido en el campo de búsqueda
            consulta = $("#pacientereporte").val();
            //hace la búsqueda
            if (consulta != "")
            {
                $.post(baseurl+'paciente/busquedapaciente', {nombre: consulta}, function(mensaje)
                {
                    if (mensaje!= '')
                    {
                        $("#pacientesreportes").show();
                        $("#pacientesreportes").html(mensaje);
                        console.log(mensaje);
                    } else
                    {
                        $("#pacientesreportes").html('');
                    };
                });

            }
        });

        //cuando se da click sobre el nombre de algun paciente determinado
        $(document).on("click", ".cargarpaciente", function ()
        //$(".cargarpaciente").live('click', function(e)
        {

            //capturamos el id del paciente
            var idpaciente = $(this).data("id");
            //capturamos el nombre del paciente
            var nombrepaciente = $(this).data("nombre");

            //asignamos a la variable global el valor de la variable local
            idactualpacientereporte = idpaciente;
            //asignamos a la variable global el valor de la variable local
            nombreactualpacientereporte = nombrepaciente;
            //al input tipo text le colocamos el valor de la variable
            $("#pacientereporte").val(nombrepaciente);
            $("#pacientesreportes").remove();

        });


        //capturamos el click sobre cualquier plato seleccionado
        $(".platosreporte").click(function()
        {

            if (idactualpacientereporte===0)
            {
                 swal("Paciente no exite", "Debes elegir un paciente primero", "error")

                 return false;
            }else
            {

              //variable que nos permite hacer cache del objeto this
              var elemento = this;
              elemento.disabled=true;

              //capturamos el id del dia seleccionado
              var diaseleccionado = $(this).data("dia");
              //capturamos el id del plato seleccionado
              var idplatoseleccionado = $(this).data("idplato");

              $.ajax({
              type: "POST",
              url: baseurl+'admin/buscardatospaciente',
              dataType: 'json',
              data: {idpaciente: idactualpacientereporte, dia: diaseleccionado, elplato: idplatoseleccionado},
              success: function(res){console.log(res);
                if (res)
                {
                  var resultadocalorias =0;
                  $.each(res, function (j, val)
                  {
                    var convertidas = parseInt(val.calorias);
                    resultadocalorias = resultadocalorias + convertidas;
                    $("table#"+diaseleccionado+idplatoseleccionado).append( '<tr class="list-group-item-info"><td>' + val.nombrereceta +'</td><td>' + val.combinacion + '</td><td>' + val.alimento + '</td><td>' + val.nombrecategoria + '</td><td>' + val.calorias + '</td></tr>' );
                  });

                  var texto= "Total calorias ";    //variable solo para imprimir
                  var vacio = "";
                  $("table#"+diaseleccionado+idplatoseleccionado).append( '<tr><td>'+ texto + '</td><td>' + resultadocalorias + '</td><td>' + vacio + '</td></tr>' );

                }else
                {

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



        if (idselecciongr == 1 )
        {
            $("#fondoprincipal").attr('src', url);

        }
        if (idselecciongr == 2 )
        {
            $("#fondoprincipal").attr('src', url2);

        }

        if (idselecciongr == 3 )
        {
            $("#fondoprincipal").attr('src', url3);

        }

        if (idselecciongr == 4 )
        {
            $("#fondoprincipal").attr('src', url4);

        }


        console.log(idseleccion);
        console.log(combinacion);

    });



        //DETECTAMOS TECLAS PRESIONADAS SOBRE EL INPUT DE BUSCAR ALIMENTO Y REALIZAMOS LA BUSQUEDA
       $("#receta").focus();
        //comprobamos si se pulsa una tecla
        $("#receta").keyup(function(e)
        {


    //verificamos que el usuario ya se haya identificado, de lo contrario no permite escribir y buscar la receta
    if (actualpaciente ==0)
    {

        swal("Ops", "Necesitas estar identificado", "error");
        $("#receta").val("");


    }  else if (idplatos==0)
            {

                    swal("Ops", "Necesitas elegir un plato primero", "error");
                    $("#receta").val("");

                    }
                    else
                    {
                        var contenido3 = "";


                        contenido3 +='<ul class="list-group" id="findrecetas"></ul>';

                        $("#recetaencontrada").append(contenido3);

                        var consulta3;
                        //obtenemos el texto introducido en el campo de búsqueda
                        consulta3 = $("#receta").val();
                        //hace la búsqueda
                        if (consulta3 != "")
                        {
                          $.post(baseurl+'paciente/buscaralimentoreceta',
                          {
                            alimento: consulta3}, function(mensaje)
                            {
                              if (mensaje!= '')
                              {
                                $("#findrecetas").show();
                                $("#findrecetas").html(mensaje);
                                console.log(mensaje);
                              }
                              else
                              {
                              $("#findrecetas").html('');
                              };
                            });
                          }
                        }
        });

        //cuando se da click sobre alguno de los nombres de las recetas encontradas
    $(document).on("click", ".cargaralimento", function (e){
        //$(".cargaralimento").live('click', function(e){
            e.preventDefault();

            var idalimento = $(this).data("id");
            var nombrealimento = $(this).data("nombre");
            var idreceta = $(this).data("receta");

            var tl = new TimelineMax();

            //variable para cambiar el fondo al normal cuando se elige la receta
            var nuevofondo = "assets/img/plato.png";
            $("#fondoprincipal").attr('src', nuevofondo);

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
            function(isConfirm) {
                if (isConfirm) {

                    $("#receta").val(nombrealimento);
                    $("#findrecetas").remove();

                    $.ajax({
                        type: "POST",
                        url: baseurl+'paciente/getreceta',
                        dataType: 'json',
                        data: {idreceta: idreceta},

                        success: function(res){console.log(res);

                            if (res) {

                                $.each(res, function (j, val) {



                                    if ($("#oplunes").prop('checked')) {

                                        alimentos.listos.push({
                                            "idreceta"      : val.idreceta,
                                            "nombrereceta"  : val.nombrereceta,
                                            "idalimento"    : val.idalimento,
                                            "idcategoria"   : val.idcategoria,
                                            "idcombinacion" : idselecciongr,
                                            "nombrecombinacion" : nombrecombinacion,
                                            "idpaciente"    : actualpaciente,
                                            "idplato"       : idplatos,
                                            "iddia"         : "Lunes"


                                        });

                                    }
                                    if ($("#opmartes").prop('checked')) {

                                        alimentos.listos.push({
                                            "idreceta"      : val.idreceta,
                                            "nombrereceta"  : val.nombrereceta,
                                            "idalimento"    : val.idalimento,
                                            "idcategoria"   : val.idcategoria,
                                            "idcombinacion" : idselecciongr,
                                            "nombrecombinacion" : nombrecombinacion,
                                            "idpaciente"    : actualpaciente,
                                            "idplato"       : idplatos,
                                            "iddia"         : "Martes"


                                        });

                                    }
                                    if ($("#opmiercoles").prop('checked')) {

                                        alimentos.listos.push({
                                            "idreceta"      : val.idreceta,
                                            "nombrereceta"  : val.nombrereceta,
                                            "idalimento"    : val.idalimento,
                                            "idcategoria"   : val.idcategoria,
                                            "idcombinacion" : idselecciongr,
                                            "nombrecombinacion" : nombrecombinacion,
                                            "idpaciente"    : actualpaciente,
                                            "idplato"       : idplatos,
                                            "iddia"         : "Miercoles"


                                        });

                                    }
                                    if ($("#opjueves").prop('checked')) {

                                        alimentos.listos.push({
                                            "idreceta"      : val.idreceta,
                                            "nombrereceta"  : val.nombrereceta,
                                            "idalimento"    : val.idalimento,
                                            "idcategoria"   : val.idcategoria,
                                            "idcombinacion" : idselecciongr,
                                            "nombrecombinacion" : nombrecombinacion,
                                            "idpaciente"    : actualpaciente,
                                            "idplato"       : idplatos,
                                            "iddia"         : "Jueves"


                                        });

                                    }
                                    if ($("#opviernes").prop('checked')) {

                                        alimentos.listos.push({
                                            "idreceta"      : val.idreceta,
                                            "nombrereceta"  : val.nombrereceta,
                                            "idalimento"    : val.idalimento,
                                            "idcategoria"   : val.idcategoria,
                                            "idcombinacion" : idselecciongr,
                                            "nombrecombinacion" : nombrecombinacion,
                                            "idpaciente"    : actualpaciente,
                                            "idplato"       : idplatos,
                                            "iddia"         : "Viernes"


                                        });

                                    }
                                    if ($("#opsabado").prop('checked')) {

                                        alimentos.listos.push({
                                            "idreceta"      : val.idreceta,
                                            "nombrereceta"  : val.nombrereceta,
                                            "idalimento"    : val.idalimento,
                                            "idcategoria"   : val.idcategoria,
                                            "idcombinacion" : idselecciongr,
                                            "nombrecombinacion" : nombrecombinacion,
                                            "idpaciente"    : actualpaciente,
                                            "idplato"       : idplatos,
                                            "iddia"         : "Sabado"


                                        });

                                    }
                                    if ($("#opdomingo").prop('checked')) {

                                        alimentos.listos.push({
                                            "idreceta"      : val.idreceta,
                                            "nombrereceta"  : val.nombrereceta,
                                            "idalimento"    : val.idalimento,
                                            "idcategoria"   : val.idcategoria,
                                            "idcombinacion" : idselecciongr,
                                            "nombrecombinacion" : nombrecombinacion,
                                            "idpaciente"    : actualpaciente,
                                            "idplato"       : idplatos,
                                            "iddia"         : "Domingo"


                                        });

                                    }

                                    if ($("#optodos").prop('checked')) {

                                        $.each( diasarray, function( h, dia ) {

                                            alimentos.listos.push({
                                                "idreceta"      : val.idreceta,
                                                "nombrereceta"  : val.nombrereceta,
                                                "idalimento"    : val.idalimento,
                                                "idcategoria"   : val.idcategoria,
                                                "idcombinacion" : idselecciongr,
                                                "nombrecombinacion" : nombrecombinacion,
                                                "idpaciente"    : actualpaciente,
                                                "idplato"       : idplatos,
                                                "iddia"         : dia


                                            });

                                        });



                                    }

                                    if (val.idcategoria == 4 ) {
                                        //div verduras
                                        $("#c1").append('<li style="padding-top: 0px; padding-bottom: 0px;"><img class="img-fluid imgres" id= img'+j+' style="border-radius: 150px; height: 50px; width: 50px;" src=""></li>');
                                        $("img#img"+j).attr('src', 'data:image/jpeg;base64,'+val.imgb64+'');
                                        tl.from("#img"+j, 1.3, { x: "+=850px", ease: Bounce.easeOut })
                                            .from("#img"+j, 1, {opacity:0}, "-=1.3" );
                                    }else
                                    if (val.idcategoria == 3){

                                        //div de las verduras

                                        $("#c2").append('<li style="padding-top: 0px; padding-bottom: 0px;"><img class="img-fluid imgres" id= img'+j+' style="border-radius: 150px; height: 50px; width: 50px;" src=""></li>');
                                        $("img#img"+j).attr('src', 'data:image/jpeg;base64,'+val.imgb64+'');
                                        tl.from("#img"+j, 1.3, { x: "+=850px", ease: Bounce.easeOut })
                                            .from("#img"+j, 1, {opacity:0}, "-=1.7" );
                                    }else
                                    if (val.idcategoria == 5 || val.idcategoria == 1){
                                        //div para cereales

                                        $("#c3").append('<li style="padding-top: 0px; padding-bottom: 0px;"><img class="img-fluid imgres" id= img'+j+' style="border-radius: 150px; height: 50px; width: 50px;" src=""></li>');
                                        $("img#img"+j).attr('src', 'data:image/jpeg;base64,'+val.imgb64+'');
                                        tl.from("#img"+j, 1.3, { x: "+=850px", ease: Bounce.easeOut })
                                            .from("#img"+j, 1, {opacity:0}, "-=1.3" );
                                    }
                                    else
                                    if (val.idcategoria == 2){

                                        //div para lacteos

                                        $("#c5").append('<li style="padding-top: 0px; padding-bottom: 0px;"><img class="img-fluid imgres" id= img'+j+' style="border-radius: 150px; height: 50px; width: 50px;" src= ""></li>');
                                        $("img#img"+j).attr('src', 'data:image/jpeg;base64,'+val.imgb64+'');
                                        tl.from("#img"+j, 1.3, { x: "+=850px", ease: Bounce.easeOut })
                                            .from("#img"+j, 1, {opacity:0}, "-=1.3" );
                                    }
                                    else
                                    if (val.idcategoria >= 6){

                                        //divproteinas

                                        $("#c4").append('<li style="padding-top: 0px; padding-bottom: 0px;"><img class="img-fluid imgres" id= img'+j+' style="border-radius: 150px; height: 50px; width: 50px;" src= ""></li>');
                                        $("img#img"+j).attr('src', 'data:image/jpeg;base64,'+val.imgb64+'');
                                        tl.from("#img"+j, 1.3, { x: "+=850px", ease: Bounce.easeOut })
                                            .from("#img"+j, 1, {opacity:0}, "-=1.3" );
                                    }

                                });

                                //tomamos el ultimo elemento del array res
                                var b = res[res.length-1];


                                $("#lblnombreceta").text(b.nombrereceta);
                                $("#lblpreparacionreceta").text(b.preparacion);
                                $("#lblgrasas").text("Total de grasas en esta receta: "+b.grasas);
                                $("#lblcarbohidratos").text("Total de carbohidratos en esta receta: "+b.carbohidratos);
                                $("#lblproteinas").text("Total de proteinas en esta receta: "+b.proteinas);


                            }else{

                                //swal("Ops", "Este plato no contiene alimentos", "error")
                            }
                        }
                    });

                }
                swal("Receta agregada", "Su receta fue agregada correctamente", "success");
            });




        });



    $(document).on("click", "#categoria", function () {


        var dato = $(this).data("id");

        idcategoria = dato;

        $.ajax({
            type: "POST",
            url: baseurl + 'paciente/alimentos_json',
            dataType: 'json',
            data: {id: dato},
            success: function (res) {
                console.log(res);
                if (res) {
                    console.log(res);

                    $.each(res, function (j, val) {


                        $("#vienenalimentos").append('<li ' +
                            'data-id=' + val.IDAlimento + ' ' +
                            'data-imgb64=' + val.imgb64 + ' ' +
                            'data-imagen=' + val.img + ' ' +
                            'data-categoria=' + val.IDCategoria + ' ' +
                            'data-proteinas=' + val.proteinas + ' ' +
                            'data-carbohidratos=' + val.Carbohidratos + '  ' +
                            'data-grasas=' + val.Grasas + ' ' +
                            'id=alimento ' +
                            'class="list-group-item">' + val.Nombre + ', G' + val.Grasas + ', C' + val.Carbohidratos + ', P' + val.proteinas + '' +
                            '<img style="border-radius: 150px; height: 60px; width: 60px; margin-left: 10px;" id=img'+j+' class="b64 img-fluid"> ' +
                            '</li>').hover(function () {

                            $(this).css("cursor", "pointer");
                        }, function () {
                            $(this).css("cursor", "hand");

                        });

                        //creamos img con id dinstintos, y solo le mandamos el valor en base64 sin decodificarlo

                        $("img#img"+j).attr('src', 'data:image/jpeg;base64,'+val.imgb64+'');
                    });

                }
            }
        });


    });


    //si se cierra la ventana modal elimina los alimentos mostrados anteriormente
    $(document).on("click", "#cerrarmodalalimentos", function () {

            $("li#alimento").remove();
        });

    //si se presiona el boton de listo en la ventana modal se eliminan los alimentos mostrados anteriormen
        $(document).on("click", "#btnconfirmaralimentos", function () {

                $("li#alimento").remove();
            });

    //cuando se de click sobre una combinacion de plato determinado
    $(".opcion-plato").click( function () {
        if (actualpaciente===0)
        {
            swal("No estas identificado", "Identificate primero", "error")

            return false;
        }else


        var idseleccion = $(this).data("id");
        var combinacion = $(this).data("nombre");
        $(this).addClass("disabled");

        idselecciongr = idseleccion;
        nombrecombinacion = combinacion;

        var url = "assets/img/plato.png";
        var url2 = "assets/img/proteinasproteinas.png";
        var url3 = "assets/img/verdurasverduras.png";
        var url4 = "assets/img/verdurasverdurasproteinasproteinas.png";


        if (idselecciongr == 1) {
            $("#fondoprincipal").attr('src', url);

        }
        if (idselecciongr == 2) {
            $("#fondoprincipal").attr('src', url2);

        }

        if (idselecciongr == 3) {
            $("#fondoprincipal").attr('src', url3);

        }

        if (idselecciongr == 4) {
            $("#fondoprincipal").attr('src', url4);

        }


        console.log(idseleccion);
        console.log(combinacion);
    })

    //capturamos el dia cuando se selecciona alguno de ellos
    $(".opciondia").click( function () {
        var dia = $(this).data("id");
        iddia = dia;

        $(this).addClass("disabled")
        console.log(dia);

    });

    //capturamos el plato que se haya seleccionado
    $(".opcplato").click( function () {
        //var that = this;
        if (actualpaciente===0)
        {
            swal("No estas identificado", "Identificate primero", "error")

            return false;
        }else


            var nombreplato = $(this).data("nombre");

        var idplato = $(this).data("id");
        idplatos = idplato;

        //that.disabled = true;

        $(this).addClass('disabled');

        console.log(idplato);


    });

    $("#tabplatos").click( function ( ) {
        if (actualpaciente===0)
        {
            swal("No estas identificado", "Identificate primero", "error")

            return false;
        }
    });

    $("#tabdias").click( function ( ) {
        if (actualpaciente===0)
        {
            swal("No estas identificado", "Identificate primero", "error")

            return false;
        }
    });

    $("#tabcomidas").click( function ( ) {
        if (actualpaciente===0)
        {
            swal("No estas identificado", "Identificate primero", "error")

            return false;
        }
    });

    $("#tabcategorias").click( function ( ) {
        if (actualpaciente===0)
        {
            swal("No estas identificado", "Identificate primero", "error")

            return false;
        }
    });




    var movingWithinSite = false;

    function userMovingWithinSite() {
        movingWithinSite = true;
    }

    $(window).bind('beforeunload', function(){
        return 'Seguro deseas salir?';
    });



});
