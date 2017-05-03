<?php
include_once '../DAO/Conexion.php';

if(!isset($_SESSION)){
session_start();
}

class Rol {
    
    private $id;
    private $descripcion;
    private $estado;
    private $fecharegistro;
        
    function __construct() {}
    
function getId() {
    return $this->id;
}

function getDescripcion() {
    return $this->descripcion;
}

function getEstado() {
    return $this->estado;
}

function getFecharegistro() {
    return $this->fecharegistro;
}

function setId($id) {
    $this->id = $id;
}

function setDescripcion($descripcion) {
    $this->descripcion = $descripcion;
}

function setEstado($estado) {
    $this->estado = $estado;
}

function setFecharegistro($fecharegistro) {
    $this->fecharegistro = $fecharegistro;
}







//------------------------------------------------------------------------------
   

    function listar(){
       
        $con = Conectar();
        $sql = "SELECT * FROM rol_listar()";
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