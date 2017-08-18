<?php
/**
 * Created by PhpStorm.
 * User: ROCKSOFT STATION
 * Date: 19/05/2017
 * Time: 05:32 PM
 */

class Alimentos_model extends CI_Model{
    
    public function todos_alimentos(){

        $query = $this->db-> query('SELECT IDAlimento, Nombre FROM alimentos');
        // si hay resultados
        if ($query->num_rows() > 0) {
            // almacenamos en una matriz bidimensional
            foreach($query->result() as $row)
                $arrDatos[htmlspecialchars($row->IDAlimento, ENT_QUOTES)] =
                    htmlspecialchars($row->Nombre, ENT_QUOTES);

            $query->free_result();
            return $arrDatos;
        }
        
    }


    public function alimentos()
    {

        $query = $this->db->get('alimentos');

        return $query->result();
    }

    public function alimentos_categoria($idcategoria)
    {

        $this->db->select('IDAlimento, Nombre, Calorias, IDCategoria, img');

        $this->db->from('alimentos');

        $this->db->where('IDCategoria', $idcategoria);

        $query = $this->db->get();

        if($query->num_rows() > 0){

            return $query->result();

        }

    }

    public function categorias_alimentos( ){


        $this->db->select('

			categoria_alimentos.IDCategoria idcategoria,
			categoria_alimentos.nombre as nombrecategoria,
			alimentos.IDAlimento as idalimento,
			alimentos.Nombre as nombrealimento,			
			alimentos.Calorias as caloriasalimento,
			

		');

        $this->db->from('alimentos');
        $this->db->join('categoria_alimentos', 'categoria_alimentos.IDCategoria = alimentos.IDCategoria');

        $query = $this->db->get();

        if ($query->num_rows() < 1) {

            return FALSE;

        }


        return $query->result();

    }

    public function buscarpaciente($nombrepaciente){

        $this->db->like('Nombre', $nombrepaciente);
        $get_data = $this->db->get('paciente', 3);

            if ($get_data->num_rows() < 1){
                return false ;
            }
        return $get_data->result();
    }

    public function insertardieta($data)
    {
        $this->db->insert('dietaplato', $data);
    }

    public function buscaralimentoreceta($alimentoreceta){

        //$this->db->like('Nombre', $alimentoreceta);
        //$get_data = $this->db->get('alimentos', 3);

            //if ($get_data->num_rows() < 1){
                //return false ;
            //}
        //return $get_data->result();

         $this->db->distinct();
        $this->db->select('
           
            alimentos.IDAlimento as idalimento,
            alimentos.Nombre as nombrealimento,
            

            detallereceta.IDAlimento as idalimento,
            detallereceta.IDReceta as idreceta,
            detallereceta.nombrerec as nombrereceta

            recetas.IDReceta as idreceta2,
            recetas.preparacion as preparacion,
            recetas.totalcalorias as calorias
            
            
           
            
           
        ');
        $this->db->from('alimentos');
        $this->db->join('detallereceta', 'detallereceta.IDAlimento = alimentos.IDAlimento');
        $this->db->join('recetas', 'recetas.IDReceta = detallereceta.IDReceta');
       
        $this->db->like('Nombre', $alimentoreceta);
        //$this->db->where('recetas.IDReceta', $dia);
        //$this->db->where('dietaplato.plato', $plato);



        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return FALSE;
        }

        return $query->result();

    }

    public function busquedareceta($idreceta){

        $this->db->distinct();
        $this->db->select('
           
            recetas.IDReceta as idreceta,
            recetas.Nombre as nombrereceta,
            recetas.totalcalorias as totalcalorias,
            recetas.preparacion as preparacion

            detallereceta.IDAlimento as idalimento,
            detallereceta.IDReceta as idreceta,
            detallereceta.nombrerec as nombrereceta
            
            
            alimentos.IDAlimento as id,
            alimentos.Nombre as nombrealimento,
            alimentos.img as imagenalimento
            
           
        ');
        $this->db->from('detallereceta');
        $this->db->join('alimentos', 'alimentos.IDAlimento = detallereceta.IDAlimento');
        $this->db->join('recetas', 'recetas.IDReceta = detallereceta.IDReceta');
       
        $this->db->where('detallereceta.IDReceta', $idreceta);
        //$this->db->where('recetas.IDReceta', $dia);
        //$this->db->where('dietaplato.plato', $plato);



        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return FALSE;
        }

        return $query->result();

    }
}


//End of file locations application/models/Alimentos_model.php