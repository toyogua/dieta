<?php
/**
 * Created by PhpStorm.
 * User: ROCKSOFT STATION
 * Date: 19/05/2017
 * Time: 05:45 PM
 */

class Paciente extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Categorias_model');
        $this->load->model('Alimentos_model');


    }

    public function index()
    {


        $data['categorias'] = $this->Categorias_model->categorias();
        $data['main_view'] = "pacientes/inicio_paciente_view";

        $this->load->view('layouts/main', $data);
    }

    public function categorias_json()
    {


        if ($this->input->is_ajax_request()) {

            $categorias = $this->Categorias_model->categorias();

            echo json_encode($categorias);

        }
    }

    public function alimentos_json()
    {


        $idcategoria = $this->input->post('id');

        $data = $this->Alimentos_model->alimentos_categoria($idcategoria);

        echo json_encode($data);




    }

    public function insertar_plato()
    {

        $iddia = $this->input->post('iddia');
        $idplato = $this->input->post('idplato');
        $idalimento = $this->input->post('idalimento');

    }

    public  function busquedapaciente()
    {
        $nombrepaciente = $this->input->post('nombre');

        $data = $this->Alimentos_model->buscarpaciente($nombrepaciente);

        if($data !== FALSE)
        {

            foreach($data as $fila)
                {
                    ?>

                 <ul  id="respuesta" class="text-center" >

                     <li class="list-group-item respaciente cargarpaciente" data-id="<?php echo $fila->IDPaciente ?>" data-nombre="<?php echo $fila->Nombre ?>" ><?php echo $fila->Nombre ?></li>

                 </ul>


                    <?php
                }

            //en otro caso decimos que no hay resultados
        }else{
            ?>

            <p><?php echo 'No hay resultados' ?></p>

            <?php
        }

    }

    public function insertaralimentos()
    {
        $listaalimentos = json_decode($_POST['alimentos']);

        foreach($listaalimentos as $alimento)
        {
            echo $alimento->idcombinacion . ', ';
            echo $alimento->idcombinacion . ', ';
            echo $alimento->nombrecombinacion . ', ';
            echo $alimento->idpaciente . ', ';
            echo $alimento->iddia . ', ';
            echo $alimento->idplato . ', ';
            echo $alimento->idalimento . ', ';
            echo $alimento->idcategoria . ', ';

            echo '<br/>';
            $dataalimentos = array(

                'idreceta'             => $alimento->idreceta,
                'nombrereceta'         => $alimento->nombrereceta,
                'idcombinacion'        => $alimento->idcombinacion,
                'combinacion'          => $alimento->nombrecombinacion,
                'paciente'             => $alimento->idpaciente,
                'dia'                  => $alimento->iddia,
                'plato'                => $alimento->idplato,
                'alimento'             => $alimento->idalimento,
                'categoria'            => $alimento->idcategoria
            );

            $this->Alimentos_model->insertardieta($dataalimentos);
        }


    }

    public function buscaralimentoreceta(){

        $alimentoreceta = $this->input->post('alimento');

        $data = $this->Alimentos_model->buscaralimentoreceta($alimentoreceta);

        if($data !== FALSE)
        {

            foreach($data as $fila)
            {
                ?>

                <li  id="respuesta" >

                    <a class="resalimento cargaralimento"  data-receta="<?php echo $fila->idreceta ?>" data-id="<?php echo $fila->idalimento ?>" data-nombre="<?php echo $fila->nombrealimento ?>" ><?php echo $fila->nombrereceta ?></a>

                </li>


                <?php
            }

            //en otro caso decimos que no hay resultados
        }else{
            ?>

            <p><?php echo 'No hay resultados' ?></p>

            <?php
        }

    }

    public function getreceta(){

         $idreceta = $this->input->post('idreceta');

         $data = $this->Alimentos_model->busquedareceta($idreceta);

        echo json_encode($data);

    }


}


//End of file locations application/controllers/Paciente.php