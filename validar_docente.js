const form = document.getElementById("tab1")
const nombre = document.getElementById("nombre_alumno")
const matricula = document.getElementById("matricula")
const tema = document.getElementById("tema")
const fecha = document.getElementById("fecha_asesoria")
const hora_inicio = document.getElementById("hora_inicio")
const hora_termino = document.getElementById("hora_termino")
const tipo = document.getElementById("tipo")
const para = document.getElementById("para")
const genero = document.getElementById("genero")
const letras = new RegExp('^[a-zA-Z ]*$');

form.addEventListener("submit", e=>{
    if(nombre.value.length == 0){
        alert("Ingresa el nombre del alumno")
        e.preventDefault()
        return false;
    }
    if(matricula.value.length == 0){
        alert("Ingresa la matricula")
        e.preventDefault()
        return false;
    }
    if(tema.value.length == 0){
        alert("Ingresa el tema tratado")
        e.preventDefault()
        return false;
    }
    if(fecha.value.length == 0){
        alert("Ingresa la fecha de la asesoria")
        e.preventDefault()
        return false;
    }
    if(hora_inicio.value.length == 0){
        alert("La hora de inicio es obligatoria")
        e.preventDefault()
        return false;
    }
    if(tipo.value.length == 0){
        alert("Selecciona el tipo de asesoria")
        e.preventDefault()
        return false;
    }
    if(para.value.length == 0){
        alert("Debes seleccionar una opción")
        e.preventDefault()
        return false;
    }
    if(genero.value.length == 0){
        alert("Ingresa el tipo de genero")
        e.preventDefault()
        return false;
    }
    if(!letras.test(nombre.value)){
        alert("El nombre solo debe contener letras")
        e.preventDefault()
        return false;
    } 
    if(hora_termino.value.length == 0){
        alert("La hora de termino es obligatoria")
        e.preventDefault()
        return false;
    }
    if((hora_termino.value) <= (hora_inicio.value)){
        alert("La hora final no puede ser igual o menor a la hora inicial")
        e.preventDefault()
        return false;
    } else{
            document.form.submit()     
    }
})


const form2= document.getElementById("tab2")
const inicio_fecha = document.getElementById("inicio_fecha")
const final_fecha = document.getElementById("final_fecha")
const total_asesorias = document.getElementById("asesorias")

form2.addEventListener("submit", e=>{
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

