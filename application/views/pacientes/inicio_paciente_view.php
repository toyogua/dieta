
<section id="pricing">
    <ul id="caja"></ul>
    <div class="row">


        <div class="col-md-5" style="margin-right: 0.2px">

            <div style="position:relative" id="fondoplato" ><ul  id="calorias"><label id="lblcalorias" class="btn btn-outline-secondary btn-rounded waves-effect btn-sm">Total calorias en este plato: </label>
                    <button data-toggle="modal" data-target="#identificarsem" class="btn btn-cyan btn-sm" id="identificarse">Identificarse</button>
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

        <!-- modal identificarse  -->
        <div class="modal fade" id="identificarsem">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header text-md-center">
                      <h5 class="modal-title font-weight-bold ">Escribe tu nombre</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                        <div class="md-form">
                        <i class="fa fa-user prefix"></i>
                        <input type="text" placeholder="Nombre" id="capturapaciente" class="text-center form-control"> </input>
                        </div>
                        <span  id="resultadoBusqueda"></span>

                    </div>
                    <div class="modal-footer">
                      <button type="button" id="btnconfirmarpaciente" class="btn btn-success btn-block" data-dismiss="modal">Listo</button>

                    </div>
                  </div>
                </div>
              </div>

        <div class="col-md-5" style="right: 5px; margin-left: 0.5px;" id="dias">
            <div class="row"> 
                <div>
                
                <a href="" data-id="lunes" id="btnlunes" class="btnlunes btn btn-indigo btn-sm btn-block" >Lunes</a>
                    <ul id="platosl">
                         
                        <li class="platoslunes"><button class="platos  platoslunes btn btn-amber btn-sm btn-block" data-nombre="Desayuno"     data-id="1" id="plato1">Desayuno</button></li>
                        <li class="platoslunes"><button class="platos  platoslunes btn btn-amber btn-sm btn-block" data-nombre="  Refaccion 1"  data-id="2" id="plato2">Refaccion 1</button></li>
                        <li class="platoslunes"><button class="platos  platoslunes btn btn-amber btn-sm btn-block" data-nombre="Almuerzo"     data-id="3" id="plato3">Almuerzo</button></li>
                        <li class="platoslunes"><button class="platos  platoslunes btn btn-amber btn-sm btn-block" data-nombre="Refacción 2"  data-id="4" id="plato4">Refacción 2</button></li>
                        <li class="platoslunes"><button class="platos  platoslunes btn btn-amber btn-sm btn-block" data-nombre="Cena"         data-id="5" id="plato5">Cena</button></li>
                        <li class="platoslunes"><button class="platos  platoslunes btn btn-amber btn-sm btn-block" data-nombre="Refaccion 3"  data-id="6" id="plato6">Refaccion 3</button></li>
                        <li class="platoslunes"><button class="platos  platoslunes btn btn-amber btn-sm btn-block" data-nombre="Refaccion 4"  data-id="7" id="plato7">Refaccion 4</button></li>
                        <li data-nombre="lunes" class="platoslunes" id="finalizar"><button  class="  platoslunes btn btn-danger btn-sm btn-block" data-id="6" id="finalizar">Finalizar</button></li>
                        <li data-nombre="lunes" class="platoslunes" id="clonar"><button data-toggle="modal" data-target="#clonarlunes" class="  platoslunes btn btn-danger btn-sm btn-block" data-id="7" id="clonar">Clonar</button></li>
                    
                    </ul>
                   
                </div> <!-- div lunes -->

                <!-- modal lunes  -->
                <div class="modal fade" id="clonarlunes">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Elige los dias que deseas comer lo mismo para este dia</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <div class="modal-body">
                      <p>Modal body text goes here.</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-success">Guardar</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                  </div>
                </div>
              </div>
                
                <div>

                <a href="" data-id="martes" class="btnmartes btn btn-indigo btn-sm btn-block">Martes</a>
                    <ul id="platosm">
                        <li class="platosmartes"><button class="platos platosmartes btn btn-amber btn-sm btn-block" data-nombre="Desayuno"    data-id="1" id="plato1">Desayuno</button></li>
                        <li class="platosmartes"><button class="platos platosmartes btn btn-amber btn-sm btn-block" data-nombre="Refaccion 1" data-id="2" id="plato2">Refaccion 1</button></li>
                        <li class="platosmartes"><button class="platos platosmartes btn btn-amber btn-sm btn-block" data-nombre="Almuerzo"    data-id="3" id="plato3">Almuerzo</button></li>
                        <li class="platosmartes"><button class="platos platosmartes btn btn-amber btn-sm btn-block" data-nombre="Refaccion 2" data-id="4" id="plato4">Refacción 2</button></li>
                        <li class="platosmartes"><button class="platos platosmartes btn btn-amber btn-sm btn-block" data-nombre="Cena"        data-id="5" id="plato5">Cena</button></li>
                        <li class="platosmartes"><button class="platos platosmartes btn btn-amber btn-sm btn-block" data-nombre="Refaccion 3" data-id="6" id="plato6">Refaccion 3</button></li>
                        <li class="platosmartes"><button class="platos platosmartes btn btn-amber btn-sm btn-block" data-nombre="Refaccion 4" data-id="7" id="plato7">Refaccion 4</button></li>
                        <li data-nombre="martes" class="platosmartes" id="finalizar"><button class=" platosmartes btn btn-danger btn-sm btn-block"   data-id="6" id="finalizar">Finalizar</button></li>

                    </ul>
                </div> <!-- div martes -->

               
                

                <!-- div de las categorias -->
                <div style="margin-left: 1px;" >

                    <a href="" id="cargar_json" class="custom-select btn-block" value="Categorias">Categorías</a>
                      
                            <ul id="contenedor_categorias">
                            
                            </ul>
                       
                </div>

                <!-- div de las subcategorias -->
                <div>
                    <ul id="contenedor_subcategorias" class="btn-block">

                    </ul>
                </div>

               
            </div><!-- fin row -->

            <div class="row">
            <div>

                <a href="" data-id="miercoles" class="btnmiercoles btn btn-indigo btn-sm btn-block" >Miércoles</a>
                    <ul id="platosmier">
                        <li class="platosmiercoles"><button class="platos platosmiercoles btn btn-amber btn-sm btn-block" data-nombre="Desayuno"      data-id="1" id="plato1">Desayuno</button></li>
                        <li class="platosmiercoles"><button class="platos platosmiercoles btn btn-amber btn-sm btn-block" data-nombre="Refaccion 1"   data-id="2" id="plato2">Refaccion 1</button></li>
                        <li class="platosmiercoles"><button class="platos platosmiercoles btn btn-amber btn-sm btn-block" data-nombre="Almuerzo"      data-id="3" id="plato3">Almuerzo</button></li>
                        <li class="platosmiercoles"><button class="platos platosmiercoles btn btn-amber btn-sm btn-block" data-nombre="Refaccion 2"   data-id="4" id="plato4">Refacción 2</button></li>
                        <li class="platosmiercoles"><button class="platos platosmiercoles btn btn-amber btn-sm btn-block" data-nombre="Cena"          data-id="5" id="plato5">Cena</button></li>
                        <li class="platosmiercoles"><button class="platos platosmiercoles btn btn-amber btn-sm btn-block" data-nombre="Refaccion 3"   data-id="6" id="plato6">Refaccion 3</button></li>
                        <li class="platosmiercoles"><button class="platos platosmiercoles btn btn-amber btn-sm btn-block" data-nombre="Refaccion 4"   data-id="7" id="plato7">Refaccion 4</button></li>
                        <li data-nombre="miercoles" class="platosmiercoles" id="finalizar"><button class="platosmiercoles btn btn-danger btn-sm btn-block" data-id="6" id="finalizar">Finalizar</button></li>

                    </ul>
                </div> <!-- div miercoles -->

            <div>

                <a href="" data-id="jueves" class="btnjueves btn btn-indigo btn-sm btn-block" >Jueves</a>
                    <ul id="platosj">
                        <li class="platosjueves"><button class="platos platosjueves btn btn-amber btn-sm btn-block" data-nombre="Desayuno"    data-id="1" id="plato1">Desayuno</button></li>
                        <li class="platosjueves"><button class="platos platosjueves btn btn-amber btn-sm btn-block" data-nombre="Refaccion 1" data-id="2" id="plato2">Refaccion 1</button></li>
                        <li class="platosjueves"><button class="platos platosjueves btn btn-amber btn-sm btn-block" data-nombre="Almuerzo"    data-id="3" id="plato3">Almuerzo</button></li>
                        <li class="platosjueves"><button class="platos platosjueves btn btn-amber btn-sm btn-block" data-nombre="Refaccion 2" data-id="4" id="plato4">Refacción 2</button></li>
                        <li class="platosjueves"><button class="platos platosjueves btn btn-amber btn-sm btn-block" data-nombre="Cena"        data-id="5" id="plato5">Cena</button></li>
                        <li class="platosjueves"><button class="platos platosjueves btn btn-amber btn-sm btn-block" data-nombre="Refaccion 3" data-id="6" id="plato6">Refaccion 3</button></li>
                        <li class="platosjueves"><button class="platos platosjueves btn btn-amber btn-sm btn-block" data-nombre="Refaccion 4" data-id="7" id="plato7">Refaccion 4</button></li>
                        <li data-nombre="jueves" class="platosjueves" id="finalizar"><button class="platosjueves btn btn-danger btn-sm btn-block" data-id="6" id="finalizar">Finalizar</button></li>

                    </ul>
                </div> <!-- div jueves -->

            <div>
                <a href="" data-id="viernes" class="btnviernes btn btn-indigo btn-sm btn-block" >Viernes</a>
                    <ul id="platosv">
                        <li class="platosviernes"><button class="platos platosviernes btn btn-amber btn-sm btn-block" data-nombre="Desayuno"      data-id="1" id="plato1">Desayuno</button></li>
                        <li class="platosviernes"><button class="platos platosviernes btn btn-amber btn-sm btn-block" data-nombre="Refaccion 1"   data-id="2" id="plato2">Refaccion 1</button></li>
                        <li class="platosviernes"><button class="platos platosviernes btn btn-amber btn-sm btn-block" data-nombre="Almuerzo"      data-id="3" id="plato3">Almuerzo</button></li>
                        <li class="platosviernes"><button class="platos platosviernes btn btn-amber btn-sm btn-block" data-nombre="Refaccion 2"   data-id="4" id="plato4">Refacción 2</button></li>
                        <li class="platosviernes"><button class="platos platosviernes btn btn-amber btn-sm btn-block" data-nombre="Cena"          data-id="5" id="plato5">Cena</button></li>
                        <li class="platosviernes"><button class="platos platosviernes btn btn-amber btn-sm btn-block" data-nombre="Refaccion 3"   data-id="6" id="plato6">Refaccion 3</button></li>
                        <li class="platosviernes"><button class="platos platosviernes btn btn-amber btn-sm btn-block" data-nombre="Refaccion 4"   data-id="7" id="plato7">Refaccion 4</button></li>
                        <li data-nombre="viernes" class="platosviernes" id="finalizar"><button class="platosviernes btn btn-danger btn-sm btn-block" data-id="6" id="finalizar">Finalizar</button></li>

                    </ul>
                </div> <!-- div viernes -->

                <div>
                    <a href="" data-id="sabado" class="btnsabado btn btn-indigo btn-sm btn-block">Sábado</a>
                    <ul id="platoss">
                        <li class="platossabado"><button class="platos platossabado btn btn-amber btn-sm btn-block" data-nombre="Desayuno"    data-id="1" id="plato1">Desayuno</button></li>
                        <li class="platossabado"><button class="platos platossabado btn btn-amber btn-sm btn-block" data-nombre="Refaccion 1" data-id="2" id="plato2">Refaccion 1</button></li>
                        <li class="platossabado"><button class="platos platossabado btn btn-amber btn-sm btn-block" data-nombre="Almuerzo"    data-id="3" id="plato3">Almuerzo</button></li>
                        <li class="platossabado"><button class="platos platossabado btn btn-amber btn-sm btn-block" data-nombre="Refaccion 2" data-id="4" id="plato4">Refacción 2</button></li>
                        <li class="platossabado"><button class="platos platossabado btn btn-amber btn-sm btn-block" data-nombre="Cena"        data-id="5" id="plato5">Cena</button></li>
                        <li class="platossabado"><button class="platos platossabado btn btn-amber btn-sm btn-block" data-nombre="Refaccion 3" data-id="6" id="plato6">Refaccion 3</button></li>
                        <li class="platossabado"><button class="platos platossabado btn btn-amber btn-sm btn-block" data-nombre="Refaccion 4" data-id="7" id="plato7">Refaccion 4</button></li>
                        <li data-nombre="sabado" class="platossabado" id="finalizar"><button class="platossabado btn btn-danger btn-sm btn-block" data-id="6" id="finalizar">Finalizar</button></li>

                    </ul>
                </div> <!-- div sabado -->

                <div>
                <a href="" data-id="domingo" class="btndomingo btn btn-indigo btn-sm btn-block"  >Domingo</a>
                    <ul id="platosd">
                        <li class="platosdomingo"><button class="platos platosdomingo btn btn-amber btn-sm btn-block" data-nombre="Desayuno"      data-id="1" id="plato1">Desayuno</button></li>
                        <li class="platosdomingo"><button class="platos platosdomingo btn btn-amber btn-sm btn-block" data-nombre="Refaccion 1"   data-id="2" id="plato2">Refaccion 1</button></li>
                        <li class="platosdomingo"><button class="platos platosdomingo btn btn-amber btn-sm btn-block" data-nombre="Almuerzo"      data-id="3" id="plato3">Almuerzo</button></li>
                        <li class="platosdomingo"><button class="platos platosdomingo btn btn-amber btn-sm btn-block" data-nombre="Refaccion 2"   data-id="4" id="plato4">Refacción 2</button></li>
                        <li class="platosdomingo"><button class="platos platosdomingo btn btn-amber btn-sm btn-block" data-nombre="Cena"          data-id="5" id="plato5">Cena</button></li>
                        <li class="platosdomingo"><button class="platos platosdomingo btn btn-amber btn-sm btn-block" data-nombre="Refaccion 3"   data-id="6" id="plato6">Refaccion 3</button></li>
                        <li class="platosdomingo"><button class="platos platosdomingo btn btn-amber btn-sm btn-block" data-nombre="Refaccion 4"   data-id="7" id="plato7">Refaccion 4</button></li>
                        <li data-nombre="domingo" data-dia="platosdomingo" class="platosdomingo" id="finalizar"> <button data-dia="platosdomingo" class="platosdomingo btn btn-danger btn-sm btn-block" data-id="6" id="finalizar">Finalizar</button></li>

                    </ul>
                </div> <!-- div domingo -->

                <div>

                <a href="" data-id="selplato" class="btnselplato btn btn-indigo btn-sm btn-block"  >Elegir plato</a>

                    <ul id="selplato">
                        <li class="selplato"><button class="selplato btn btn-light-green btn-sm btn-block" data-nombre="Normal"                                     data-id="1" id="plato1">Normal</button></li>
                        <li class="selplato"><button class="selplato btn btn-light-green btn-sm btn-block" data-nombre="Proteinas Proteinas"                        data-id="2" id="plato2">Proteinas Proteinas</button></li>
                        <li class="selplato"><button class="selplato btn btn-light-green btn-sm btn-block" data-nombre="Verduras Verduras"                          data-id="3" id="plato3">Verduras Verduras</button></li>
                        <li class="selplato"><button class="selplato btn btn-light-green btn-sm btn-block" data-nombre="Verduras Verduras Proteinas Proteinas"      data-id="4" id="plato4">Verduras Verduras Proteinas Proteinas</button></li>

                    </ul>
                </div> <!-- div elegir platos -->


                <!-- Nav tabs -->
                <div class="tabs-wrapper">
                    <ul class="nav classic-tabs tabs-orange" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link waves-light active" data-toggle="tab" href="#panel61" role="tab"><i class="fa fa-user fa-2x" aria-hidden="true"></i><br> Platos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-light" data-toggle="tab" href="#panel62" role="tab"><i class="fa fa-heart fa-2x" aria-hidden="true"></i><br> Dias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-light" data-toggle="tab" href="#panel63" role="tab"><i class="fa fa-envelope fa-2x" aria-hidden="true"></i><br> Comidas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-light" id="tabcategorias" data-toggle="tab" href="#panel64" role="tab"><i class="fa fa-star fa-2x" aria-hidden="true"></i><br> Categorias</a>
                        </li>
                    </ul>
                </div>

                <!-- Tab panels -->
                <div class="tab-content card">

                    <!--Panel 1-->
                    <div class="tab-pane fade in show active" id="panel61" role="tabpanel">

                        <div class="col-xs-6">
                            <div class="input-group">
                              <span class="input-group-addon">
                                <input type="radio" aria-label="Radio button for following text input">
                              </span>
                                <label data-id="1" data-nombre="Normal" for="checkbox2" class="opcion-plato badge badge-pill purple btn btn-block">Normal</label>
                            </div>
                            <div class="input-group">
                              <span class="input-group-addon">
                                <input type="radio" aria-label="Radio button for following text input">
                              </span>
                                <label data-id="2" data-nombre="Proteinas Proteinas" for="checkbox2" class="opcion-plato badge badge-pill purple btn btn-block">Proteinas Proteinas</label>
                            </div>
                            <div class="input-group">
                              <span class="input-group-addon">
                                <input type="radio" aria-label="Radio button for following text input">
                              </span>
                                <label data-id="3" data-nombre="Verduras Verduras" for="checkbox2" class="opcion-plato badge badge-pill purple btn btn-block">Verduras Verduras</label>
                            </div>
                            <div class="input-group">
                              <span class="input-group-addon">
                                <input type="radio" aria-label="Radio button for following text input">
                              </span>
                                <label data-id="4" data-nombre="Verduras Verduras Proteinas Proteinas" for="checkbox2" class="opcion-plato badge badge-pill purple btn btn-block">Verduras Verduras Proteinas Proteinas</label>
                            </div>
                        </div>


                    </div>
                    <!--/.Panel 1-->

                    <!--Panel 2-->
                    <div class="tab-pane fade " id="panel62" role="tabpanel">

                        <div class="col-xs-6">
                            <div class="input-group">
                              <span class="input-group-addon">
                                <input type="checkbox" aria-label="Radio button for following text input">
                              </span>
                                <label data-nombre="" data-id="Lunes" for="checkbox2" class="opciondia badge badge-pill purple btn btn-block">Lunes</label>
                            </div>
                            <div class="input-group">
                              <span class="input-group-addon">
                                <input type="checkbox" aria-label="Radio button for following text input">
                              </span>
                                <label data-nombre="" data-id="Martes" for="checkbox2" class="opciondia badge badge-pill purple btn btn-block"> Martes</label>
                            </div>
                            <div class="input-group">
                              <span class="input-group-addon">
                                <input type="checkbox" aria-label="Radio button for following text input">
                              </span>
                                <label data-nombre="" data-id="Miercoles" for="checkbox2" class="opciondia badge badge-pill purple btn btn-block"> Miercoles</label>
                            </div>
                            <div class="input-group">
                              <span class="input-group-addon">
                                <input type="checkbox" aria-label="Radio button for following text input">
                              </span>
                                <label data-nombre="" data-id="Jueves" for="checkbox2" class="opciondia badge badge-pill purple btn btn-block"> Jueves</label>
                            </div>
                            <div class="input-group">
                              <span class="input-group-addon">
                                <input type="checkbox" aria-label="Radio button for following text input">
                              </span>
                                <label data-nombre="" data-id="Viernes" for="checkbox2" class="opciondia badge badge-pill purple btn btn-block"> Viernes</label>
                            </div>
                            <div class="input-group">
                              <span class="input-group-addon">
                                <input type="checkbox" aria-label="Radio button for following text input">
                              </span>
                                <label data-nombre="" data-id="Sabado" for="checkbox2" class="opciondia badge badge-pill purple btn btn-block"> Sabado</label>
                            </div>
                            <div class="input-group">
                              <span class="input-group-addon">
                                <input type="checkbox" aria-label="Radio button for following text input">
                              </span>
                                <label data-nombre="" data-id="Domingo" for="checkbox2" class="opciondia badge badge-pill purple btn btn-block"> Domingo</label>
                            </div>
                        </div>



                    </div>
                    <!--/.Panel 2-->

                    <!--Panel 3-->
                    <div class="tab-pane fade" id="panel63" role="tabpanel">

                        <div class="col-xs-6">
                            <div class="input-group">
                              <span class="input-group-addon">
                                <input type="checkbox" aria-label="Radio button for following text input">
                              </span>
                                <label for="checkbox2" data-nombre="Desayuno" data-id="1" class="opcplato badge badge-pill purple btn btn-block">Desayuno</label>
                            </div>
                            <div class="input-group">
                              <span class="input-group-addon">
                                <input type="checkbox" aria-label="Radio button for following text input">
                              </span>
                                <label for="checkbox2" data-nombre="Refaccion 1" data-id="2" class="opcplato badge badge-pill purple btn btn-block"> Refaccion 1</label>
                            </div>
                            <div class="input-group">
                              <span class="input-group-addon">
                                <input type="checkbox" aria-label="Radio button for following text input">
                              </span>
                                <label for="checkbox2" data-nombre="Almuerzo" data-id="3" class="opcplato badge badge-pill purple btn btn-block"> Almuerzo</label>
                            </div>
                            <div class="input-group">
                              <span class="input-group-addon">
                                <input type="checkbox" aria-label="Radio button for following text input">
                              </span>
                                <label for="checkbox2" data-nombre="Refaccion 2" data-id="4" class="opcplato badge badge-pill purple btn btn-block"> Refaccion 2</label>
                            </div>
                            <div class="input-group">
                              <span class="input-group-addon">
                                <input type="checkbox" aria-label="Radio button for following text input">
                              </span>
                                <label for="checkbox2" data-nombre="Cena" data-id="5" class="opcplato badge badge-pill purple btn btn-block"> Cena</label>
                            </div>
                            <div class="input-group">
                              <span class="input-group-addon">
                                <input type="checkbox" aria-label="Radio button for following text input">
                              </span>
                                <label for="checkbox2" data-nombre="Refaccion 3" data-id="6" class="opcplato badge badge-pill purple btn btn-block"> Refaccion 3</label>
                            </div>
                            <div class="input-group">
                              <span class="input-group-addon">
                                <input type="checkbox" aria-label="Radio button for following text input">
                              </span>
                                <label for="checkbox2" data-nombre="Refaccion 4" data-id="7" class="opcplato badge badge-pill purple btn btn-block"> Refaccion 4</label>
                            </div>
                        </div>


                    </div>
                    <!--/.Panel 3-->

                    <!--Panel 4-->
                    <div class="tab-pane fade" id="panel64" role="tabpanel">
                        <div id="espaciocategorias">

                        </div>

                    </div>
                    <!--/.Panel 4-->

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













