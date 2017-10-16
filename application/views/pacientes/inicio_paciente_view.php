
<section id="pricing">
    <ul id="caja"></ul>
    <div class="row">


        <div class="col-md-5" style="margin-right: 0.2px">

            <div style="position:relative" id="fondoplato" ><ul  id="calorias"><label id="lblcalorias" class="btn btn-outline-secondary btn-rounded waves-effect btn-sm">Total calorias en este plato: </label>
                    <button class="btn btn-cyan btn-sm" id="identificarse">Identificarse</button>
                    <div class="col-md-5 offset-2" >
                        <input  type="text" class=" text-center" id="receta" placeholder="Escribe aca el alimento"></input>
                    </div>
                    <ul id="recetaencontrada"></ul>
                    <button class="btn btn-danger btn-sm" id="salir">Salir</button>
                    <label class="btn btn-outline-success btn-rounded waves-effect btn-sm" id="bienvenidapaciente"></label></ul>

                <!--                div para categoria frutas-->
                <div class="row" style="position:absolute" id="categoria1" >
                    <img id="imgc1" style="border-radius: 150px; height: 50px; width: 50px; margin-top: 95px; margin-left: 95px;" src="assets/img/alimentos/mas.png" class="img-fluid" alt="Dieta del Plato">
                    <img id="imgc1" style="border-radius: 150px; height: 50px; width: 50px; margin-top: 135px; margin-left: 95px;" src="assets/img/alimentos/mas.png" class="img-fluid" alt="Dieta del Plato">
                </div>

                <!--                div para categoria verduras-->
                <div class="row" style="position:absolute" id="categoria2" >
                    <img  id="imgc2" style="border-radius: 150px; height: 50px; width: 50px; margin-top: 250px; margin-left: 95px;" src="assets/img/alimentos/mas.png" class="img-fluid" alt="Dieta del Plato">
                </div>

                <!--                div para categoria cereales-->
                <div class="row" style="position:absolute" id="categoria3" >

                    <img id="imgc3" style="border-radius: 150px; height: 50px; width: 50px; margin-top: 120px; margin-left: 265px;" src="assets/img/alimentos/mas.png" class="img-fluid" alt="Dieta del Plato">
                </div>

                <!--                div para categoria proteinas-->
                <div class="row" style="position:absolute" id="categoria4" >

                    <img id="imgc4" style="border-radius: 150px; height: 50px; width: 50px; margin-top: 270px; margin-left: 265px;" src="assets/img/alimentos/mas.png" class="img-fluid" alt="Dieta del Plato">
                </div>

                <!--                div para categoria lacteos-->
                <div class="row" style="position:absolute" id="categoria5" >

                    <img id="imgc5" style="border-radius: 150px; height: 50px; width: 50px; margin-top: 60px; margin-left: 425px;" src="assets/img/alimentos/mas.png" class="img-fluid" alt="Dieta del Plato">
                </div>

                <img id="fondoprincipal"  src="assets/img/plato.png" class="img-fluid" alt="Dieta del Plato">

            </div>
        </div>

        <div class="col-md-6" style="right: 5px; margin-left: 0.5px;" id="dias">
            <div class="row"> 
                <div>
                <a href="" data-id="lunes" id="btnlunes" class="btnlunes btn btn-indigo btn-sm" >Lunes</a>
                    <ul id="platosl">
                        <li class="platoslunes"><button class="platos  platoslunes btn btn-amber btn-sm" data-nombre="Desayuno"     data-id="1" id="plato1">Desayuno</button></li>
                        <li class="platoslunes"><button class="platos  platoslunes btn btn-amber btn-sm" data-nombre="  Refaccion 1"  data-id="2" id="plato2">Refaccion 1</button></li>
                        <li class="platoslunes"><button class="platos  platoslunes btn btn-amber btn-sm" data-nombre="Almuerzo"     data-id="3" id="plato3">Almuerzo</button></li>
                        <li class="platoslunes"><button class="platos  platoslunes btn btn-amber btn-sm" data-nombre="Refacción 2"  data-id="4" id="plato4">Refacción 2</button></li>
                        <li class="platoslunes"><button class="platos  platoslunes btn btn-amber btn-sm" data-nombre="Cena"         data-id="5" id="plato5">Cena</button></li>
                        <li class="platoslunes"><button class="platos  platoslunes btn btn-amber btn-sm" data-nombre="Refaccion 3"  data-id="6" id="plato6">Refaccion 3</button></li>
                        <li class="platoslunes"><button class="platos  platoslunes btn btn-amber btn-sm" data-nombre="Refaccion 4"  data-id="7" id="plato7">Refaccion 4</button></li>
                        <li data-nombre="lunes" class="platoslunes" id="finalizar"><button  class="  platoslunes btn btn-danger btn-sm" data-id="6" id="finalizar">Finalizar</button></li>

                    </ul>
                </div> <!-- div lunes -->
                
                <div>

                <a href="" data-id="martes" class="btnmartes btn btn-indigo btn-sm">Martes</a>
                    <ul id="platosm">
                        <li class="platosmartes"><button class="platos platosmartes btn btn-amber btn-sm" data-nombre="Desayuno"    data-id="1" id="plato1">Desayuno</button></li>
                        <li class="platosmartes"><button class="platos platosmartes btn btn-amber btn-sm" data-nombre="Refaccion 1" data-id="2" id="plato2">Refaccion 1</button></li>
                        <li class="platosmartes"><button class="platos platosmartes btn btn-amber btn-sm" data-nombre="Almuerzo"    data-id="3" id="plato3">Almuerzo</button></li>
                        <li class="platosmartes"><button class="platos platosmartes btn btn-amber btn-sm" data-nombre="Refaccion 2" data-id="4" id="plato4">Refacción 2</button></li>
                        <li class="platosmartes"><button class="platos platosmartes btn btn-amber btn-sm" data-nombre="Cena"        data-id="5" id="plato5">Cena</button></li>
                        <li class="platosmartes"><button class="platos platosmartes btn btn-amber btn-sm" data-nombre="Refaccion 3" data-id="6" id="plato6">Refaccion 3</button></li>
                        <li class="platosmartes"><button class="platos platosmartes btn btn-amber btn-sm" data-nombre="Refaccion 4" data-id="7" id="plato7">Refaccion 4</button></li>
                        <li data-nombre="martes" class="platosmartes" id="finalizar"><button class=" platosmartes btn btn-danger btn-sm"   data-id="6" id="finalizar">Finalizar</button></li>

                    </ul>
                </div> <!-- div martes -->

                <div>

                <a href="" data-id="miercoles" class="btnmiercoles btn btn-indigo btn-sm" >Miércoles</a>
                    <ul id="platosmier">
                        <li class="platosmiercoles"><button class="platos platosmiercoles btn btn-amber btn-sm" data-nombre="Desayuno"      data-id="1" id="plato1">Desayuno</button></li>
                        <li class="platosmiercoles"><button class="platos platosmiercoles btn btn-amber btn-sm" data-nombre="Refaccion 1"   data-id="2" id="plato2">Refaccion 1</button></li>
                        <li class="platosmiercoles"><button class="platos platosmiercoles btn btn-amber btn-sm" data-nombre="Almuerzo"      data-id="3" id="plato3">Almuerzo</button></li>
                        <li class="platosmiercoles"><button class="platos platosmiercoles btn btn-amber btn-sm" data-nombre="Refaccion 2"   data-id="4" id="plato4">Refacción 2</button></li>
                        <li class="platosmiercoles"><button class="platos platosmiercoles btn btn-amber btn-sm" data-nombre="Cena"          data-id="5" id="plato5">Cena</button></li>
                        <li class="platosmiercoles"><button class="platos platosmiercoles btn btn-amber btn-sm" data-nombre="Refaccion 3"   data-id="6" id="plato6">Refaccion 3</button></li>
                        <li class="platosmiercoles"><button class="platos platosmiercoles btn btn-amber btn-sm" data-nombre="Refaccion 4"   data-id="7" id="plato7">Refaccion 4</button></li>
                        <li data-nombre="miercoles" class="platosmiercoles" id="finalizar"><button class="platosmiercoles btn btn-danger btn-sm" data-id="6" id="finalizar">Finalizar</button></li>

                    </ul>
                </div> <!-- div miercoles -->

                <div>

                <a href="" data-id="jueves" class="btnjueves btn btn-indigo btn-sm" >Jueves</a>
                    <ul id="platosj">
                        <li class="platosjueves"><button class="platos platosjueves btn btn-amber btn-sm" data-nombre="Desayuno"    data-id="1" id="plato1">Desayuno</button></li>
                        <li class="platosjueves"><button class="platos platosjueves btn btn-amber btn-sm" data-nombre="Refaccion 1" data-id="2" id="plato2">Refaccion 1</button></li>
                        <li class="platosjueves"><button class="platos platosjueves btn btn-amber btn-sm" data-nombre="Almuerzo"    data-id="3" id="plato3">Almuerzo</button></li>
                        <li class="platosjueves"><button class="platos platosjueves btn btn-amber btn-sm" data-nombre="Refaccion 2" data-id="4" id="plato4">Refacción 2</button></li>
                        <li class="platosjueves"><button class="platos platosjueves btn btn-amber btn-sm" data-nombre="Cena"        data-id="5" id="plato5">Cena</button></li>
                        <li class="platosjueves"><button class="platos platosjueves btn btn-amber btn-sm" data-nombre="Refaccion 3" data-id="6" id="plato6">Refaccion 3</button></li>
                        <li class="platosjueves"><button class="platos platosjueves btn btn-amber btn-sm" data-nombre="Refaccion 4" data-id="7" id="plato7">Refaccion 4</button></li>
                        <li data-nombre="jueves" class="platosjueves" id="finalizar"><button class="platosjueves btn btn-danger btn-sm" data-id="6" id="finalizar">Finalizar</button></li>

                    </ul>
                </div> <!-- div jueves -->

                <div>
                <a href="" data-id="viernes" class="btnviernes btn btn-indigo btn-sm" >Viernes</a>
                    <ul id="platosv">
                        <li class="platosviernes"><button class="platos platosviernes btn btn-amber btn-sm" data-nombre="Desayuno"      data-id="1" id="plato1">Desayuno</button></li>
                        <li class="platosviernes"><button class="platos platosviernes btn btn-amber btn-sm" data-nombre="Refaccion 1"   data-id="2" id="plato2">Refaccion 1</button></li>
                        <li class="platosviernes"><button class="platos platosviernes btn btn-amber btn-sm" data-nombre="Almuerzo"      data-id="3" id="plato3">Almuerzo</button></li>
                        <li class="platosviernes"><button class="platos platosviernes btn btn-amber btn-sm" data-nombre="Refaccion 2"   data-id="4" id="plato4">Refacción 2</button></li>
                        <li class="platosviernes"><button class="platos platosviernes btn btn-amber btn-sm" data-nombre="Cena"          data-id="5" id="plato5">Cena</button></li>
                        <li class="platosviernes"><button class="platos platosviernes btn btn-amber btn-sm" data-nombre="Refaccion 3"   data-id="6" id="plato6">Refaccion 3</button></li>
                        <li class="platosviernes"><button class="platos platosviernes btn btn-amber btn-sm" data-nombre="Refaccion 4"   data-id="7" id="plato7">Refaccion 4</button></li>
                        <li data-nombre="viernes" class="platosviernes" id="finalizar"><button class="platosviernes btn btn-danger btn-sm" data-id="6" id="finalizar">Finalizar</button></li>

                    </ul>
                </div> <!-- div viernes -->

                <div>
            

                <a href="" data-id="sabado" class="btnsabado btn btn-indigo btn-sm">Sábado</a>
                    <ul id="platoss">
                        <li class="platossabado"><button class="platos platossabado btn btn-amber btn-sm" data-nombre="Desayuno"    data-id="1" id="plato1">Desayuno</button></li>
                        <li class="platossabado"><button class="platos platossabado btn btn-amber btn-sm" data-nombre="Refaccion 1" data-id="2" id="plato2">Refaccion 1</button></li>
                        <li class="platossabado"><button class="platos platossabado btn btn-amber btn-sm" data-nombre="Almuerzo"    data-id="3" id="plato3">Almuerzo</button></li>
                        <li class="platossabado"><button class="platos platossabado btn btn-amber btn-sm" data-nombre="Refaccion 2" data-id="4" id="plato4">Refacción 2</button></li>
                        <li class="platossabado"><button class="platos platossabado btn btn-amber btn-sm" data-nombre="Cena"        data-id="5" id="plato5">Cena</button></li>
                        <li class="platossabado"><button class="platos platossabado btn btn-amber btn-sm" data-nombre="Refaccion 3" data-id="6" id="plato6">Refaccion 3</button></li>
                        <li class="platossabado"><button class="platos platossabado btn btn-amber btn-sm" data-nombre="Refaccion 4" data-id="7" id="plato7">Refaccion 4</button></li>
                        <li data-nombre="sabado" class="platossabado" id="finalizar"><button class="platossabado btn btn-danger btn-sm" data-id="6" id="finalizar">Finalizar</button></li>

                    </ul>
                </div> <!-- div sabado -->
            </div><!-- fin row -->

            <div class="row">
                <div>
                <a href="" data-id="domingo" class="btndomingo btn btn-indigo btn-sm"  >Domingo</a>
                    <ul id="platosd">
                        <li class="platosdomingo"><button class="platos platosdomingo btn btn-amber btn-sm" data-nombre="Desayuno"      data-id="1" id="plato1">Desayuno</button></li>
                        <li class="platosdomingo"><button class="platos platosdomingo btn btn-amber btn-sm" data-nombre="Refaccion 1"   data-id="2" id="plato2">Refaccion 1</button></li>
                        <li class="platosdomingo"><button class="platos platosdomingo btn btn-amber btn-sm" data-nombre="Almuerzo"      data-id="3" id="plato3">Almuerzo</button></li>
                        <li class="platosdomingo"><button class="platos platosdomingo btn btn-amber btn-sm" data-nombre="Refaccion 2"   data-id="4" id="plato4">Refacción 2</button></li>
                        <li class="platosdomingo"><button class="platos platosdomingo btn btn-amber btn-sm" data-nombre="Cena"          data-id="5" id="plato5">Cena</button></li>
                        <li class="platosdomingo"><button class="platos platosdomingo btn btn-amber btn-sm" data-nombre="Refaccion 3"   data-id="6" id="plato6">Refaccion 3</button></li>
                        <li class="platosdomingo"><button class="platos platosdomingo btn btn-amber btn-sm" data-nombre="Refaccion 4"   data-id="7" id="plato7">Refaccion 4</button></li>
                        <li data-nombre="domingo" data-dia="platosdomingo" class="platosdomingo" id="finalizar"> <button data-dia="platosdomingo" class="platosdomingo btn btn-danger btn-sm" data-id="6" id="finalizar">Finalizar</button></li>

                    </ul>
                </div> <!-- div domingo -->

                <div>

                <a href="" data-id="selplato" class="btnselplato btn btn-indigo btn-sm"  >Elegir plato</a>

                    <ul id="selplato">
                        <li class="selplato"><button class="selplato btn btn-light-green btn-sm" data-nombre="Normal"                                     data-id="1" id="plato1">Normal</button></li>
                        <li class="selplato"><button class="selplato btn btn-light-green btn-sm" data-nombre="Proteinas Proteinas"                        data-id="2" id="plato2">Proteinas Proteinas</button></li>
                        <li class="selplato"><button class="selplato btn btn-light-green btn-sm" data-nombre="Verduras Verduras"                          data-id="3" id="plato3">Verduras Verduras</button></li>
                        <li class="selplato"><button class="selplato btn btn-light-green btn-sm" data-nombre="Verduras Verduras Proteinas Proteinas"      data-id="4" id="plato4">Verduras Verduras Proteinas Proteinas</button></li>

                    </ul>
                </div> <!-- div elegir platos -->

                <div style="margin-left: 1px;" class="col-md-3">

                    <a href="" id="cargar_json" class="custom-select" value="Categorias">Categorías</a>
                        <ul id="contenedor_categorias">
                        </ul>
                </div>
                <div class="col-md-4">
                    <ul id="contenedor_subcategorias">

                    </ul>
                </div>

            </div> <!-- fin row -->

            <div class="row">
                <div class="col-md-4">
                <label class="list-group-item text-center" id="lblnombreceta"></label>
                <p class="list-group-item" id="lblpreparacionreceta"></p>
                </div>

                 

            </div>

        </div>
        

       
    </div>
</section>













