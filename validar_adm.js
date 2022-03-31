const form = document.getElementById("tab1")
const inicio_fecha = document.getElementById("inicio_fecha")
const final_fecha = document.getElementById("final_fecha")
const total_asesorias = document.getElementById("asesorias")

form.addEventListener("submit", e=>{
    if(inicio_fecha.value.length == 0){
        alert("Agrega la fecha inicial")
        e.preventDefault()
        return false;
    }
    if(final_fecha.value.length == 0){
        alert("Agrega la fecha final")
        e.preventDefault()
        return false;
    }
    if(total_asesorias.value.length == false){
        alert("No hay asesorias")
        e.preventDefault()
        return false;
    }
    if((final_fecha.value) < (inicio_fecha.value)){
        alert("La fecha final no puede ser inferior a la fecha inicial")
        e.preventDefault()
        return false;
    }else{
            document.form.submit()     
    }
})


const form2 = document.getElementById("tab2")
const inicio_fecha2 = document.getElementById("inicio_fecha2")
const final_fecha2 = document.getElementById("final_fecha2")
const asesorias2 = document.getElementById("asesorias2")

form2.addEventListener("submit", e=>{
    if(inicio_fecha2.value.length == 0){
        alert("Agrega la fecha inicial")
        e.preventDefault()
        return false;
    }
    if(final_fecha2.value.length == 0){
        alert("Agrega la fecha final")
        e.preventDefault()
        return false;
    }
    if(asesorias2.value.length == false){
        alert("No hay asesorias")
        e.preventDefault()
        return false;
    }
    if((final_fecha2.value) < (inicio_fecha2.value)){
        alert("La fecha final no puede ser inferior a la fecha inicial")
        e.preventDefault()
        return false;
    }else{
            document.form.submit()     
    }
})


const form3 = document.getElementById("tab4")
const nombre = document.getElementById("nombredocente")
const apellido1 = document.getElementById("apellido_paterno")
const apellido2 = document.getElementById("apellido_materno")
const matriculadocente = document.getElementById("matriculadocente")
const correodocente = document.getElementById("correodocente")
const contraseñadocente = document.getElementById("contraseñadocente")
const letras = new RegExp('^[A-Z]+$', 'i');
let regexEmail = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i

form3.addEventListener("submit", e=>{
    if(nombre.value.length == 0){
        alert("El nombre es obligatorio")
        e.preventDefault()
        return false;
    }
    if(apellido1.value.length == 0){
        alert("El apellido paterno es obligatorio")
        e.preventDefault()
        return false;
    }
    if(apellido2.value.length == 0){
        alert("El apellido materno es obligatorio")
        e.preventDefault()
        return false;
    }
    if(matriculadocente.value.length == 0){
        alert("El numero de empleado es obligatorio")
        e.preventDefault()
        return false;
    }
    if(correodocente.value.length == 0){
        alert("El correo es obligatorio")
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
    if(!regexEmail.test(correodocente.value)){
        alert("El correo es incorrecto")
        e.preventDefault()
        return false;
    }  
    if(contraseñadocente.value.length == 0){
        alert("La contraseña es obligatoria")
        e.preventDefault()
        return false;
    }else{
            document.form.submit()     
    }
})


function confirmacion(e){
    if (confirm("¿Estas seguro de querer eliminar los registros?")){
        return true;
    }else{
        e.preventDefault();
    }
}
let linkDelete = document.querySelectorAll(".borrar_registros");

for(var i = 0; i < linkDelete.length; i++){
    linkDelete[i].addEventListener('click', confirmacion);
}


const form4 = document.getElementById("tab6")
const header = document.getElementById("header")

form4.addEventListener("submit", e=>{
    if(header.value.length == 0){
        alert("Agrega una imgen en formato JPG")
        e.preventDefault()
        return false;
    }else{
            document.form.submit()     
    }
})

const form5 = document.getElementById("tab7")
const footer = document.getElementById("footer")

form5.addEventListener("submit", e=>{
    if(footer.value.length == 0){
        alert("Agrega una imgen en formato JPG")
        e.preventDefault()
        return false;
    }else{
            document.form.submit()     
    }
})

