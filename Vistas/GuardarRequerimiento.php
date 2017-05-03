<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
//------------------------------------------------
if(!isset($_SESSION['accion_requerimiento'])){ 
    $_SESSION['accion_requerimiento']="";
}
if(!isset($_SESSION['mensaje_requerimiento'])){ 
    $_SESSION['mensaje_requerimiento']="Los datos se registraron satisfactoriamente";
}
include_once '../DAO/Registro/Usuario.php';

$usuario = new Usuario();
$usuarios = $usuario->listar();
if(isset($_SESSION['requerimiento_idrequerimiento']))         { $id = $_SESSION['requerimiento_idrequerimiento'];} else{ $id =""; }
if(isset($_SESSION['requerimiento_fecha_formato']))         { $fecha_formato = $_SESSION['requerimiento_fecha_formato'];} else{ $fecha_formato =""; }
if(isset($_SESSION['requerimiento_turno']))         { $turno = $_SESSION['requerimiento_turno'];} else{ $turno =""; }
if(isset($_SESSION['requerimiento_operador']))         { $operador = $_SESSION['requerimiento_operador'];} else{ $operador =""; }
if(isset($_SESSION['requerimiento_hora_solicitud']))         { $hora_solicitud = $_SESSION['requerimiento_hora_solicitud'];} else{ $hora_solicitud =""; }
if(isset($_SESSION['requerimiento_ticket']))         { $ticket = $_SESSION['requerimiento_ticket'];} else{ $ticket =""; }
if(isset($_SESSION['requerimiento_tipo']))         { $tipo = $_SESSION['requerimiento_tipo'];} else{ $tipo =""; }
if(isset($_SESSION['requerimiento_pais']))         { $pais = $_SESSION['requerimiento_pais'];} else{ $pais =""; }
if(isset($_SESSION['requerimiento_menu']))         { $menu = $_SESSION['requerimiento_menu'];} else{ $menu =""; }
if(isset($_SESSION['requerimiento_detalle']))         { $detalle = $_SESSION['requerimiento_detalle'];} else{ $detalle =""; }
if(isset($_SESSION['requerimiento_archivo']))         { $archivo = $_SESSION['requerimiento_archivo'];} else{ $archivo =""; }
if(isset($_SESSION['requerimiento_fecha_ejecucion']))         { $fecha_ejecucion = $_SESSION['requerimiento_fecha_ejecucion'];} else{ $fecha_ejecucion =""; }
if(isset($_SESSION['requerimiento_hora_inicio']))         { $hora_inicio = $_SESSION['requerimiento_hora_inicio'];} else{ $hora_inicio =""; }
if(isset($_SESSION['requerimiento_inicio_tsm']))         { $inicio_tsm = $_SESSION['requerimiento_inicio_tsm'];} else{ $inicio_tsm =""; }
if(isset($_SESSION['requerimiento_fin_tsm']))         { $fin_tsm = $_SESSION['requerimiento_fin_tsm'];} else{ $fin_tsm =""; }
if(isset($_SESSION['requerimiento_duracion_tsm']))         { $duracion_tsm = $_SESSION['requerimiento_duracion_tsm'];} else{ $duracion_tsm =""; }
if(isset($_SESSION['requerimiento_inicio_dia']))         { $inicio_dia = $_SESSION['requerimiento_inicio_dia'];} else{ $inicio_dia =""; }
if(isset($_SESSION['requerimiento_fin_dia']))         { $fin_dia = $_SESSION['requerimiento_fin_dia'];} else{ $fin_dia =""; }
if(isset($_SESSION['requerimiento_duracion_dia']))         { $duracion_dia = $_SESSION['requerimiento_duracion_dia'];} else{ $duracion_dia =""; }
if(isset($_SESSION['requerimiento_inicio_desa']))         { $inicio_desa = $_SESSION['requerimiento_inicio_desa'];} else{ $inicio_desa =""; }
if(isset($_SESSION['requerimiento_fin_desa']))         { $fin_desa = $_SESSION['requerimiento_fin_desa'];} else{ $fin_desa =""; }
if(isset($_SESSION['requerimiento_duracion_desa']))         { $duracion_desa = $_SESSION['requerimiento_duracion_desa'];} else{ $duracion_desa =""; }
if(isset($_SESSION['requerimiento_inicio_condiciones']))         { $inicio_cond = $_SESSION['requerimiento_inicio_condiciones'];} else{ $inicio_cond =""; }
if(isset($_SESSION['requerimiento_fin_condiciones']))         { $fin_cond = $_SESSION['requerimiento_fin_condiciones'];} else{ $fin_cond =""; }
if(isset($_SESSION['requerimiento_duracion_condiciones']))         { $duracion_cond = $_SESSION['requerimiento_duracion_condiciones'];} else{ $duracion_cond =""; }
if(isset($_SESSION['requerimiento_inicio_comisiones']))         { $inicio_comi = $_SESSION['requerimiento_inicio_comisiones'];} else{ $inicio_comi =""; }
if(isset($_SESSION['requerimiento_fin_comisiones']))         { $fin_comi = $_SESSION['requerimiento_fin_comisiones'];} else{ $fin_comi =""; }
if(isset($_SESSION['requerimiento_duracion_comisiones']))         { $duracion_comi = $_SESSION['requerimiento_duracion_comisiones'];} else{ $duracion_comi =""; }
if(isset($_SESSION['requerimiento_hora_fin']))         { $hora_fin = $_SESSION['requerimiento_hora_fin'];} else{ $hora_fin =""; }
if(isset($_SESSION['requerimiento_hora_duracion']))         { $hora_duracion = $_SESSION['requerimiento_hora_duracion'];} else{ $hora_duracion =""; }
if(isset($_SESSION['requerimiento_team']))         { $team = $_SESSION['requerimiento_team'];} else{ $team =""; }
if(isset($_SESSION['requerimiento_estado']))         { $estado = $_SESSION['requerimiento_estado'];} else{ $estado =""; }
if(isset($_SESSION['requerimiento_incidente']))         { $incidente = $_SESSION['requerimiento_incidente'];} else{ $incidente =""; }
if(isset($_SESSION['requerimiento_tamano']))         { $tamano = $_SESSION['requerimiento_tamano'];} else{ $tamano =0; }
if(isset($_SESSION['requerimiento_cantidad']))         { $cantidad = $_SESSION['requerimiento_cantidad'];} else{ $cantidad =0; }
if(isset($_SESSION['usu_idusu']))         { $idusu = $_SESSION['usu_idusu'];} else{ $idusu =""; }
//if (isset($_SESSION['accion_requerimiento']) && $_SESSION['accion_requerimiento'] != '') {
//$diast = $_SESSION['arreglo_dias'];
//$turnos = $_SESSION['arreglo_turnos'];
//}
//var_dump($fecha_formato);
//exit();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>INTEGRATION  | UNIQUE</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
      .color-palette {
        height: 35px;
        line-height: 35px;
        text-align: center;
      }
      .color-palette-set {
        margin-bottom: 15px;
      }
      .color-palette span {
        display: none;
        font-size: 12px;
      }
      .color-palette:hover span {
        display: block;
      }
      .color-palette-box h4 {
        position: absolute;
        top: 100%;
        left: 25px;
        margin-top: -40px;
        color: rgba(255, 255, 255, 0.8);
        font-size: 12px;
        display: block;
        z-index: 7;
      }
    </style>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

     <?php require 'Cabecera.php' ?>
        
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
           <img src="../Controles/Fotos/<?php echo $_SESSION['foto']?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['user_personal']?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
           <ul class="sidebar-menu">
            <a href="index.php">
                <li class="header">MENU PRINCIPAL</li>
            </a>   
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i> <span>USUARIO</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Usuarios <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li><a href="GuardarUsuario.php"><i class="fa fa-circle-o"></i> Registrar Usuario </a></li>                    
                  </ul>
                  <ul class="treeview-menu">
                      <li><a href="MantenerUsuario.php"><i class="fa fa-circle-o"></i> Mantener Usuario </a></li>                    
                  </ul>
                </li>
               
              </ul>
            </li>
            
             <li class="treeview">
              <a href="#">
                <i class="fa fa-server"></i> <span>MANTENIMIENTOS</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Categorias <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li><a href="GuardarCategoria.php"><i class="fa fa-circle-o"></i> Guardar Categoria </a></li>                    
                  </ul>
                  <ul class="treeview-menu">
                      <li><a href="MantenerCategoria.php"><i class="fa fa-circle-o"></i> Guardar Categoria </a></li>                    
                  </ul>
                </li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Plataformas <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li><a href="GuardarPlataforma.php"><i class="fa fa-circle-o"></i> Guardar Plataforma </a></li>                    
                  </ul>
                  <ul class="treeview-menu">
                      <li><a href="MantenerPlataforma.php"><i class="fa fa-circle-o"></i> Mantener Plataforma </a></li>                    
                  </ul>
                </li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Procedimientos <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li><a href="GuardarProcedimiento.php"><i class="fa fa-circle-o"></i> Guardar Procedimiento </a></li>                    
                  </ul>
                  <ul class="treeview-menu">
                      <li><a href="MantenerProcedimiento.php"><i class="fa fa-circle-o"></i> Mantener Procedimiento </a></li>                    
                  </ul>
                </li>
                   
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-server"></i> <span>ACTIVIDADES</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Actividad <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li><a href="GuardarActividad.php"><i class="fa fa-circle-o"></i> Guardar Actividad </a></li>                    
                  </ul>
                  <ul class="treeview-menu">
                      <li><a href="MantenerActividad.php"><i class="fa fa-circle-o"></i> Mantener Actividad </a></li>                    
                  </ul>
                </li>
                   
              </ul>
            </li>
            
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-server"></i> <span>REQUERIMIENTOS</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <li class="active">
                  <a href="#"><i class="fa fa-circle-o"></i> Requerimientos <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li class="active"><a href="GuardarRequerimiento.php"><i class="fa fa-circle-o"></i> Registrar Requerimiento </a></li>                    
                  </ul>
                  <ul class="treeview-menu">
                      <li><a href="MantenerRequerimiento.php"><i class="fa fa-circle-o"></i> Mantener Requerimientos </a></li>                    
                  </ul>
                  <ul class="treeview-menu">
                      <li><a href="DashboardRequerimiento.php"><i class="fa fa-circle-o"></i> Dashboard Requerimientos </a></li>                    
                  </ul>
                </li>
                   
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            REGISTRAR REQUERIMIENTO
            <small>Ingrese Datos del REQUERIMIENTO</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-user"></i> REQUERIMIENTO</a></li>
            <li><a href="index.php">Requerimiento</a></li>
            <li class="active">Registrar Requerimiento</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
         <div class="row"> 
             <form class="form-horizontal" action="../Controles/Registro/CRequerimiento.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="hiddenrequerimiento" name="hidden_requerimiento" value="save">  
                    <input type="hidden" name="idreq" value="<?php echo $id; ?>"/>
           <div class="col-md-6">
               
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Datos del Requerimiento</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                
                    
                  <div class="box-body">
                     
                    <div class="form-group">
                        <label for="inputfecha" class="col-sm-4 control-label"><span class="pull-left">Fecha Formato</span><a style="color:red">(*)</a></label>
                                        <div class="col-sm-8">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="date" name="t_fecha_formato" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask value="<?php echo $fecha_formato;?>">
                                        </div>
                                        </div>
                                    </div>  
                      
                    <div class="form-group">
                        <label for="inputturno" class="col-sm-4 control-label"><span class="pull-left">Turno</span><a style="color:red">(*)</a></label>
                                        <div class="col-sm-8">
                                            <select class="form-control select2" name="c_turno" id="id_turno" >

                                                <option value=""> --SELECCIONE--</option>
                                            <option value="1" <?php if ($turno=='1'){ echo 'selected'; }?>>MAÑANA </option>
                                            <option value="2" <?php if ($turno=='2'){ echo 'selected'; }?>>TARDE  </option>
                                            <option value="3" <?php if ($turno=='3'){ echo 'selected'; }?>>NOCHE</option>

                                                      </select>
                                        </div>
                     </div>
                      <div class="form-group">
                          <label for="inputoperador" class="col-sm-4 control-label"><span class="pull-left">Operador</span><a style="color:red">(*)</a></label>
                                        <div class="col-sm-8">
                                            <select class="form-control select2" name="c_operador" id="id_operador" required>

                                            <option>--SELECCIONE--</option>
                                                                        <?php foreach ($usuarios as $u) {   
                                                                          $nombre = $u['usu_nombres_usuario'].' '.$u['usu_apellidos_usuario'];
                                                                            ?>
                                                                          
                                                                          <option value="<?php echo $nombre;?>" <?php if ($operador == $nombre) echo 'selected'; ?>><?php echo $nombre; ?></option>
                                                                      <?php } ?>
                                                      </select>                                                
                                        </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-4 control-label"><span class="pull-left">Hora Solicitud</span><a style="color:red">(*)</a></label>
                              <div class="col-sm-8">
                                  <input type="time" name="t_hora_solicitud" maxlength="8" value="<?php echo $hora_solicitud; ?>" class="form-control" required>
                              </div>
                      </div>
                      <div class="form-group">
                          <label for="inputnombre" class="col-sm-4 control-label"><span class="pull-left">Ticket</span><a style="color:red">(*)</a></label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="t_ticket" value="<?php echo $ticket; ?>" placeholder="Ingrese N° de Ticket">
                      </div>
                      </div>
                      <div class="form-group">
                          <label for="inputpais" class="col-sm-4 control-label"><span class="pull-left">País</span><a style="color:red">(*)</a></label>
                                        <div class="col-sm-8">
                                            <select class="form-control select2" name="c_pais" id="id_pais" >

                                                <option value=""> --SELECCIONE--</option>
                                            <option value="1" <?php if ($pais=='1'){ echo 'selected'; }?>>COLOMBIA </option>
                                            <option value="2" <?php if ($pais=='2'){ echo 'selected'; }?>>ECUADOR  </option>
                                            <option value="3" <?php if ($pais=='3'){ echo 'selected'; }?>>GUATEMALA</option>
                                            <option value="4" <?php if ($pais=='4'){ echo 'selected'; }?>>MEXICO </option>
                                            <option value="5" <?php if ($pais=='5'){ echo 'selected'; }?>>PERÚ  </option>
                                            <option value="6" <?php if ($pais=='6'){ echo 'selected'; }?>>VENEZUELA</option>

                                                      </select>
                                        </div>
                     </div>
                      <div class="form-group">
                          <label for="inputtipo" class="col-sm-4 control-label"><span class="pull-left">Tipo</span><a style="color:red">(*)</a></label>
                                        <div class="col-sm-8">
                                            <select class="form-control select2" name="c_tipo" id="id_tipo" >

                                                <option value=""> --SELECCIONE--</option>
                                            <option value="1" <?php if ($tipo=='1'){ echo 'selected'; }?>>BACKUP FLASHCOPY </option>
                                            <option value="2" <?php if ($tipo=='2'){ echo 'selected'; }?>>RESTORE  </option>
                                            <option value="3" <?php if ($tipo=='3'){ echo 'selected'; }?>>BACKUP ESPECIAL</option>

                                                      </select>
                                        </div>
                     </div>
                     <div class="form-group">
                         <label for="inputmenu" class="col-sm-4 control-label"><span class="pull-left">Menu</span><a style="color:red">(*)</a></label>
                                        <div class="col-sm-8">
                                            <select class="form-control select2" name="c_menu" id="id_menu" >

                                                <option value=""> --SELECCIONE--</option>
                                            <option value="1" <?php if ($menu==1){ echo 'selected'; }?>>1A </option>
                                            <option value="2" <?php if ($menu==2){ echo 'selected'; }?>>1B </option>
                                            <option value="3" <?php if ($menu==3){ echo 'selected'; }?>>1C </option>
                                            <option value="4" <?php if ($menu==4){ echo 'selected'; }?>>1D </option>
                                            <option value="5" <?php if ($menu==5){ echo 'selected'; }?>>02 </option>
                                            <option value="6" <?php if ($menu==6){ echo 'selected'; }?>>03 </option>
                                            <option value="7" <?php if ($menu==7){ echo 'selected'; }?>>4A </option>
                                            <option value="8" <?php if ($menu==8){ echo 'selected'; }?>>4B </option>
                                            <option value="9" <?php if ($menu==9){ echo 'selected'; }?>>4C </option>
                                            <option value="10" <?php if ($menu==10){ echo 'selected'; }?>>4D </option>
                                            <option value="11" <?php if ($menu==11){ echo 'selected'; }?>>05 </option>
                                            <option value="12" <?php if ($menu==12){ echo 'selected'; }?>>06 </option>
                                            <option value="13" <?php if ($menu==13){ echo 'selected'; }?>>07 </option>
                                            <option value="14" <?php if ($menu==14){ echo 'selected'; }?>>08 </option>
                                            </select>
                                        </div>
                     </div>
                      <div class="form-group">
                          <label for="inputnombre" class="col-sm-4 control-label"><span class="pull-left">Detalle</span><a style="color:red">(*)</a></label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="t_detalle" value="<?php echo $detalle; ?>" placeholder="Ingrese Detalle de Requerimiento">
                      </div>
                      </div>                      
                      <div class="form-group">
                          <label for="inputfecha" class="col-sm-4 control-label"><span class="pull-left">Fecha Ejecución</span><a style="color:red">(*)</a></label>
                                        <div class="col-sm-8">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="date" name="t_fecha_ejecucion" value="<?php echo $fecha_ejecucion; ?>" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask>
                                        </div>
                                        </div>
                                    </div>                        
                      
                      <div class="form-group">
                          <label for="inputteam" class="col-sm-4 control-label"><span class="pull-left">Team</span><a style="color:red">(*)</a></label>
                                        <div class="col-sm-8">
                                            <select class="form-control select2" name="c_team" id="id_team" >

                                                <option value=""> --SELECCIONE--</option>
                                            <option value="1" <?php if ($team=='1'){ echo 'selected'; }?>>OPERACIONES </option>
                                            <option value="2" <?php if ($team=='2'){ echo 'selected'; }?>>BACKUP  </option>

                                                      </select>
                                        </div>
                     </div>
                      <div class="form-group">
                          <label for="inputestado" class="col-sm-4 control-label"><span class="pull-left">Estado</span><a style="color:red">(*)</a></label>
                                        <div class="col-sm-8">
                                            <select class="form-control select2" name="c_estado" id="estado" >

                                                <option value=""> --SELECCIONE--</option>
                                            <option value="1" <?php if ($estado=='1'){ echo 'selected'; }?>>REGISTRADO </option>
                                            <option value="2" <?php if ($estado=='2'){ echo 'selected'; }?>>OK </option>
                                            <option value="3" <?php if ($estado=='3'){ echo 'selected'; }?>>EN PROGRESO </option>
                                            <option value="4" <?php if ($estado=='4'){ echo 'selected'; }?>>FALLIDO </option>
                                                      </select>
                                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-4 control-label"><span class="pull-left">Hora Inicio</span></label>
                              <div class="col-sm-8">
                                  <input type="time" name="t_hora_inicio" maxlength="8" value="<?php echo $hora_inicio; ?>" class="form-control" id="inicio">
                              </div>
                      </div>
                     <div class="form-group">
                          <label class="col-sm-4 control-label"><span class="pull-left">Hora Fin</span></label>
                              <div class="col-sm-8">
                                  <input type="time" name="t_hora_fin" maxlength="8" value="<?php echo $hora_fin; ?>" class="form-control" id="fin" onblur="calcular_duracion()">
                              </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-4 control-label"><span class="pull-left">Duración</span></label>
                              <div class="col-sm-8">
                                  <input type="text" name="t_duracion" maxlength="8" value="<?php echo $hora_duracion; ?>" class="form-control" id="duracion" readonly>
                              </div>
                      </div>
                    <div class="form-group">
                        <label for="inputincidente" class="col-sm-4 control-label"><span class="pull-left">Incidente</span></label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="t_incidente" value="<?php echo $incidente; ?>" placeholder="Ingrese N° de Ticket">
                      </div>
                      </div> 
                    <div class="form-group">
                        <label for="inputtamano" class="col-sm-4 control-label"><span class="pull-left">Tamaño DATA (GB)</span></label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" name="t_tamano" value="<?php echo $tamano; ?>">
                      </div>
                      </div> 
                      <div class="form-group">
                          <label for="inputcantidad" class="col-sm-4 control-label"><span class="pull-left">Cantidad Archivos</span></label>
                      <div class="col-sm-8">
                        <input type="number" class="form-control" name="t_cantidad" value="<?php echo $cantidad; ?>" >
                      </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-4 control-label"><span class="pull-left">Evidencia Final (PDF ó WORD)</span></label>
                                        <div class="col-sm-8">

                                            <input id="file-xxx" class="file" multiple="true" data-show-upload="false" data-show-caption="true" type="file" name="fileArchivo">

                                        </div>
                                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-default">Cancelar</button>
                    <button type="submit" class="btn btn-info pull-right" data-toggle="modal" data-target="#myModal">Guardar</button>
                  </div><!-- /.box-footer -->
                
              </div><!-- /.box -->
              <!-- general form elements disabled -->
              
            </div><!--/.col (right) -->
            <div class="col-md-6">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Tiempos Copia TSM</h3>
                </div><!-- /.box-header -->
                <div class="box-body">                    
                      <div class="form-group">
                          <label class="col-sm-4 control-label"><span class="pull-left">Inicio TSM</span></label>
                              <div class="col-sm-8">
                                  <input type="time" name="t_hora_inicio_tsm" maxlength="8" value="<?php echo $inicio_tsm; ?>" class="form-control" id="inicio_tsm" onblur="calcular_duracion_tsm()">
                              </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-4 control-label"><span class="pull-left">Fin TSM</span></label>
                              <div class="col-sm-8">
                                  <input type="time" name="t_hora_fin_tsm" maxlength="8" value="<?php echo $fin_tsm; ?>" class="form-control" id="fin_tsm" onblur="calcular_duracion_tsm()">
                              </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-4 control-label"><span class="pull-left">Duración TSM</span></label>
                              <div class="col-sm-8">
                                  <input type="text" name="t_hora_duracion_tsm" maxlength="8" value="<?php echo $duracion_tsm; ?>" class="form-control" id="duracion_tsm" readonly>
                              </div>
                      </div>
                </div> 
              </div>
            </div>
            <div class="col-md-6">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Tiempo Copia DIA</h3>
                </div><!-- /.box-header -->
                <div class="box-body">    
                    
                      <div class="form-group">
                          <label class="col-sm-4 control-label"><span class="pull-left">Inicio DIA</span></label>
                              <div class="col-sm-8">
                                  <input type="time" name="t_hora_inicio_dia" maxlength="8" value="<?php echo $inicio_dia; ?>" class="form-control" id="inicio_dia" onblur="calcular_duracion_dia()">
                              </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-4 control-label"><span class="pull-left">Fin DIA</span></label>
                              <div class="col-sm-8">
                                  <input type="time" name="t_hora_fin_dia" maxlength="8" value="<?php echo $fin_dia; ?>" class="form-control" id="fin_dia" onblur="calcular_duracion_dia()">
                              </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-4 control-label"><span class="pull-left">Duración DIA</span></label>
                              <div class="col-sm-8">
                                  <input type="text" name="t_hora_duracion_dia" maxlength="8" value="<?php echo $duracion_dia; ?>" class="form-control" id="duracion_dia" readonly>
                              </div>
                      </div>
                 </div> 
              </div>
            </div>    
                    
                    <div class="col-md-6">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Tiempo Copia DESA</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    
                      <div class="form-group">
                          <label class="col-sm-4 control-label"><span class="pull-left">Inicio DESA</span></label>
                              <div class="col-sm-8">
                                  <input type="time" name="t_hora_inicio_desa" maxlength="8" value="<?php echo $inicio_desa; ?>" class="form-control" id="inicio_desa" onblur="calcular_duracion_desa()">
                              </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-4 control-label"><span class="pull-left">Fin DESA</span></label>
                              <div class="col-sm-8">
                                  <input type="time" name="t_hora_fin_desa" maxlength="8" value="<?php echo $fin_desa; ?>" class="form-control" id="fin_desa" onblur="calcular_duracion_desa()">
                              </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-4 control-label"><span class="pull-left">Duración DESA</span></label>
                              <div class="col-sm-8">
                                  <input type="text" name="t_hora_duracion_desa" maxlength="8" value="<?php echo $duracion_desa; ?>" class="form-control" id="duracion_desa" readonly>
                              </div>
                      </div>
                    
                  </div> 
              </div>
            </div>    
                    
                    <div class="col-md-6">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Tiempo Copia CONDICIONES</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                      <div class="form-group">
                          <label class="col-sm-4 control-label"><span class="pull-left">Inicio CONDICIONES</span></label>
                              <div class="col-sm-8">
                                  <input type="time" name="t_hora_inicio_condiciones" maxlength="8" value="<?php echo $inicio_cond; ?>" class="form-control" id="inicio_cond" onblur="calcular_duracion_cond()">
                              </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-4 control-label"><span class="pull-left">Fin CONDICIONES</span></label>
                              <div class="col-sm-8">
                                  <input type="time" name="t_hora_fin_condiciones" maxlength="8" value="<?php echo $fin_cond; ?>" class="form-control" id="fin_cond" onblur="calcular_duracion_cond()">
                              </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-4 control-label"><span class="pull-left">Duración CONDICIONES</span></label>
                              <div class="col-sm-8">
                                  <input type="text" name="t_hora_duracion_condiciones" maxlength="8" value="<?php echo $duracion_cond; ?>" class="form-control" id="duracion_cond" readonly>
                              </div>
                      </div>
                   </div> 
              </div>
            </div>    
                    
                    <div class="col-md-6">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Tiempo Copia COMISIONES</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                      <div class="form-group">
                          <label class="col-sm-4 control-label"><span class="pull-left">Inicio COMISIONES</span></label>
                              <div class="col-sm-8">
                                  <input type="time" name="t_hora_inicio_comisiones" maxlength="8" value="<?php echo $inicio_comi; ?>" class="form-control" id="inicio_comi" onblur="calcular_duracion_comi()">
                              </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-4 control-label"><span class="pull-left">Fin COMISIONES</span></label>
                              <div class="col-sm-8">
                                  <input type="time" name="t_hora_fin_comisiones" maxlength="8" value="<?php echo $fin_comi; ?>" class="form-control" id="fin_comi" onblur="calcular_duracion_comi()">
                              </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-4 control-label"><span class="pull-left">Duración COMISIONES</span></label>
                              <div class="col-sm-8">
                                  <input type="text" name="t_hora_duracion_comisiones" maxlength="8" value="<?php echo $duracion_comi; ?>" class="form-control" id="duracion_comi" readonly>
                              </div>
                      </div>                     
                </div>
              </div>
            </div>
            
            
             <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title" id="myModalLabel">Mensaje</h4>
						      </div>
						      <div class="modal-body">
						        <?php echo $_SESSION['mensaje_requerimiento'];?>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						        <button type="button" class="btn btn-primary">Guardar Cambios</button>
						      </div>
						    </div>
						  </div>
                
						</div> 
         </form>
         </div> <!--/.row  -->  
        
          <!-- END TYPOGRAPHY -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2016 <a href="http://almsaeedstudio.com">Guillermo Cárdenas Studio</a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-user bg-yellow"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Update Resume
                    <span class="label label-success pull-right">95%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Laravel Integration
                    <span class="label label-warning pull-right">50%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-right">68%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Allow mail redirect
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Other sets of options are available
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Expose author name in posts
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Allow the user to show his name in blog posts
                </p>
              </div><!-- /.form-group -->

              <h3 class="control-sidebar-heading">Chat Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Show me as online
                  <input type="checkbox" class="pull-right" checked>
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-right">
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Delete chat history
                  <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                </label>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
      <!-- Select2 -->
    <script src="plugins/select2/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="../../plugins/input-mask/jquery.inputmask.js"></script>
    <script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
     <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
     <!-- Bootstrap 3.3.5 -->
     <script src="../Recursos/js/JSGeneral.js"></script>
     <!-- Bootstrap 3.3.5 -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- Unicas Librerias Utiliazabas para subir archivos imagens, audio, etc-->
        <link href="../Recursos/filebootstrap/kartik-v-bootstrap-fileinput-d66e684/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
        <script src="../Recursos/filebootstrap/kartik-v-bootstrap-fileinput-d66e684/js/fileinput.js" type="text/javascript"></script>    
        <!-- fin -->
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
    <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
  </body>
</html>