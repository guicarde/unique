<?php
include_once '../../DAO/Conexion.php';
include_once '../../Recursos/classes_excel/PHPExcel/IOFactory.php'; 
include_once '../../DAO/Registro/Actividad.php';

//if(isset($_SESSION))
//session_start();



$direccionInicio = "location:../../Vistas/index.php";
$direccionMantener = "location: ../../Vistas/MantenerActividad.php";
$direccionGuardar = "location: ../../Vistas/SubirExcel.php";
 
if (isset($_POST['hidden_excel'])) {

    $accion = $_POST['hidden_excel'];
    
   
    if ($accion == 'save')
    {
        ini_set('max_execution_time', 300);
        ini_set('memory_limit', '-1');        
                
        $archivo = $_FILES["fileArchivo"]['name'];
        move_uploaded_file($_FILES['fileArchivo']['tmp_name'],$archivo);
        
        $inputFileType = PHPExcel_IOFactory::identify($archivo);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel = $objReader->load($archivo);
        
        //numero de pestaña
        $sheet = $objPHPExcel->getSheet(0);
     
        $ultima_fila = $sheet->getHighestRow();
        $ultima_columna = $sheet->getHighestColumn();
            
        
        $MaxArreglo=array();
        
        for ($row = 21; $row <= 123; $row++)
        {
            //extraer fila
            $rowData = $sheet->rangeToArray('A' . $row . ':' . 'T' . $row,NULL, TRUE, FALSE);
            
            $Arreglo=array();
            
            foreach($rowData as $r)
                {
                    if($r!=null)
                    {
                        // DIAS DE LA SEMANA
                        $dias=array();
                        if($r[4]!=null){ $dias[]=1; } //lun
                        if($r[5]!=null){ $dias[]=2; } //mar
                        if($r[6]!=null){ $dias[]=3; } //mie
                        if($r[7]!=null){ $dias[]=4; } //jue
                        if($r[8]!=null){ $dias[]=5; } //vie
                        if($r[9]!=null){ $dias[]=6; } //sab
                        if($r[10]!=null){ $dias[]=7; } //dom
                        
                        
                        //Columna B
                        $B = $r[1]; if($B==null){ $B=''; }
                        //Columna C
                        $C = $r[2]; if($C==null){ $C=''; }
                        //Columna M
                        $M = $r[12]; if($M==null){ $M=''; }
                        //Columna N
                        $N = $r[13]; if($N==null){ $N=''; }
                        //Columna O
                        $O = PHPExcel_Style_NumberFormat::toFormattedString($r[14], 'hh:mm:ss');;
                        //Columna P 
                        $P = $r[15]; if($P==null){ $P=''; }
                        //Columna R 
                        $R = $r[17]; if($R==null){ $R=''; }
                        //Columna S 
                        $S = $r[18]; if($S==null){ $S=''; }
                        //Columna T
                        $T = $r[19]; if($T==null){ $T=''; }
                        
                        
                        $Arreglo = [$B,$C,$M,$N,$O,$P,$R,$S,$T];
                        
                    }
                }
                
           $MaxArreglo[] = array($Arreglo,$dias);
        }
        
        
        //Grabar
        foreach($MaxArreglo AS $gordo)
            {
                $datos = $gordo[0];
                $dias  = $gordo[1];
                
                $ob = new Actividad();
                
                //guardar datos
                $id = $ob->grabarExcel( $datos[0],$datos[1],$datos[2],$datos[3],$datos[4],
                                  $datos[5],$datos[6],$datos[7],$datos[8]);
                
               if($datos[0]=='MAÑANA UNIQUE'){
                   $turno_a=1;                   
               }else if($datos[0]=='TARDE UNIQUE'){
                   $turno_a=2;                   
               }else if($datos[0]=='NOCHE UNIQUE'){
                   $turno_a=3;                   
               }
               
               if($datos[1]=='X'){
                   $turno_b=4;                   
               }else {
                   $turno_b=5;   
               }
               
               if($datos[0]!= ''){
               $ob_t=new Actividad();
               $ob_t->setId($id);
               $ob_t->setIdturno($turno_a);
               $ob_t->grabar_turno($ob_t);
               }
               
               
               $ob_t=new Actividad();
               $ob_t->setId($id);
               $ob_t->setIdturno($turno_b);
               $ob_t->grabar_turno($ob_t);
               
               
                //guardar dias
                $obj = new Actividad();
                
                foreach($dias as $d)
                {
                    $obj->setIddia($d);
                    $obj->setId($id);
                    
                    $obj->grabar_dia($obj);
                }
            }
            
            header("location: ../../Vistas/MantenerActividad.php");
    }  
    
   
 
} else {
    header("location: ../../Vistas/error.php");
}
