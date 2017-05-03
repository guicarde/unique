<?php

session_start();


include_once '../../DAO/Conexion.php';
include_once '../../DAO/Registro/Schedule.php';
include_once '../../DAO/Registro/Turno.php';
//include_once '../../DAO/Registro/Schedule_Actividad.php';
//include_once '../../DAO/Registro/Actividad.php';
//include_once '../../DAO/Registro/Subcategoria.php';
//var_dump($productos);
//exit();


$direccionInicio = "location:../../Vistas/index.php";
$direccionMantener = "location: ../../Vistas/MantenerSchedule.php";
$direccionGuardar = "location: ../../Vistas/GenerarSchedule.php";
 
if (isset($_POST['hidden_schedule'])) {
//    $idturnob = 0;
    $accion = $_POST['hidden_schedule'];
//    var_dump($accion);
//    exit();
   
    if ($accion == 'save') {

        if (isset($_SESSION['accion_schedule'])) {
            if ($_SESSION['accion_schedule'] == 'editar') {
                       
                $id = $_POST['idprocedimiento'];
                $nombre_procedimiento = trim(strtoupper($_POST['t_nombre']));
                $nombrearchivo = $_FILES['fileArchivo']['name'];
                move_uploaded_file($_FILES['fileArchivo']['tmp_name'], "Firmas/" . $nombrearchivo);
                
                $procedimiento = new Procedimiento();
          
                $procedimiento->setNombre($nombre_procedimiento);
                $procedimiento->setArchivo($nombrearchivo);
                $procedimiento->setId($id);

                $valor = $procedimiento->actualizar($procedimiento);
                if ($valor == 1) {
                    header($direccionMantener);
                } else {
                    header($direccionGuardar);
                }
            } else {
             
              $turno1= $_POST['c_turno'];  
              $turno2= $_POST['c_turno_tn'];  
              
              if($turno1=='0'){
                  $turnofin = $turno2;
              }else if($turno2=='0') {
                  $turnofin = $turno1;
              }              
              $fecha = $_POST['t_fecha_sc'];
              
            $Schedule = new Schedule();
            $Schedule->setIdsedeturno($turnofin);
            $Schedule->setFecha($fecha);
         
            $resul=$Schedule->grabar($Schedule);
            $arreglo_bus = $_SESSION['arreglo_buscado_actividad_sc']; 
           
             
            foreach ($arreglo_bus as $a) {
            $idactividad= $_POST['t_activ'.$a['actividad_idactividad']];
            $sched_act = new Schedule_Actividad();
            $sched_act->setIdschedule($resul);
            $sched_act->setIdactividad($idactividad);
            $valor=$sched_act->grabar($sched_act);
                
            }
            header("location: ../../Vistas/MantenerSchedule.php");
            }
        } else {
            
            echo '2';
            exit();
        }
    } 
    
         else if($accion=='buscar_act')
    {
           
        $fecha = $_POST['t_fecha_sc'];     
        $idsede = $_POST['c_sede'];
        $idturno = $_POST['c_turno'];
        $idturnob = $_POST['c_turno_tn'];
        $iddia = $_POST['c_dia'];
        
        if($idturno!='0'){
        $ob_schedule = new Schedule();
        $ob_schedule->setFecha($fecha);
        $ob_schedule->setIdsedeturno($idturno);
        $ob_schedule->setIddia($iddia);
         
        $arreglo = $ob_schedule->buscar_actividad($ob_schedule);
        
        $_SESSION['arreglo_buscado_actividad_sc'] = $arreglo;
        $_SESSION['accion_schedule'] = 'busqueda_act';
        $_SESSION['fecha'] = $fecha;
        $_SESSION['id_sede'] = $idsede;
        $_SESSION['id_turno'] = $idturno;
        $_SESSION['id_turnob'] = $idturnob;
        $_SESSION['id_dia'] =  $iddia;
        header("location: ../../Vistas/GenerarSchedule.php");
        }
        else {
            $ob_schedule = new Schedule();
        $ob_schedule->setFecha($fecha);
        $ob_schedule->setIdsedeturno($idturnob);
        $ob_schedule->setIddia($iddia);
         
        $arreglo = $ob_schedule->buscar_actividad($ob_schedule);
        
        $_SESSION['arreglo_buscado_actividad_sc'] = $arreglo;
        $_SESSION['accion_schedule'] = 'busqueda_act';
        $_SESSION['fecha'] = $fecha;
        $_SESSION['id_sede'] = $idsede;
        $_SESSION['id_turno'] = $idturno;
        $_SESSION['id_turnob'] = $idturnob;
        $_SESSION['id_dia'] =  $iddia;
        header("location: ../../Vistas/GenerarSchedule.php");
            
        } 
    }
        else if ($accion == 'seleccionar_schedule')
    {
        unset($_SESSION['arreglo_cargado_schedule']);

        $id_schedule = $_POST['id_schedule'];
        $id_usuario = $_SESSION['id_username'];
        
            $ob_schedule = new Schedule();
            $ob_schedule->setId($id_schedule);
            $ob_schedule->setIdusu($id_usuario);
            
            $resul = $ob_schedule->asignar_operador($ob_schedule);
            
//            $ob_act = new Schedule();
//            $ob_act->setId($id_schedule);
//            $array = $ob_act->buscar_actividad_por_schedule($ob_act);
//            
//            foreach ($array as $a) {
//            $sched_act = new Schedule();
//            $sched_act->setIdschedact($a['schedact_idschedact']);
//            $sched_act->setIdschedope($resul);
//            $sched_act->insertar_act_sc_ope($sched_act);
//                
//            }
        header("location: ../../Vistas/MisSchedules.php");    
       
    }
            else if ($accion == 'ver_det_schedule')
    {
        unset($_SESSION['arreglo_cargado_schedule']);

        $id_schedule = $_POST['id_schedule'];
        $turno =  $_POST['turno'];
        
//        var_dump($turno);
//        exit();
//        
        $ob_actividades = new Schedule();
        $ob_actividades->setId($id_schedule);
        if($turno=='19:00:00')
        {
        $arreglo = $ob_actividades->listar_por_schedule_usu($ob_actividades);
        }else if ($turno=='23:00:00'){
        $arreglo = $ob_actividades->listar_por_schedule_usu_noche($ob_actividades);    
        }else{
         $arreglo = $ob_actividades->listar_por_schedule_usu_dia($ob_actividades);    
        }
        
//        var_dump($arreglo);
//        exit();
        $_SESSION['arreglo_actividad_por_schedule'] = $arreglo;
        $_SESSION['accion_schedule'] = 'detalle_schedule';
        $_SESSION['id_schedule'] = $id_schedule ;
        $_SESSION['hora_turno'] = $turno;
                
            
        header("location: ../../Vistas/DetalleScheduleOpe.php");    
       
    }
                else if ($accion == 'ver_schedule_activo')
    {
        unset($_SESSION['arreglo_cargado_schedule']);

        $id_schedule = $_POST['id_schedule'];
        
        $ob_actividades = new Schedule();
        $ob_actividades->setId($id_schedule);
        $arreglo = $ob_actividades->listar_por_schedule_activo($ob_actividades);
        $_SESSION['arreglo_actividad_por_schedule'] = $arreglo;
        $_SESSION['accion_schedule'] = 'detalle_schedule';
        $_SESSION['id_schedule'] = $id_schedule ;
                
            
        header("location: ../../Vistas/VerScheduleActivo.php");    
       
    }
    
        else if($accion == 'habilitar_finalizar')
    {
        $id = $_POST['id_schedule_act'];
        
        ?>

        <div id="div_finalizatarea<?php echo $id ?>">
            <button type="button" onclick="finalizar_Tarea('<?php echo $id ?>')" 
                    class="btn btn-warning btn-xs"  title="Finalizar Tarea"><i class="fa fa-clock-o"> Finalizar</i></button>
      </div>

        <?php
    }
    
    else if($accion == 'habilitar_comentario_tarea')
    {
        $id = $_POST['id_schedule_act'];
        $hora_inicio = $_POST['hora_inicio'];
        $hora_fin = $_POST['hora_fin'];
        
        ?>

        <!--<form method='POST' action="../Controles/Registro/CSchedule.php" >-->
            <textarea name="txt_comentario" id="txt_comentario<?php echo $id; ?>">OK</textarea>
            <input type="hidden" name="horainicio" id="horainicio<?php echo $id ?>" value="<?php echo $hora_inicio ?>">
            <input type="hidden" name="horafinal" id="horafinal<?php echo $id ?>" value="<?php echo $hora_fin ?>">
            <select class="form-control" id="c_estado_tar<?php echo $id; ?>" name="c_estado_tar" required style="font-size:5pt;">                                                            
                <option value="1">OK</option>
                <option value="2">FALLIDO</option>
                <option value="3">NA</option>
            </select>
            <br>
            <button type="button" class="btn btn-theme03 btn-xs" 
                    onclick="comentario_Tarea('<?php echo $id ?>')" >
                <i class="fa fa-check-square"></i> GUARDAR</button>
        <!--</form>-->

        <?php
        exit();
    }
    
               else if ($accion == 'iniciar_tarea')
    {
          $id_schedule_act = $_POST['id_schedule_act'];
          $id_usuario = $_SESSION['id_username'];
          $id_schedule = $_SESSION['id_schedule'];
          $turno =  $_SESSION['hora_turno'];
         
          $ob_iniciar = new Schedule();
          $ob_iniciar->setIdschedact($id_schedule_act);
          $ob_iniciar->setIdusu($id_usuario);
          $ob_iniciar->iniciar_tarea($ob_iniciar);
          
          
          //*** marcar hora actual ***
          date_default_timezone_set('America/Lima');
          $hora = date('G:i:s');
          
          ?>

           <div class="alert alert-warning"><?php echo $hora;?></div> 
           <input type="hidden" id="id_marcado_hora_inicio<?php echo $id_schedule_act ?>" value="<?php echo $hora ?>">
           
          <?php
          
          exit();
       
    }

                   else if ($accion == 'finalizar_tarea')
    {
         $id_schedule_act = $_POST['id_schedule_act'];
        $id_usuario = $_SESSION['id_username'];
        
          $ob_iniciar = new Schedule();
          $ob_iniciar->setIdschedact($id_schedule_act);
          $ob_iniciar->setIdusu($id_usuario);
          $ob_iniciar->finalizar_tarea($ob_iniciar);
          
          $ob_actividades = new Schedule();
          $ob_actividades->setId($_SESSION['id_schedule']);
          $arreglo = $ob_actividades->listar_por_schedule_usu($ob_actividades);
          $_SESSION['arreglo_actividad_por_schedule'] = $arreglo;
          $_SESSION['accion_schedule'] = 'detalle_schedule';  
                
          //*** marcar hora actual ***
          date_default_timezone_set('America/Lima');
          $hora = date('G:i:s');
          
          ?>

           <div class="alert alert-success"><?php echo $hora;?></div> 
           <input type="hidden" id="id_marcado_hora_fin<?php echo $id_schedule_act ?>" value="<?php echo $hora ?>">
           
          <?php    
       
    }

                    else if ($accion == 'insertar_comentario')
    {
      $id_schedule_act = $_POST['id_schedule_act'];
        $comentario =  trim(strtoupper($_POST['txt_comentario']));
        $horainicio = $_POST['horainicio'];
        $horafinal = $_POST['horafinal'];
        $id_usuario = $_SESSION['id_username'];
        $est_tarea = $_POST['c_estado_tar'];
        
          $ob_comentario = new Schedule();
          $ob_comentario->setIdschedact($id_schedule_act);
          $ob_comentario->setComentario($comentario);
          $ob_comentario->setHorain($horainicio);
          $ob_comentario->setHorafin($horafinal);
          $ob_comentario->setIdusu($id_usuario);
          $ob_comentario->setEstado($est_tarea);
          $ob_comentario->insertar_comentario($ob_comentario);
          
          ?>
           <script>alert("Registrado correctamente")</script>
            <textarea name="txt_comentario" id="txt_comentario<?php echo $id_schedule_act;?>"><?php if($comentario!=''){ echo $comentario; }?></textarea>
            <input type="hidden" name="horainicio" id="horainicio<?php echo $id_schedule_act;?>" value="<?php echo date('H:i:s',strtotime($horainicio))?>">
            <input type="hidden" name="horafinal" id="horafinal<?php echo $id_schedule_act;?>" value="<?php echo date('H:i:s',strtotime($horafinal))?>">
            <select class="form-control" name="c_estado_tar" id="c_estado_tar<?php echo $id_schedule_act;?>" required style="font-size:5pt;">                                                            
                <option value="1" <?php if($est_tarea=='1') echo 'selected';?>>OK</option>
                <option value="2" <?php if($est_tarea=='2') echo 'selected';?>>FALLIDO</option>
                <option value="3" <?php if($est_tarea=='3') echo 'selected';?>>NA</option>
            </select>
            <button type="button"
                    onclick="comentario_Tarea('<?php echo $id_schedule_act;?>')"
                    class="btn btn-theme03 btn-xs"><i class="fa fa-check-square"></i> GUARDAR</button>
           <?php       
    }

        else if ($accion == 'guardarscheduleope')
    {
         $nombrearchivo = $_FILES['fileArchivo']['name'];
          move_uploaded_file($_FILES['fileArchivo']['tmp_name'], "../Firmas/" . $nombrearchivo);
          $id_schedule=$_SESSION['id_schedule'];
          
          $ob_cerrar_schedule = new Schedule();
          $ob_cerrar_schedule->setId($id_schedule);
          $ob_cerrar_schedule->setFirma($nombrearchivo);
          $ob_cerrar_schedule->cerrar_schedule($ob_cerrar_schedule);
          
          
            
          header("location: ../../Vistas/MisSchedules.php");    
       
    }

    
        else if ($accion == 'filtrarschedule')
    {
        $estado = $_POST['c_estado'];  
        $descripcion = trim(strtoupper($_POST['t_descripcion']));      
        $idscheduleact = $_SESSION['id_schedule'];
        $turno = $_SESSION['hora_turno'];     
        
        $ob_filtros = new Schedule();
        $ob_filtros->setEstado($estado);
        $ob_filtros->setDescripcion($descripcion);
        $ob_filtros->setId($idscheduleact);
         if($turno=='19:00:00')
            {
            $arreglo = $ob_filtros->filtrar_por_schedule_usu_tarde_noche($ob_filtros);
            }else if ($turno=='23:00:00'){
            $arreglo = $ob_filtros->filtrar_por_schedule_usu_noche($ob_filtros);
            }else{
            $arreglo = $ob_filtros->filtrar_por_schedule_usu_dia($ob_filtros);    
            }
        
        $_SESSION['accion_schedule'] = 'filtro_schedule';
        $_SESSION['arreglo_filtro_schedule'] = $arreglo;
       
        header("location: ../../Vistas/DetalleScheduleOpe.php");    
            
    }
          else if ($accion == 'filtrarscheduleactivo')
    {
        $estado = $_POST['c_estado'];  
        $descripcion = trim(strtoupper($_POST['t_descripcion']));      
        $idscheduleact = $_SESSION['id_schedule'];
        $turno = $_SESSION['hora_turno'];     
        
        $ob_filtros = new Schedule();
        $ob_filtros->setEstado($estado);
        $ob_filtros->setDescripcion($descripcion);
        $ob_filtros->setId($idscheduleact);
         if($turno=='19:00:00')
            {
            $arreglo = $ob_filtros->filtrar_por_schedule_usu_tarde_noche($ob_filtros);
            }else if ($turno=='23:00:00'){
            $arreglo = $ob_filtros->filtrar_por_schedule_usu_noche($ob_filtros);
            }else{
            $arreglo = $ob_filtros->filtrar_por_schedule_usu_dia($ob_filtros);    
            }
        $_SESSION['accion_schedule'] = 'filtro_schedule_activo';
        $_SESSION['arreglo_filtro_schedule'] = $arreglo;
       
        header("location: ../../Vistas/VerScheduleActivo.php");    
            
    }
        else if ($accion == 'buscar_finalizados')
    {
        $operador = $_POST['c_operador'];    
        $fecha_schedule = $_POST['t_fecha_reg']; 
           
        
        $ob_finalizados = new Schedule();
        $ob_finalizados->setIdusu($operador);
        $ob_finalizados->setFecha($fecha_schedule);
        $arreglo = $ob_finalizados->buscar_finalizados($ob_finalizados);    
           
        $_SESSION['arreglo_buscado_schedule_finalizado'] = $arreglo;
        $_SESSION['accion_schedule_finalizado'] = 'busqueda';
        header("location: ../../Vistas/SchedulesFinalizados.php");    
            
    }
} else {
    header("location: ../../Vistas/MantenerSchedule.php");
}

//----------------- funciones ajax -----------


