<?php
session_start();
?>
<?php

include_once '../../DAO/Conexion.php';
include_once '../../DAO/Registro/Categoria.php';

$direccionInicio = "location:../../Vistas/index.php";
$direccionMantener = "location: ../../Vistas/MantenerCategoria.php";
$direccionGuardar = "location: ../../Vistas/GuardarCategoria.php";


if (isset($_POST['hidden_categoria'])) {

    $accion = $_POST['hidden_categoria'];
    
//    var_dump($accion);
//    exit();

    if ($accion == 'save') {

        if (isset($_SESSION['accion_categoria'])) {
            if ($_SESSION['accion_categoria'] == 'editar') {
                $id = $_POST['idcat'];
                $cate = trim(strtoupper($_POST['t_categoria']));
                       
                $ob_categoria = new Categoria();
                $ob_categoria->setId($id);
                $ob_categoria->setNombrecategoria($cate);
                $valor=$ob_categoria->actualizar($ob_categoria);
            
                if ($valor == 1) {
                    header($direccionMantener);
                } else {
                    header($direccionGuardar);
                }
            } else {
            $cate = trim(strtoupper($_POST['t_categoria']));
                       
            $ob_categoria = new Categoria();
            $ob_categoria->setNombrecategoria($cate);
            $valor=$ob_categoria->grabar($ob_categoria);
            
                      
            header("location: ../../Vistas/MantenerCategoria.php");
            }
        } else {
           $cate = trim(strtoupper($_POST['t_categoria']));
                       
            $ob_categoria = new Categoria();
            $ob_categoria->setNombrecategoria($cate);
            $valor=$ob_categoria->grabar($ob_categoria);
            
                      
            header("location: ../../Vistas/MantenerCategoria.php");
        }
    } 
    
     else if($accion=='buscarid')
     {
        $id_dato = $_POST['idcat'];
        $ob_categoria = new Categoria();
        $ob_categoria->setId($id_dato); 
        $ob_categoria->buscarPorId($ob_categoria);
        $_SESSION['accion_categoria']='editar';
        unset($_SESSION['arreglo_buscado_categoria']);
        header("location: ../../Vistas/GuardarCategoria.php");
     }
     
     else if($accion=='buscar')
    {
        $desc = trim(strtoupper($_POST['t_categoria']));
        $estado = $_POST['c_estado'];
        $fechareg=$_POST['t_fecha_reg'];
        
        $ob_categoria = new Categoria();
        $ob_categoria->setNombrecategoria($desc);
        $ob_categoria->setEstado($estado);
        $ob_categoria->setFecharegistro($fechareg);
         
        $arreglo = $ob_categoria->buscar($ob_categoria);
        
        $_SESSION['arreglo_buscado_categoria'] = $arreglo;
        $_SESSION['accion_categoria'] = 'busqueda';
        header("location: ../../Vistas/MantenerCategoria.php");
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
