<?php
include_once '../DAO/Conexion.php';

if(!isset($_SESSION)){
session_start();
}

class Requerimiento {
    
    private $id;
    private $fecha_formato;
    private $turno;
    private $operador;
    private $hora_solicitud;
    private $ticket;
    private $tipo;
    private $pais;
    private $menu;
    private $detalle;
    private $archivo;
    private $fecha_ejecucion;
    private $hora_inicio;
    private $inicio_tsm;
    private $fin_tsm;
    private $duracion_tsm;
    private $inicio_dia;
    private $fin_dia;
    private $duracion_dia;
    private $inicio_desa;
    private $fin_desa;
    private $duracion_desa;
    private $inicio_cond;
    private $fin_cond;
    private $duracion_cond;
    private $inicio_comi;
    private $fin_comi;
    private $duracion_comi;
    private $hora_fin;
    private $hora_duracion;
    private $team;
    private $estado;
    private $incidente;
    private $tamano;
    private $cantidad;
    private $idusu;
    
        
    function __construct() {}
    
function getId() {
    return $this->id;
}

function getFecha_formato() {
    return $this->fecha_formato;
}

function getTurno() {
    return $this->turno;
}

function getOperador() {
    return $this->operador;
}

function getHora_solicitud() {
    return $this->hora_solicitud;
}

function getTicket() {
    return $this->ticket;
}

function getTipo() {
    return $this->tipo;
}

function getPais() {
    return $this->pais;
}

function getMenu() {
    return $this->menu;
}

function getDetalle() {
    return $this->detalle;
}

function getArchivo() {
    return $this->archivo;
}

function getFecha_ejecucion() {
    return $this->fecha_ejecucion;
}

function getHora_inicio() {
    return $this->hora_inicio;
}

function getInicio_tsm() {
    return $this->inicio_tsm;
}

function getFin_tsm() {
    return $this->fin_tsm;
}

function getDuracion_tsm() {
    return $this->duracion_tsm;
}

function getInicio_dia() {
    return $this->inicio_dia;
}

function getFin_dia() {
    return $this->fin_dia;
}

function getDuracion_dia() {
    return $this->duracion_dia;
}

function getInicio_desa() {
    return $this->inicio_desa;
}

function getFin_desa() {
    return $this->fin_desa;
}

function getDuracion_desa() {
    return $this->duracion_desa;
}

function getInicio_cond() {
    return $this->inicio_cond;
}

function getFin_cond() {
    return $this->fin_cond;
}

function getDuracion_cond() {
    return $this->duracion_cond;
}

function getInicio_comi() {
    return $this->inicio_comi;
}

function getFin_comi() {
    return $this->fin_comi;
}

function getDuracion_comi() {
    return $this->duracion_comi;
}

function getHora_fin() {
    return $this->hora_fin;
}

function getHora_duracion() {
    return $this->hora_duracion;
}

function getTeam() {
    return $this->team;
}

function getEstado() {
    return $this->estado;
}

function getIncidente() {
    return $this->incidente;
}

function getTamano() {
    return $this->tamano;
}

function getCantidad() {
    return $this->cantidad;
}

function getIdusu() {
    return $this->idusu;
}

function setId($id) {
    $this->id = $id;
}

function setFecha_formato($fecha_formato) {
    $this->fecha_formato = $fecha_formato;
}

function setTurno($turno) {
    $this->turno = $turno;
}

function setOperador($operador) {
    $this->operador = $operador;
}

function setHora_solicitud($hora_solicitud) {
    $this->hora_solicitud = $hora_solicitud;
}

function setTicket($ticket) {
    $this->ticket = $ticket;
}

function setTipo($tipo) {
    $this->tipo = $tipo;
}

function setPais($pais) {
    $this->pais = $pais;
}

function setMenu($menu) {
    $this->menu = $menu;
}

function setDetalle($detalle) {
    $this->detalle = $detalle;
}

function setArchivo($archivo) {
    $this->archivo = $archivo;
}

function setFecha_ejecucion($fecha_ejecucion) {
    $this->fecha_ejecucion = $fecha_ejecucion;
}

function setHora_inicio($hora_inicio) {
    $this->hora_inicio = $hora_inicio;
}

function setInicio_tsm($inicio_tsm) {
    $this->inicio_tsm = $inicio_tsm;
}

function setFin_tsm($fin_tsm) {
    $this->fin_tsm = $fin_tsm;
}

function setDuracion_tsm($duracion_tsm) {
    $this->duracion_tsm = $duracion_tsm;
}

function setInicio_dia($inicio_dia) {
    $this->inicio_dia = $inicio_dia;
}

function setFin_dia($fin_dia) {
    $this->fin_dia = $fin_dia;
}

function setDuracion_dia($duracion_dia) {
    $this->duracion_dia = $duracion_dia;
}

function setInicio_desa($inicio_desa) {
    $this->inicio_desa = $inicio_desa;
}

function setFin_desa($fin_desa) {
    $this->fin_desa = $fin_desa;
}

function setDuracion_desa($duracion_desa) {
    $this->duracion_desa = $duracion_desa;
}

function setInicio_cond($inicio_cond) {
    $this->inicio_cond = $inicio_cond;
}

function setFin_cond($fin_cond) {
    $this->fin_cond = $fin_cond;
}

function setDuracion_cond($duracion_cond) {
    $this->duracion_cond = $duracion_cond;
}

function setInicio_comi($inicio_comi) {
    $this->inicio_comi = $inicio_comi;
}

function setFin_comi($fin_comi) {
    $this->fin_comi = $fin_comi;
}

function setDuracion_comi($duracion_comi) {
    $this->duracion_comi = $duracion_comi;
}

function setHora_fin($hora_fin) {
    $this->hora_fin = $hora_fin;
}

function setHora_duracion($hora_duracion) {
    $this->hora_duracion = $hora_duracion;
}

function setTeam($team) {
    $this->team = $team;
}

function setEstado($estado) {
    $this->estado = $estado;
}

function setIncidente($incidente) {
    $this->incidente = $incidente;
}

function setTamano($tamano) {
    $this->tamano = $tamano;
}

function setCantidad($cantidad) {
    $this->cantidad = $cantidad;
}

function setIdusu($idusu) {
    $this->idusu = $idusu;
}


//------------------------------------------------------------------------------
 //------------------------------------------------------------------------------
    function grabar(Requerimiento $r){
        
        $con =  Conectar();
        $sql = "SELECT * FROM requerimiento_insertar_b('$r->fecha_formato','$r->turno','$r->operador','$r->hora_solicitud','$r->ticket','$r->tipo','$r->pais','$r->menu','$r->detalle','$r->archivo','$r->fecha_ejecucion','$r->hora_inicio','$r->inicio_tsm','$r->fin_tsm','$r->duracion_tsm','$r->inicio_dia','$r->fin_dia','$r->duracion_dia','$r->inicio_desa','$r->fin_desa','$r->duracion_desa','$r->inicio_cond','$r->fin_cond','$r->duracion_cond','$r->inicio_comi','$r->fin_comi','$r->duracion_comi','$r->hora_fin','$r->hora_duracion','$r->team','$r->estado','$r->incidente',$r->tamano,$r->cantidad,$r->idusu)";
//        var_dump($sql);
//        exit();       
        $res = pg_query($con,$sql);
        $val = pg_fetch_result($res,0,0);
        if($val=='0'){
            $_SESSION['mensaje_requerimiento']="Error al registrar requerimiento"; 
            return 0;
        }
        else{
            $_SESSION['mensaje_requerimiento']="Los datos se registraron satisfactoriamente";
            return $val;
        }
        }
        function actualizar(Requerimiento $r){
        
        $con =  Conectar();
        $sql = "SELECT * FROM requerimiento_editar('$r->fecha_formato','$r->turno','$r->operador','$r->hora_solicitud','$r->ticket','$r->tipo','$r->pais','$r->menu','$r->detalle','$r->archivo','$r->fecha_ejecucion','$r->hora_inicio','$r->inicio_tsm','$r->fin_tsm','$r->duracion_tsm','$r->inicio_dia','$r->fin_dia','$r->duracion_dia','$r->inicio_desa','$r->fin_desa','$r->duracion_desa','$r->inicio_cond','$r->fin_cond','$r->duracion_cond','$r->inicio_comi','$r->fin_comi','$r->duracion_comi','$r->hora_fin','$r->hora_duracion','$r->team','$r->estado','$r->incidente',$r->tamano,$r->cantidad,$r->id)";
//        var_dump($sql);
//        exit();       
        $res = pg_query($con,$sql);
        $val = pg_fetch_result($res,0,0);
        if($val=='0'){
            $_SESSION['mensaje_requerimiento']="Error al registrar requerimiento"; 
            return 0;
        }
        else{
            $_SESSION['mensaje_requerimiento']="Los datos se actualizaron satisfactoriamente";
            return $val;
        }
        }
    function listar(){
       
        $con = Conectar();
        $sql = "SELECT * FROM requerimiento_listar()";
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
         function buscarPorId(Requerimiento $r){
        $con = Conectar();
        $sql = "SELECT * FROM requerimiento_buscar_por_id($r->id)";
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
                $_SESSION['requerimiento_idrequerimiento'] = $a['requerimiento_idrequerimiento'] ;
                $_SESSION['requerimiento_fecha_formato'] = $a['requerimiento_fecha_formato'];
                $_SESSION['requerimiento_turno'] = $a['requerimiento_turno'];
                $_SESSION['requerimiento_operador'] = $a['requerimiento_operador'];
                $_SESSION['requerimiento_hora_solicitud'] = $a['requerimiento_hora_solicitud'];
                $_SESSION['requerimiento_ticket'] = $a['requerimiento_ticket'];
                $_SESSION['requerimiento_tipo'] = $a['requerimiento_tipo'];
                $_SESSION['requerimiento_pais'] = $a['requerimiento_pais'] ;
                $_SESSION['requerimiento_menu'] = $a['requerimiento_menu'];
                $_SESSION['requerimiento_detalle'] = $a['requerimiento_detalle'];
                $_SESSION['requerimiento_archivo'] = $a['requerimiento_archivo'];
                $_SESSION['requerimiento_fecha_ejecucion'] = $a['requerimiento_fecha_ejecucion'];
                $_SESSION['requerimiento_hora_inicio'] = $a['requerimiento_hora_inicio'];
                $_SESSION['requerimiento_inicio_tsm'] = $a['requerimiento_inicio_tsm'];
                $_SESSION['requerimiento_fin_tsm'] = $a['requerimiento_fin_tsm'] ;
                $_SESSION['requerimiento_duracion_tsm'] = $a['requerimiento_duracion_tsm'];
                $_SESSION['requerimiento_inicio_dia'] = $a['requerimiento_inicio_dia'];
                $_SESSION['requerimiento_fin_dia'] = $a['requerimiento_fin_dia'];
                $_SESSION['requerimiento_duracion_dia'] = $a['requerimiento_duracion_dia'];
                $_SESSION['requerimiento_inicio_desa'] = $a['requerimiento_inicio_desa'];
                $_SESSION['requerimiento_fin_desa'] = $a['requerimiento_fin_desa'];
                $_SESSION['requerimiento_duracion_desa'] = $a['requerimiento_duracion_desa'] ;
                $_SESSION['requerimiento_inicio_condiciones'] = $a['requerimiento_inicio_condiciones'];
                $_SESSION['requerimiento_fin_condiciones'] = $a['requerimiento_fin_condiciones'];
                $_SESSION['requerimiento_duracion_condiciones'] = $a['requerimiento_duracion_condiciones'];
                $_SESSION['requerimiento_inicio_comisiones'] = $a['requerimiento_inicio_comisiones'];
                $_SESSION['requerimiento_fin_comisiones'] = $a['requerimiento_fin_comisiones'];
                $_SESSION['requerimiento_duracion_comisiones'] = $a['requerimiento_duracion_comisiones'];
                $_SESSION['requerimiento_hora_fin'] = $a['requerimiento_hora_fin'] ;
                $_SESSION['requerimiento_hora_duracion'] = $a['requerimiento_hora_duracion'];
                $_SESSION['requerimiento_team'] = $a['requerimiento_team'];
                $_SESSION['requerimiento_estado'] = $a['requerimiento_estado'];
                $_SESSION['requerimiento_incidente'] = $a['requerimiento_incidente'];
                $_SESSION['requerimiento_tamano'] = $a['requerimiento_tamano'];
                $_SESSION['requerimiento_cantidad'] = $a['requerimiento_cantidad'];
                $_SESSION['usu_idusu'] = $a['usu_idusu'];
                
                $_SESSION['accion_requerimiento'] = 'editar';
                
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
