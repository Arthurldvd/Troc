// let modalCookies = document.getElementById("modalCookies");
let btnAccpetCookies = document.getElementById("btnAcceptCookies");

$("#modalCookies").modal();

btnAccpetCookies.addEventListener("click", function () {
    $("#modalCookies").modal("hide");
});