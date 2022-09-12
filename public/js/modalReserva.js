var mesa = document.getElementById('selectMesa');

var mesas = document.getElementById('totalMesas');
var assentos = document.getElementById('totalAssentos');

var totalMesas = 0;
var totalAssentos = 0;

var list = document.querySelector('#mesas');
var cadeiras = document.querySelector('#assentos');

var excluir;
var id;
var idMesas = [];
var total = 0;



function adicionaZero(numero){
    if (numero <= 9) 
        return "0" + numero;
    else
        return numero; 
}






function carregaModal(x){
    id = x
    limpar()

    console.log(id)


    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    request = $.ajax({
        url: "/reservas/" + id,
        type: "GET",
        dataType: 'json',
        processData: false,
        contentType: "application/json; charset=utf-8",
    });

    request.done(function (response, textStatus, jqXHR){
        let data = new Date(response.data); //29/01/2020
        let dataFormatada = (adicionaZero(data.getDate().toString()) + "/" + (adicionaZero(data.getMonth()+1).toString()) + "/" + data.getFullYear());
        $('#nome').text(response.nome);
        $('#email').text(response.email);
        $('#diaSemana').text(response.diaSemana);
        $('#horario').text(response.horario);
        $('#data').text(dataFormatada);
        $('#qtd').text(response.qtdPessoas);

        $('#nome1').text(response.nome);
        $('#email1').text(response.email);
        $('#diaSemana1').text(response.diaSemana);
        $('#horario1').text(response.horario);
        $('#data1').text(dataFormatada);
        $('#qtd1').text(response.qtdPessoas)

        $('#nome2').text(response.nome);
        $('#email2').text(response.email);
        $('#diaSemana2').text(response.diaSemana);
        $('#horario2').text(response.horario);
        $('#data2').text(dataFormatada);
        $('#qtd2').text(response.qtdPessoas)
        var qtd = document.getElementById('qtdP');
        qtd.value= response.qtdPessoas

    });
    request.fail(function (jqXHR, textStatus, errorThrown){
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });   

}


function rejeitarReserva(){
    body = {
        "status_reserva_id": 3,
    }

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    request = $.ajax({
        url: "/reservas/rejeitar/" + id,
        type: "PATCH",
        data: JSON.stringify(body),
        dataType: 'json',
        processData: false,
        contentType: "application/json; charset=utf-8",
    });

    request.done(function (response, textStatus, jqXHR){ 
        $("#status"+ id).removeClass().addClass("danger");
        $('#status'+ id).text('Cancelado');


    });
    request.fail(function (jqXHR, textStatus, errorThrown){
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });   

}

async function mesaReservas(mesa, duracao){
    const response = await fetch('/api/mesas/reserva',{
        method: "POST",
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',          
        },
        body: JSON.stringify({mesa_id:mesa, reserva_id:id, duracao:duracao}),
    })
    return response

}


async function aprovarReserva(e){
    e.preventDefault()
    var qtd = document.getElementById('qtdP').value;
    var duracao = document.getElementById('duracao').value;

    console.log(duracao+= ':00')

    if(duracao == 0){
        alert('defina uma duração')
    }
    else if(total >= qtd){
        for(var i =0; i < idMesas.length; i++){
            
            const { status } = await mesaReservas(idMesas[i], duracao)


            if(status === 201 && i == idMesas.length -1){
                body = {
                    "status_reserva_id": 2,
                }
            
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
            
                request = $.ajax({
                    url: "/reservas/aprovar/" + id,
                    type: "PATCH",
                    data: JSON.stringify(body),
                    dataType: 'json',
                    processData: false,
                    contentType: "application/json; charset=utf-8",
                });
            
                request.done(function (response, textStatus, jqXHR){
                    $("#status" + id).removeClass().addClass("success");
                    $('#status'+ id).text('Aprovado');
                    alert('reserva aprova com sucesso!')
                    window.location.href="/restaurantes/admin"
                
            
            
                });
                request.fail(function (jqXHR, textStatus, errorThrown){
                    console.error(
                        "The following error occurred: "+
                        textStatus, errorThrown
                    );
                });   
            }else{
                console.log('batata')
            }
        }


    }else{
        alert('quantidade de mesas insuficientes');
    }

}



function addMesa() {
    var values = mesa.options[mesa.selectedIndex].value;
    values = values.split(" ")
    var option = `Mesa ${values[2]}`;
    var option1 = `${parseInt(values[1])}`;

    idMesas.push(parseInt(values[0]))
    total += parseInt(values[1])


    if (values[2] != undefined) {
      var entry = document.createElement('li');
      entry.appendChild(document.createTextNode(option));
      list.appendChild(entry);

      var entry1 = document.createElement('li');
      entry1.appendChild(document.createTextNode(option1));
      cadeiras.appendChild(entry1);

      totalMesas += 1;
      totalAssentos += parseInt(values[1]);

      mesas.innerHTML = `Total de mesas selecionadas: ${totalMesas}`;
      assentos.innerHTML = `Total de assentos: ${totalAssentos}`;


   
    $(mesa.options[mesa.selectedIndex]).prop('disabled', true);
    $('#selectMesa').prop("selectedIndex", 0);

    console.log(total)
    console.log(idMesas)
    

    }
}

function limpar() {
    idMesas = [];
    total = 0;
    list.innerHTML = "";
    cadeiras.innerHTML = "";
    totalMesas = 0;
    totalAssentos = 0;
    mesas.innerHTML = `Total de mesas selecionadas: ${totalMesas}`;
    assentos.innerHTML = `Total de assentos: ${totalAssentos}`;
    $('#selectMesa').each( function() {
        $(this).val( $(this).find("option[disabled]").prop('disabled', false) );
    });
    $('#selectMesa').val(0)
}