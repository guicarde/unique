<?php

session_start();
include_once '../DAO/Conexion.php';
//include_once '../DAO/Registro/Privilegio.php';


$direccionGuardar = "location: ../Vistas/index.php";

$valor="";
$con = Conectar();
$username=trim(strtoupper($_POST['usuario']));
$password=$_POST['password'];

//  include("../Vistas/securimage/securimage.php");
//  $img = new Securimage();
//  $valid = $img->check($_POST['code']);

//if($valid == true) {
    if ($password==NULL) {
        $form_page = "../Vistas/login.php";
        header("Location: ${form_page}");
    }

    else{
    $query = pg_query($con,"SELECT * FROM tbl_usuario WHERE usu_nom_usuario = '$username' ") or die("ERROR");

    $data = pg_fetch_array($query);
        if(md5($password) != $data['usu_contrasenia']) 
        {
        $valor .= "Error";
        $_SESSION['mensaje'] = $valor;
        $form_page = "../Vistas/login.php";
        header("Location: ${form_page}");
        }
    else
    {
        $query = pg_query($con,"SELECT * FROM tbl_usuario WHERE usu_nom_usuario = '$username'");
        $row = pg_fetch_array($query);
        $_SESSION["s_username"] = $row['usu_nom_usuario'];
        $id_usuario = $row['usu_idusu'];
        
        //carga nombre de usuario en la sesion
        $_SESSION['username']=$username;
        $_SESSION['id_username']=$id_usuario;
        //carga rol
        
        //carga nombre de personal de proyecto
        $sql = "SELECT * FROM tbl_usuario where usu_idusu=$id_usuario";
        
        $res = pg_query($con,$sql);
        $row2 = pg_fetch_array($res);
        $nombre_usuario = $row2['usu_nombres_usuario'];
        $apellido_usuario = $row2['usu_apellidos_usuario'];
        $idusuario = $row2['usu_idusu'];
        $foto = $row2['usu_foto'];
        $name = $nombre_usuario." ".$apellido_usuario;
        $rol = $row2['rol_idrol'];
        
//        $privilegio = new Privilegio();
//        $privilegios = $privilegio->listar($id_usuario);
        
        //carga nombre del personal proyecto
//        $_SESSION['array_menus'] = $privilegios;
        $_SESSION['user_personal'] = $name;
        $_SESSION['id_rol'] = $rol;
        $_SESSION['id_usuario'] = $idusuario;
        $_SESSION['foto'] = $foto;
        header("location: ../Vistas/index.php");
    }
    
  }

//} 

//else{
//$captcha .= "Error";
//$_SESSION['mensaje'] = "";
//$_SESSION['captcha'] = $captcha;
//$form_page = "../Vistas/QapTcha-master/serv_Login.php";
//header("Location: ${form_page}");    
//}

