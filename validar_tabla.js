const form = document.getElementById("tabla")
const nombre = document.getElementById("nombre")
const apellido1 = document.getElementById("apellido1")
const apellido2 = document.getElementById("apellido2")
const contraseña = document.getElementById("contraseña")
const matricula = document.getElementById("matricula")
const correo = document.getElementById("correo")
const estatus = document.getElementById("estatus")
const letras = new RegExp('^[a-zA-Z ]*$');
let regexEmail = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i

form.addEventListener("submit", e=>{
    if(nombre.value.length == 0){
        alert("Ingresa el nombre del docente")
        e.preventDefault()
        return false;
    }
    if(apellido1.value.length == 0){
        alert("Ingresa el apellido paterno")
        e.preventDefault()
        return false;
    }
    if(apellido2.value.length == 0){
        alert("Ingresa el apellido materno")
        e.preventDefault()
        return false;
    }
    if(contraseña.value.length == 0){
        alert("Ingresa la contraseña")
        e.preventDefault()
        return false;
    }
    if(matricula.value.length == 0){
        alert("Ingresa la matricula")
        e.preventDefault()
        return false;
    }
    if(correo.value.length == 0){
        alert("Ingresa el correo electronico")
        e.preventDefault()
        return false;
    }
    if(!letras.test(nombre.value)){
        alert("El nombre solo debe contener letras")
        e.preventDefault()
        return false;
    } 
    if(!letras.test(apellido1.value)){
        alert("El apellido paterno solo debe contener letras")
        e.preventDefault()
        return false;
    } 
    if(!letras.test(apellido2.value)){
        alert("El apellido materno solo debe contener letras")
        e.preventDefault()
        return false;
    } 
    if(!regexEmail.test(correo.value)){
        alert("El correo es incorrecto")
        e.preventDefault()
        return false;
    } 
    if(estatus.value.length == 0){
        alert("Selecciona el tipo de estatus")
        e.preventDefault()
        return false;
    }else{
            document.form.submit()     
    }
})




