<?php 
namespace App\Controllers;
use App\Models\Orden;
use CodeIgniter\Controller;

class OrdenCrud extends Controller
{
    // show list
    public function index(){
        $ordenModel = new Orden();
        //$data['objetos'] = $ordenModel->orderBy('id', 'DESC')->findAll();
        $data['objetos'] = $ordenModel->get_all();
        return view('view-orden', $data);
    }

    // add data
    public function create(){
        return view('add-orden');
    }
 
    // insert data
    public function store() {
        $ordenModel = new Orden();

        $obj = $this->request->getPost();        
        $id =  $obj['id'];
        $oid = $ordenModel->get_orderID_by_option(  $obj['orden'] );
        $data = [
            'id' => $obj['id'],            
            'orden_id' => $oid->id,
            'producto_descripcion' => $obj['detalle'],
            'cantidad' => $obj['cantidad'],
            'estado' => $obj['estado'],
        ];

        /*
        $oid = $ordenModel->get_orderID_by_option( $this->request->getPost('orden') );
        $data = [
            'id' => $this->request->getPost('id'),
            'orden_id'  => $od->id,
            'producto_descripcion'  => $this->request->getPost('detalle'),
            'cantidad'  => $this->request->getPost('cantidad'),
            'estado'  => $this->request->getPost('estado'),
        ];
        */

        $ordenModel->insert($data);
        return $this->response->redirect('/codeigniter/public/show');
    }

    // show single
    public function singleOrden($id = null){
        $ordenModel = new Orden();
        //$data['objeto'] = $ordenModel->where('id', $id)->first();
        $data['objeto'] = $ordenModel->get_by_id($id);
        return view('edit-orden', $data);
    }

    // update data
    public function update(){
        $ordenModel = new Orden();

        $obj = $this->request->getPost();         
        $id =  $obj['id'];
        $oid = $ordenModel->get_orderID_by_option(  $obj['orden'] );
        $data = [
            'id' => $obj['id'],            
            'orden_id' => $oid->id,
            'producto_descripcion' => $obj['detalle'],
            'cantidad' => $obj['cantidad'],
            'estado' => $obj['estado'],
        ];

        /*
        $id = $this->request->getPost('id');
        $data = [
            'id' => $this->request->getPost('id'),            
            'orden_id'  => $this->request->getPost('orden_id'),
            'producto_descripcion'  => $this->request->getPost('producto_descripcion'),
            'cantidad'  => $this->request->getPost('cantidad'),
            'estado'  => $this->request->getPost('estado'),
        ];
        */

        $ordenModel->update($id, $data);
        return $this->response->redirect('/codeigniter/public/show');
    }
 
    // delete data
    public function delete($id = null){
        $ordenModel = new Orden();
        $data['id'] = $ordenModel->where('id', $id)->delete($id);
        return $this->response->redirect('/codeigniter/public/show');
    }    

    // === AJAX ===
    public function ajaxIndex() {
        $ordenModel = new Orden();
        $data = $ordenModel->get_all();
        echo json_encode($data);
    }

    public function ajaxEdit($id) {
        $ordenModel = new Orden();
        //$data = $ordenModel->where('id', $id)->first();
        $data = $ordenModel->get_by_id($id);
        echo json_encode($data);
    }

    public function ajaxSave(){
        
        if ($this->request->getMethod() == "post") {
            //helper(['form', 'url']);
            $ordenModel = new Orden();
            $obj = $this->request->getPost();
            
            $id = $obj['id'];
            $oid = $ordenModel->get_orderID_by_option(  $obj['orden'] );
            $data = [
                'id' => $obj['id'],            
                'orden_id' => $oid->id,
                'producto_descripcion' => $obj['detalle'],
                'cantidad' => $obj['cantidad'],
                'estado' => $obj['estado'],
            ];
            $flag = $obj['bandera'];
            
            switch($flag){
                case 'edit':
                    $ordenModel->update($id, $data); 
                    break;
                case 'add':
                    $ordenModel->insert($data);                    
                    break;
            }
            echo json_encode(array("status" => true));            
        }else{
           echo json_encode(array("status" => false));
        }
    }
    public function ajaxDelete($id){
        
        if ($this->request->getMethod() == "post") {
            //helper(['form', 'url']);
            $ordenModel = new Orden();
            $data['id'] = $ordenModel->where('id', $id)->delete($id);
            echo json_encode(array("status" => true));            
        }else{
           echo json_encode(array("status" => false));
        }
    }

    public function ajaxOrdenId(){
        $ordenModel = new Orden();
        $data = $ordenModel->get_orderID_by_option(0);
        echo json_encode($data->id);
    }

}