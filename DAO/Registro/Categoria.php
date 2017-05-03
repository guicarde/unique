<?php
include_once '../DAO/Conexion.php';

if(!isset($_SESSION)){
session_start();
}

class Categoria {
    
    private $id;
    private $nombrecategoria;
    private $estado;
    private $fecharegistro;
        
    function __construct() {}
function getId() {
    return $this->id;
}

function getNombrecategoria() {
    return $this->nombrecategoria;
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

function setNombrecategoria($nombrecategoria) {
    $this->nombrecategoria = $nombrecategoria;
}

function setEstado($estado) {
    $this->estado = $estado;
}

function setFecharegistro($fecharegistro) {
    $this->fecharegistro = $fecharegistro;
}




//------------------------------------------------------------------------------
   function grabar(Categoria $cat){
        $con =  Conectar();
        $sql = "SELECT * FROM categoria_insertar('$cat->nombrecategoria')";

//        var_dump($sql);
//        exit();       
        $res = pg_query($con,$sql);
        $val = pg_fetch_result($res,0,0);
        if($val=='0'){
            $_SESSION['mensaje_categoria']="La categoria ingresada ya esta Registrada"; 
            return 0;
        }
        else{
            $_SESSION['mensaje_categoria']="Los datos se registraron satisfactoriamente"; 
            return 1;
        }
}   
   function actualizar(Categoria $cat){
        $con =  Conectar();
        $sql = "SELECT * FROM categoria_editar('$cat->nombrecategoria',$cat->id)";

//        var_dump($sql);
//        exit();       
        $res = pg_query($con,$sql);
        $val = pg_fetch_result($res,0,0);
        if($val=='0'){
            $_SESSION['mensaje_categoria']="La categoria ingresada ya esta Registrada"; 
            return 0;
        }
        else{
            $_SESSION['mensaje_categoria']="Los datos se actualizaron satisfactoriamente"; 
            return 1;
        }
}  



    function listar(){
       
        $con = Conectar();
        $sql = "SELECT * FROM categoria_listar()";
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
    
  
    function buscarPorId(Categoria $c){
        $con = Conectar();
        $sql = "SELECT * FROM categoria_buscar_por_id($c->id)";
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
                $_SESSION['categoria_idcategoria'] = $a['categoria_idcategoria'] ;
                $_SESSION['categoria_nombre'] = $a['categoria_nombre'];
                $_SESSION['categoria_estado'] = $a['categoria_estado'];
                $_SESSION['categoria_fecharegistro'] = $a['categoria_fecharegistro'];
                $_SESSION['accion_categoria'] = 'editar';
            } 
         }
         else{
         return null;
         }
    }
            function buscar(Categoria $c)
    {
         $con = Conectar();
         $sql = "SELECT * FROM categoria_buscar('%$c->nombrecategoria%','$c->estado','$c->fecharegistro')";
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
      function anular(Categoria $c){
        $con = Conectar();
        $sql = "SELECT * FROM categoria_anular('$c->estado',$c->id)";  
        pg_query($con,$sql); 
    } 
    
    }