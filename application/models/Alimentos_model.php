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
        //HEX(Imagen) as imgb64 tomamos el campo tipo blob y lo convertimos a hexadecimal y asi lo retornamos
        $this->db->select('IDAlimento, Nombre, Calorias, Carbohidratos, Grasas, IDCategoria, HEX(Imagen) as imgb64, proteinas,img');

        $this->db->from('alimentos');

        $this->db->where('IDCategoria', $idcategoria);

        $query = $this->db->get();

        if($query->num_rows() > 0){


            return $query->result();

        }

    }

    public  function  getImagenCruda($alimento){
        $this->db->select(' HEX(Imagen) as imgb64');

        $this->db->from('alimentos');

        $this->db->where('IDAlimento', $alimento);
        $query = $this->db->get();

        return $query->result();

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

         $this->db->distinct();
        $this->db->select('
           
            alimentos.IDAlimento as idalimento,
            alimentos.Nombre as nombrealimento,
            
            detallereceta.IDAlimento as idalimento,
            detallereceta.IDReceta as idreceta,
            detallereceta.nombrerec as nombrereceta

           ');

        $this->db->from('alimentos');
        $this->db->join('detallereceta', 'detallereceta.IDAlimento = alimentos.IDAlimento');

       
        $this->db->like('Nombre', $alimentoreceta);


        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return FALSE;
        }

        return $query->result();

    }

    public function busquedareceta($idreceta){

        $this->db->distinct();
        $this->db->select('
           
           detallereceta.IDReceta as idreceta,
           detallereceta.nombrerec as nombrereceta,
            
            alimentos.IDAlimento as idalimento,
            alimentos.IDCategoria as idcategoria,
            alimentos.Nombre as nombrealimento,
            alimentos.img as imagen,
            HEX(alimentos.Imagen) as imgb64,
            
            
            recetas.totalcalorias as calorias,
            recetas.totalgrasas as grasas,
            recetas.totalcarbohidratos as carbohidratos,
            recetas.totalproteinas as proteinas,
            recetas.preparacion as preparacion
            
            ');

        $this->db->from('detallereceta');
        $this->db->join('alimentos', 'alimentos.IDAlimento = detallereceta.IDAlimento');
        $this->db->join('recetas', 'recetas.IDReceta = detallereceta.IDReceta');
       
        $this->db->where('detallereceta.IDReceta', $idreceta);

        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return FALSE;
        }

        return $query->result();

    }
}


//End of file locations application/models/Alimentos_model.php