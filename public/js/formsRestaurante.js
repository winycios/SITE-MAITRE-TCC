var next_click=document.querySelectorAll(".next_button");
var main_form=document.querySelectorAll(".main");
var step_list = document.querySelectorAll(".progress-bar li");
var num = document.querySelector(".step-number");
let formnumber=0;


next_click.forEach(function(next_click_form){
    next_click_form.addEventListener('click',function(){
        if(!validateform()){
            return false
        }
       formnumber++;
       updateform();
       progress_forward();
       contentchange();
    });
}); 

var back_click=document.querySelectorAll(".back_button");
back_click.forEach(function(back_click_form){
    back_click_form.addEventListener('click',function(){
       formnumber--;
       updateform();
       progress_backward();
       contentchange();
    });
});

function next(e){
    e.preventDefault()
   formnumber++;
   updateform();
   progress_forward();
   contentchange();
}


function goBack(e){
    e.preventDefault()
    formnumber--;
    updateform();
    progress_backward();
    contentchange();
}

$(document).ready(function() {

	$('#link').on('change', function() {
		var url = $(this).val();
		if (url == '#adicionar') {
			window.open(url, '_top');
		}
		return false;
	});
});



var username=document.querySelector("#user_name");
var shownname=document.querySelector(".shown_name");
 

var submit_click=document.querySelectorAll(".submit_button");
submit_click.forEach(function(submit_click_form){
    submit_click_form.addEventListener('click',function(){
       shownname.innerHTML= username.value;
       formnumber++;
       updateform(); 
    });
});
 

function updateform(){
    main_form.forEach(function(mainform_number){
        mainform_number.classList.remove('active');
    })
    main_form[formnumber].classList.add('active');
} 
 
function progress_forward(){    
    num.innerHTML = formnumber+1;
    step_list[formnumber].classList.add('active');
}  

function progress_backward(){
    var form_num = formnumber+1;
    step_list[form_num].classList.remove('active');
    num.innerHTML = form_num;
} 
 
var step_num_content=document.querySelectorAll(".step-number-content");

 function contentchange(){
     step_num_content.forEach(function(content){
        content.classList.remove('active'); 
        content.classList.add('d-none');
     }); 
     step_num_content[formnumber].classList.add('active');
 } 
 
 
function validateform(){
    validate=true;
    var validate_inputs=document.querySelectorAll(".main.active input");
    validate_inputs.forEach(function(vaildate_input){
        vaildate_input.classList.remove('warning');
        if(vaildate_input.hasAttribute('require')){
            if(vaildate_input.value.length==0){
                validate=false;
                vaildate_input.classList.add('warning');
            }
        }
    });
    return validate;
    
}

var request;
var checkedValue = [];
var diaCadastrado = [];
var restId;
var dias = [];


$(document).on('submit', '#form1', async function(e){
    e.preventDefault();

    if (request) {
        request.abort();
    }

    request = $.ajax({
        url: "/restaurantes/create",
        type: "POST",
        //data: serializedData,
        data: new FormData(this),
        processData: false,
        contentType: false
    });

    request.done(function (response, textStatus, jqXHR){
        restId = response.id;
        $('#form1')[0].reset();
        formnumber++;
        updateform();
        progress_forward();
        contentchange();
    });
    request.fail(function (jqXHR, textStatus, errorThrown){
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
        alert('deu ruim')
    });
   
});

$(document).on('submit', '#formDia', function(e) {
    e.preventDefault();
    checkedValue = []; 

    
    var inputElements = document.getElementsByClassName('form-check-input');
    for(var i=0; inputElements[i]; ++i){
          if(inputElements[i].checked){
               checkedValue.push(inputElements[i].value);
          }
    }

    for (var i=0; i < diaCadastrado.length; i++) {
      dia = diaCadastrado[i];
      if (checkedValue.indexOf(dia) >= 0) {
        checkedValue.splice(checkedValue.indexOf(dia), 1);
      }
    }
    
        request = $.ajax({
            type:"GET",
            data: {dias:checkedValue},
            url: "/horarios/diaSemana",
            dataType: "json",
        });

        request.done(function (data, textStatus, xhr){
            dias = data;

            if(xhr.status == 200){
                $("#dias").empty();
                for(var i = 0; i < data.length; i++){
                    $("#dias").append(`<option value=${data[i].id}>${data[i].diaSemana}</option>`); 
                }
                document.getElementById("teste").disabled = false;

            }else{
                $("#dias").empty();
                $("#dias").append(`<option value='0'>Nenhum dia selecionado</option>`); 
                document.getElementById("teste").disabled = true;
            }

        });
        request.fail(function (jqXHR, textStatus, errorThrown){
            console.error(
                "The following error occurred: "+
                textStatus, errorThrown
            );
        });
    
});


$(document).on('submit', '#formHorario', function(e) {
    e.preventDefault();
    $("#diaMesa").empty();
    for(var i = 0; i < dias.length; i++){
        $("#diaMesa").append(`<option value=${dias[i].id}>${dias[i].diaSemana}</option>`); 
    }  
});

$(document).on('submit', '#formMesa', function(e) {
    e.preventDefault();
});


function hour_to_seconds(hour){
    var a = String(hour).split(':');
    var seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60;
    return seconds
}

function seconds_to_hour(seconds){
    d = Number(seconds);
    var h = Math.floor(d / 3600);
    var m = Math.floor(d % 3600 / 60);
    var s = Math.floor(d % 3600 % 60);

    var hDisplay = h > 0 ? h + (h == 1 ? " hour, " : " hours, ") : "";
    var mDisplay = m > 0 ? m + (m == 1 ? " minute, " : " minutes, ") : "";
    return hDisplay + mDisplay; 

}



async function cadastrarHorario(){

    var dia = document.getElementById('dias').value;
    var inicio = hour_to_seconds(document.getElementById('inicio').value);
    var fim = hour_to_seconds(document.getElementById('fim').value);
    var intervalo = hour_to_seconds(document.getElementById('intervalo').value);


    var l = $('#dias option').length;

    if(l > 0){
        for(inicio; inicio < fim; inicio += intervalo){
            horario = new Date(inicio * 1000).toISOString().substr(11, 8);
            const response = await createHorario(dia, horario);
            const resp = await response.json()
            console.log(response)
            console.log(resp)

            console.log(inicio, fim-intervalo)
            if (response.status !== 200) {
                alert('Não foi possível cadastrar o horario ', inicio);
                return;
            }
    
            if (response.status === 200 && inicio == (fim - intervalo)) {
                alert('Todas os horarios foram cadastradas com sucesso!');
                if(!diaCadastrado.includes(resp.horario.dia_semana_id)){
                    diaCadastrado.push(resp.horario.dia_semana_id);
                }
                
                $(`#dias option[value="${resp.horario.dia_semana_id}"]`).remove();
                checkedValue.splice(checkedValue.indexOf(resp.horario.dia_semana_id), 1);
                if(checkedValue.length == 0){
                    $( "#finalizar" ).removeClass( "disabled" ).addClass( "next_button" );
                    $("#dias").append(`<option value=o}>Nenhum dia selecionado</option>`); 
                }
            }
        }
    }else{
        document.getElementById("teste").disabled = true;
        alert('selecione um dia da semana')
    }

}

async function createHorario(dia, horario){
    // const response = await fetch(local + '/horarios',{
        //const response = await fetch(host + '/horarios',{
        const response = await fetch('http://127.0.0.1:8000/api/horarios',{
        method: "POST",
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({dia_semana_id: dia, horario: horario, restaurante_id: restId}),
    })
    .then((resp) =>{
        return resp
    })

    return response
    
}

var m = 1;

async function cadastrarMesa(){
    var qtd = document.getElementById('qtdMesas').value;
    var cap = document.getElementById('capMesa').value;

    


    for(var i =1; i <= qtd; i++){
        const { status } = await createMesa(m, cap);
        m += 1;
        console.log(status)

        if (status !== 200) {
            alert('Não foi possível cadastrar a mesa de número', i);
            return;
        }

        if (status === 200 && i == qtd) {
            alert('Todas as mesas foram cadastradas com sucesso!');
            $('#qtdMesas').val('');
            $('#capMesa').val('');
        }
    }
    
}

async function createMesa(mesa, cap){
   // const response = await fetch(local +'/mesas',{
    //const response = await fetch(host +'/mesas',{
        const response = await fetch('http://127.0.0.1:8000/api/mesas',{
        method: "POST",
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',          
        },
        body: JSON.stringify({mesa: mesa, capacidade: cap, disponivel: 1, restaurante_id: restId}),
    })
    return response

}

function lais(){
    var todos = document.getElementById('todos')
    if(todos.checked){

        document.getElementById('seg').checked = "checked";
        document.getElementById('ter').checked = "checked";
        document.getElementById('qua').checked = "checked";
        document.getElementById('qui').checked = "checked";
        document.getElementById('sex').checked = "checked";
        document.getElementById('sab').checked = "checked";
        document.getElementById('dom').checked = "checked";
    }else{

        document.getElementById('seg').checked = "";
        document.getElementById('ter').checked = "";
        document.getElementById('qua').checked = "";
        document.getElementById('qui').checked = "";
        document.getElementById('sex').checked = "";
        document.getElementById('sab').checked = "";
        document.getElementById('dom').checked = "";
    }

}





$(document).on('submit', '#finalizar', function(e) {
    e.preventDefault();

});





