<?php
session_start();
?>
<?php

include_once '../../DAO/Conexion.php';
include_once '../../DAO/Registro/Plataforma.php';

$direccionInicio = "location:../../Vistas/index.php";
$direccionMantener = "location: ../../Vistas/MantenerPlataforma.php";
$direccionGuardar = "location: ../../Vistas/GuardarPlataforma.php";


if (isset($_POST['hidden_plataforma'])) {

    $accion = $_POST['hidden_plataforma'];
    
//    var_dump($accion);
//    exit();

    if ($accion == 'save') {

        if (isset($_SESSION['accion_plataforma'])) {
            if ($_SESSION['accion_plataforma'] == 'editar') {
                $id = $_POST['idplat'];
                $plataforma = trim(strtoupper($_POST['t_plataforma']));
                       
                $ob_plataforma = new Plataforma();
                $ob_plataforma->setId($id);
                $ob_plataforma->setNombre($plataforma);
                $valor=$ob_plataforma->actualizar($ob_plataforma);
            
                if ($valor == 1) {
                    header($direccionMantener);
                } else {
                    header($direccionGuardar);
                }
            } else {
            $plataforma = trim(strtoupper($_POST['t_plataforma']));
                       
            $ob_plataforma = new Plataforma();
            $ob_plataforma->setNombre($plataforma);
            $valor=$ob_plataforma->grabar($ob_plataforma);
            
                      
            header("location: ../../Vistas/MantenerPlataforma.php");
            }
        } else {
            $plataforma = trim(strtoupper($_POST['t_plataforma']));
                       
            $ob_plataforma = new Plataforma();
            $ob_plataforma->setNombre($plataforma);
            $valor=$ob_plataforma->grabar($ob_plataforma);
            
                      
            header("location: ../../Vistas/MantenerPlataforma.php");
        }
    } 
    
     else if($accion=='buscarid')
     {
        $id_dato = $_POST['idplat'];
        $ob_plataforma = new Plataforma();
        $ob_plataforma->setId($id_dato); 
        $ob_plataforma->buscarPorId($ob_plataforma);
        $_SESSION['accion_plataforma']='editar';
        unset($_SESSION['arreglo_buscado_plataforma']);
        header("location: ../../Vistas/GuardarPlataforma.php");
     }
     
     else if($accion=='buscar')
    {
        $desc = trim(strtoupper($_POST['t_plataforma']));
        $estado = $_POST['c_estado'];
        $fechareg=$_POST['t_fecha_reg'];
        
        $ob_plataforma = new Plataforma();
        $ob_plataforma->setNombre($desc);
        $ob_plataforma->setEstado($estado);
        $ob_plataforma->setFecharegistro($fechareg);
         
        $arreglo = $ob_plataforma->buscar($ob_plataforma);
        
        $_SESSION['arreglo_buscado_plataforma'] = $arreglo;
        $_SESSION['accion_plataforma'] = 'busqueda';
        header("location: ../../Vistas/MantenerPlataforma.php");
    }
        
    else if($accion == 'anular'){
        $id_plataforma_eliminar = $_POST['id_hidden_eliminar'];
        $id_plataforma_estado = $_POST['hidden_estado'];
        $ob_plataforma = new Plataforma();
        $ob_plataforma->setId($id_plataforma_eliminar);
        $ob_plataforma->setEstado($id_plataforma_estado);
        $ob_plataforma->anular($ob_plataforma);
        
        $arreglo=$ob_plataforma->listar();
        $_SESSION['arreglo_buscado_plataforma'] = $arreglo;
        header("location: ../../Vistas/MantenerPlataforma.php");
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
