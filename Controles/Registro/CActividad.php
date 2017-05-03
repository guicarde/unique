<?php

session_start();

include_once '../../DAO/Conexion.php';
include_once '../../DAO/Registro/Turno.php';
include_once '../../DAO/Registro/Actividad.php';


$direccionInicio = "location:../../Vistas/index.php";
$direccionMantener = "location: ../../Vistas/MantenerActividad.php";
$direccionGuardar = "location: ../../Vistas/GuardarActividad.php";
 
if (isset($_POST['hidden_actividad'])) {
    $idturnob = null;
    $accion = $_POST['hidden_actividad'];
//    var_dump($accion);
//    exit();
     
    if ($accion == 'save') {

        if (isset($_SESSION['accion_actividad']))  {
            if ($_SESSION['accion_actividad'] == 'editar') {
              $id = $_POST['idact'];
              $idturnob=$_POST['c_turnob'];  
              $idturno=$_POST['c_turno'];              
              $team= $_POST['c_team'];      
              $horaejec= $_POST['t_hora'];
              $idproced=$_POST['c_procedimiento'];
              $servidor=trim(strtoupper($_POST['ta_servidor']));
              $descripcion=trim(strtoupper($_POST['ta_descripcion']));
              $tws = $_POST['c_tws'];
              
                      
            $Actividad = new Actividad();
            $Actividad->setId($id);
            $Actividad->setTeam($team);
            $Actividad->setHoraejec($horaejec);
            $Actividad->setDescripcion($descripcion);
            $Actividad->setServidor($servidor);            
            $Actividad->setIdprocedimiento($idproced);
            $Actividad->setTws($tws);
            $resul=$Actividad->actualizar($Actividad);
            
            $ob_act_tur = new Actividad();
            $ob_act_tur->setId($resul);
            $ob_act_tur->setIdturno($idturno);
            $valor = $ob_act_tur->grabar_turno($ob_act_tur);
            
            if($idturnob!=null){
            $ob_act_tur = new Actividad();
            $ob_act_tur->setId($resul);
            $ob_act_tur->setIdturno($idturnob);
            $valor = $ob_act_tur->grabar_turno($ob_act_tur);    
            }
            
            if(!empty($_POST['check_list'])) {
                    foreach($_POST['check_list'] as $selected) {
                    $ob_actividad = new Actividad();
                    
                    $ob_actividad->setId($resul);
                    $ob_actividad->setIddia($selected);                
                    $valor = $ob_actividad->grabar_dia($ob_actividad);
                    }
                    }
            header("location: ../../Vistas/MantenerActividad.php");
            } else {
                
              $idturnob=$_POST['c_turnob'];  
              $idturno=$_POST['c_turno'];              
              $team= $_POST['c_team'];      
              $horaejec= $_POST['t_hora'];
              $idproced=$_POST['c_procedimiento'];
              $servidor=trim(strtoupper($_POST['ta_servidor']));
              $descripcion=trim(strtoupper($_POST['ta_descripcion']));
              $tws=$_POST['c_tws'];
              
                                
                      
            $Actividad = new Actividad();
          
            $Actividad->setTeam($team);
            $Actividad->setHoraejec($horaejec);
            $Actividad->setDescripcion($descripcion);
            $Actividad->setServidor($servidor);            
            $Actividad->setIdprocedimiento($idproced);
            $Actividad->setTws($tws);
            $resul=$Actividad->grabar($Actividad);
            
            $ob_act_tur = new Actividad();
            $ob_act_tur->setId($resul);
            $ob_act_tur->setIdturno($idturno);
            $valor = $ob_act_tur->grabar_turno($ob_act_tur);
            
            if($idturnob!=null){
            $ob_act_tur = new Actividad();
            $ob_act_tur->setId($resul);
            $ob_act_tur->setIdturno($idturnob);
            $valor = $ob_act_tur->grabar_turno($ob_act_tur);    
            }
            
            if(!empty($_POST['check_list'])) {
                    foreach($_POST['check_list'] as $selected) {
                    $ob_actividad = new Actividad();
                    
                    $ob_actividad->setId($resul);
                    $ob_actividad->setIddia($selected);                
                    $valor = $ob_actividad->grabar_dia($ob_actividad);
                    }
                    }
            header("location: ../../Vistas/MantenerActividad.php");
            }
        } else {
             $idturnob=$_POST['c_turnob'];  
              $idturno=$_POST['c_turno'];              
              $team= $_POST['c_team'];      
              $horaejec= $_POST['t_hora'];
              $idproced=$_POST['c_procedimiento'];
              $servidor=trim(strtoupper($_POST['ta_servidor']));
              $descripcion=trim(strtoupper($_POST['ta_descripcion']));
              $tws=$_POST['c_tws'];
              
                                
                      
            $Actividad = new Actividad();
          
            $Actividad->setTeam($team);
            $Actividad->setHoraejec($horaejec);
            $Actividad->setDescripcion($descripcion);
            $Actividad->setServidor($servidor);            
            $Actividad->setIdprocedimiento($idproced);
            $Actividad->setTws($tws);
            $resul=$Actividad->grabar($Actividad);
            
            $ob_act_tur = new Actividad();
            $ob_act_tur->setId($resul);
            $ob_act_tur->setIdturno($idturno);
            $valor = $ob_act_tur->grabar_turno($ob_act_tur);
            
            if($idturnob!=null){
            $ob_act_tur = new Actividad();
            $ob_act_tur->setId($resul);
            $ob_act_tur->setIdturno($idturnob);
            $valor = $ob_act_tur->grabar_turno($ob_act_tur);    
            }
            
            if(!empty($_POST['check_list'])) {
                    foreach($_POST['check_list'] as $selected) {
                    $ob_actividad = new Actividad();
                    
                    $ob_actividad->setId($resul);
                    $ob_actividad->setIddia($selected);                
                    $valor = $ob_actividad->grabar_dia($ob_actividad);
                    }
                    }
            header("location: ../../Vistas/MantenerActividad.php");
        }
    } 
    
         else if($accion=='buscar')
    {
           
        $descripcion=trim(strtoupper($_POST['t_actividad']));    
        $estado = $_POST['c_estado'];
        
        $ob_actividad = new Actividad();
        $ob_actividad->setDescripcion($descripcion);
        $ob_actividad->setEstado($estado);
         
        $arreglo = $ob_actividad->buscar($ob_actividad);
        
        $_SESSION['arreglo_buscado_actividad'] = $arreglo;
        $_SESSION['accion_actividad'] = 'busqueda';
        header("location: ../../Vistas/MantenerActividad.php");
    }
         else if($accion=='buscarid')
     {
        $id_actividad = $_POST['idactividad'];
        $actividad = new Actividad();
        $actividad->setId($id_actividad ); 
        $actividad->buscarPorId($actividad);
        
        $turno = new Actividad();
        $turno->setId($id_actividad); 
        $turnos = $turno->turno_por_actividad($turno); 
        
        $dia= new Actividad();
        $dia->setId($id_actividad);
        $dias= $dia->dias_por_actividad($dia);
        
//        var_dump($dias);
//        exit();
        
        unset($_SESSION['arreglo_buscado_actividad']);
        $_SESSION['arreglo_turnos'] = $turnos;
        $_SESSION['arreglo_dias'] = $dias;
        $_SESSION['accion_actividad']='editar';  
        header("location: ../../Vistas/GuardarActividad.php");
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