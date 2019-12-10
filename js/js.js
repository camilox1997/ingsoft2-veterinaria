function deleteOption(){
    var respuesta = confirm("¿ Estas seguro que deceas eliminar este dato ?");

    if (respuesta == true){
        return true;
    } else {
        return false;
    }
}

function validationRegisterUserForm(){
    var identificacion, nombre, apellido, direccion, telefono, username, pass;
    identificacion = document.getElementById("identificacion").value;
    nombre = document.getElementById("nombre").value;
    apellido = document.getElementById("apellido").value;
    direccion = document.getElementById("direccion").value;
    telefono = document.getElementById("telefono").value;
    username = document.getElementById("username").value;
    pass = document.getElementById("pass").value;

    if(identificacion==="" || nombre ==="" || apellido==="" || direccion==="" || telefono==="" || username==="" || pass ===""){
        alert("Todos los campos son obligatorios");
        return false;
    } else if(identificacion.length > 12){
        alert("La identificacion debe tener maximo 12 caracteres");
        return false;
    } else if (identificacion.length < 8) { 
        alert("La identificacion debe tener minimo 8 caracteres");
        return false;
    } else if (isNaN(identificacion)) {
        alert("La identificacion ingresada no es un numero");
        return false;
    } else if (nombre.length > 31){
        alert("El nombre es demaciado largo");
        return false;
    } else if (nombre.length < 3){
        alert("El nombre es demaciado corto");
        return false;
    } else if (apellido.length > 31){
        alert("El apellido es demaciado largo");
        return false;
    } else if (apellido.length < 3){
        alert("El apellido es demaciado corto");
        return false;
    } else if (direccion.length > 50){
        alert("La dirrecion es demaciada larga");
        return false;
    } else if (direccion.length < 15){
        alert("La direccion es demaciada corta");
        return false;
    } else if (telefono.length > 10){
        alert("El telefono es demaciado largo");
        return false;
    }else if (telefono.length < 8){
        alert("El telefono es demaciado corto");
        return false;
    } else if (isNaN(telefono)) {
        alert("El telefono ingresado no es un numero");
        return false;
    } else if (username.length > 15 || pass.length > 15){
        alert("El nombre de usuario y la contraseña solo deben tener maximo 15 caracteres");
        return false;
    } else if (username.length < 8 || pass.length < 8){
        alert("El nombre de usuario y la contraseña solo deben tener minimo 8 caracteres");
        return false;
    }
}

function validationEditUserForm(){
    var identificacion, nombre, apellido, direccion, telefono;
    identificacion = document.getElementById("identificacion").value;
    nombre = document.getElementById("nombre").value;
    apellido = document.getElementById("apellido").value;
    direccion = document.getElementById("direccion").value;
    telefono = document.getElementById("telefono").value;

    if(identificacion==="" || nombre ==="" || apellido==="" || direccion==="" || telefono===""){
        alert("Todos los campos son obligatorios");
        return false;
    } else if(identificacion.length > 12){
        alert("La identificacion debe tener maximo 12 caracteres");
        return false;
    } else if (identificacion.length < 8) { 
        alert("La identificacion debe tener minimo 8 caracteres");
        return false;
    } else if (isNaN(identificacion)) {
        alert("La identificacion ingresada no es un numero");
        return false;
    } else if (nombre.length > 31){
        alert("El nombre es demaciado largo");
        return false;
    } else if (nombre.length < 3){
        alert("El nombre es demaciado corto");
        return false;
    } else if (apellido.length > 31){
        alert("El apellido es demaciado largo");
        return false;
    } else if (apellido.length < 3){
        alert("El apellido es demaciado corto");
        return false;
    } else if (direccion.length > 50){
        alert("La dirrecion es demaciada larga");
        return false;
    } else if (direccion.length < 15){
        alert("La direccion es demaciada corta");
        return false;
    } else if (telefono.length > 10){
        alert("El telefono es demaciado largo");
        return false;
    }else if (telefono.length < 8){
        alert("El telefono es demaciado corto");
        return false;
    } else if (isNaN(telefono)) {
        alert("El telefono ingresado no es un numero");
        return false;
    }
}

function solonumeros(event){
    key = event.keyCode || event.which;
    
    teclado = String.fromCharCode(key);

    numeros="0123456789";

    especiales="8-37-38-46";

    teclado_especial = false;

    for (var i in especiales){
        if(key == especiales[i]){
            teclado_especial = true;
        }
    }

    if(numeros.indexOf(teclado) == -1 && !teclado_especial){
        return false;
    }
}

function sololetras(event){
    key = event.keyCode || event.which;
    
    teclado = String.fromCharCode(key);

    caracteres="qwertyuiopasdfghjklñzxcvbnmQWERTYUIOPASDFGHJKLÑZXCVBNM";

    especiales="8-37-38-46";

    teclado_especial = false;

    for (var i in especiales){
        if(key == especiales[i]){
            teclado_especial = true;
        }
    }

    if(caracteres.indexOf(teclado) == -1 && !teclado_especial){
        return false;
    }
}



function validationRegisterRazasForm(){
    var nombre;
    nombre = document.getElementById("nombre").value;

    if(nombre ===""){
        alert("Todos los campos son obligatorios");
        return false;
    } else if (nombre.length > 30){
        alert("El nombre es demaciado largo");
        return false;
    } else if (nombre.length < 3){
        alert("El nombre es demaciado corto");
        return false;
    }
}

function validationEditPetsForm(){
    var nombre, peso;
    nombre = document.getElementById("nombre_mascota").value;
    peso = document.getElementById("peso");

    if(nombre ===""){
        alert("Todos los campos son obligatorios");
        return false;
    } else if (nombre.length > 30){
        alert("El nombre es demaciado largo");
        return false;
    } else if (nombre.length < 3){
        alert("El nombre es demaciado corto");
        return false;
    }else if (peso ===""){
        alert("Todos los campos son obligatorios");
        return false;
    } else if (peso.length > 3){
        alert("El nombre es demaciado largo");
        return false;
    } else if (nombre.length < 0){
        alert("El nombre es demaciado corto");
        return false;
    }
}

function validationRegisterPetsForm(){
        if(identificacion==="" || nombre ==="" || apellido==="" || direccion==="" || telefono==="" || username==="" || pass ===""){
        alert("Todos los campos son obligatorios");
        return false;
    } else if(identificacion.length > 12){
        alert("La identificacion debe tener maximo 12 caracteres");
        return false;
    } else if (identificacion.length < 8) { 
        alert("La identificacion debe tener minimo 8 caracteres");
        return false;
    } else if (isNaN(identificacion)) {
        alert("La identificacion ingresada no es un numero");
        return false;
    } else if (nombre.length > 31){
        alert("El nombre es demaciado largo");
        return false;
    } else if (nombre.length < 3){
        alert("El nombre es demaciado corto");
        return false;
    } else if (apellido.length > 31){
        alert("El apellido es demaciado largo");
        return false;
    } else if (apellido.length < 3){
        alert("El apellido es demaciado corto");
        return false;
    } else if (direccion.length > 50){
        alert("La dirrecion es demaciada larga");
        return false;
    } else if (direccion.length < 15){
        alert("La direccion es demaciada corta");
        return false;
    } else if (telefono.length > 10){
        alert("El telefono es demaciado largo");
        return false;
    }else if (telefono.length < 8){
        alert("El telefono es demaciado corto");
        return false;
    } else if (isNaN(telefono)) {
        alert("El telefono ingresado no es un numero");
        return false;
    } else if (username.length > 15 || pass.length > 15){
        alert("El nombre de usuario y la contraseña solo deben tener maximo 15 caracteres");
        return false;
    } else if (username.length < 8 || pass.length < 8){
        alert("El nombre de usuario y la contraseña solo deben tener minimo 8 caracteres");
        return false;
    }
}