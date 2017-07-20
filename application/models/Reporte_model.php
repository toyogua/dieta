<?php
class Reporte_model extends CI_Model
{

    public function busquedaplatos($idpaciente, $dia, $plato)
    {
         


         $this->db->distinct();
        $this->db->select('
           
            dietaplato.alimento as dietaalimento,
            dietaplato.dia as dia,
            dietaplato.plato as plato,

            alimentos.IDAlimento as idalimento,
            alimentos.Nombre as alimento,
            alimentos.Calorias as calorias,
            
            categoria_alimentos.IDCategoria as idcategoria,
            categoria_alimentos.Nombre as nombrecategoria,
            
           
        ');
        $this->db->from('dietaplato');
        $this->db->join('alimentos', 'alimentos.IDAlimento = dietaplato.alimento');
        $this->db->join('categoria_alimentos', 'categoria_alimentos.IDCategoria = dietaplato.categoria');
       
 		$this->db->where('dietaplato.paciente', $idpaciente);
 		$this->db->where('dietaplato.dia', $dia);
 		$this->db->where('dietaplato.plato', $plato);



        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return FALSE;
        }

        return $query->result();


    }

    public function generarreportepdf($idpaciente){

        $this->db->distinct();
        $this->db->select('
           
            dietaplato.alimento as dietaalimento,
            dietaplato.dia as dia,
            dietaplato.plato as plato,

            alimentos.IDAlimento as idalimento,
            alimentos.Nombre as alimento,
            alimentos.Calorias as calorias,
            
            categoria_alimentos.IDCategoria as idcategoria,
            categoria_alimentos.Nombre as nombrecategoria,
            
            paciente.IDPAciente as idpaciente,
            paciente.Nombre as nombrepaciente
            
           
        ');
        $this->db->from('dietaplato');
        $this->db->join('alimentos', 'alimentos.IDAlimento = dietaplato.alimento');
        $this->db->join('categoria_alimentos', 'categoria_alimentos.IDCategoria = dietaplato.categoria');
        $this->db->join('paciente', 'paciente.IDPaciente = dietaplato.paciente');

        $this->db->where('dietaplato.paciente', $idpaciente);





        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return FALSE;
        }

        return $query->result();
        return TRUE;



    }

}