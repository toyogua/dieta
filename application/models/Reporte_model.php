<?php
class Reporte_model extends CI_Model
{

    public function busquedaplatos($idpaciente, $dia, $plato)
    {

      $this->db->distinct();
      $this->db->select('

      dietaplato.idreceta as idreceta,
      dietaplato.nombrereceta as nombrereceta,
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

    public function generarreportepdf($idpaciente)
    {

        $this->db->distinct();
        $this->db->select('

            dietaplato.nombrereceta as receta,
            dietaplato.idreceta,
            dietaplato.combinacion as combinacion,
            dietaplato.alimento as dietaalimento,
            dietaplato.dia as dia,
            dietaplato.plato as plato,
            
            recetas.preparacion,

            alimentos.IDAlimento as idalimento,
            alimentos.Nombre as alimento,
            alimentos.Calorias as calorias,
            alimentos.Carbohidratos as carbohidratos,
            alimentos.Grasas as grasas,
            alimentos.proteinas,

            categoria_alimentos.IDCategoria as idcategoria,
            categoria_alimentos.Nombre as nombrecategoria,

            paciente.IDPAciente as idpaciente,
            paciente.Nombre as nombrepaciente


        ');
        $this->db->from('dietaplato');
        $this->db->join('alimentos', 'alimentos.IDAlimento = dietaplato.alimento');
        $this->db->join('recetas', 'recetas.IDReceta= dietaplato.idreceta');
        $this->db->join('categoria_alimentos', 'categoria_alimentos.IDCategoria = dietaplato.categoria');
        $this->db->join('paciente', 'paciente.IDPaciente = dietaplato.paciente');

        $this->db->where('dietaplato.paciente', $idpaciente);

        $query = $this->db->get();

        if ($query->num_rows() < 1)
        {
            return FALSE;
        }

        return $query->result();
        return TRUE;

    }

    public function recetaPreparacionPdf($idpaciente){

        $this->db->distinct();
        $this->db->select('
            dietaplato.nombrereceta as receta,
            dietaplato.idreceta,
            recetas.preparacion,

        ');
        $this->db->from('dietaplato');
        $this->db->join('recetas', 'recetas.IDReceta= dietaplato.idreceta');
        $this->db->where('dietaplato.paciente', $idpaciente);

        $query = $this->db->get();

        if ($query->num_rows() < 1)
        {
            return FALSE;
        }

        return $query->result();
        return TRUE;
    }

}
