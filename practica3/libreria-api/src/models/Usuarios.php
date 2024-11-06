<?php
require_once '../src/db/Database.php';

class Usuarios {

    private $db;

    public function __construct(){
        $this->db = new Database();
    }


    public function getAll(){

        $consulta = $this->db->connect()->query("
         SELECT 
            usuarios.id, 
            usuarios.nombre, 
            usuarios.correo, 
            usuarios.edad
        FROM 
            usuarios;

        ");
        return $consulta->fetchAll();
    }

    public function getById($id){
        $consulta = $this->db->connect()->prepare(
            " SELECT * FROM usuarios WHERE id = ?");

        $consulta->execute(params: [$id]);
        return $consulta->fetch();
    }


    public function create($data){
        $consulta = $this->db->connect()->prepare(
            "INSERT INTO usuarios (nombre, correo, edad) VALUES (?, ?, ?)");
        $consulta->execute([$data['nombre'], $data['correo'], $data['edad']]);
            
        return $this->db->connect()->lastInsertId();

    }

}