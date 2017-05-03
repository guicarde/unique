<?php
include_once '../DAO/Conexion.php';

if(!isset($_SESSION)){
session_start();
}

class Turno {
    
    private $id;
    private $nombre;
        
    function __construct() {}
    

function getId() {
    return $this->id;
}

function getNombre() {
    return $this->nombre;
}

function setId($id) {
    $this->id = $id;
}

function setNombre($nombre) {
    $this->nombre = $nombre;
}



//------------------------------------------------------------------------------
   

    function listar(){
       
        $con = Conectar();
        $sql = "SELECT * FROM turno_listar()";
        $res = pg_query($con,$sql);
        $array=null;
        while($fila = pg_fetch_assoc($res))
        {
                   $array[] = $fila;
        }
       
        if(count($array)!=0){
            return $array; 
        }
        else{
            return null;
        }
    }
    
        }
