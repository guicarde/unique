<?php
session_start();
?>
<?php

include_once '../../DAO/Conexion.php';
include_once '../../DAO/Registro/Rct.php';

$direccionInicio = "location:../../Vistas/index.php";
$direccionMantener = "location: ../../Vistas/MantenerRCT.php";
$direccionGuardar = "location: ../../Vistas/GuardarRCT.php";


if (isset($_POST['hidden_rct'])) {

    $accion = $_POST['hidden_rct'];
    $fecha_ejecucion=null;
//    var_dump($accion);
//    exit();

    if ($accion == 'save') {

        if (isset($_SESSION['accion_rct'])) {
            if ($_SESSION['accion_rct'] == 'editar') {
              $id= $_POST['idrct']; 
               $nombrearchivo = $_FILES['fileArchivo']['name'];
            move_uploaded_file($_FILES['fileArchivo']['tmp_name'], "../Rct/" . $nombrearchivo);
            
            
            $tipo = $_POST['c_tipo'];
            $fechain = $_POST['t_fecha_in'];
            $horain = $_POST['t_hora_in'];
            $fecha_inicio = $fechain.' '.$horain.':00';
            $fechafin = $_POST['t_fecha_fin'];
            $horafin = $_POST['t_hora_fin'];
            $fecha_fin = $fechafin.' '.$horafin.':00';
            $asignado = trim(strtoupper($_POST['t_asignado'])); 
            $ticket = trim(strtoupper($_POST['t_ticket'])); 
            $servidor = trim(strtoupper($_POST['ta_servidor'])); 
            $detalle = trim(strtoupper($_POST['ta_detalle'])); 
            $observacion = trim(strtoupper($_POST['ta_observacion'])); 
            $estado = trim(strtoupper($_POST['c_estado'])); 
            $idusu = $_SESSION['id_username']; 
                                       
            $ob_rct = new Rct();
            $ob_rct->setId($id);
            $ob_rct->setTipo($tipo);
            $ob_rct->setFechain($fecha_inicio);
            $ob_rct->setFechafin($fecha_fin);
            $ob_rct->setAsignado($asignado);
            $ob_rct->setTicket($ticket);
            $ob_rct->setServidor($servidor);
            $ob_rct->setDetalle($detalle);
            $ob_rct->setObservacion($observacion);
            $ob_rct->setEstado($estado);
            $ob_rct->setIdusu($idusu);
            $ob_rct->setArchivo($nombrearchivo);
            $valor=$ob_rct->actualizar($ob_rct);
            
                      
            header("location: ../../Vistas/MantenerRCT.php");
            } else {
               $nombrearchivo = $_FILES['fileArchivo']['name'];
            move_uploaded_file($_FILES['fileArchivo']['tmp_name'], "../Rct/" . $nombrearchivo);
            
            
            $tipo = $_POST['c_tipo'];
            $fechain = $_POST['t_fecha_in'];
            $horain = $_POST['t_hora_in'];
            $fecha_inicio = $fechain.' '.$horain.':00';
            $fechafin = $_POST['t_fecha_fin'];
            $horafin = $_POST['t_hora_fin'];
            $fecha_fin = $fechafin.' '.$horafin.':00';
            $asignado = trim(strtoupper($_POST['t_asignado'])); 
            $ticket = trim(strtoupper($_POST['t_ticket'])); 
            $servidor = trim(strtoupper($_POST['ta_servidor'])); 
            $detalle = trim(strtoupper($_POST['ta_detalle'])); 
            $observacion = trim(strtoupper($_POST['ta_observacion'])); 
            $estado = trim(strtoupper($_POST['c_estado'])); 
            $idusu = $_SESSION['id_username']; 
                                       
            $ob_rct = new Rct();
            $ob_rct->setTipo($tipo);
            $ob_rct->setFechain($fecha_inicio);
            $ob_rct->setFechafin($fecha_fin);
            $ob_rct->setAsignado($asignado);
            $ob_rct->setTicket($ticket);
            $ob_rct->setServidor($servidor);
            $ob_rct->setDetalle($detalle);
            $ob_rct->setObservacion($observacion);
            $ob_rct->setEstado($estado);
            $ob_rct->setIdusu($idusu);
            $ob_rct->setArchivo($nombrearchivo);
            
           
            
            
            
            $valor=$ob_rct->grabar($ob_rct);
            
                      
            header("location: ../../Vistas/MantenerRCT.php");
            }
        } else {
            $nombrearchivo = $_FILES['fileArchivo']['name'];
            move_uploaded_file($_FILES['fileArchivo']['tmp_name'], "../Rct/" . $nombrearchivo);
            
            
            $tipo = $_POST['c_tipo'];
            $fechain = $_POST['t_fecha_in'];
            $horain = $_POST['t_hora_in'];
            $fecha_inicio = $fechain.' '.$horain.':00';
            $fechafin = $_POST['t_fecha_fin'];
            $horafin = $_POST['t_hora_fin'];
            $fecha_fin = $fechafin.' '.$horafin.':00';
            $asignado = trim(strtoupper($_POST['t_asignado'])); 
            $ticket = trim(strtoupper($_POST['t_ticket'])); 
            $servidor = trim(strtoupper($_POST['ta_servidor'])); 
            $detalle = trim(strtoupper($_POST['ta_detalle'])); 
            $observacion = trim(strtoupper($_POST['ta_observacion'])); 
            $estado = trim(strtoupper($_POST['c_estado'])); 
            $idusu = $_SESSION['id_username']; 
                                       
            $ob_rct = new Rct();
            $ob_rct->setTipo($tipo);
            $ob_rct->setFechain($fecha_inicio);
            $ob_rct->setFechafin($fecha_fin);
            $ob_rct->setAsignado($asignado);
            $ob_rct->setTicket($ticket);
            $ob_rct->setServidor($servidor);
            $ob_rct->setDetalle($detalle);
            $ob_rct->setObservacion($observacion);
            $ob_rct->setEstado($estado);
            $ob_rct->setIdusu($idusu);
            $ob_rct->setArchivo($nombrearchivo);
            
           
            
            
            
            $valor=$ob_rct->grabar($ob_rct);
            
                      
            header("location: ../../Vistas/MantenerRCT.php");
        }
    } 
    
     else if($accion=='buscarid')
     {
        $id_dato = $_POST['idrct'];
        $ob_req = new Rct();
        $ob_req->setId($id_dato); 
        $ob_req->buscarPorId($ob_req);
        $_SESSION['accion_rct']='editar';
        unset($_SESSION['arreglo_buscado_rct']);
        header("location: ../../Vistas/GuardarRct.php");
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
