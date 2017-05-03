<?php
session_start();
?>
<?php

include_once '../../DAO/Conexion.php';
include_once '../../DAO/Registro/Requerimiento.php';

$direccionInicio = "location:../../Vistas/index.php";
$direccionMantener = "location: ../../Vistas/MantenerRequerimiento.php";
$direccionGuardar = "location: ../../Vistas/GuardarRequerimiento.php";


if (isset($_POST['hidden_requerimiento'])) {

    $accion = $_POST['hidden_requerimiento'];
    $fecha_ejecucion=null;
//    var_dump($accion);
//    exit();

    if ($accion == 'save') {

        if (isset($_SESSION['accion_requerimiento'])) {
            if ($_SESSION['accion_requerimiento'] == 'editar') {
              $id= $_POST['idreq']; 
               $nombrearchivo = $_FILES['fileArchivo']['name'];
            move_uploaded_file($_FILES['fileArchivo']['tmp_name'], "../Formatos/" . $nombrearchivo);
            
            $fecha_formato = $_POST['t_fecha_formato'];
            $turno = $_POST['c_turno'];  
            $operador = trim(strtoupper($_POST['c_operador']));  
            $hora_solicitud = $_POST['t_hora_solicitud'];  
            $ticket =  trim(strtoupper($_POST['t_ticket']));  
            $pais = $_POST['c_pais'];
            $tipo = $_POST['c_tipo'];  
            $menu = $_POST['c_menu'];  
            $detalle = trim(strtoupper($_POST['t_detalle']));  
            $fecha_ejecucion = $_POST['t_fecha_ejecucion'];  
            $hora_inicio = $_POST['t_hora_inicio'];
            $inicio_tsm = $_POST['t_hora_inicio_tsm'];  
            $fin_tsm = $_POST['t_hora_fin_tsm'];  
            $duracion_tsm = $_POST['t_hora_duracion_tsm'];  
            $inicio_dia = $_POST['t_hora_inicio_dia'];  
            $fin_dia = $_POST['t_hora_fin_dia'];
            $duracion_dia = $_POST['t_hora_duracion_dia'];  
            $inicio_desa = $_POST['t_hora_inicio_desa'];  
            $fin_desa = $_POST['t_hora_fin_desa'];  
            $duracion_desa = $_POST['t_hora_duracion_desa'];  
            $inicio_cond = $_POST['t_hora_inicio_condiciones'];
            $fin_cond = $_POST['t_hora_fin_condiciones'];  
            $duracion_cond = $_POST['t_hora_duracion_condiciones'];  
            $inicio_comi = $_POST['t_hora_inicio_comisiones'];  
            $fin_comi = $_POST['t_hora_fin_comisiones'];  
            $duracion_comi = $_POST['t_hora_duracion_comisiones'];
            $hora_fin = $_POST['t_hora_fin'];  
            $duracion = $_POST['t_duracion'];  
            $team = $_POST['c_team'];  
            $estado = $_POST['c_estado'];  
            $incidente = $_POST['t_incidente'];
            $tamano = $_POST['t_tamano'];  
            $cantidad = $_POST['t_cantidad'];  
            $idusu = $_SESSION['id_username']; 
                                       
            $ob_requerimiento = new Requerimiento();
            $ob_requerimiento->setId($id);
            $ob_requerimiento->setFecha_formato($fecha_formato);
            $ob_requerimiento->setTurno($turno);
            $ob_requerimiento->setOperador($operador);
            $ob_requerimiento->setHora_solicitud($hora_solicitud);
            $ob_requerimiento->setTicket($ticket);
            $ob_requerimiento->setPais($pais);
            $ob_requerimiento->setTipo($tipo);
            $ob_requerimiento->setMenu($menu);
            $ob_requerimiento->setDetalle($detalle);
            $ob_requerimiento->setFecha_ejecucion($fecha_ejecucion);
            $ob_requerimiento->setHora_inicio($hora_inicio);
            $ob_requerimiento->setInicio_tsm($inicio_tsm);
            $ob_requerimiento->setFin_tsm($fin_tsm);
            $ob_requerimiento->setDuracion_tsm($duracion_tsm);
            $ob_requerimiento->setInicio_dia($inicio_dia);
            $ob_requerimiento->setFin_dia($fin_dia);
            $ob_requerimiento->setDuracion_dia($duracion_dia);
            $ob_requerimiento->setInicio_desa($inicio_desa);
            $ob_requerimiento->setFin_desa($fin_desa);
            $ob_requerimiento->setDuracion_desa($duracion_desa);
            $ob_requerimiento->setInicio_cond($inicio_cond);
            $ob_requerimiento->setFin_cond($fin_cond);
            $ob_requerimiento->setDuracion_cond($duracion_cond);
            $ob_requerimiento->setInicio_comi($inicio_comi);
            $ob_requerimiento->setFin_comi($fin_comi);
            $ob_requerimiento->setDuracion_comi($duracion_comi);
            $ob_requerimiento->setHora_fin($hora_fin);
            $ob_requerimiento->setHora_duracion($duracion);
            $ob_requerimiento->setTeam($team);
            $ob_requerimiento->setEstado($estado);
            $ob_requerimiento->setIncidente($incidente);
            $ob_requerimiento->setTamano($tamano);
            $ob_requerimiento->setCantidad($cantidad);
            $ob_requerimiento->setIdusu($idusu);
            $ob_requerimiento->setArchivo($nombrearchivo);
            
            
            
            $valor=$ob_requerimiento->actualizar($ob_requerimiento);
            
                      
            header("location: ../../Vistas/MantenerRequerimiento.php");
            } else {
                
            if(($_FILES['fileArchivo']['name'])==""){                       
                      $nombrearchivo = " ";
           }else 
            {    
            $nombrearchivo = $_FILES['fileArchivo']['name'];
            move_uploaded_file($_FILES['fileArchivo']['tmp_name'], "../Formatos/" . $nombrearchivo);
            } 
            $fecha_formato = $_POST['t_fecha_formato'];
            $turno = $_POST['c_turno'];  
            $operador = trim(strtoupper($_POST['c_operador']));  
            $hora_solicitud = $_POST['t_hora_solicitud'];  
            $ticket =  trim(strtoupper($_POST['t_ticket']));  
            $pais = $_POST['c_pais'];
            $tipo = $_POST['c_tipo'];  
            $menu = $_POST['c_menu'];  
            $detalle = trim(strtoupper($_POST['t_detalle']));  
            $fecha_ejecucion = $_POST['t_fecha_ejecucion'];  
            $hora_inicio = $_POST['t_hora_inicio'];
            $inicio_tsm = $_POST['t_hora_inicio_tsm'];  
            $fin_tsm = $_POST['t_hora_fin_tsm'];  
            $duracion_tsm = $_POST['t_hora_duracion_tsm'];  
            $inicio_dia = $_POST['t_hora_inicio_dia'];  
            $fin_dia = $_POST['t_hora_fin_dia'];
            $duracion_dia = $_POST['t_hora_duracion_dia'];  
            $inicio_desa = $_POST['t_hora_inicio_desa'];  
            $fin_desa = $_POST['t_hora_fin_desa'];  
            $duracion_desa = $_POST['t_hora_duracion_desa'];  
            $inicio_cond = $_POST['t_hora_inicio_condiciones'];
            $fin_cond = $_POST['t_hora_fin_condiciones'];  
            $duracion_cond = $_POST['t_hora_duracion_condiciones'];  
            $inicio_comi = $_POST['t_hora_inicio_comisiones'];  
            $fin_comi = $_POST['t_hora_fin_comisiones'];  
            $duracion_comi = $_POST['t_hora_duracion_comisiones'];
            $hora_fin = $_POST['t_hora_fin'];  
            $duracion = $_POST['t_duracion'];  
            $team = $_POST['c_team'];  
            $estado = $_POST['c_estado'];  
            $incidente = $_POST['t_incidente'];
            $tamano = $_POST['t_tamano'];  
            $cantidad = $_POST['t_cantidad'];  
            $idusu = $_SESSION['id_username']; 
                                       
            $ob_requerimiento = new Requerimiento();
            $ob_requerimiento->setFecha_formato($fecha_formato);
            $ob_requerimiento->setTurno($turno);
            $ob_requerimiento->setOperador($operador);
            $ob_requerimiento->setHora_solicitud($hora_solicitud);
            $ob_requerimiento->setTicket($ticket);
            $ob_requerimiento->setPais($pais);
            $ob_requerimiento->setTipo($tipo);
            $ob_requerimiento->setMenu($menu);
            $ob_requerimiento->setDetalle($detalle);
            $ob_requerimiento->setFecha_ejecucion($fecha_ejecucion);
            $ob_requerimiento->setHora_inicio($hora_inicio);
            $ob_requerimiento->setInicio_tsm($inicio_tsm);
            $ob_requerimiento->setFin_tsm($fin_tsm);
            $ob_requerimiento->setDuracion_tsm($duracion_tsm);
            $ob_requerimiento->setInicio_dia($inicio_dia);
            $ob_requerimiento->setFin_dia($fin_dia);
            $ob_requerimiento->setDuracion_dia($duracion_dia);
            $ob_requerimiento->setInicio_desa($inicio_desa);
            $ob_requerimiento->setFin_desa($fin_desa);
            $ob_requerimiento->setDuracion_desa($duracion_desa);
            $ob_requerimiento->setInicio_cond($inicio_cond);
            $ob_requerimiento->setFin_cond($fin_cond);
            $ob_requerimiento->setDuracion_cond($duracion_cond);
            $ob_requerimiento->setInicio_comi($inicio_comi);
            $ob_requerimiento->setFin_comi($fin_comi);
            $ob_requerimiento->setDuracion_comi($duracion_comi);
            $ob_requerimiento->setHora_fin($hora_fin);
            $ob_requerimiento->setHora_duracion($duracion);
            $ob_requerimiento->setTeam($team);
            $ob_requerimiento->setEstado($estado);
            $ob_requerimiento->setIncidente($incidente);
            $ob_requerimiento->setTamano($tamano);
            $ob_requerimiento->setCantidad($cantidad);
            $ob_requerimiento->setIdusu($idusu);
            $ob_requerimiento->setArchivo($nombrearchivo);
            
            
            
            $valor=$ob_requerimiento->grabar($ob_requerimiento);
            
                      
            header("location: ../../Vistas/MantenerRequerimiento.php");
            }
        } else {
            if(($_FILES['fileArchivo']['name'])==""){                       
                      $nombrearchivo = " ";
           }else 
            {    
            $nombrearchivo = $_FILES['fileArchivo']['name'];
            move_uploaded_file($_FILES['fileArchivo']['tmp_name'], "../Formatos/" . $nombrearchivo);
            }
            
            $fecha_formato = $_POST['t_fecha_formato'];
            $turno = $_POST['c_turno'];  
            $operador = trim(strtoupper($_POST['c_operador']));  
            $hora_solicitud = $_POST['t_hora_solicitud'];  
            $ticket =  trim(strtoupper($_POST['t_ticket']));  
            $pais = $_POST['c_pais'];
            $tipo = $_POST['c_tipo'];  
            $menu = $_POST['c_menu'];  
            $detalle = trim(strtoupper($_POST['t_detalle']));  
            $fecha_ejecucion = $_POST['t_fecha_ejecucion'];  
            $hora_inicio = $_POST['t_hora_inicio'];
            $inicio_tsm = $_POST['t_hora_inicio_tsm'];  
            $fin_tsm = $_POST['t_hora_fin_tsm'];  
            $duracion_tsm = $_POST['t_hora_duracion_tsm'];  
            $inicio_dia = $_POST['t_hora_inicio_dia'];  
            $fin_dia = $_POST['t_hora_fin_dia'];
            $duracion_dia = $_POST['t_hora_duracion_dia'];  
            $inicio_desa = $_POST['t_hora_inicio_desa'];  
            $fin_desa = $_POST['t_hora_fin_desa'];  
            $duracion_desa = $_POST['t_hora_duracion_desa'];  
            $inicio_cond = $_POST['t_hora_inicio_condiciones'];
            $fin_cond = $_POST['t_hora_fin_condiciones'];  
            $duracion_cond = $_POST['t_hora_duracion_condiciones'];  
            $inicio_comi = $_POST['t_hora_inicio_comisiones'];  
            $fin_comi = $_POST['t_hora_fin_comisiones'];  
            $duracion_comi = $_POST['t_hora_duracion_comisiones'];
            $hora_fin = $_POST['t_hora_fin'];  
            $duracion = $_POST['t_duracion'];  
            $team = $_POST['c_team'];  
            $estado = $_POST['c_estado'];  
            $incidente = $_POST['t_incidente'];
            $tamano = $_POST['t_tamano'];  
            $cantidad = $_POST['t_cantidad'];  
            $idusu = $_SESSION['id_username']; 
                                       
            $ob_requerimiento = new Requerimiento();
            $ob_requerimiento->setFecha_formato($fecha_formato);
            $ob_requerimiento->setTurno($turno);
            $ob_requerimiento->setOperador($operador);
            $ob_requerimiento->setHora_solicitud($hora_solicitud);
            $ob_requerimiento->setTicket($ticket);
            $ob_requerimiento->setPais($pais);
            $ob_requerimiento->setTipo($tipo);
            $ob_requerimiento->setMenu($menu);
            $ob_requerimiento->setDetalle($detalle);
            $ob_requerimiento->setFecha_ejecucion($fecha_ejecucion);
            $ob_requerimiento->setHora_inicio($hora_inicio);
            $ob_requerimiento->setInicio_tsm($inicio_tsm);
            $ob_requerimiento->setFin_tsm($fin_tsm);
            $ob_requerimiento->setDuracion_tsm($duracion_tsm);
            $ob_requerimiento->setInicio_dia($inicio_dia);
            $ob_requerimiento->setFin_dia($fin_dia);
            $ob_requerimiento->setDuracion_dia($duracion_dia);
            $ob_requerimiento->setInicio_desa($inicio_desa);
            $ob_requerimiento->setFin_desa($fin_desa);
            $ob_requerimiento->setDuracion_desa($duracion_desa);
            $ob_requerimiento->setInicio_cond($inicio_cond);
            $ob_requerimiento->setFin_cond($fin_cond);
            $ob_requerimiento->setDuracion_cond($duracion_cond);
            $ob_requerimiento->setInicio_comi($inicio_comi);
            $ob_requerimiento->setFin_comi($fin_comi);
            $ob_requerimiento->setDuracion_comi($duracion_comi);
            $ob_requerimiento->setHora_fin($hora_fin);
            $ob_requerimiento->setHora_duracion($duracion);
            $ob_requerimiento->setTeam($team);
            $ob_requerimiento->setEstado($estado);
            $ob_requerimiento->setIncidente($incidente);
            $ob_requerimiento->setTamano($tamano);
            $ob_requerimiento->setCantidad($cantidad);
            $ob_requerimiento->setIdusu($idusu);
            $ob_requerimiento->setArchivo($nombrearchivo);
            
            
            
            $valor=$ob_requerimiento->grabar($ob_requerimiento);
            
                      
            header("location: ../../Vistas/MantenerRequerimiento.php");
        }
    } 
    
     else if($accion=='buscarid')
     {
        $id_dato = $_POST['idrequerimiento'];
        $ob_req = new Requerimiento();
        $ob_req->setId($id_dato); 
        $ob_req->buscarPorId($ob_req);
        $_SESSION['accion_requerimiento']='editar';
        unset($_SESSION['arreglo_buscado_requerimiento']);
        header("location: ../../Vistas/GuardarRequerimiento.php");
     }
     else if($accion=='dashboard')
     {
        $menu = $_POST['c_menu'];
        $ob_dashboard = new Requerimiento();
        $ob_dashboard->setMenu($menu); 
        $ob_dashboard->Dashboard($ob_dashboard);
       
        unset($_SESSION['arreglo_buscado_requerimiento']);
        header("location: ../../Vistas/DashboardRequerimiento.php");
     }
     
     else if($accion=='buscar')
    {
        $operador= $_POST['c_operador'];
        $pais= $_POST['c_pais'];        
        $tipo= $_POST['c_tipo'];
        $menu= $_POST['c_menu'];
        $estado= $_POST['c_estado'];
        $fecha_formato= $_POST['t_fecha_formato'];                 
        
        $ob_requerimiento = new Requerimiento();
        $ob_requerimiento->setOperador($operador);
        $ob_requerimiento->setPais($pais);
        $ob_requerimiento->setTipo($tipo);
        $ob_requerimiento->setMenu($menu);
        $ob_requerimiento->setEstado($estado);
        $ob_requerimiento->setFecha_formato($fecha_formato);
         
        $arreglo = $ob_requerimiento->buscar($ob_requerimiento);
        
        $_SESSION['arreglo_buscado_requerimiento'] = $arreglo;
        $_SESSION['accion_requerimiento'] = 'busqueda';
        header("location: ../../Vistas/MantenerRequerimiento.php");
    }
        
    else if($accion == 'anular'){
        $id_categoria_eliminar = $_POST['id_hidden_eliminar'];
        $id_categoria_estado = $_POST['hidden_estado'];
        $ob_categoria = new Categoria();
        $ob_categoria->setId($id_categoria_eliminar);
        $ob_categoria->setEstado($id_categoria_estado);
        $ob_categoria->anular($ob_categoria);
        
        $arreglo=$ob_categoria->listar();
        $_SESSION['arreglo_buscado_categoria'] = $arreglo;
        header("location: ../../Vistas/MantenerCategoria.php");
         }
//         
//     else if($accion == 'cancelar_guardar'){
//         
//        //quita datos de la sesion
//        $_SESSION['usu_idusu']="";
//        $_SESSION['usu_nombres_usuario']="";
//        $_SESSION['usu_apellidos_usuario']=""; 
//        $_SESSION['usu_numdoc_usuario']="";
//        $_SESSION['usu_nom_usuario']="";
//        $_SESSION['usu_contrasenia']="";
//        $_SESSION['usu_estado']="";
//        $_SESSION['usu_email_institucional']="";
//        $_SESSION['usu_fecharegistro']="";
//        $_SESSION['rol_idrol']="";
//        unset($_SESSION['arreglo_buscado_usuario']);
//        unset($_SESSION['accion_proveedor']);
//        header("location: ../../Vistas/MantenerUsuario.php");
//    }
//     else if($accion == 'agregar_mantenimiento'){
//        //quita datos de la sesion
//        $_SESSION['usu_idusu']="";
//        $_SESSION['usu_nombres_usuario']="";
//        $_SESSION['usu_apellidos_usuario']=""; 
//        $_SESSION['usu_tipdoc_usuario']=""; 
//        $_SESSION['usu_numdoc_usuario']="";
//        $_SESSION['usu_nom_usuario']="";
//        $_SESSION['usu_contrasenia']="";
//        $_SESSION['usu_estado']="";
//        $_SESSION['usu_email_institucional']="";
//        $_SESSION['usu_fecharegistro']="";
//        
//        unset($_SESSION['arreglo_buscado_usuario']);
//        unset($_SESSION['accion_proveedor']);
//        header("location: ../../Vistas/Registros/serv_GuardarUsuario.php");
//    }
//    else if($accion == 'eliminar')
//    {
//        $id_usuario_eliminar = $_POST['id_hidden_eliminar'];
//        $nombre_usuario_eliminar = $_POST['nombre_hidden_eliminar'];
//        $ob_usuario = new Usuario();
//        $ob_usuario->setId($id_usuario_eliminar);
//        $ob_usuario->setNombreusu($nombre_usuario_eliminar);
//        $contador=$ob_usuario->eliminar($ob_usuario);
//        header($direccionMantener);   
//           
//    }
//    else if($accion == 'irInicio'){
//        //quita datos de la sesion
//        $_SESSION['usu_idusu']="";
//        $_SESSION['usu_nombres_usuario']="";
//        $_SESSION['usu_apellidos_usuario']=""; 
//        $_SESSION['usu_tipdoc_usuario']=""; 
//        $_SESSION['usu_numdoc_usuario']="";
//        $_SESSION['usu_nom_usuario']="";
//        $_SESSION['usu_contrasenia']="";
//        $_SESSION['usu_estado']="";
//        $_SESSION['usu_email_institucional']="";
//        $_SESSION['usu_fecharegistro']="";
//        
//        unset($_SESSION['arreglo_buscado_usuario']);
//        unset($_SESSION['accion_proveedor']);
//        header($direccionInicio);
//    }
//    else if($accion == 'irMantener'){
//        //quita datos de la sesion
//        $_SESSION['usu_idusu']="";
//        $_SESSION['usu_nombres_usuario']="";
//        $_SESSION['usu_apellidos_usuario']=""; 
//        $_SESSION['usu_tipdoc_usuario']=""; 
//        $_SESSION['usu_numdoc_usuario']="";
//        $_SESSION['usu_nom_usuario']="";
//        $_SESSION['usu_contrasenia']="";
//        $_SESSION['usu_estado']="";
//        $_SESSION['usu_email_institucional']="";
//        $_SESSION['usu_fecharegistro']="";
//        
//        unset($_SESSION['arreglo_buscado_usuario']);
//        unset($_SESSION['accion_proveedor']);
//        header($direccionMantener);
//    }
//    
} else {
    header("location: ../../Vistas/Registros/serv_GuardarUsuario.php");
}
