<?php
include_once '../DAO/Conexion.php';

if(!isset($_SESSION)){
session_start();
}

class Rct {
    
    private $id;
    private $tipo;
    private $fechain;
    private $fechafin;
    private $asignado;
    private $ticket;
    private $servidor;
    private $detalle;
    private $observacion;
    private $archivo;
    private $fechareg;
    private $estado;
    private $idusu;
    
        
    function __construct() {}
    
function getId() {
    return $this->id;
}

function getTipo() {
    return $this->tipo;
}

function getFechain() {
    return $this->fechain;
}

function getFechafin() {
    return $this->fechafin;
}

function getAsignado() {
    return $this->asignado;
}

function getTicket() {
    return $this->ticket;
}

function getServidor() {
    return $this->servidor;
}

function getDetalle() {
    return $this->detalle;
}

function getObservacion() {
    return $this->observacion;
}

function getArchivo() {
    return $this->archivo;
}

function getFechareg() {
    return $this->fechareg;
}

function getEstado() {
    return $this->estado;
}

function getIdusu() {
    return $this->idusu;
}

function setId($id) {
    $this->id = $id;
}

function setTipo($tipo) {
    $this->tipo = $tipo;
}

function setFechain($fechain) {
    $this->fechain = $fechain;
}

function setFechafin($fechafin) {
    $this->fechafin = $fechafin;
}

function setAsignado($asignado) {
    $this->asignado = $asignado;
}

function setTicket($ticket) {
    $this->ticket = $ticket;
}

function setServidor($servidor) {
    $this->servidor = $servidor;
}

function setDetalle($detalle) {
    $this->detalle = $detalle;
}

function setObservacion($observacion) {
    $this->observacion = $observacion;
}

function setArchivo($archivo) {
    $this->archivo = $archivo;
}

function setFechareg($fechareg) {
    $this->fechareg = $fechareg;
}

function setEstado($estado) {
    $this->estado = $estado;
}

function setIdusu($idusu) {
    $this->idusu = $idusu;
}




//------------------------------------------------------------------------------
 //------------------------------------------------------------------------------
    function grabar(Rct $r){
        
        $con =  Conectar();
        $sql = "SELECT * FROM rct_insertar('$r->tipo','$r->fechain','$r->fechafin','$r->asignado','$r->ticket','$r->servidor','$r->detalle','$r->observacion','$r->archivo','$r->estado',$r->idusu)";
//        var_dump($sql);
//        exit();       
        $res = pg_query($con,$sql);
        $val = pg_fetch_result($res,0,0);
        if($val=='0'){
            $_SESSION['mensaje_rct']="Error al registrar Cambio"; 
            return 0;
        }
        else{
            $_SESSION['mensaje_rct']="Los datos se registraron satisfactoriamente";
            return $val;
        }
        }
        function actualizar(Rct $r){
        
        $con =  Conectar();
        $sql = "SELECT * FROM rct_editar('$r->tipo','$r->fechain','$r->fechafin','$r->asignado','$r->ticket','$r->servidor','$r->detalle','$r->observacion','$r->archivo','$r->estado',$r->idusu,$r->id)";
//        var_dump($sql);
//        exit();       
        $res = pg_query($con,$sql);
        $val = pg_fetch_result($res,0,0);
        if($val=='0'){
            $_SESSION['mensaje_rct']="Error al registrar requerimiento"; 
            return 0;
        }
        else{
            $_SESSION['mensaje_rct']="Los datos se actualizaron satisfactoriamente";
            return $val;
        }
        }
    function listar(){
       
        $con = Conectar();
        $sql = "SELECT * FROM rct_listar()";
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
       function listar_en_progreso(){
       
        $con = Conectar();
        $sql = "SELECT * FROM rct_listar_en_progreso()";
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
         function buscarPorId(Rct $r){
        $con = Conectar();
        $sql = "SELECT * FROM rct_buscar_por_id($r->id)";
//        var_dump($sql);
//        exit();
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
              
              
              
                
  
  
  
  
  
  
  
  
  
  
                $_SESSION['rct_idrct'] = $a['rct_idrct'] ;
                $_SESSION['rct_tiporegistro'] = $a['rct_tiporegistro'];
                $_SESSION['rct_fechain'] = $a['rct_fechain'];
                $_SESSION['rct_fechafin'] = $a['rct_fechafin'];
                $_SESSION['rct_asignado'] = $a['rct_asignado'];
                $_SESSION['rct_ticket'] = $a['rct_ticket'];
                $_SESSION['rct_servidor'] = $a['rct_servidor'];
                $_SESSION['rct_detalle'] = $a['rct_detalle'] ;
                $_SESSION['rct_observacion'] = $a['rct_observacion'];
                $_SESSION['rct_archivo'] = $a['rct_archivo'];
                $_SESSION['rct_fecharegistro'] = $a['rct_fecharegistro'];
                $_SESSION['rct_estado'] = $a['rct_estado'];
                $_SESSION['usu_idusu'] = $a['usu_idusu'];
                
                
                $_SESSION['accion_rct'] = 'editar';
                
            } 
         }
         else{
         return null;
         }
    }
             function buscar(Requerimiento $r)
    {
         $con = Conectar();
         $sql = "SELECT * FROM requerimiento_buscar('$r->operador','$r->pais','$r->tipo','$r->menu','$r->estado','$r->fecha_formato')";
//             var_dump($sql);
//        exit();
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
    
        function Hora_a_decimal($time)
       {
           $hms = explode(":", $time);
           return ($hms[0] + ($hms[1]/60) + ($hms[2]/3600));
       }
       
function Dashboard(Requerimiento $r){
        $con = Conectar();
        $sql = "SELECT * FROM requerimiento_dashboard('$r->menu')";
//        var_dump($sql);
//        exit();
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
                $_SESSION['promedio_col'] = $this->Hora_a_decimal($a['promedio_col']);
                $_SESSION['promedio_ecu'] = $this->Hora_a_decimal($a['promedio_ecu']);
                $_SESSION['promedio_gua'] = $this->Hora_a_decimal($a['promedio_gua']);
                $_SESSION['promedio_mex'] = $this->Hora_a_decimal($a['promedio_mex']);
                $_SESSION['promedio_per'] = $this->Hora_a_decimal($a['promedio_per']);
                $_SESSION['promedio_ven'] = $this->Hora_a_decimal($a['promedio_ven']);
                $_SESSION['accion_requerimiento'] = 'dashboard';
                
             
            } 
         }
         else{
         return null;
         }
    }



        }
