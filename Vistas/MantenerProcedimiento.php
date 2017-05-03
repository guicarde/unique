<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
//------------------------------------------------
if(!isset($_SESSION['accion_procedimiento'])){ 
    $_SESSION['accion_procedimiento']="";
}
include_once '../DAO/Registro/Procedimiento.php';
$procedimiento = new Procedimiento();

if (isset($_SESSION['accion_procedimiento']) && $_SESSION['accion_procedimiento'] != '') {

    if ($_SESSION['accion_procedimiento'] == 'busqueda') {
        $procedimientos = $_SESSION['arreglo_buscado_procedimiento'];
    } else {
        $procedimientos = $procedimiento->listar();
    }
} else {
    $procedimientos = $procedimiento->listar();
}
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
            <li class="active treeview">
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
                      <li><a href="MantenerCategoria.php"><i class="fa fa-circle-o"></i> Mantener Categoria </a></li>                    
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
                <li class="active">
                  <a href="#"><i class="fa fa-circle-o"></i> Procedimientos <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li><a href="GuardarProcedimiento.php"><i class="fa fa-circle-o"></i> Guardar Procedimiento </a></li>                    
                  </ul>
                  <ul class="treeview-menu">
                      <li class="active"><a href="MantenerProcedimiento.php"><i class="fa fa-circle-o"></i> Mantener Procedimiento </a></li>                    
                  </ul>
                </li>
                   
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-tasks"></i> <span>ACTIVIDADES</span> <i class="fa fa-angle-left pull-right"></i>
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
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            MANTENER PROCEDIMIENTOS
            <small>Busqueda de Procedimientos</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-user"></i> PROCEDIMIENTOS</a></li>
            <li><a href="index.php">Procedimiento</a></li>
            <li class="active">Mantener Procedimiento</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
           
         <div class="row"> 
             <form class="form-horizontal" action="../Controles/Registro/CProcedimiento.php" method="POST">
              <input type="hidden" id="hiddenprocedimiento" name="hidden_procedimiento" value="buscar"> 
           <div class="col-md-6">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Busqueda del Procedimiento</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                
                     
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputnombres" class="col-sm-2 control-label">Procedimiento</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="t_procedimiento" placeholder="Ingrese Descripción">
                      </div>
                    </div>    
                      
                    
                  </div><!-- /.box-body -->
                  
                
              </div><!-- /.box -->
              <!-- general form elements disabled -->
              
            </div><!--/.col (right) -->  
            <div class="col-md-6">
             <div class="box box-info">
                 <div class="box-header with-border">
                  <h3 class="box-title"></h3>
                </div><!-- /.box-header -->
                
                <div class="box-body">
                    <div class="form-group">
                                        <label for="inputestado" class="col-sm-2 control-label">Estado</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" style="width: 100%;" name="c_estado">
                                                <option value="">--SELECCIONE--</option>
                                                <option value="1">ACTIVO</option>
                                                <option value="0">INACTIVO</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputfecha" class="col-sm-2 control-label">Fecha Reg.</label>
                                        <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="date" name="t_fecha_reg" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask>
                                        </div>
                                        </div>
                                    </div>
                    
                </div>
            </div>
            </div>
            
          <div class="col-md-12">
              <div class="box box-success">
                  <div class="box-body">
                      <div class="box-footer" align="center">
                        <button type="submit" class="btn btn-yahoo">Buscar</button>
                      </div>
                  </div>                  
              </div>
          </div>
          
          </form>
         </div> <!--/.row  -->  
        
         
         <div class="row"> 
             <div class="col-md-12">
                <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Resultados de Busqueda</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
 <?php if ($procedimientos != null) { ?>
                    <thead>
                      <tr>
                        <th> N°</th>
                        <th>NOMBRE PROCEDIMIENTO</th>                                          
                        <th> ESTADO</th>
                        <th> FECHA DE REGISTRO</th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
   <?php
    $num = 1;
    foreach ($procedimientos as $p) {
        ?>
                      <tr>
                        <td><?php echo $num;$num++; ?></td>
                        <td><?php echo $p['procedimiento_nombre']; ?></td>                                  
                        <td>
                             <?php if ($p['procedimiento_estado']=='0'){?> 
                            <div class="callout callout-danger">
                                <p>Inactivo</p>
                            </div>
                            <?php } ?>
                            <?php if ($p['procedimiento_estado']=='1'){?> 
                            <div class="callout callout-info">
                                <p>Activo</p>
                            </div>
                            <?php } ?>
                        
                        </td>
                        <td><?php echo $p['procedimiento_fecharegistro'] ?></td>
                        <td>
                            <?php
                            if ($p['procedimiento_estado'] == '1') {
                                ?>
                                <form method='POST' id="formusu" action="../Controles/Registro/CProcedimiento.php">
                                    <input type="hidden" name="id_hidden_eliminar" value="<?php echo $p['procedimiento_idprocedimiento'] ?>">
                                    <input type="hidden" name="hidden_procedimiento" value="anular">
                                    <input type="hidden" name="hidden_estado" value="activo">
                                    <button type="submit" class="btn btn-success btn-xs" title="Desactivar"><i class="fa fa-check"></i></button>
                                </form>    
                                <?php
                            } else {
                                ?>
                                <form method='POST' id="formusu" action="../Controles/Registro/CProcedimiento.php">
                                    <input type="hidden" name="id_hidden_eliminar" value="<?php echo $p['procedimiento_idprocedimiento'] ?>">
                                    <input type="hidden" name="hidden_procedimiento" value="anular">
                                    <input type="hidden" name="hidden_estado" value="inactivo">
                                    <button type="submit" class="btn btn-danger btn-xs" title="Activar"><i class="fa fa-warning"></i></button>
                                </form> 
                            <?php } ?>
                        </td>
                        <td>
                            <form method='POST' id="formusu" action="../Controles/Registro/CProcedimiento.php">
                                <input type="hidden" name="hidden_procedimiento" value="buscarid">
                                <input type="hidden" name="idprocedimiento" value="<?php echo $p['procedimiento_idprocedimiento'] ?>">
                                <button type="submit" class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></button>
                            </form>    
                        </td>
                        <td>
                            <a href="../Controles/Procedimientos/<?php echo $p['procedimiento_archivo']?>" target="_new" class="label label-info label-mini">                         
                            VER DOCUMENTO</a>

                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                     
                    <tfoot>
                      <tr>
                        <th> N°</th>
                        <th>NOMBRE PROCEDIMIENTO</th>                                          
                        <th> ESTADO</th>
                        <th> FECHA DE REGISTRO</th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                    </tfoot>
                   <?php } else { ?>
                    <div class="alert alert-danger"><i class="fa fa-warning"></i><b> Error!</b><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Su búsqueda no produjo ningún resultado..!</div> 
<!--                                        <center><label>Su búsqueda no produjo ningún resultado. </label></center>-->


                    <?php } ?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box --> 
             </div>
         </div>
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
      <!-- Select2 -->
    <script src="plugins/select2/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="../../plugins/input-mask/jquery.inputmask.js"></script>
    <script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- page script -->
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
