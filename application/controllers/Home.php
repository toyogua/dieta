
<?php
/**
 * Created by PhpStorm.
 * User: ROCKSOFT STATION
 * Date: 13/04/2017
 * Time: 08:31 AM
 */

class Home extends CI_Controller{
    
    public function index(){

        $data['main_view'] = "home_view";
        $this->load->view('layouts/main', $data);


    }
    
    public function search($id){
    
        $data['main_view'] = "home_view";
        
        $this->load->view('layouts/main', $data);
    }
    
    public function insert($id){
    
        $data['main_view'] = "home_view";
        
        $this->load->view('layouts/main', $data);
    }
    
    public function update($id){
    
        $data['main_view'] = "home_view";
        
        $this->load->view('layouts/main', $data);
    }
    
    public function delete($id){
    
        $data['main_view'] = "home_view";
        
        $this->load->view('layouts/main', $data);
    }
}


//End of file locations application/controllers/Home.php