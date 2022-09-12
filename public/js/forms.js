
var btnSignin = document.querySelector("#signin");
var btnSignup = document.querySelector("#signup");

var body = document.querySelector("body");


btnSignin.addEventListener("click", function () {
   body.className = "sign-in-js"; 
    $("#nome").val("");
    $("#email").val("");
    $("#cpf").val("");
    $("#tel").val("");
    $("#foto").val("");
    $("#cep").val("");
    $("#estado").val("");
    $("#bairro").val("");
    $("#cidade").val("");
    $("#password-field").val("");
    $("#password-field2").val("");
    $("#estado").val("");
    $("#rua").val("");
    $("#num").val("");
});

btnSignup.addEventListener("click", function () {
    body.className = "sign-up-js";
    $("#nomeDono").val("");
    $("#emailDono").val("");
    $("#fotoDono").val("");
    $("#nomeRest").val("");
    $("#telRest").val("");
    $("#passwordDono").val("");
    $("#passwordDono2").val("");
    $("#cepDono").val("");
    $("#ruaDono").val("");
    $("#bairroDono").val("");
    $("#cidadeDono").val("");
    $("#estadoDono").val("");
    $("#numDono").val("");
})

