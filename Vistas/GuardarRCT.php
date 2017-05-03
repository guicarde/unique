<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
//------------------------------------------------
if(!isset($_SESSION['accion_rct'])){ 
    $_SESSION['accion_rct']="";
}
if(!isset($_SESSION['mensaje_rct'])){ 
    $_SESSION['mensaje_rct']="Los datos se registraron satisfactoriamente";
}


if(isset($_SESSION['rct_idrct']))         { $id = $_SESSION['rct_idrct'];} else{ $id =""; }
if(isset($_SESSION['rct_tiporegistro']))         { $tipo = $_SESSION['rct_tiporegistro'];} else{ $tipo =""; }
if(isset($_SESSION['rct_fechain']))         { $fechain = $_SESSION['rct_fechain'];} else{ $fechain =""; }
if(isset($_SESSION['rct_fechafin']))         { $fechafin = $_SESSION['rct_fechafin'];} else{ $fechafin =""; }
if(isset($_SESSION['rct_asignado']))         { $asignado = $_SESSION['rct_asignado'];} else{ $asignado =""; }
if(isset($_SESSION['rct_ticket']))         { $ticket = $_SESSION['rct_ticket'];} else{ $ticket =""; }
if(isset($_SESSION['rct_servidor']))         { $servidor = $_SESSION['rct_servidor'];} else{ $servidor =""; }
if(isset($_SESSION['rct_detalle']))         { $detalle = $_SESSION['rct_detalle'];} else{ $detalle =""; }
if(isset($_SESSION['rct_observacion']))         { $observacion = $_SESSION['rct_observacion'];} else{ $observacion =""; }
if(isset($_SESSION['rct_archivo']))         { $archivo = $_SESSION['rct_archivo'];} else{ $archivo =""; }
if(isset($_SESSION['rct_fecharegistro']))         { $fechareg = $_SESSION['rct_fecharegistro'];} else{ $fechareg =""; }
if(isset($_SESSION['rct_estado']))         { $estado = $_SESSION['rct_estado'];} else{ $estado =""; }
if(isset($_SESSION['usu_idusu']))         { $idusu = $_SESSION['usu_idusu'];} else{ $idusu =""; }
//var_dump(substr($fechain,11,20));exit();


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
            
            <li>
              <a href="#">
                <i class="fa fa-server"></i> <span>ACTIVIDADES</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <li class="active">
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
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-database"></i> <span>SCHEDULE</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Ejecutar Schedule <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li><a href="SeleccionarSchedule.php"><i class="fa fa-circle-o"></i> Seleccionar Schedule </a></li>                    
                  </ul>
                  <ul class="treeview-menu">
                      <li><a href="MisSchedules.php"><i class="fa fa-circle-o"></i> Mis Schedules </a></li>                    
                  </ul>
                  <ul class="treeview-menu">
                      <li><a href="SchedulesFinalizados.php"><i class="fa fa-circle-o"></i> Schedules Finalizados </a></li>                    
                  </ul>
                </li>
                   
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>REQUERIMIENTOS</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <li>
                  <a href="#"><i class="fa fa-circle"></i> Requerimientos <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li><a href="GuardarRequerimiento.php"><i class="fa fa-circle-o"></i> Registrar Requerimiento </a></li>                    
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
            
            
            <li  class="active treeview" >
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>RCT</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <li class="active">
                  <a href="#"><i class="fa fa-circle"></i> RCT <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li class="active"><a href="GuardarRCT.php"><i class="fa fa-circle-o"></i> Registrar RCT </a></li>                    
                  </ul>
                  <ul class="treeview-menu">
                      <li><a href="MantenerRCT.php"><i class="fa fa-circle-o"></i> Mantener RCT </a></li>                    
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
            REGISTRAR CAMBIO DE TURNO
            <small>Ingrese Datos de Cambio</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-user"></i> RCT</a></li>
            <li><a href="index.php">RCT</a></li>
            <li class="active">Registrar RCT</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
         <div class="row"> 
           <div class="col-md-12">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Datos del RCT</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="../Controles/Registro/CRct.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="hiddenrct" name="hidden_rct" value="save">  
                    <input type="hidden" name="idrct" value="<?php echo $id; ?>"/>
                  <div class="box-body">
                    <div class="form-group">
                                        <label for="inputregistro" class="col-sm-2 control-label">Registro</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" name="c_tipo" id="id_tipo" >

                                            <option value=""> --SELECCIONE--</option>
                                            <option value="1" <?php if ($tipo=='1'){echo 'selected';}?>>TAREA SCHEDULE</option>
                                            <option value="2" <?php if ($tipo=='2'){echo 'selected';}?>>NOTICIA</option>
                                            <option value="3" <?php if ($tipo=='3'){echo 'selected';}?>>CAMBIO</option>
                                            <option value="4" <?php if ($tipo=='4'){echo 'selected';}?>>REQUERIMIENTO</option>
                                            <option value="5" <?php if ($tipo=='5'){echo 'selected';}?>>INCIDENTE</option>
                                            <option value="6" <?php if ($tipo=='6'){echo 'selected';}?>>PROBLEMA</option>
                                            <option value="7" <?php if ($tipo=='7'){echo 'selected';}?>>DESACTIVACIÓN</option>
                                            <option value="8" <?php if ($tipo=='8'){echo 'selected';}?>>VACACIONES</option>
                                            
                                                      </select>
                                        </div>
                     </div>
                      <div class="form-group">
                                        <label for="inputfecha" class="col-sm-2 control-label">Fecha Inicio</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                <input type="date" name="t_fecha_in" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" value="<?php echo substr($fechain,0,10);?>" data-mask>
                                             </div>
                                        </div>
                                        <label for="inputfecha" class="col-sm-2 control-label">Hora Inicio</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                <input type="time" name="t_hora_in" value="<?php echo substr($fechain,11,20);?>" class="form-control">
                                             </div>
                                        </div>
                      </div>
                      <div class="form-group">
                                        <label for="inputfecha" class="col-sm-2 control-label">Fecha Fin</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                <input type="date" name="t_fecha_fin" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" value="<?php echo substr($fechafin,0,10);?>" data-mask>
                                             </div>
                                        </div>
                                        <label for="inputfecha" class="col-sm-2 control-label">Hora Fin</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                <input type="time" name="t_hora_fin" value="<?php echo substr($fechafin,11,20);?>" class="form-control">
                                             </div>
                                        </div>
                      </div>
                      <div class="form-group">
                                <label for="inputnombre" class="col-sm-2 control-label">Persona Asignada</label>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control" name="t_asignado" value="<?php echo $asignado; ?>" placeholder="Ingrese Persona Asignada">
                                </div>
                                <label for="inputnombre" class="col-sm-2 control-label">Ticket</label>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control" name="t_ticket" value="<?php echo $ticket; ?>" placeholder="Ingrese N° Ticket">
                                </div>
                      </div>
                     <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Servidor</label>
                              <div class="col-sm-4">
                                  <textarea name="ta_servidor" id="id_servidor" class="form-control" rows="8" placeholder="Ingrese Servidores" ><?php echo $servidor;?></textarea>
                              </div>
                              <label class="col-sm-2 col-sm-2 control-label">Detalle</label>
                              <div class="col-sm-4">
                                  <textarea name="ta_detalle" id="id_detalle" class="form-control" rows="8" placeholder="Ingrese Detalle" ><?php echo $detalle;?></textarea>
                              </div>
                     </div>
                     <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Observaciones</label>
                              <div class="col-sm-4">
                                  <textarea name="ta_observacion" id="id_observacion" class="form-control" rows="8" placeholder="Ingrese Observación" ><?php echo $observacion;?></textarea>
                              </div>
                              <label class="col-sm-2 col-sm-2 control-label">Estado</label>
                              <div class="col-sm-4">
                                    <select class="form-control select2" name="c_estado" id="id_estado" >

                                            <option value=""> --SELECCIONE--</option>
                                            <option value="1" <?php if ($estado=='1'){echo 'selected';}?>>VALIDAR</option>
                                            <option value="2" <?php if ($estado=='2'){echo 'selected';}?>>FINALIZADO</option>
                                            <option value="3" <?php if ($estado=='3'){echo 'selected';}?>>EXTENDIDO</option>
                                            <option value="4" <?php if ($estado=='4'){echo 'selected';}?>>EN PROGRESO</option>                                            
                                     </select>
                              </div>
                     </div>
                     <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Archivo</label>
                              <div class="col-sm-10">
                                 <input id="file-xxx" class="file" multiple="true" data-show-upload="false" data-show-caption="true" type="file" name="fileArchivo" required>
                              </div>
                     </div> 
                     
                    
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-default">Cancelar</button>
                    <button type="submit" class="btn btn-info pull-right" data-toggle="modal" data-target="#myModal">Guardar</button>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
              <!-- general form elements disabled -->
              
            </div><!--/.col (right) -->  
             <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title" id="myModalLabel">Mensaje</h4>
						      </div>
						      <div class="modal-body">
						        <?php echo $_SESSION['mensaje_rct'];?>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						        <button type="button" class="btn btn-primary">Guardar Cambios</button>
						      </div>
						    </div>
						  </div>
                
						</div> 
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