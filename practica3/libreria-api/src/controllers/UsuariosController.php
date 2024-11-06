<?php

require_once '../src/models/Usuarios.php';

class UsuariosController{
 
    public function ObtenerTodos(){
        $modeloUsuario = new Usuarios();
        echo json_encode(value: ["Resultado" =>   $modeloUsuario->getAll()]);
    }

    public function ObtenerPorId($id){
        $modeloUsuario = new Usuarios();
        echo json_encode(value: ["Resultado" =>   $modeloUsuario->getById($id)]);
    }

    public function crear()
    {
        $data = json_decode(file_get_contents("php://input"), true);

        $modeloUsuario = new Usuarios();
        echo json_encode(value: ["Resultado" =>   $modeloUsuario->create($data)]);
        
    }
}