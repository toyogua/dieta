
<section id="pricing">
    <ul id="caja"></ul>
    <div class="row">


        <div class="col-md-5" style="margin-right: 0.2px">

            <div id="fondoplato" >
                <div class="col-md-2 offset-3">
                    <button style="cursor: pointer" data-toggle="modal" data-target="#identificarsem" class="btn btn-cyan btn-sm" id="identificarse">Identificarse</button>
                    <button style="cursor: pointer" class="btn btn-danger btn-sm" id="salir">Salir</button>

                </div>

                <hr>

                <div class="col-md-8" >
                    <input  type="text" class=" text-center" id="receta" placeholder="Escribe aca el alimento"/>
                </div>
                <ul id="recetaencontrada">

                </ul>



                <!--                div para categoria frutas-->
                <div class="row offset-md-3" style="position:absolute; padding-top: 70px" id="categoria1" >
<!--                    <img id="imgc1" style="border-radius: 150px; height: 50px; width: 50px; margin-top: 95px; margin-left: 95px;" src="assets/img/alimentos/mas.png" class="img-fluid" alt="Dieta del Plato">-->

                    <ul  id="c1">
<!--                        <li>hola</li>-->
<!--                        <li>hola</li>-->
<!--                        <li>hola</li>-->
<!--                        <li>hola</li>-->
                    </ul>
                </div>

                <!--                div para categoria verduras-->
                <div class="row offset-md-3" style="position:absolute; padding-top: 210px" id="categoria2" >
<!--                    <img  id="imgc2" style="border-radius: 150px; height: 50px; width: 50px; margin-top: 250px; margin-left: 95px;" src="assets/img/alimentos/mas.png" class="img-fluid" alt="Dieta del Plato">-->
                    <ul id="c2">
<!--                        <li>hola</li>-->
<!--                        <li>hola</li>-->
<!--                        <li>hola</li>-->
<!--                        <li>hola</li>-->
                    </ul>
                </div>

                <!--                div para categoria cereales-->
                <div class="row offset-5 " style="position:absolute; padding-top: 50px" id="categoria3" >

<!--                    <img id="imgc3" style="border-radius: 150px; height: 50px; width: 50px; margin-top: 120px; margin-left: 265px;" src="assets/img/alimentos/mas.png" class="img-fluid" alt="Dieta del Plato">-->
                    <ul id="c3">
<!--                        <li>hola</li>-->
<!--                        <li>hola</li>-->
<!--                        <li>hola</li>-->
<!--                        <li>hola</li>-->
                    </ul>
                </div>

                <!--                div para categoria proteinas-->
                <div class="row offset-5" style="position:absolute; padding-top: 235px" id="categoria4" >

<!--                    <img id="imgc4" style="border-radius: 150px; height: 50px; width: 50px; margin-top: 270px; margin-left: 265px;" src="assets/img/alimentos/mas.png" class="img-fluid" alt="Dieta del Plato">-->
                    <ul id="c4">
<!--                        <li>hola</li>-->
<!--                        <li>hola</li>-->
<!--                        <li>hola</li>-->
<!--                        <li>hola</li>-->
                    </ul>
                </div>

                <!--                div para categoria lacteos-->
                <div class="row offset-9" style="position:absolute; padding-top: 40px" id="categoria5" >

<!--                    <img id="imgc5" style="border-radius: 150px; height: 50px; width: 50px; margin-top: 60px; margin-left: 425px;" src="assets/img/alimentos/mas.png" class="img-fluid" alt="Dieta del Plato">-->
                    <ul id="c5">
<!--                        <li>hola</li>-->
<!--                        <li>hola</li>-->
<!--                        <li>hola</li>-->
<!--                        <li>hola</li>-->
                    </ul>
                </div>

                <img id="fondoprincipal"  src="assets/img/plato.png" class="img-fluid" alt="Dieta del Plato">

            </div>
        </div>

        <!-- modal identificarse  -->
        <div class="modal fade"  data-backdrop="static" data-keyboard="false" id="identificarsem">
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
                      <button type="button" style="cursor: pointer" id="btnconfirmarpaciente" class="btn btn-success btn-block" data-dismiss="modal">Listo</button>

                    </div>
                  </div>
                </div>
              </div>

        <div class="col-md-5" style="right: 5px; margin-left: 0.5px;" id="dias">
         

            <div class="row">


                <!-- Nav tabs -->
                <div class="tabs-wrapper">
                    <ul class="nav classic-tabs tabs-orange" role="tablist">
                        <li class="nav-item">
                            <a style="cursor: pointer" id="tabplatos" class="nav-link waves-light active" data-toggle="tab" href="#panel61" role="tab"><i class="fa fa-heartbeat fa-2x text-success" aria-hidden="true"></i><br> Platos</a>
                        </li>
                        <li class="nav-item">
                            <a style="cursor: pointer" id="tabdias" class="nav-link waves-light" data-toggle="tab" href="#panel62" role="tab"><i class="fa fa-calendar-check-o fa-2x text-success" aria-hidden="true"></i><br> Dias</a>
                        </li>
                        <li class="nav-item">
                            <a style="cursor: pointer" id="tabcomidas" class="nav-link waves-light" data-toggle="tab" href="#panel63" role="tab"><i class="fa fa-cutlery fa-2x text-success" aria-hidden="true"></i><br> Comidas</a>
                        </li>
                        <li class="nav-item">
                            <a style="cursor: pointer" id="tabcategorias" class="nav-link waves-light" id="tabcategorias" data-toggle="tab" href="#panel64" role="tab"><i class="fa fa-th-list fa-2x text-success" aria-hidden="true"></i><br> Categorias</a>
                        </li>
                        <li id="finalizar" class="nav-item">
                            <a class="nav-link waves-light" style="cursor: pointer;" id="tabfinalizar" data-toggle="tab" href="" role="tab"><i class="fa fa-paper-plane fa-2x text-success" aria-hidden="true"></i><br> Finalizar</a>
                        </li>

                    </ul>
                </div>

                <!-- Tab panels -->
                <div class="tab-content card">

                    <!--Panel 1 COMBINACION PLATOS-->
                    <div class="tab-pane fade in show active" id="panel61" role="tabpanel">

                        <div>
                            <button style="cursor: pointer" data-id="1" data-nombre="Normal"
                                    for="checkbox2" class="badge badge-pill purple btn btn-md opcion-plato" >
                                Normal
                            </button>

                            <button style="cursor: pointer"  data-id="2" data-nombre="Proteinas Proteinas"
                                    for="checkbox2" class="badge badge-pill purple btn btn-md opcion-plato">
                                Proteinas Proteinas
                            </button>

                            <button style="cursor: pointer"  data-id="3" data-nombre="Verduras Verduras" class="badge badge-pill purple btn btn-md opcion-plato">
                                Verduras Verduras
                            </button>

                            <button style="cursor: pointer"  data-id="4" data-nombre="Verduras Verduras Proteinas Proteinas" class="badge badge-pill purple btn btn-md opcion-plato">
                                Verduras Verduras Proteinas Proteinas
                            </button>

                        </div>


                    </div>
                    <!--/.Panel 1-->

                    <!--Panel 2-->
                    <div class="tab-pane fade " id="panel62" role="tabpanel">

                        <div class="row">
                            <div class="input-group col-md-3">
                              <span class="input-group-addon">
                                <input id="oplunes" class="checkdias" value="Lunes" type="checkbox"
                                       aria-label="Radio button for following text input">
                              </span>
                                <label data-nombre="" data-id="Lunes" for="checkbox2"
                                       class="badge badge-pill purple btn btn-md">Lunes</label>
                            </div>
                            <div class="input-group col-md-3">
                              <span class="input-group-addon">
                                <input id="opmartes" class="checkdias" value="Martes" type="checkbox"
                                       aria-label="Radio button for following text input">
                              </span>
                                <label data-nombre="" data-id="Martes" for="checkbox2"
                                       class="badge badge-pill purple btn btn-md"> Martes</label>
                            </div>
                            <div class="input-group col-md-3">
                              <span class="input-group-addon">
                                <input id="opmiercoles" class="checkdias" value="Miercoles" type="checkbox"
                                       aria-label="Radio button for following text input">
                              </span>
                                <label data-nombre="" data-id="Miercoles" for="checkbox2"
                                       class="badge badge-pill purple btn btn-md"> Miercoles</label>
                            </div>
                            <div class="input-group col-md-3">
                              <span class="input-group-addon">
                                <input id="opjueves" class="checkdias" value="Jueves" type="checkbox"
                                       aria-label="Radio button for following text input">
                              </span>
                                <label data-nombre="" data-id="Jueves" for="checkbox2"
                                       class="badge badge-pill purple btn btn-md"> Jueves</label>
                            </div>
                            <div class="input-group col-md-3">
                              <span class="input-group-addon">
                                <input id="opviernes" class="checkdias" value="Viernes" type="checkbox"
                                       aria-label="Radio button for following text input">
                              </span>
                                <label data-nombre="" data-id="Viernes" for="checkbox2"
                                       class="badge badge-pill purple btn btn-md"> Viernes</label>
                            </div>
                            <div class="input-group col-md-3">
                              <span class="input-group-addon">
                                <input id="opsabado" class="checkdias" value="Sabado" type="checkbox"
                                       aria-label="Radio button for following text input">
                              </span>
                                <label data-nombre="" data-id="Sabado" for="checkbox2"
                                       class="badge badge-pill purple btn btn-md"> Sabado</label>
                            </div>
                            <div class="input-group col-md-3">
                              <span class="input-group-addon">
                                <input id="opdomingo" class="checkdias" value="Domingo" type="checkbox"
                                       aria-label="Radio button for following text input">
                              </span>
                                <label data-nombre="" data-id="Domingo" for="checkbox2"
                                       class="badge badge-pill purple btn btn-md"> Domingo</label>
                            </div>

                            <div class="input-group col-md-3">
                              <span class="input-group-addon">
                                <input id="optodos" class="checkdias" value="Todos" type="checkbox"
                                       aria-label="Radio button for following text input">
                              </span>
                                <label data-nombre="" data-id="Todos" for="checkbox2"
                                       class="badge badge-pill purple btn btn-md"> Todos</label>
                            </div>
                        </div>

                    </div>
                    <!--/.Panel 2-->

                    <!--Panel 3 COMIDAS-->
                    <div class="tab-pane fade" id="panel63" >

                        <div >

                                <button style="cursor: pointer" for="checkbox2" data-nombre="Desayuno" data-id="1" class="badge badge-pill purple btn btn-md opcplato">
                                    Desayuno
                                </button>

                            <button  style="cursor: pointer" for="checkbox2" data-nombre="Refaccion 1" data-id="2" class="badge badge-pill purple btn btn-md opcplato">
                                Refaccion 1
                            </button>

                            <button style="cursor: pointer" for="checkbox2" data-nombre="Almuerzo" data-id="3" class="badge badge-pill purple btn btn-md opcplato">
                                Almuerzo
                            </button>

                            <button style="cursor: pointer" for="checkbox2" data-nombre="Refaccion 2" data-id="4" class=" badge badge-pill purple btn btn-md opcplato">
                                Refaccion 2
                            </button>


                            <button style="cursor: pointer" for="checkbox2" data-nombre="Cena" data-id="5" class=" badge badge-pill purple btn btn-md opcplato">
                                Cena
                            </button>

                            <button style="cursor: pointer" for="checkbox2" data-nombre="Refaccion 3" data-id="6" class=" badge badge-pill purple btn btn-md opcplato">
                                Refaccion 3
                            </button>

                            <button style="cursor: pointer" for="checkbox2" data-nombre="Refaccion 4" data-id="7" class=" badge badge-pill purple btn btn-md opcplato">
                                Refaccion 4
                            </button>

                        </div>

                    </div>
                    <!--/.Panel 3-->

                    <!--Panel 4 CATEGORIAS-->
                    <div class="tab-pane fade" id="panel64" role="tabpanel">
                        <div id="espaciocategorias">
                            <?php foreach ($categorias as $categoria): ?>

                                <li style="cursor: pointer" data-toggle="modal" data-target="#modalalimentos"
                                    data-id='<?php echo $categoria->IDCategoria ?>'
                                    class="badge badge-pill purple btn btn-bg"
                                    id=categoria><?php echo $categoria->Nombre ?></li>
                            <?php endforeach; ?>
                        </div>

                    </div>
                    <!--/.Panel 5-->

                </div>

            </div> <!-- fin row -->



            <div class="modal fade" data-backdrop="static" data-keyboard="false" id="modalalimentos">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-sm-center-center">
                            <h5 class="modal-title font-weight-bold ">Elige tus alimentos para agregar a tu plato</h5>
                            <button type="button" id="cerrarmodalalimentos" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            <span>
                                <ul class="font-weight-bold" id="vienenalimentos"></ul>
                            </span>
                        </div>

                        <div class="modal-footer">
                            <button type="button" style="cursor: pointer" id="btnconfirmaralimentos"
                                    class="btn btn-success btn-block" data-dismiss="modal">Listo
                            </button>
                        </div>
                    </div>
                </div>
            </div> <br>


                <div class="col-md-12">
                    <label class="list-group-item text-center" id="lblnombreceta"></label>
                    <p class="list-group-item" id="lblpreparacionreceta"></p>
                </div>

                <div class="col-md-12">
                    <label id="lblgrasas" class="btn btn-outline-secondary btn-rounded waves-effect btn-sm">Total grasas en este plato: </label>
                    <label id="lblproteinas" class="btn btn-outline-secondary btn-rounded waves-effect btn-sm">Total proteinas en este plato: </label>
                    <label id="lblcarbohidratos" class="btn btn-outline-secondary btn-rounded waves-effect btn-sm">Total carbohidratos en este plato: </label>

                    <label class="btn btn-outline-success btn-rounded waves-effect btn-sm" id="bienvenidapaciente"></label>

                </div>




        </div>


       
    </div>
</section>













