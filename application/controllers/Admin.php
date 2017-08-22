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
        $pdf->SetAuthor('Consultorio');
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
        $pdf->SetFont('helvetica', '', 12, '', true);

        // Añadir una página
        // Este método tiene varias opciones, consulta la documentación para más información.
        $pdf->AddPage();

				$idpaciente = $id;
        $nombre = $this->Pacientes_model->get_paciente_info($idpaciente);
				$pacienteinfo = $this->Reporte_model->generarreportepdf($idpaciente);

				$content = '';

        $content .= '
        <div class="row">
            <div class="col-md-12">
            <h1 style="text-align:center;">'.$nombre->Nombre.'</h1>


        <table border="1" cellpadding="5">
        <thead>
          <tr>
						<th>RECETA</TH>
						<th>COMBINACION</TH>
						<th>ALIMENTO</th>
            <th>CATEGORIA</th>
            <th>CALORIAS</th>
            <th>PLATO</th>
            <th>DIA</th>

          </tr>
        </thead>
    ';



        if (is_array($pacienteinfo))
				{
            foreach ( $pacienteinfo as $paciente )
            {
                if ($paciente->dia=="lunes")
								{

                    //$color= '#f5f5f5';

                }
                if ($paciente->plato==1)
								{
                    $plato = "Desayuno";
                    $color= '#f5f5f5';
                }
                if ($paciente->plato==2)
								{
                    $plato = "Refaccion 1";
                    $color= '#fbb2b2';
                }
                if ($paciente->plato==3)
								{
                    $plato = "Almuerzo";
                    $color= '#91C0D4';
                }
                if ($paciente->plato==4)
								{
                    $plato = "Refaccion 2";
                    $color= '#fbb2b2';
                }
                if ($paciente->plato==5)
								{
                    $plato = "Cena";
                    $color= '#f5f5f5';
                }
                if ($paciente->plato==6)
								{
                    $plato = "Refaccion 3";
                    $color= '#91C0D4';
                }
                if ($paciente->plato==7)
								{
                    $plato = "Refaccion 4";
                     $color= '#f5f5f5';
                }

        $content .= '
        <tr bgcolor="'.$color.'">

						<td>'.$paciente->receta.'</td>
						<td>'.$paciente->combinacion.'</td>
						<td>'.$paciente->alimento.'</td>
            <td>'.$paciente->nombrecategoria.'</td>
            <td>'.$paciente->calorias.'</td>
            <td>'.$plato.'</td>
            <td>'.$paciente->dia.'</td>

        </tr>
    ';

      		}//fin del foreach

				}//fin del if is array

			$content .= '</table>';

//                 Imprimimos el texto con writeHTMLCell()
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $content, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);

        // ---------------------------------------------------------
        // Cerrar el documento PDF y preparamos la salida
        // Este método tiene varias opciones, consulte la documentación para más información.
        $fecha = date('Y-m-d');
        $nombre_archivo = utf8_decode("Dieta ".$fecha.".pdf");
        $pdf->Output($nombre_archivo, 'I');

    }

}


//End of file locations application/controllers/Admin.php
