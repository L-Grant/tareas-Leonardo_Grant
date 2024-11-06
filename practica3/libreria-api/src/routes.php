<?php

require_once "../src/controllers/UsuariosController.php";

$method = $_SERVER['REQUEST_METHOD'];


$path = trim($_SERVER['PATH_INFO'], '/');


$segments = explode('/', $path);


$queryString = $_SERVER['QUERY_STRING'];


parse_str($queryString, $queryParams);




if($path == "usuarios")
{
    $UsuariosController = new UsuariosController();
    switch($method) {
        
        case  'GET':
            $id = isset($queryParams['id']) ? $queryParams['id'] : null;
        

           if($id != null)
           {
              $UsuariosController->ObtenerPorId($id);
           }
           else
           {
            $UsuariosController->ObtenerTodos();
           }
          
          
            break;
        
           CASE 'POST':
            $UsuariosController->crear();

            break;
        default:
            echo json_encode(["Error" => "Metodo no implementado todavia para Usuarios." ]);

    }

}
?>
