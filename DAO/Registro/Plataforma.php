<?php
include_once '../DAO/Conexion.php';

if(!isset($_SESSION)){
session_start();
}

class Plataforma {
    
    private $id;
    private $nombre;
    private $estado;
    private $fecharegistro;
        
    function __construct() {}
function getId() {
    return $this->id;
}

function getNombre() {
    return $this->nombre;
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

function setNombre($nombre) {
    $this->nombre = $nombre;
}

function setEstado($estado) {
    $this->estado = $estado;
}

function setFecharegistro($fecharegistro) {
    $this->fecharegistro = $fecharegistro;
}





//------------------------------------------------------------------------------
   function grabar(Plataforma $p){
        $con =  Conectar();
        $sql = "SELECT * FROM plataforma_insertar('$p->nombre')";

//        var_dump($sql);
//        exit();       
        $res = pg_query($con,$sql);
        $val = pg_fetch_result($res,0,0);
        if($val=='0'){
            $_SESSION['mensaje_plataforma']="La plataforma ingresada ya esta Registrada"; 
            return 0;
        }
        else{
            $_SESSION['mensaje_plataforma']="Los datos se registraron satisfactoriamente"; 
            return 1;
        }
}   
   function actualizar(Plataforma $p){
        $con =  Conectar();
        $sql = "SELECT * FROM plataforma_editar('$p->nombre',$p->id)";

//        var_dump($sql);
//        exit();       
        $res = pg_query($con,$sql);
        $val = pg_fetch_result($res,0,0);
        if($val=='0'){
            $_SESSION['mensaje_plataforma']="La plataforma ingresada ya esta Registrada"; 
            return 0;
        }
        else{
            $_SESSION['mensaje_plataforma']="Los datos se actualizaron satisfactoriamente"; 
            return 1;
        }
}  



    function listar(){
       
        $con = Conectar();
        $sql = "SELECT * FROM plataforma_listar()";
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
    
  
    function buscarPorId(Plataforma $p){
        $con = Conectar();
        $sql = "SELECT * FROM plataforma_buscar_por_id($p->id)";
        $res = pg_query($con,$sql);
        $array = null;
        while($fila = pg_fetch_assoc($res))
        {
            $array[]=$fila;
        }
         if(count($array)!=0)
         {
            
          foreach($array as $a)
            {
                $_SESSION['plataforma_idplataforma'] = $a['plataforma_idplataforma'] ;
                $_SESSION['plataforma_nombre'] = $a['plataforma_nombre'];
                $_SESSION['plataforma_estado'] = $a['plataforma_estado'];
                $_SESSION['plataforma_fecharegistro'] = $a['plataforma_fecharegistro'];
                $_SESSION['accion_plataforma'] = 'editar';
            } 
         }
         else{
         return null;
         }
    }
            function buscar(Plataforma $p)
    {
         $con = Conectar();
         $sql = "SELECT * FROM plataforma_buscar('%$p->nombre%','$p->estado','$p->fecharegistro')";
//         var_dump($sql);
//         exit();
         
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
      function anular(Plataforma $p){
        $con = Conectar();
        $sql = "SELECT * FROM plataforma_anular('$p->estado',$p->id)";  
        pg_query($con,$sql); 
    } 
    
    }