<?php
include_once '../DAO/Conexion.php';

if(!isset($_SESSION)){
session_start();
}

class Actividad {
    
    private $id;
    private $team;
    private $horaejec;
    private $servidor;
    private $descripcion;
    private $estado;
    private $idprocedimiento;
    private $idcategoria;
    private $idplataforma;
    private $idturno;
    private $iddia;
    private $tws;
    
        
    function __construct() {}
    
function getId() {
    return $this->id;
}

function getTeam() {
    return $this->team;
}

function getHoraejec() {
    return $this->horaejec;
}

function getServidor() {
    return $this->servidor;
}

function getDescripcion() {
    return $this->descripcion;
}

function getEstado() {
    return $this->estado;
}

function getIdprocedimiento() {
    return $this->idprocedimiento;
}

function getIdcategoria() {
    return $this->idcategoria;
}

function getIdplataforma() {
    return $this->idplataforma;
}

function setId($id) {
    $this->id = $id;
}

function setTeam($team) {
    $this->team = $team;
}

function setHoraejec($horaejec) {
    $this->horaejec = $horaejec;
}

function setServidor($servidor) {
    $this->servidor = $servidor;
}

function setDescripcion($descripcion) {
    $this->descripcion = $descripcion;
}

function setEstado($estado) {
    $this->estado = $estado;
}

function setIdprocedimiento($idprocedimiento) {
    $this->idprocedimiento = $idprocedimiento;
}

function setIdcategoria($idcategoria) {
    $this->idcategoria = $idcategoria;
}

function setIdplataforma($idplataforma) {
    $this->idplataforma = $idplataforma;
}
function getIdturno() {
    return $this->idturno;
}

function setIdturno($idturno) {
    $this->idturno = $idturno;
}

function getIddia() {
    return $this->iddia;
}

function setIddia($iddia) {
    $this->iddia = $iddia;
}
function getTws() {
    return $this->tws;
}

function setTws($tws) {
    $this->tws = $tws;
}





//------------------------------------------------------------------------------
    function grabar(Actividad $a){
        
        $con =  Conectar();
        $sql = "SELECT * FROM actividad_insertar('$a->team','$a->horaejec','$a->servidor','$a->descripcion',$a->idprocedimiento,'$a->tws')";
//        var_dump($sql);
//        exit();       
        $res = pg_query($con,$sql);
        $val = pg_fetch_result($res,0,0);
        if($val=='0'){
            $_SESSION['mensaje_actividad']="Error al registrar periodo"; 
            return 0;
        }
        else{
            $_SESSION['mensaje_actividad']="Los datos se registraron satisfactoriamente";
            return $val;
        }
        }
        function actualizar(Actividad $a){
        
        $con =  Conectar();
        $sql = "SELECT * FROM actividad_editar('$a->team','$a->horaejec','$a->servidor','$a->descripcion',$a->idprocedimiento,$a->id,'$a->tws')";
//        var_dump($sql);
//        exit();       
        $res = pg_query($con,$sql);
        $val = pg_fetch_result($res,0,0);
        if($val=='0'){
            $_SESSION['mensaje_actividad']="Error al registrar Actividad"; 
            return 0;
        }
        else{
            $_SESSION['mensaje_actividad']="Los datos se registraron satisfactoriamente";
            return $val;
        }
        }
     function listar(){
       
        $con = Conectar();
        $sql = "SELECT * FROM actividad_listar()";
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
         function dias_por_actividad(Actividad $a){
       
        $con = Conectar();
        $sql = "SELECT * FROM dias_por_actividad($a->id)";
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
          function buscar(Actividad $a)
    {
         $con = Conectar();
         $sql = "SELECT * FROM actividad_buscar('%$a->descripcion%','$a->estado')";
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

function anular(Actividad $a){
        $con = Conectar();
        $sql = "SELECT * FROM actividad_anular('$a->estado',$a->id)";  
        pg_query($con,$sql); 
    }

    
function buscarPorId(Actividad $a){
        $con = Conectar();
        $sql = "SELECT * FROM actividad_buscar_por_id($a->id)";
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
                $_SESSION['actividad_idactividad'] = $a['actividad_idactividad'] ;
                $_SESSION['actividad_team'] = $a['actividad_team'] ;
                $_SESSION['actividad_horaejecucion'] = $a['actividad_horaejecucion'];
                $_SESSION['actividad_servidor'] = $a['actividad_servidor'];
                $_SESSION['procedimiento_idprocedimiento'] = $a['procedimiento_idprocedimiento'];
                $_SESSION['actividad_descripcion'] = $a['actividad_descripcion'];
                $_SESSION['actividad_tws'] = $a['actividad_tws'];
                $_SESSION['actividad_estado'] = $a['actividad_estado'];
                $_SESSION['accion_actividad'] = 'editar';
                
            } 
         }
         else{
         return null;
         }
    }
      function turno_por_actividad(Actividad $a){
       
        $con = Conectar();
        $sql = "SELECT * FROM turno_por_actividad($a->id)";
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
    
       function grabar_turno(Actividad $a){
        
        $con =  Conectar();
        $sql = "SELECT * FROM actividad_turno_insertar($a->id,$a->idturno)";
//        var_dump($sql);
//        exit();       
        $res = pg_query($con,$sql);
        $val = pg_fetch_result($res,0,0);
        if($val=='0'){
            return 0;
        }
        else{
            return $val;
        }
        }
        
         function grabar_dia(Actividad $a){
        
        $con =  Conectar();
        $sql = "SELECT * FROM actividad_dia_insertar($a->id,$a->iddia)";
//        var_dump($sql);
//        exit();       
        $res = pg_query($con,$sql);
        $val = pg_fetch_result($res,0,0);
        if($val=='0'){
            return 0;
        }
        else{
            return $val;
        }
        }
        
            function grabarExcel($b,$c,$m,$n,$o,$p,$r,$s,$t)
    {
   //     $duracion = $this->RestarHoras($e,$k);
        
        $con = Conectar();
        $sql = "SELECT * FROM actividad_insertar_excel('$m','$n','$o','$p','$r','$s','$t') ";
//        var_dump($sql);
//        exit();
        $res = pg_query($con,$sql);
        return pg_fetch_result($res,0,0);
    }

        }
