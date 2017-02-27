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

  $('#select-motivo').on('change', function() {
    var idMotivo = this.value;
    if(idMotivo != ''){
      $('.btn-guardar-operacion').prop( "disabled", false);
    }

    if(idMotivo == 5){
      $('.div-comentario').show();
    }
    else{
      $('.div-comentario').hide();
    }
  });


  $(document).on('click', '.entriesMoreClientRepCot', function(even) {
    even.preventDefault();
    var inst = $(this);
    var email = $(this).data('email');
    var id = $(this).data('id');
    var idt = $(this).data('idt');
    var otherp = $("tr.showMoreEntriesClient").data('id');
    var other = $("tr.showMoreEntriesClient").data('idcall');
    if(other != idt){
      $("tr[data-idParent='"+otherp+"']").remove();
      $("tr.showMoreEntriesClient").css('border-left','none');
      $("tr.showMoreEntriesClient").find('i.icon-morecall').removeClass('fa-arrow-up').addClass('fa-arrow-down');
      $("tr.showMoreEntriesClient").removeClass('showMoreEntriesClient');
    }
    if(inst.find('i').hasClass('fa-arrow-down')){
      
      inst.closest("tr").addClass('showMoreEntriesClient');
      inst.find('i').removeClass('fa-arrow-down').addClass('fa-arrow-up');
      var url = 'calls/ajax';
      $.ajax({
        data: {id:id, idt:idt, action:'entriesMoreClientRepCot'},
        type: "GET",
        dataType: "json",
        url: url,
      })
      .done(function(data){
        if(data.success){
          var result = data.result;
          for(var i = 0; i < result.length; i++){
            var html = '';

            var request = result[i].request;

            var carname = "";
            if(request != null && request != ''){
              if(request.carname){
                carname += request.carname;
              }
              if(request.year){
                carname += ' ('+request.year+')';
              }
            }

            if(result[i].compare && result[i].compare.length > 0){
              carname += "<br><a href='"+result[i].compare+"' target='_blank'>Resultados</a>";
            } 

            var counterCalls = '<p class="counterCall" style="margin-top: 7px;">';
            if(result[i].countCall > 0){
              counterCalls += '<span class="badge call-bagde bagde-counter-call">'+result[i].countCall+'</span>';
            }
            counterCalls+='</p>';

            var aaa = '';

            /*if(result[i].operation_id == 4){
              aaa = '<i class="fa fa-database info-cotiz" aria-hidden="true" data-id='+result[i].id+'></i>';
            }*/

            var icnnns = '';
 
            if(result[i].normal == 0 && result[i].operation_id == 4)
            {
              icnnns += '<img class="info-cotiz" data-id='+result[i].id+' style="height: 25px;width: 25px; margin-right:5px" src="../images/cotizacion.png">';
            }
            if(result[i].normal == 0 && result[i].operation_id == 5)
            {
              icnnns += '<img class="info-cotiz" data-id='+result[i].id+' style="height: 25px;width: 25px; margin-right:5px" src="../images/reprogramado.png">';
            }         

            html = "<tr style='border-left: 12px solid dodgerblue;' data-idcall="+result[i].id+" data-idParent="+id+" data-table='repcot'><td class='text-center'><p class='table-colum-id'>"+result[i].id+"</p>"+aaa+"</td><td>"+result[i].name+"<br>"+result[i].e+"<br>"+icnnns+"</td><td>"+timeConverter(result[i].time)+"</td><td><input class='form-control input-tel' type='input' value='"+result[i].phone+"'></td><td class='text-center'>"+carname+"</td><td class='text-center'><button class='btn disabled btn-success'><i class='fa fa-phone fa-2x' aria-hidden='true'></i></button>"+counterCalls+"</td><td>"+result[i].prima+"</td><td>"+result[i].company+"</td><td class='text-center'><a class='btn btn-warning btn-actualizar disabled'><i class='fa fa-pencil-square-o fa-2x' aria-hidden='true'></i></a></td></tr>";

            inst.closest("tr").after(html);
            inst.closest("tr").css('border-left','20px solid green');
          } 

            
        }
        
      })
    }
    else{
      $("tr[data-idParent='"+id+"']").remove();
      inst.closest("tr").css('border-left','none');
      inst.find('i.icon-morecall').removeClass('fa-arrow-up').addClass('fa-arrow-down');
      inst.closest("tr").removeClass('showMoreEntriesClient');
    }
  });


});