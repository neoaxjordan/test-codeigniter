<?php 
namespace App\Models;
use CodeIgniter\Model;

class Orden extends Model
{
    protected $table = 'tb_orden_detalle';

    protected $primaryKey = 'id';
    
    protected $allowedFields = ['orden_id','producto_descripcion','cantidad','estado'];

    public function get_all() {
        $sql = "SELECT B.id, B.orden_id, B.producto_descripcion, B.cantidad, B.estado, A.estado AS orden ";
        $sql .= " FROM tb_orden A, tb_orden_detalle B WHERE B.orden_id=A.id ";
        $sql .= " ORDER BY B.id ASC;";
        $query =  $this->db->query($sql);  
        return $query->getResult();
    }
    public function get_by_id($id) {
        $sql = "SELECT B.id, B.orden_id, B.producto_descripcion, B.cantidad, B.estado, A.estado AS orden ";
        $sql .= " FROM tb_orden A, tb_orden_detalle B WHERE B.orden_id=A.id AND B.id = " . $id;
        $sql .= " LIMIT 1;";
        $query =  $this->db->query($sql);  
        return $query->getRow();
    }
    public function get_orderID_by_option($op) {
        $sql = "SELECT * FROM tb_orden  WHERE estado = " . $op;
        $sql .= " LIMIT 1;";
        $query =  $this->db->query($sql);  
        return $query->getRow();
    }
    
}