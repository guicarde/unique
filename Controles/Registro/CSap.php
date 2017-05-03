<?php

session_start();

include_once '../../DAO/Conexion.php';
include_once '../../DAO/Registro/Sap.php';


$direccionInicio = "location:../../Vistas/index.php";
$direccionMantener = "location: ../../Vistas/MantenerSOA.php";
$direccionGuardar = "location: ../../Vistas/GuardarSOA.php";
 
if (isset($_POST['hidden_sap'])) {
    
    $accion = $_POST['hidden_sap'];
//    var_dump($accion);
//    exit();
     
    if ($accion == 'save') {

        if (isset($_SESSION['accion_soa']))  {
            if ($_SESSION['accion_soa'] == 'editar') {
              $id = $_POST['idsap'];
              $turno=$_POST['c_turno'];  
              $servidor=trim(strtoupper($_POST['t_servidor']));              
              $ip= trim(strtoupper($_POST['t_ip']));  
              $site=$_POST['c_site'];  
              $herramienta=trim(strtoupper($_POST['t_herramienta']));
              $tipo=trim(strtoupper($_POST['t_tipo']));
              $periodo=$_POST['c_periodo'];
              $hora=$_POST['t_hora'];
              
              
                      
            $backup = new Sap();
            $backup->setId($id);
            $backup->setTurno($turno);
            $backup->setServidor($servidor);
            $backup->setIp($ip);
            $backup->setSite($site);
            $backup->setHerramienta($herramienta);
            $backup->setTipo($tipo);
            $backup->setIdperiodo($periodo);
            $backup->setHora($hora);
            $valor=$backup->actualizar($backup);
            
            header("location: ../../Vistas/MantenerSOA.php");
            } else {
              $turno=$_POST['c_turno'];  
              $servidor=trim(strtoupper($_POST['t_servidor']));              
              $ip= trim(strtoupper($_POST['t_ip']));  
              $site=$_POST['c_site'];  
              $herramienta=trim(strtoupper($_POST['t_herramienta']));
              $tipo=trim(strtoupper($_POST['t_tipo']));
              $periodo=$_POST['c_periodo'];
              $hora=$_POST['t_hora'];
              
            $backup = new Sap();
            $backup->setTurno($turno);
            $backup->setServidor($servidor);
            $backup->setIp($ip);
            $backup->setSite($site);
            $backup->setHerramienta($herramienta);
            $backup->setTipo($tipo);
            $backup->setIdperiodo($periodo);
            $backup->setHora($hora);
            
            $valor=$backup->grabar($backup);
            
            
            header("location: ../../Vistas/MantenerSOA.php");
            }
        } else {
             $turno=$_POST['c_turno'];  
              $servidor=trim(strtoupper($_POST['t_servidor']));              
              $ip= trim(strtoupper($_POST['t_ip']));  
              $site=$_POST['c_site'];  
              $herramienta=trim(strtoupper($_POST['t_herramienta']));
              $tipo=trim(strtoupper($_POST['t_tipo']));
              $periodo=$_POST['c_periodo'];
              $hora=$_POST['t_hora'];
              
            $backup = new Sap();
          
            $backup->setTurno($turno);
            $backup->setServidor($servidor);
            $backup->setIp($ip);
            $backup->setSite($site);
            $backup->setHerramienta($herramienta);
            $backup->setTipo($tipo);
            $backup->setIdperiodo($periodo);
            $backup->setHora($hora);
            
            $valor=$backup->grabar($backup);
            
            
            header("location: ../../Vistas/MantenerSOA.php");
        }
    } 
    
         else if($accion=='buscar')
    {
           
        $servidor=trim(strtoupper($_POST['t_servidor']));    
        $turno = $_POST['c_turno'];
        $estado = $_POST['c_estado'];
        $periodo = $_POST['c_periodo'];
        
        $backup = new Sap();
        $backup->setServidor($servidor);
        $backup->setTurno($turno);
        $backup->setEstado($estado);
        $backup->setIdperiodo($periodo);
        
        
        $arreglo = $backup->buscar($backup);
        
        $_SESSION['arreglo_buscado_sap'] = $arreglo;
        $_SESSION['accion_soa'] = 'busqueda';
        header("location: ../../Vistas/MantenerSOA.php");
    }
         else if($accion=='buscarid')
     {
        $id = $_POST['idsap'];
        $ob_sap = new Sap();
        $ob_sap->setId($id); 
        $ob_sap->buscarPorId($ob_sap);
        $_SESSION['accion_soa']='editar';
        unset($_SESSION['arreglo_buscado_sap']);
        header("location: ../../Vistas/GuardarSOA.php");
     }
     
         else if($accion == 'anular'){
        $id_actividad_eliminar = $_POST['id_hidden_eliminar'];
        $id_actividad_estado = $_POST['hidden_estado'];
        $ob_actividad= new Actividad();
        $ob_actividad->setId($id_actividad_eliminar);
        $ob_actividad->setEstado($id_actividad_estado);
        $ob_actividad->anular($ob_actividad);
        
        $arreglo=$ob_actividad->listar();
        $_SESSION['arreglo_buscado_actividad'] = $arreglo;
        header("location: ../../Vistas/MantenerActividad.php");
         }
     
        
        else if ($accion == 'cargarTurnosPorSede') {
        unset($_SESSION['arreglo_cargado_actividad']);

        $id_sede = $_POST['hidden_sede'];

        
            $ob_turno = new Turno();
            $ob_turno->setId($id_sede);
            $arreglo = $ob_turno->listar($ob_turno);
            $arreglo2 = $ob_turno->listar_tn($ob_turno);
            LlenarComboTurno($arreglo,$arreglo2);
       
    }
            else if ($accion == 'cargarTurnosPorAram') {
        unset($_SESSION['arreglo_cargado_actividad']);

        $id_sede = $_POST['hidden_sede'];

        
            $ob_turno = new Turno();
            $ob_turno->setId($id_sede);
            $arreglo = $ob_turno->listar_aram($ob_turno);
            LlenarComboTurnoAr($arreglo);
       
    }
    
            else if ($accion == 'cargarSubcatPorCat') {
        unset($_SESSION['arreglo_cargado_actividad']);

        $id_cat = $_POST['hidden_cat'];

        
            $ob_subcat = new Subcategoria();
            $ob_subcat->setIdcat($id_cat);
            $arreglo = $ob_subcat->listar($ob_subcat);
            LlenarComboSubCat($arreglo);
       
    }
   
    
 
} else {
    header("location: ../../Vistas/Registros/MantenerActividad.php");
}

//----------------- funciones ajax -----------

function LlenarComboTurno($datos,$datosb)
{
    if($datos!=null){
     
        echo "<div class='form-group'>";
        echo "<label class='col-sm-2 col-sm-2 control-label'>TURNO</label>";
        echo "<div class='col-sm-10'>";
        echo "<select class='form-control' name='c_turno' id='id_turno'>";
        echo "<option value='0'>--SELECCIONE--</option>";
        
        
        foreach ($datos as $d) {   
            $id = $d['sedeturno_idsedeturno'];
            $nombre = $d['turno_nombre'];
            $horain = $d['turno_horainicio'];
            $horafin = $d['turno_horafin'];
           ?> 

        <option value="<?php echo $id?>" 
            
            <?php 
//            foreach ($_SESSION['arreglo_turnos'] as $t) {
                            if(isset($_SESSION['accion_actividad']) && $_SESSION['accion_actividad']=='editar' ){
                                
                                foreach ($_SESSION['arreglo_turnos'] as $t) {
                                    if($t['sedeturno_idsedeturno']==$id){ echo 'selected';}
                            }}
//            }
                        ?>
                        
                        ><?php echo $nombre.' ('.$horain.' a '.$horafin.')'; ?></option>
            <?php
        }
        echo "</select>";      
        echo "</div> </div>";        
    }
    if($datosb!=null){
     
        echo "<div class='form-group'>";
        echo "<label class='col-sm-2 col-sm-2 control-label'>TURNO 2</label>";
        echo "<div class='col-sm-10'>";
        echo "<select class='form-control' name='c_turno_tn' id='id_turno_tn'>";
        echo "<option value='0'>--SELECCIONE--</option>";
       
        foreach ($datosb as $f) {   
            
            $id = $f['sedeturno_idsedeturno'];
            $nombre = $f['turno_nombre'];
            $horain = $f['turno_horainicio'];
            $horafin = $f['turno_horafin'];
           ?>                                                                    
        <option value="<?php echo $id?>" 
            
            <?php 
//            
                            if(isset($_SESSION['accion_actividad']) && $_SESSION['accion_actividad']=='editar' ){
                                foreach ($_SESSION['arreglo_turnos'] as $t) {
                                if($t['sedeturno_idsedeturno']==$id){ echo 'selected';}
                            }}
//            }
                        ?>
                        
                        ><?php echo $nombre.' ('.$horain.' a '.$horafin.')'; ?></option>
            <?php
        }
        echo "</select>";      
        echo "</div> </div>";        
    }
    
    
}

function LlenarComboTurnoAr($datos)
{
    if($datos!=null){
     
        echo "<div class='form-group'>";
        echo "<label class='col-sm-2 col-sm-2 control-label'>TURNO</label>";
        echo "<div class='col-sm-10'>";
        echo "<select class='form-control' name='c_turno' id='id_turno'>";
        echo "<option value='0'>--SELECCIONE--</option>";
        
        foreach ($datos as $d) {   
            $id = $d['sedeturno_idsedeturno'];
            $nombre = $d['turno_nombre'];
            $horain = $d['turno_horainicio'];
            $horafin = $d['turno_horafin'];
           ?>                                                                    
        <option value="<?php echo $id?>" 
            
            <?php 
//            foreach ($_SESSION['arreglo_turnos'] as $t) {
                            if(isset($_SESSION['accion_actividad']) && $_SESSION['accion_actividad']=='editar' ){
                                foreach ($_SESSION['arreglo_turnos'] as $t) {
                               if($t['sedeturno_idsedeturno']==$id){ echo 'selected';}
                            }}
//            }
                        ?>
                        
                        ><?php echo $nombre.' ('.$horain.' a '.$horafin.')'; ?></option>
            <?php
        }
        echo "</select>";      
        echo "</div> </div>";        
    }   
}
function LlenarComboSubCat($datos)
{
    if($datos!=null){
     
        echo "<div class='form-group'>";
        echo "<label class='col-sm-2 col-sm-2 control-label'>SUBCATEGORIA</label>";
        echo "<div class='col-sm-10'>";
        echo "<select class='form-control' name='c_subcategoria' id='id_subcategoria' required>";
        echo "<option>--SELECCIONE--</option>";
        foreach ($datos as $d) {   
            $id = $d['subcategoria_idsubcategoria'];
            $nombre = $d['subcategoria_nombre'];
           ?>                                                                    
        <option value="<?php echo $id?>" 
            
            <?php 
                            if(isset($_SESSION['accion_actividad']) && $_SESSION['accion_actividad']=='editar' ){
                                if($_SESSION['subcategoria_idsubcategoria']==$id){ echo 'selected';}
                            }
                        ?>
                        
                        ><?php echo $nombre; ?></option>
            <?php
        }
        echo "</select>";      
        echo "</div> </div>";        
    }
}