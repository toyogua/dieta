<?php
/**
 * Created by PhpStorm.
 * User: ROCKSOFT STATION
 * Date: 19/05/2017
 * Time: 12:18 PM
 */

class Admin extends CI_Controller{

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Reporte_model');
        $this->load->model('Pacientes_model');

	}

    public function index(){

        $data['main_view'] = "admin/reportes_pacientes";

        $this->load->view('layouts/main', $data);
    }

    public function buscardatospaciente()
		{

    	 $idpaciente = $this->input->post('idpaciente');

    	 $dia = $this->input->post('dia');

    	 $plato = $this->input->post('elplato');

        $data = $this->Reporte_model->busquedaplatos($idpaciente, $dia, $plato);

        echo json_encode($data);

    }


    public function reportepdf($id)
		{
				$this->load->library('Pdf');
        $pdf = new Pdf('L', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->setPageOrientation('L');
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Totally Health');
        $pdf->SetTitle('Dieta del Plato');


// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config_alt.php de libraries/config
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
        $pdf->setFooterData($tc = array(0, 64, 0), $lc = array(0, 64, 128));

        // datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        //relación utilizada para ajustar la conversión de los píxeles
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


        // ---------------------------------------------------------
        // establecer el modo de fuente por defecto
        $pdf->setFontSubsetting(true);

        // Establecer el tipo de letra

        //Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
        // Helvetica para reducir el tamaño del archivo.
        $pdf->SetFont('helvetica', '', 8, '', true);

        // Añadir una página
        // Este método tiene varias opciones, consulta la documentación para más información.
        $pdf->AddPage();

        $idpaciente = $id;
        $nombre = $this->Pacientes_model->get_paciente_info($idpaciente);

        $pacienteinfo = $this->Reporte_model->generarreportepdf($idpaciente);

        $recetapreparacion = $this->Reporte_model->recetaPreparacionPdf($idpaciente);

        $arr_lunes = [];
        $arr_martes = [];
        $arr_miercoles = [];
        $arr_jueves = [];
        $arr_viernes = [];
        $arr_sabado = [];
        $arr_domingo = [];

        if ( $pacienteinfo != FALSE) {


            for ($i = 0; $i < count($pacienteinfo); $i++) {


                if ($pacienteinfo[$i]->dia == "Lunes") {

                    array_push($arr_lunes, $pacienteinfo[$i]);

                }

                if ($pacienteinfo[$i]->dia == "Martes") {

                    array_push($arr_martes, $pacienteinfo[$i]);

                }

                if ($pacienteinfo[$i]->dia == "Miercoles") {

                    array_push($arr_miercoles, $pacienteinfo[$i]);

                }

                if ($pacienteinfo[$i]->dia == "Jueves") {

                    array_push($arr_jueves, $pacienteinfo[$i]);

                }

                if ($pacienteinfo[$i]->dia == "Viernes") {

                    array_push($arr_viernes, $pacienteinfo[$i]);

                }

                if ($pacienteinfo[$i]->dia == "Sabado") {

                    array_push($arr_sabado, $pacienteinfo[$i]);

                }

                if ($pacienteinfo[$i]->dia == "Sabado") {

                    array_push($arr_sabado, $pacienteinfo[$i]);

                }

                if ($pacienteinfo[$i]->dia == "Domingo") {

                    array_push($arr_domingo, $pacienteinfo[$i]);

                }


            }


            //CONTENIDO LUNES

            $content = '';

            $content .= '
        <div class="row" style="padding-bottom: 0px;">
            <div class="col-md-12" style="padding-bottom: 0px;">
            <h1 style="text-align:center; padding-top: 0px;">' . $nombre->Nombre . '</h1>
             <h1 style="text-align:center;">LUNES</h1>


        <table border="1" cellpadding="5">
        <thead>
          <tr>
			<th align="center">RECETA</TH>
			<th align="center">COMBINACION</TH>
			<th align="center">ALIMENTO</th>
            <th align="center">CATEGORIA</th>
            <th align="center">CARBOHIDRATOS</th>
            <th align="center">GRASAS</th>
            <th align="center">PROTEINAS</th>
            <th align="center">PLATO</th>
       
          </tr>
        </thead>
    ';


            if (is_array($arr_lunes)) {
                foreach ($arr_lunes as $paciente) {
                    if ($paciente->dia == "lunes") {

                        //$color= '#f5f5f5';

                    }
                    if ($paciente->plato == 1) {
                        $plato = "Desayuno";
                        $color = '#f5f5f5';
                    }
                    if ($paciente->plato == 2) {
                        $plato = "Refaccion 1";
                        $color = '#fbb2b2';
                    }
                    if ($paciente->plato == 3) {
                        $plato = "Almuerzo";
                        $color = '#91C0D4';
                    }
                    if ($paciente->plato == 4) {
                        $plato = "Refaccion 2";
                        $color = '#fbb2b2';
                    }
                    if ($paciente->plato == 5) {
                        $plato = "Cena";
                        $color = '#f5f5f5';
                    }
                    if ($paciente->plato == 6) {
                        $plato = "Refaccion 3";
                        $color = '#91C0D4';
                    }
                    if ($paciente->plato == 7) {
                        $plato = "Refaccion 4";
                        $color = '#f5f5f5';
                    }

                    $content .= '
        <tr bgcolor="' . $color . '">

			<td align="center">' . $paciente->receta . '</td>
			<td align="center">' . $paciente->combinacion . '</td>
			<td align="center">' . $paciente->alimento . '</td>
            <td align="center">' . $paciente->nombrecategoria . '</td>
            <td align="center">' . $paciente->carbohidratos . '</td>
            <td align="center">' . $paciente->grasas . '</td>
            <td align="center">' . $paciente->proteinas . '</td>
            <td align="center">' . $plato . '</td>
           

        </tr>
    ';

                }//fin del foreach lunes

            }//fin del if is array lunes

            $content .= '</table>'; // FIN TABLA LUNES

            //INICIA CONTENIDO MARTES

            $content .= '
        <div class="row">
            <div class="col-md-12">
            <h1 style="text-align:center;">MARTES</h1>


        <table border="1" cellpadding="5">
        <thead>
          <tr>
			<th align="center">RECETA</TH>
			<th align="center">COMBINACION</TH>
			<th align="center">ALIMENTO</th>
            <th align="center">CATEGORIA</th>
            <th align="center">CARBOHIDRATOS</th>
            <th align="center">GRASAS</th>
            <th align="center">PROTEINAS</th>
            <th align="center">PLATO</th>

          </tr>
        </thead>
    ';


            if (is_array($arr_martes)) {
                foreach ($arr_martes as $paciente) {
//                if ($paciente->dia=="lunes")
//                {
//
//                    //$color= '#f5f5f5';
//
//                }
                    if ($paciente->plato == 1) {
                        $plato = "Desayuno";
                        $color = '#f5f5f5';
                    }
                    if ($paciente->plato == 2) {
                        $plato = "Refaccion 1";
                        $color = '#fbb2b2';
                    }
                    if ($paciente->plato == 3) {
                        $plato = "Almuerzo";
                        $color = '#91C0D4';
                    }
                    if ($paciente->plato == 4) {
                        $plato = "Refaccion 2";
                        $color = '#fbb2b2';
                    }
                    if ($paciente->plato == 5) {
                        $plato = "Cena";
                        $color = '#f5f5f5';
                    }
                    if ($paciente->plato == 6) {
                        $plato = "Refaccion 3";
                        $color = '#91C0D4';
                    }
                    if ($paciente->plato == 7) {
                        $plato = "Refaccion 4";
                        $color = '#f5f5f5';
                    }

                    $content .= '
        <tr bgcolor="' . $color . '">
            
            <td align="center">' . $paciente->receta . '</td>
			<td align="center">' . $paciente->combinacion . '</td>
			<td align="center">' . $paciente->alimento . '</td>
            <td align="center">' . $paciente->nombrecategoria . '</td>
            <td align="center">' . $paciente->carbohidratos . '</td>
            <td align="center">' . $paciente->grasas . '</td>
            <td align="center">' . $paciente->proteinas . '</td>
            <td align="center">' . $plato . '</td>
           

        </tr>
    ';

                }//fin del foreach martes

            }//fin del if is array martes

            $content .= '</table>'; //fin tabla MARTES


            //INICIA CONTENIDO MIERCOLES

            $content .= '
        <div class="row">
            <div class="col-md-12">
            <h1 style="text-align:center;">MIERCOLES</h1>


        <table border="1" cellpadding="5">
        <thead>
          <tr>
          
			<th align="center">RECETA</TH>
			<th align="center">COMBINACION</TH>
			<th align="center">ALIMENTO</th>
            <th align="center">CATEGORIA</th>
            <th align="center">CARBOHIDRATOS</th>
            <th align="center">GRASAS</th>
            <th align="center">PROTEINAS</th>
            <th align="center">PLATO</th>
           

          </tr>
        </thead>
    ';


            if (is_array($arr_miercoles)) {
                foreach ($arr_miercoles as $paciente) {

                    if ($paciente->plato == 1) {
                        $plato = "Desayuno";
                        $color = '#f5f5f5';
                    }
                    if ($paciente->plato == 2) {
                        $plato = "Refaccion 1";
                        $color = '#fbb2b2';
                    }
                    if ($paciente->plato == 3) {
                        $plato = "Almuerzo";
                        $color = '#91C0D4';
                    }
                    if ($paciente->plato == 4) {
                        $plato = "Refaccion 2";
                        $color = '#fbb2b2';
                    }
                    if ($paciente->plato == 5) {
                        $plato = "Cena";
                        $color = '#f5f5f5';
                    }
                    if ($paciente->plato == 6) {
                        $plato = "Refaccion 3";
                        $color = '#91C0D4';
                    }
                    if ($paciente->plato == 7) {
                        $plato = "Refaccion 4";
                        $color = '#f5f5f5';
                    }

                    $content .= '
        <tr bgcolor="' . $color . '">

			<td align="center">' . $paciente->receta . '</td>
			<td align="center">' . $paciente->combinacion . '</td>
			<td align="center">' . $paciente->alimento . '</td>
            <td align="center">' . $paciente->nombrecategoria . '</td>
            <td align="center">' . $paciente->carbohidratos . '</td>
            <td align="center">' . $paciente->grasas . '</td>
            <td align="center">' . $paciente->proteinas . '</td>
            <td align="center">' . $plato . '</td>
           

        </tr>
    ';

                }//fin del foreach MIERCOLES

            }//fin del if is array MIERCOLES

            $content .= '</table>'; //fin tabla MIERCOLES


            //INICIA CONTENIDO JUEVES

            $content .= '
        <div class="row">
            <div class="col-md-12">
            <h1 style="text-align:center;">JUEVES</h1>


        <table border="1" cellpadding="5">
        <thead>
          <tr>
			<th align="center">RECETA</TH>
			<th align="center">COMBINACION</TH>
			<th align="center">ALIMENTO</th>
            <th align="center">CATEGORIA</th>
            <th align="center">CARBOHIDRATOS</th>
            <th align="center">GRASAS</th>
            <th align="center">PROTEINAS</th>
            <th align="center">PLATO</th>
            

          </tr>
        </thead>
    ';


            if (is_array($arr_jueves)) {
                foreach ($arr_jueves as $paciente) {

                    if ($paciente->plato == 1) {
                        $plato = "Desayuno";
                        $color = '#f5f5f5';
                    }
                    if ($paciente->plato == 2) {
                        $plato = "Refaccion 1";
                        $color = '#fbb2b2';
                    }
                    if ($paciente->plato == 3) {
                        $plato = "Almuerzo";
                        $color = '#91C0D4';
                    }
                    if ($paciente->plato == 4) {
                        $plato = "Refaccion 2";
                        $color = '#fbb2b2';
                    }
                    if ($paciente->plato == 5) {
                        $plato = "Cena";
                        $color = '#f5f5f5';
                    }
                    if ($paciente->plato == 6) {
                        $plato = "Refaccion 3";
                        $color = '#91C0D4';
                    }
                    if ($paciente->plato == 7) {
                        $plato = "Refaccion 4";
                        $color = '#f5f5f5';
                    }

                    $content .= '
        <tr bgcolor="' . $color . '">
        
            <td align="center">' . $paciente->receta . '</td>
			<td align="center">' . $paciente->combinacion . '</td>
			<td align="center">' . $paciente->alimento . '</td>
            <td align="center">' . $paciente->nombrecategoria . '</td>
            <td align="center">' . $paciente->carbohidratos . '</td>
            <td align="center">' . $paciente->grasas . '</td>
            <td align="center">' . $paciente->proteinas . '</td>
            <td align="center">' . $plato . '</td>

        </tr>
    ';

                }//fin del foreach JUEVES

            }//fin del if is array JUEVES

            $content .= '</table>'; //fin tabla JUEVES


            //INICIA CONTENIDO VIERNES

            $content .= '
        <div class="row">
            <div class="col-md-12">
            <h1 style="text-align:center;">VIERNES</h1>


        <table border="1" cellpadding="5">
        <thead>
          <tr>
			<th align="center">RECETA</TH>
			<th align="center">COMBINACION</TH>
			<th align="center">ALIMENTO</th>
            <th align="center">CATEGORIA</th>
            <th align="center">CARBOHIDRATOS</th>
            <th align="center">GRASAS</th>
            <th align="center">PROTEINAS</th>
            <th align="center">PLATO</th>
           

          </tr>
        </thead>
    ';


            if (is_array($arr_viernes)) {
                foreach ($arr_viernes as $paciente) {

                    if ($paciente->plato == 1) {
                        $plato = "Desayuno";
                        $color = '#f5f5f5';
                    }
                    if ($paciente->plato == 2) {
                        $plato = "Refaccion 1";
                        $color = '#fbb2b2';
                    }
                    if ($paciente->plato == 3) {
                        $plato = "Almuerzo";
                        $color = '#91C0D4';
                    }
                    if ($paciente->plato == 4) {
                        $plato = "Refaccion 2";
                        $color = '#fbb2b2';
                    }
                    if ($paciente->plato == 5) {
                        $plato = "Cena";
                        $color = '#f5f5f5';
                    }
                    if ($paciente->plato == 6) {
                        $plato = "Refaccion 3";
                        $color = '#91C0D4';
                    }
                    if ($paciente->plato == 7) {
                        $plato = "Refaccion 4";
                        $color = '#f5f5f5';
                    }

                    $content .= '
        <tr bgcolor="' . $color . '">
        
            <td align="center">' . $paciente->receta . '</td>
			<td align="center">' . $paciente->combinacion . '</td>
			<td align="center">' . $paciente->alimento . '</td>
            <td align="center">' . $paciente->nombrecategoria . '</td>
            <td align="center">' . $paciente->carbohidratos . '</td>
            <td align="center">' . $paciente->grasas . '</td>
            <td align="center">' . $paciente->proteinas . '</td>
            <td align="center">' . $plato . '</td>
           

        </tr>
    ';

                }//fin del foreach VIERNES

            }//fin del if is array VIERNES

            $content .= '</table>'; //fin tabla VIERNES


            //INICIA CONTENIDO SABADO

            $content .= '
        <div class="row">
            <div class="col-md-12">
            <h1 style="text-align:center;">SABADO</h1>


        <table border="1" cellpadding="5">
        <thead>
          <tr>
			<th align="center">RECETA</TH>
			<th align="center">COMBINACION</TH>
			<th align="center">ALIMENTO</th>
            <th align="center">CATEGORIA</th>
            <th align="center">CARBOHIDRATOS</th>
            <th align="center">GRASAS</th>
            <th align="center">PROTEINAS</th>
            <th align="center">PLATO</th>
         

          </tr>
        </thead>
    ';


            if (is_array($arr_sabado)) {
                foreach ($arr_sabado as $paciente) {

                    if ($paciente->plato == 1) {
                        $plato = "Desayuno";
                        $color = '#f5f5f5';
                    }
                    if ($paciente->plato == 2) {
                        $plato = "Refaccion 1";
                        $color = '#fbb2b2';
                    }
                    if ($paciente->plato == 3) {
                        $plato = "Almuerzo";
                        $color = '#91C0D4';
                    }
                    if ($paciente->plato == 4) {
                        $plato = "Refaccion 2";
                        $color = '#fbb2b2';
                    }
                    if ($paciente->plato == 5) {
                        $plato = "Cena";
                        $color = '#f5f5f5';
                    }
                    if ($paciente->plato == 6) {
                        $plato = "Refaccion 3";
                        $color = '#91C0D4';
                    }
                    if ($paciente->plato == 7) {
                        $plato = "Refaccion 4";
                        $color = '#f5f5f5';
                    }

                    $content .= '
        <tr bgcolor="' . $color . '">
            
            <td align="center">' . $paciente->receta . '</td>
			<td align="center">' . $paciente->combinacion . '</td>
			<td align="center">' . $paciente->alimento . '</td>
            <td align="center">' . $paciente->nombrecategoria . '</td>
            <td align="center">' . $paciente->carbohidratos . '</td>
            <td align="center">' . $paciente->grasas . '</td>
            <td align="center">' . $paciente->proteinas . '</td>
            <td align="center">' . $plato . '</td>
           

        </tr>
    ';

                }//fin del foreach SABADO

            }//fin del if is array SABADO

            $content .= '</table>'; //fin tabla SABADO


            //INICIA CONTENIDO DOMINGO

            $content .= '
        <div class="row">
            <div class="col-md-12">
            <h1 style="text-align:center;">DOMINGO</h1>


        <table border="1" cellpadding="5">
        <thead>
          <tr>
			
			<th align="center">RECETA</TH>
			<th align="center">COMBINACION</TH>
			<th align="center">ALIMENTO</th>
            <th align="center">CATEGORIA</th>
            <th align="center">CARBOHIDRATOS</th>
            <th align="center">GRASAS</th>
            <th align="center">PROTEINAS</th>
            <th align="center">PLATO</th>
          

          </tr>
        </thead>
    ';


            if (is_array($arr_domingo)) {
                foreach ($arr_domingo as $paciente) {

                    if ($paciente->plato == 1) {
                        $plato = "Desayuno";
                        $color = '#f5f5f5';
                    }
                    if ($paciente->plato == 2) {
                        $plato = "Refaccion 1";
                        $color = '#fbb2b2';
                    }
                    if ($paciente->plato == 3) {
                        $plato = "Almuerzo";
                        $color = '#91C0D4';
                    }
                    if ($paciente->plato == 4) {
                        $plato = "Refaccion 2";
                        $color = '#fbb2b2';
                    }
                    if ($paciente->plato == 5) {
                        $plato = "Cena";
                        $color = '#f5f5f5';
                    }
                    if ($paciente->plato == 6) {
                        $plato = "Refaccion 3";
                        $color = '#91C0D4';
                    }
                    if ($paciente->plato == 7) {
                        $plato = "Refaccion 4";
                        $color = '#f5f5f5';
                    }

                    $content .= '
        <tr bgcolor="' . $color . '">
            <td align="center">' . $paciente->receta . '</td>
			<td align="center">' . $paciente->combinacion . '</td>
			<td align="center">' . $paciente->alimento . '</td>
            <td align="center">' . $paciente->nombrecategoria . '</td>
            <td align="center">' . $paciente->carbohidratos . '</td>
            <td align="center">' . $paciente->grasas . '</td>
            <td align="center">' . $paciente->proteinas . '</td>
            <td align="center">' . $plato . '</td>

        </tr>
    ';

                }//fin del foreach DOMINGO

            }//fin del if is array DOMINGO

            $content .= '</table>'; //fin tabla DOMINGO


            //INICIA CONTENIDO PREPARACION RECETAS

            $content .= '
        <div class="row">
            <div class="col-md-12">
            <h1 style="text-align:center;">RECETAS</h1>


        <table border="1" cellpadding="5">
        <thead>
          <tr>
						<th align="center">RECETA</TH>
						<th align="center">PREPARACION</TH>
					
            

          </tr>
        </thead>
    ';
            if (is_array($recetapreparacion)) {
                foreach ($recetapreparacion as $paciente) {

                    $content .= '
        <tr >

						<td align="center">' . $paciente->receta . '</td>
						<td align="center">' . $paciente->preparacion . '</td>
						

        </tr>
    ';

                }//fin del foreach PREPARACION

            }//fin del if is array PREPARACION

            $content .= '</table>'; //fin tabla DOMINGO

            if ($pacienteinfo == FALSE) {
                return;
                exit();

            }

//                 Imprimimos el texto con writeHTMLCell()
            $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $content, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);

            // ---------------------------------------------------------
            // Cerrar el documento PDF y preparamos la salida
            // Este método tiene varias opciones, consulte la documentación para más información.
            $fecha = date('Y-m-d');
            $nombre_archivo = utf8_decode("Dieta " . $fecha . ".pdf");
            $pdf->Output($nombre_archivo, 'I');

        } // FIN if ( $pacienteinfo = $this->Reporte_model->generarreportepdf($idpaciente)!= FALSE)
        else{

            print '<p class="text-danger"><h1>No hay datos</h1></p>';
        }

    }

}


//End of file locations application/controllers/Admin.php
