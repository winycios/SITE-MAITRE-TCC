function modalPrato(id){
    console.log(id)
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
  
      request = $.ajax({
          url: "/api/pratos/" + id,
          type: "GET",
          dataType: 'json',
          processData: false,
          contentType: "application/json; charset=utf-8",
      });
  
      request.done(function (response, textStatus, jqXHR){
          console.log(response)
         

          $('#nomePrato').text(response.nome);
          $('#desc').text(response.descPrato);
          $('#preco').text(parseFloat(response.valor).toFixed(2));

  

  
      });
      request.fail(function (jqXHR, textStatus, errorThrown){
          console.error(
              "The following error occurred: "+
              textStatus, errorThrown
          );
      });   
}