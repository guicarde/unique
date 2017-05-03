function calcular_duracion_tsm(){
    var inicio = document.getElementById('inicio_tsm').value;
    var fin = document.getElementById('fin_tsm').value;
    if (inicio < fin ){
    var inicioMinutos = parseInt(inicio.substr(3,2));
    var inicioHoras = parseInt(inicio.substr(0,2));

    var finMinutos = parseInt(fin.substr(3,2));
    var finHoras = parseInt(fin.substr(0,2));

    var transcurridoMinutos = finMinutos - inicioMinutos;
    var transcurridoHoras = finHoras - inicioHoras;

    if (transcurridoMinutos < 0) {
      transcurridoHoras--;
      transcurridoMinutos = 60 + transcurridoMinutos;
    }

    var horas = transcurridoHoras.toString();
    var minutos = transcurridoMinutos.toString();

    if (horas.length < 2) {
      horas = "0"+horas;
    }

    if (horas.length < 2) {
      horas = "0"+horas;
    }
    if(minutos < 10){
    var duracion = horas+":0"+minutos;   
    }else{
    var duracion = horas+":"+minutos;     
    }
    }else{
    var inicioMinutos = parseInt(inicio.substr(3,2));
    var inicioHoras = parseInt(inicio.substr(0,2));

    var finMinutos = parseInt(fin.substr(3,2));
    var finHoras = parseInt(fin.substr(0,2));

    var transcurridoMinutos = 00 - inicioMinutos+finMinutos;
    var transcurridoHoras = 24 - inicioHoras + finHoras;

    if (transcurridoMinutos < 0) {
      transcurridoHoras--;
      transcurridoMinutos = 60 + transcurridoMinutos;
    }

    var horas = transcurridoHoras.toString();
    var minutos = transcurridoMinutos.toString();

    if (horas.length < 2) {
      horas = "0"+horas;
    }

    if (horas.length < 2) {
      horas = "0"+horas;
    }
    if(minutos < 10){
    var duracion = horas+":0"+minutos;   
    }else{
    var duracion = horas+":"+minutos;     
    }
    }
    
    document.getElementById('duracion_tsm').value= duracion;
}

function calcular_duracion_dia(){
    var inicio = document.getElementById('inicio_dia').value;
    var fin = document.getElementById('fin_dia').value;
    if (inicio < fin ){
    var inicioMinutos = parseInt(inicio.substr(3,2));
    var inicioHoras = parseInt(inicio.substr(0,2));

    var finMinutos = parseInt(fin.substr(3,2));
    var finHoras = parseInt(fin.substr(0,2));

    var transcurridoMinutos = finMinutos - inicioMinutos;
    var transcurridoHoras = finHoras - inicioHoras;

    if (transcurridoMinutos < 0) {
      transcurridoHoras--;
      transcurridoMinutos = 60 + transcurridoMinutos;
    }

    var horas = transcurridoHoras.toString();
    var minutos = transcurridoMinutos.toString();

    if (horas.length < 2) {
      horas = "0"+horas;
    }

    if (horas.length < 2) {
      horas = "0"+horas;
    }
    if(minutos < 10){
    var duracion = horas+":0"+minutos;   
    }else{
    var duracion = horas+":"+minutos;     
    }
    }else{
    var inicioMinutos = parseInt(inicio.substr(3,2));
    var inicioHoras = parseInt(inicio.substr(0,2));

    var finMinutos = parseInt(fin.substr(3,2));
    var finHoras = parseInt(fin.substr(0,2));

    var transcurridoMinutos = 00 - inicioMinutos+finMinutos;
    var transcurridoHoras = 24 - inicioHoras + finHoras;

    if (transcurridoMinutos < 0) {
      transcurridoHoras--;
      transcurridoMinutos = 60 + transcurridoMinutos;
    }

    var horas = transcurridoHoras.toString();
    var minutos = transcurridoMinutos.toString();

    if (horas.length < 2) {
      horas = "0"+horas;
    }

    if (horas.length < 2) {
      horas = "0"+horas;
    }
    if(minutos < 10){
    var duracion = horas+":0"+minutos;   
    }else{
    var duracion = horas+":"+minutos;     
    }
    }
    
    document.getElementById('duracion_dia').value= duracion;
}

function calcular_duracion_desa(){
    var inicio = document.getElementById('inicio_desa').value;
    var fin = document.getElementById('fin_desa').value;
    if (inicio < fin ){
    var inicioMinutos = parseInt(inicio.substr(3,2));
    var inicioHoras = parseInt(inicio.substr(0,2));

    var finMinutos = parseInt(fin.substr(3,2));
    var finHoras = parseInt(fin.substr(0,2));

    var transcurridoMinutos = finMinutos - inicioMinutos;
    var transcurridoHoras = finHoras - inicioHoras;

    if (transcurridoMinutos < 0) {
      transcurridoHoras--;
      transcurridoMinutos = 60 + transcurridoMinutos;
    }

    var horas = transcurridoHoras.toString();
    var minutos = transcurridoMinutos.toString();

    if (horas.length < 2) {
      horas = "0"+horas;
    }

    if (horas.length < 2) {
      horas = "0"+horas;
    }
    if(minutos < 10){
    var duracion = horas+":0"+minutos;   
    }else{
    var duracion = horas+":"+minutos;     
    }
    }else{
    var inicioMinutos = parseInt(inicio.substr(3,2));
    var inicioHoras = parseInt(inicio.substr(0,2));

    var finMinutos = parseInt(fin.substr(3,2));
    var finHoras = parseInt(fin.substr(0,2));

    var transcurridoMinutos = 00 - inicioMinutos+finMinutos;
    var transcurridoHoras = 24 - inicioHoras + finHoras;

    if (transcurridoMinutos < 0) {
      transcurridoHoras--;
      transcurridoMinutos = 60 + transcurridoMinutos;
    }

    var horas = transcurridoHoras.toString();
    var minutos = transcurridoMinutos.toString();

    if (horas.length < 2) {
      horas = "0"+horas;
    }

    if (horas.length < 2) {
      horas = "0"+horas;
    }
    if(minutos < 10){
    var duracion = horas+":0"+minutos;   
    }else{
    var duracion = horas+":"+minutos;     
    }
    }
    
    document.getElementById('duracion_desa').value= duracion;
}

function calcular_duracion_cond(){
    var inicio = document.getElementById('inicio_cond').value;
    var fin = document.getElementById('fin_cond').value;
    if (inicio < fin ){
    var inicioMinutos = parseInt(inicio.substr(3,2));
    var inicioHoras = parseInt(inicio.substr(0,2));

    var finMinutos = parseInt(fin.substr(3,2));
    var finHoras = parseInt(fin.substr(0,2));

    var transcurridoMinutos = finMinutos - inicioMinutos;
    var transcurridoHoras = finHoras - inicioHoras;

    if (transcurridoMinutos < 0) {
      transcurridoHoras--;
      transcurridoMinutos = 60 + transcurridoMinutos;
    }

    var horas = transcurridoHoras.toString();
    var minutos = transcurridoMinutos.toString();

    if (horas.length < 2) {
      horas = "0"+horas;
    }

    if (horas.length < 2) {
      horas = "0"+horas;
    }
    if(minutos < 10){
    var duracion = horas+":0"+minutos;   
    }else{
    var duracion = horas+":"+minutos;     
    }
    }else{
    var inicioMinutos = parseInt(inicio.substr(3,2));
    var inicioHoras = parseInt(inicio.substr(0,2));

    var finMinutos = parseInt(fin.substr(3,2));
    var finHoras = parseInt(fin.substr(0,2));

    var transcurridoMinutos = 00 - inicioMinutos+finMinutos;
    var transcurridoHoras = 24 - inicioHoras + finHoras;

    if (transcurridoMinutos < 0) {
      transcurridoHoras--;
      transcurridoMinutos = 60 + transcurridoMinutos;
    }

    var horas = transcurridoHoras.toString();
    var minutos = transcurridoMinutos.toString();

    if (horas.length < 2) {
      horas = "0"+horas;
    }

    if (horas.length < 2) {
      horas = "0"+horas;
    }
    if(minutos < 10){
    var duracion = horas+":0"+minutos;   
    }else{
    var duracion = horas+":"+minutos;     
    }
    }
    
    document.getElementById('duracion_cond').value= duracion;
}

function calcular_duracion_comi(){
    var inicio = document.getElementById('inicio_comi').value;
    var fin = document.getElementById('fin_comi').value;
    if (inicio < fin ){
    var inicioMinutos = parseInt(inicio.substr(3,2));
    var inicioHoras = parseInt(inicio.substr(0,2));

    var finMinutos = parseInt(fin.substr(3,2));
    var finHoras = parseInt(fin.substr(0,2));

    var transcurridoMinutos = finMinutos - inicioMinutos;
    var transcurridoHoras = finHoras - inicioHoras;

    if (transcurridoMinutos < 0) {
      transcurridoHoras--;
      transcurridoMinutos = 60 + transcurridoMinutos;
    }

    var horas = transcurridoHoras.toString();
    var minutos = transcurridoMinutos.toString();

    if (horas.length < 2) {
      horas = "0"+horas;
    }

    if (horas.length < 2) {
      horas = "0"+horas;
    }
    if(minutos < 10){
    var duracion = horas+":0"+minutos;   
    }else{
    var duracion = horas+":"+minutos;     
    }
    }else{
    var inicioMinutos = parseInt(inicio.substr(3,2));
    var inicioHoras = parseInt(inicio.substr(0,2));

    var finMinutos = parseInt(fin.substr(3,2));
    var finHoras = parseInt(fin.substr(0,2));

    var transcurridoMinutos = 00 - inicioMinutos+finMinutos;
    var transcurridoHoras = 24 - inicioHoras + finHoras;

    if (transcurridoMinutos < 0) {
      transcurridoHoras--;
      transcurridoMinutos = 60 + transcurridoMinutos;
    }

    var horas = transcurridoHoras.toString();
    var minutos = transcurridoMinutos.toString();

    if (horas.length < 2) {
      horas = "0"+horas;
    }

    if (horas.length < 2) {
      horas = "0"+horas;
    }
    if(minutos < 10){
    var duracion = horas+":0"+minutos;   
    }else{
    var duracion = horas+":"+minutos;     
    }
    }
    
    document.getElementById('duracion_comi').value= duracion;
}
function calcular_duracion(){
    var inicio = document.getElementById('inicio').value;
    var fin = document.getElementById('fin').value;
    if (inicio < fin ){
    var inicioMinutos = parseInt(inicio.substr(3,2));
    var inicioHoras = parseInt(inicio.substr(0,2));

    var finMinutos = parseInt(fin.substr(3,2));
    var finHoras = parseInt(fin.substr(0,2));

    var transcurridoMinutos = finMinutos - inicioMinutos;
    var transcurridoHoras = finHoras - inicioHoras;

    if (transcurridoMinutos < 0) {
      transcurridoHoras--;
      transcurridoMinutos = 60 + transcurridoMinutos;
    }

    var horas = transcurridoHoras.toString();
    var minutos = transcurridoMinutos.toString();

    if (horas.length < 2) {
      horas = "0"+horas;
    }

    if (horas.length < 2) {
      horas = "0"+horas;
    }
    if(minutos < 10){
    var duracion = horas+":0"+minutos;   
    }else{
    var duracion = horas+":"+minutos;     
    }
    
    }else{
    var inicioMinutos = parseInt(inicio.substr(3,2));
    var inicioHoras = parseInt(inicio.substr(0,2));

    var finMinutos = parseInt(fin.substr(3,2));
    var finHoras = parseInt(fin.substr(0,2));

    var transcurridoMinutos = 00 - inicioMinutos+finMinutos;
    var transcurridoHoras = 24 - inicioHoras + finHoras;

    if (transcurridoMinutos < 0) {
      transcurridoHoras--;
      transcurridoMinutos = 60 + transcurridoMinutos;
    }

    var horas = transcurridoHoras.toString();
    var minutos = transcurridoMinutos.toString();

    if (horas.length < 2) {
      horas = "0"+horas;
    }

    if (horas.length < 2) {
      horas = "0"+horas;
    }
    if(minutos < 10){
    var duracion = horas+":0"+minutos;   
    }else{
    var duracion = horas+":"+minutos;     
    }
    }
    
    document.getElementById('duracion').value= duracion;
}

function cerrarSchedule(){
    
//    alert('pruebame');
//   exit();
    document.getElementById('hiddenschedule').value = 'guardarscheduleope';
    document.getElementById('form_cerrar_schedule').submit();
}

function cargaModelo()
{
    
    var id_marca = document.getElementById('id_marca').value;
   
    $("#comboModelo").load("../Controles/Registro/CBien.php", 
      {
          hidden_bien: "cargarModelo",
          hidden_marca: id_marca
          
      }, function(){
      }
      );

}
function cargaSubTipoIncidencia()
{
    
    var id_tipo = document.getElementById('id_tipo').value;
   
    $("#comboSubTipoIncidencia").load("../Controles/Registro/CIncidencia.php", 
      {
          hidden_incidencia: "cargarSubTipoIncidencia",
          hidden_tipo: id_tipo
          
      }, function(){
      }
      );

}
function cargaArea()
{
    
    var id_sede = document.getElementById('id_sede').value;
   
    $("#comboArea").load("../Controles/Registro/CIncidencia.php", 
      {
          hidden_incidencia: "cargarArea",
          hidden_sede: id_sede
          
      }, function(){
      }
      );

}

function cargaNivel()
{
    
    var id_sede = document.getElementById('id_sede').value;
   
    $("#comboNivel").load("../Controles/Registro/CIncidencia.php", 
      {
          hidden_incidencia: "cargarNivel",
          hidden_sede: id_sede
          
      }, function(){
      }
      );

}

function cargaSolicitante()
{
    
    var id_area = document.getElementById('id_area').value;
    
    $("#comboSolicitante").load("../Controles/Registro/CIncidencia.php", 
      {
          hidden_incidencia: "cargarSolicitante",
          hidden_area: id_area
          
      }, function(){
      }
      );

}

function iniciarTarea(id_schedule)
{  
    var idschedule = document.getElementById('id_schedule_act'+id_schedule).value;
    var accion = document.getElementById('hidden_schedule').value;
             
        $("#inicio_tar"+id_schedule).load("../Controles/Registro/CSchedule.php", 
            {
              hidden_schedule : accion,
              id_schedule_act: idschedule
            }, function(){
            }
            );    
    
        
        $("#div_finalizar_tarea"+id_schedule).load("../Controles/Registro/CSchedule.php", 
            {
              hidden_schedule : 'habilitar_finalizar',
              id_schedule_act: idschedule
            }, function(){
            }
            );   
    
}


function comentario_Tarea(id_schedule)
{
    $("#div_comentario_tarea"+id_schedule).load("../Controles/Registro/CSchedule.php", 
            {
              hidden_schedule : 'insertar_comentario',
              txt_comentario: document.getElementById('txt_comentario'+id_schedule).value,
              horainicio: document.getElementById('horainicio'+id_schedule).value,
              horafinal: document.getElementById('horafinal'+id_schedule).value,
              c_estado_tar: document.getElementById('c_estado_tar'+id_schedule).value,
              id_schedule_act: id_schedule
            }, function(){
            }
            );  
}


function finalizar_Tarea(id_schedule)
{
        $("#div_finalizatarea"+id_schedule).load("../Controles/Registro/CSchedule.php", 
            {
              hidden_schedule : 'finalizar_tarea',
              id_schedule_act: id_schedule
            }, function(){
            }
            ); 
    
    
    setTimeout(function(){
    
  
     $("#div_comentario_tarea"+id_schedule).load("../Controles/Registro/CSchedule.php", 
            {
              hidden_schedule : 'habilitar_comentario_tarea',
              id_schedule_act: id_schedule,
              hora_inicio : document.getElementById("id_marcado_hora_inicio"+id_schedule).value,
              hora_fin : document.getElementById("id_marcado_hora_fin"+id_schedule).value              
            }, function(){
            }
            ); 
    
    },1000);
    
    
}