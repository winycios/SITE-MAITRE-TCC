


$(document).on('submit', '#formCat', function(e) {
    e.preventDefault();
    categorias = []; 
    var url = "/buscar?"
    var inputElements = document.getElementsByClassName('filtroCat');
    for(var i=0; inputElements[i]; ++i){
          if(inputElements[i].checked){
               //categorias.push(inputElements[i].value);
               url += "categoria[]=" + inputElements[i].value + "&";
          }
    }

    url = url.slice(0, -1)

    //var data = $.param({ categoria:categorias });

    $.get(url, { "categoria[]": categorias})
    .done(function(data) {
       console.log(data);

       $(".row").empty();
        for(var i = 0; i < data.length; i++){
            $(".row").append(`<div class='col-lg-4 col-md-6'> 
                <div class='member'> 
                    <div class="pic"><img class="restaurante-img" src=/storage/${data[i].foto} class="img-fluid" alt=""></div>
                    <div class='member-info'>
                        <h4>${data[i].nome}</h4>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <div class="social">
                            <p>${data[i].categoria}</p>
                        </div>
                        <div class="center-button">
                            <a href="/restaurantes/${data[i].id}"><button type="submit" class="button-coment">Visitar restaurante</button></a>
                        </div>
                    </div>
                </div>
            </div>`)
        }
    })
       


        // <div class="col-lg-4 col-md-6">
        //                                 <div class="member">
        //                                     <div class="pic"><img class="restaurante-img" src="{{$r->foto}}" class="img-fluid" alt=""></div>
        //                                     <div class="member-info">
        //                                         <h4>{{$r->nome}}</h4>
        //                                         <div class="stars">
        //                                             <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
        //                                                 class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
        //                                                 class="bi bi-star-fill"></i>
        //                                         </div>
        //                                         <div class="social">
        //                                         <p>{{$r->categoria}}</p>
        //                                         </div>
        //                                         <div class="center-button">
        //                                             <a href="/restaurantes/{{$r->id}}"><button type="submit"
        //                                                     class="button-coment">Visitar restaurante</button></a>
        //                                         </div>
        //                                     </div>
        //                                 </div>
        //                             </div>     

    
    // $.ajax({
    //     type:"GET",
    //     data: { categoria: jQuery.param({categoria:categorias})}, // "a[]=2&a[]=3&a[]=4"
    //     url: "/buscar",
    //     dataType: "json",
    //     success: function(data, textStatus, xhr) {
    //         if(xhr.status == 200){
    //             $("#resultado").empty();
    //             for(var i = 0; i < data.length; i++){
    //                 $("#resultado").append( `<a class="busca" href='/restaurantes/${data[i].id}'>` + data[i].nome + "</a>");
    //             }
    //         }
            
    //     },
    //     error: function(error){
    //         console.log("Error:");
    //         console.log(error);
    //     }

    // });
    
})
