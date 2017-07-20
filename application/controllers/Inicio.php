<?php
/**
 * Created by PhpStorm.
 * User: ROCKSOFT STATION
 * Date: 19/05/2017
 * Time: 12:17 PM
 */

class Inicio extends CI_Controller{
    
    public function index(){

        $data['main_view'] = "home_view";
        $this->load->view('layouts/main', $data);

    }
    

}


//End of file locations application/controllers/Inicio.php