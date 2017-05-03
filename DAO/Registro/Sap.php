<?php
include_once '../DAO/Conexion.php';

if(!isset($_SESSION)){
session_start();
}

class Sap {
    
    private $id;
    private $turno;
    private $servidor;
    private $ip;
    private $site;
    private $herramienta;
    private $tipo;
    private $idperiodo;
    private $hora;
    private $estado;
    private $fecharegistro;
        
    function __construct() {}

function getId() {
    return $this->id;
}

function getTurno() {
    return $this->turno;
}

function getServidor() {
    return $this->servidor;
}

function getIp() {
    return $this->ip;
}

function getSite() {
    return $this->site;
}

function getHerramienta() {
    return $this->herramienta;
}

function getTipo() {
    return $this->tipo;
}

function getIdperiodo() {
    return $this->idperiodo;
}

function getHora() {
    return $this->hora;
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

function setTurno($turno) {
    $this->turno = $turno;
}

function setServidor($servidor) {
    $this->servidor = $servidor;
}

function setIp($ip) {
    $this->ip = $ip;
}

function setSite($site) {
    $this->site = $site;
}

function setHerramienta($herramienta) {
    $this->herramienta = $herramienta;
}

function setTipo($tipo) {
    $this->tipo = $tipo;
}

function setIdperiodo($idperiodo) {
    $this->idperiodo = $idperiodo;
}

function setHora($hora) {
    $this->hora = $hora;
}

function setEstado($estado) {
    $this->estado = $estado;
}

function setFecharegistro($fecharegistro) {
    $this->fecharegistro = $fecharegistro;
}




//------------------------------------------------------------------------------
   function grabar(Sap $s){
        $con =  Conectar();
        $sql = "SELECT * FROM sapsoa_insertar('$s->turno','$s->servidor','$s->ip','$s->site','$s->herramienta','$s->tipo',$s->idperiodo,'$s->hora')";

//        var_dump($sql);
//        exit();       
        $res = pg_query($con,$sql);
        $val = pg_fetch_result($res,0,0);
        if($val=='0'){
            $_SESSION['mensaje_sap']="El backup ingresado ya esta Registrado"; 
            return 0;
        }
        else{
            $_SESSION['mensaje_sap']="Los datos se registraron satisfactoriamente"; 
            return 1;
        }
}   
   function actualizar(Sap $s){
        $con =  Conectar();
        $sql = "SELECT * FROM sapsoa_editar('$s->turno','$s->servidor','$s->ip','$s->site','$s->herramienta','$s->tipo',$s->idperiodo,'$s->hora',$s->id)";
//        var_dump($sql);
//        exit();    
        $res = pg_query($con,$sql);
        $val = pg_fetch_result($res,0,0);
        if($val=='0'){
            $_SESSION['mensaje_sap']="El backup ingresado ya esta Registrado"; 
            return 0;
        }
        else{
            $_SESSION['mensaje_sap']="Los datos se actualizaron satisfactoriamente"; 
            return 1;
        }
}  
    function listar(){
       
        $con = Conectar();
        $sql = "SELECT * FROM sapsoa_listar()";
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
    
  
    function buscarPorId(Sap $s){
        $con = Conectar();
        $sql = "SELECT * FROM sapsoa_buscar_por_id($s->id)";
        $res = pg_query($con,$sql);
        $array = null;
        while($fila = pg_fetch_assoc($res))
        {
            $array[]=$fila;
        }
         if(count($array)!=0)
         {
          foreach($array as $a)
            {   $_SESSION['soa_idsoa'] = $a['soa_idsoa'] ;
                $_SESSION['soa_turno'] = $a['soa_turno'];
                $_SESSION['soa_servidor'] = $a['soa_servidor'];
                $_SESSION['soa_ip'] = $a['soa_ip'];
                $_SESSION['soa_site'] = $a['soa_site'];
                $_SESSION['soa_herramienta'] = $a['soa_herramienta'];
                $_SESSION['soa_tipo'] = $a['soa_tipo'];
                $_SESSION['periodo_idperiodo'] = $a['periodo_idperiodo'];
                $_SESSION['soa_hora'] = $a['soa_hora'];
                $_SESSION['accion_soa'] = 'editar';
            } 
         }
         else{
         return null;
         }
    }
            function buscar(Sap $s)
    {
         $con = Conectar();
         $sql = "SELECT * FROM sapsoa_buscar('%$s->servidor%','$s->turno','$s->estado',$s->idperiodo)";
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