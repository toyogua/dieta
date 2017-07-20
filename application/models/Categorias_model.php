
<?php
/**
 * Created by PhpStorm.
 * User: ROCKSOFT STATION
 * Date: 19/05/2017
 * Time: 05:22 PM
 */

class Categorias_model extends CI_Model
{

    public function todas_categorias()
    {
        $query = $this->db-> query('SELECT IDCategoria, Nombre FROM categoria_alimentos');
        // si hay resultados
        if ($query->num_rows() > 0) {
            // almacenamos en una matriz bidimensional
            foreach($query->result() as $row)
                $arrDatos[htmlspecialchars($row->IDCategoria, ENT_QUOTES)] =
                    htmlspecialchars($row->Nombre, ENT_QUOTES);

            $query->free_result();
            return $arrDatos;
        }

    }

    public function categorias()
    {

        $query = $this->db->get('categoria_alimentos');

        return $query->result();
    }

    public function categoriasid($id)
    {


        $this->db->where('IDCategoria', $id);

        $query = $this->db->get('categoria_alimentos');

        return $query->result();
    }

}


//End of file locations application/models/Categorias_model.php