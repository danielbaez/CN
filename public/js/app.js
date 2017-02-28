$( document ).ready(function() {

  function timeConverter(UNIX_timestamp){
    var a = new Date(UNIX_timestamp * 1000);
    var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    var year = a.getFullYear();
    //var month = months[a.getMonth()];
    var month = ("0" + (a.getMonth() + 1)).slice(-2);
    var date = ("0" + (a.getDate())).slice(-2);
    var hour = ("0" + (a.getHours())).slice(-2);
    var min = ("0" + (a.getMinutes())).slice(-2);
    //var sec = ("0" + (a.getSeconds())).slice(-2);
    var date_format = date + '-' + month + '-' + year + ' ' + hour + ':' + min;
    return date_format;
  }

  $('.tipo_usuario').on('change', function() {
    var tipo = this.value;
    
    if(tipo == 'administrador'){
      $('.div-sucursales').hide();
    }
    else{
      $('.div-sucursales').show();
    }

  });

  $("#form-usuario").on("submit", function(){
    if($('.tipo_usuario').val() == 'administrador'){
      $('.sucursales option:last').attr("selected", "selected"); 
    }
   
 })

  if($('.tipo_usuario').val() == 'administrador'){
    $('.div-sucursales').hide();
  }

});