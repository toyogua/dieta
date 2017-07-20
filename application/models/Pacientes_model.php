<?php
/**
 * Created by PhpStorm.
 * User: ROCKSOFT STATION
 * Date: 19/05/2017
 * Time: 05:40 PM
 */

class Pacientes_model extends CI_Model{
    
    public function todos_pacientes(){

        $query = $this->db-> query('SELECT IDPaciente, Nombre FROM paciente');
        // si hay resultados
        if ($query->num_rows() > 0) {
            // almacenamos en una matriz bidimensional
            foreach($query->result() as $row)
                $arrDatos[htmlspecialchars($row->IDPaciente, ENT_QUOTES)] =
                    htmlspecialchars($row->Nombre, ENT_QUOTES);

            $query->free_result();
            return $arrDatos;
        }
        
    }

    public function get_paciente_info($idpaciente){

         $this->db->distinct();
        $this->db->select('
           
            IDPAciente ,
           Nombre 
            
           
        ');
        $this->db->from('paciente');
       

        $this->db->where('IDPAciente', $idpaciente);





        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return FALSE;
        }

        return $query->row();
        return TRUE;
    }
    

}


//End of file locations application/models/Pacientes_model.php