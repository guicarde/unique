<?php
include_once '../DAO/Conexion.php';

if(!isset($_SESSION)){
session_start();
}

class Schedule {
    
    private $id;
    private $idturno;
    private $idturnob;
    private $iddia;
    private $estado;
    private $fecha;
    private $idusu;
    private $idschedact;
    private $idschedope;
    private $firma;    
    private $descripcion;
    private $horain;
    private $horafin;
    private $comentario;
    
        
  function __construct() {}
    

function getId() {
    return $this->id;
}

function getIdturno() {
    return $this->idturno;
}

function getIdturnob() {
    return $this->idturnob;
}

function getIddia() {
    return $this->iddia;
}

function getEstado() {
    return $this->estado;
}

function getFecha() {
    return $this->fecha;
}

function getIdusu() {
    return $this->idusu;
}

function getIdschedact() {
    return $this->idschedact;
}

function getIdschedope() {
    return $this->idschedope;
}

function getFirma() {
    return $this->firma;
}

function getDescripcion() {
    return $this->descripcion;
}

function setId($id) {
    $this->id = $id;
}

function setIdturno($idturno) {
    $this->idturno = $idturno;
}

function setIdturnob($idturnob) {
    $this->idturnob = $idturnob;
}

function setIddia($iddia) {
    $this->iddia = $iddia;
}

function setEstado($estado) {
    $this->estado = $estado;
}

function setFecha($fecha) {
    $this->fecha = $fecha;
}

function setIdusu($idusu) {
    $this->idusu = $idusu;
}

function setIdschedact($idschedact) {
    $this->idschedact = $idschedact;
}

function setIdschedope($idschedope) {
    $this->idschedope = $idschedope;
}

function setFirma($firma) {
    $this->firma = $firma;
}

function setDescripcion($descripcion) {
    $this->descripcion = $descripcion;
}


function getHorain() {
    return $this->horain;
}

function getHorafin() {
    return $this->horafin;
}

function setHorain($horain) {
    $this->horain = $horain;
}

function setHorafin($horafin) {
    $this->horafin = $horafin;
}

function getComentario() {
    return $this->comentario;
}

function setComentario($comentario) {
    $this->comentario = $comentario;
}







//------------------------------------------------------------------------------
    function grabar(Schedule $s){
        
        $con =  Conectar();
        $sql = "SELECT * FROM schedule_insertar('$s->fecha',$s->idsedeturno,'1')";
//        var_dump($sql);
        $res = pg_query($con,$sql);
        $val = pg_fetch_result($res,0,0);
        if($val=='0'){
            $_SESSION['mensaje_schedule']="Error al registrar Schedule"; 
            return 0;
        }
        else{
            $_SESSION['mensaje_schedule']="Los datos se registraron satisfactoriamente"; 
            return $val;
        }
        }
       function insertar_act_sc_ope(Schedule $s){
        
        $con =  Conectar();
        $sql = "SELECT * FROM schedule_ope_insertar_act('','','','',$s->idschedact,$s->idschedope)";
     
        $res = pg_query($con,$sql);
//        $val = pg_fetch_result($res,0,0);
        
        }  
        
        function asignar_operador(Schedule $s){
        
        $con =  Conectar();
        $sql = "SELECT * FROM schedule_ope_insertar($s->id,$s->idusu)";
//        var_dump($sql);
//        exit();
        $res = pg_query($con,$sql);
        $val = pg_fetch_result($res,0,0);
        if($val=='0'){
            $_SESSION['mensaje_schedule']="Error al asignar Schedule al Operador"; 
            return 0;
        }
        else{
            $_SESSION['mensaje_schedule']="Los datos se registraron satisfactoriamente"; 
            return $val;
        }
        }
      function buscar_actividad_por_schedule(Schedule $s)
    {
         $con = Conectar();
         $sql = "SELECT * FROM actividad_por_schedule($s->id)";
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
      function listar(){
       
        $con = Conectar();
        $sql = "SELECT * FROM schedule_listar()";
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
        function listar_sin_asignar(){
       
        $con = Conectar();
        $sql = "SELECT * FROM schedule_listar_sin_asignar()";
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
    
            function listar_sc_por_usu(Schedule $s){
       
        $con = Conectar();
        $sql = "SELECT * FROM schedule_por_usuario($s->idusu)";
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
    
                function listar_sc_activos(){
       
        $con = Conectar();
        $sql = "SELECT * FROM schedule_activos()";
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
                    function listar_sc_finalizados(){
       
        $con = Conectar();
        $sql = "SELECT * FROM schedules_finalizados()";
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
    
         function buscarPorId(Schedule $s){
       
        $con = Conectar();
        $sql = "SELECT * FROM schedule_buscar_por_id($s->id)";
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
    
          function buscar_actividad(Schedule $s)
    {
         $con = Conectar();
         $sql = "SELECT * FROM actividad_buscar_schedule_c('$s->fecha',$s->idsedeturno,$s->iddia)";
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
    
             function reporte(Schedule $s)
    {
         $con = Conectar();
         $sql = "SELECT * FROM schedule_reporte($s->id)";
     
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
                 function reporte_cierre_dia(Schedule $s)
    {
         $con = Conectar();
         $sql = "SELECT * FROM schedule_reporte_cierre_dia($s->id)";
     
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
                     function reporte_cierre_tarde_noche(Schedule $s)
    {
         $con = Conectar();
         $sql = "SELECT * FROM schedule_reporte_cierre_tarde_noche($s->id)";
     
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
                     function reporte_cierre_noche(Schedule $s)
    {
         $con = Conectar();
         $sql = "SELECT * FROM schedule_reporte_cierre_noche($s->id)";
     
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
    
                function listar_por_schedule_usu(Schedule $s)
    {
         $con = Conectar();
         $sql = "SELECT * FROM actividad_por_schedule_usu($s->id)";
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
    }               function listar_por_schedule_usu_dia(Schedule $s)
    {
         $con = Conectar();
         $sql = "SELECT * FROM actividad_por_schedule_usu_dia($s->id)";
         
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
              function listar_por_schedule_usu_noche(Schedule $s)
    {
         $con = Conectar();
         $sql = "SELECT * FROM actividad_por_schedule_usu_noche($s->id)";
         
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
    
                    function listar_por_schedule_activo(Schedule $s)
    {
         $con = Conectar();
         $sql = "SELECT * FROM actividad_por_schedule_activo($s->id)";
         
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
                    function listar_act_ventana_maxima(Schedule $s)
    {
         $con = Conectar();
         $sql = "SELECT * FROM actividad_por_schedule_usu_ventana_max($s->id)";
         
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
    
                    function filtrar_por_schedule_usu_dia(Schedule $s)
    {
         $con = Conectar();
         $sql = "SELECT * FROM actividad_por_schedule_usu_filtrar_dia('$s->estado','%$s->descripcion%',$s->id)";
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
                        function filtrar_por_schedule_usu_noche(Schedule $s)
    {
         $con = Conectar();
         $sql = "SELECT * FROM actividad_por_schedule_usu_filtrar_noche('$s->estado','%$s->descripcion%',$s->id)";
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
                        function filtrar_por_schedule_usu_tarde_noche(Schedule $s)
    {
         $con = Conectar();
         $sql = "SELECT * FROM actividad_por_schedule_usu_filtrar_tarde_noche('$s->estado','%$s->descripcion%',$s->id)";
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
    
    
            function iniciar_tarea(Schedule $s){
       
        $con = Conectar();
        $sql = "SELECT * FROM actividad_schedule_iniciar($s->idschedact,$s->idusu)";
//        var_dump($sql);
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
    
                function finalizar_tarea(Schedule $s){
       
        $con = Conectar();
        $sql = "SELECT * FROM actividad_schedule_finalizar($s->idschedact,$s->idusu)";
//        var_dump($sql);
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
                  function cerrar_schedule(Schedule $s){
       
        $con = Conectar();
        $sql = "SELECT * FROM actividad_cerrar_schedule($s->id,'$s->firma')";
//        var_dump($sql);
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
    
         function sched_pendiente_por_fin(){
        $con =  Conectar();
        $sql = "SELECT * FROM schedules_pendientes_por_fin()";
//        var_dump($sql);
//        exit();
        $res = pg_query($con,$sql);
        $val = pg_fetch_result($res,0,0);
//        if($val!='0'){
//            $_SESSION['mensaje_entrega_doc']="El Nombre Ingresado ya esta Registrado"; 
            return $val;
//        }        
    }
             function act_asig_a_usuario(Schedule $s){
        $con =  Conectar();
        $sql = "SELECT * FROM actividades_asignadas($s->idusu)";

        $res = pg_query($con,$sql);
        $val = pg_fetch_result($res,0,0);
//        if($val!='0'){
//            $_SESSION['mensaje_entrega_doc']="El Nombre Ingresado ya esta Registrado"; 
            return $val;
//        }        
    }
             function sched_pendiente_detalle(){
        $con = Conectar();
        $sql = "SELECT * FROM schedules_pendientes_detalle()";
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
    }         function act_asig_detalle(Schedule $s){
        $con = Conectar();
        $sql = "SELECT * FROM actividades_asig_det_por_usu($s->idusu)";
//        var_dump($sql);
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
    } function act_asig_para_usuario(Schedule $s){
        $con = Conectar();
        $sql = "SELECT * FROM actividades_asig_detalle($s->idusu)";
//        var_dump($sql);
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
    
            function insertar_comentario(Schedule $s){
                    
//        $duracionfin = $this->RestarHoras($s->horain,$s->horafin);
        $con = Conectar();
//        $sql = "SELECT * FROM actividad_schedule_comentario($s->idschedact,'$s->comentario','$duracionfin',$s->idusu,'$s->estado')";
        $sql = "SELECT * FROM actividad_schedule_comentario($s->idschedact,'$s->comentario',$s->idusu,'$s->estado')";
//        var_dump($sql);
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
    
           function RestarHoras($horaini,$horafin)

{

	$horai=substr($horaini,0,2);

	$mini=substr($horaini,3,2);

	$segi=substr($horaini,6,2);

 

	$horaf=substr($horafin,0,2);

	$minf=substr($horafin,3,2);

	$segf=substr($horafin,6,2);

 

	$ini=((($horai*60)*60)+($mini*60)+$segi);

	$fin=((($horaf*60)*60)+($minf*60)+$segf);

 

	$dif=$fin-$ini;

 

	$difh=floor($dif/3600);

	$difm=floor(($dif-($difh*3600))/60);

	$difs=$dif-($difm*60)-($difh*3600);

	return date("H:i:s",mktime($difh,$difm,$difs));

}

                    function buscar_finalizados(Schedule $s)
    {
         $con = Conectar();
         $sql = "SELECT * FROM schedules_finalizados_buscar($s->idusu,'$s->fecha')";
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
    
    
    
    
    
        }

        
        