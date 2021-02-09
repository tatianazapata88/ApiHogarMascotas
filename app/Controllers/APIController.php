<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class APIController extends ResourceController
{
    protected $modelName = 'App\Models\ControladorModelo';
    protected $format    = 'json';

    public function consultarTodos()
    {
        return $this->respond($this->model->findAll());
    }

    public function agregarAnimal()
    {
    $codAnimal=$this->request->getPost('codAnimal');
    $nombreAnimal=$this->request->getPost('nombreAnimal');
    $tipoAnimal=$this->request->getPost('tipoAnimal');
    $descAnimal=$this->request->getPost('descAnimal');
    $comidaAnimal=$this->request->getPost('comidaAnimal');
    

    

    //2. armar arreglo (asociativo donde las claves seras las columnas de las tyablas
    $datosEnvio = array(

        "codAnimal"=>$codAnimal,
        "nombreAnimal"=>$nombreAnimal,
        "tipoAnimal"=>$tipoAnimal,
        "descAnimal"=>$descAnimal,
        "comidaAnimal"=>$comidaAnimal


    );

    //3 validacion y agragamos el registro
    if($this->validate('animal')){
       $this->model->insert($datosEnvio);
        $mensaje=array('estado'=>true,'mensaje'=>"registro realizado con exito");
        return $this->respond($mensaje);
    }
    else{
        $validation =  \Config\Services::validation();
        return $this->respond($validation->getErrors(),400);
    }
    

    }
  
}