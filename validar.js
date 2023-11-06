const nombre = document.getElementById("nombre");
const correo = document.getElementById("correo");
const mensaje = document.getElementById("mensaje");
const enviar = document.getElementById("enviar");

enviar.addEventListener("click", validar);

function validar(e) {
    if (nombre.value === "") {
alert("Por favor, ingrese su nombre.");
nombre.focus();
e.preventDefault();
}

const regexCorreo = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
if (correo.value === "" || !regexCorreo.test(correo.value)) {

alert("Por favor, ingrese un correo electrónico válido.");
correo.focus();
e.preventDefault();
}

if (mensaje.value === "" || mensaje.value.length < 10) {
alert("Por favor, ingrese un mensaje de al menos 10 caracteres.");
mensaje.focus();
e.preventDefault();
}
}