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

    public function editar($id)
    {
        $datosPeticion=$this->request->getRawInput();

        $nombreAnimal=$datosPeticion["nombreAnimal"];
        $tipoAnimal=$datosPeticion["tipoAnimal"];
        $descAnimal=$datosPeticion["descAnimal"];
        $comidaAnimal=$datosPeticion["comidaAnimal"];
        

        $datosEnvio=array(
            "nombreAnimal"=>$nombreAnimal,
            "tipoAnimal"=>$tipoAnimal,
            "descAnimal"=>$descAnimal,
            "comidaAnimal"=>$comidaAnimal
            

        );
     

        if($this->validate('animalPUT')){
            $this->model->update($id,$datosEnvio);
             $mensaje=array('estado'=>true,'mensaje'=>"registro realizado con exito");
             return $this->respond($mensaje);
         }
         else{
             $validation =  \Config\Services::validation();
             return $this->respond($validation->getErrors(),400);
         }
      

}
 

public function eliminar($id){
    $consulta=$this->model->where('codAnimal',$id)->delete();
    $filasAfectadas=$consulta->connID->affected_rows;

    if($filasAfectadas==1){
    
    $mensaje=array('estado'=>true,'mensaje'=>"registro eliminado con exito");
    return $this->respond($mensaje);
}
else{
    $mensaje=array('estado'=>false,'mensaje'=>"El conductor a eliminar no se encontro en la BD");
    return $this->respond($mensaje,400);
}
    

}
}