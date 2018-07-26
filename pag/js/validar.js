var item1;
var item2;

function ValidarPassword(value,elemento){
    if(value != ""){
        //Se evalua de donde se esta recibiendo el valor, de que input
    if(elemento == 1){
        item1 = value; 
        console.log("Si te escuho 1 - " + item1);
    }else if(elemento == 2){
        item2 = value;
        console.log("Si te escuho 2 - " + item2);
    }
    document.getElementById("mensaje").classList.remove("displayNone");
    //Se ve si son iguales
    var igual = sisonIguales(item1,item2);
    //console.log("La validacion es ", igual);
    }
}

function sisonIguales(valor1,valor2){
    var val = false;
    //console.log("Validar",valor1," - ",valor2);
    if(valor1 == valor2){
        val = true;
        //En caso de ser iguales se eliminan los mensajes de error y se muestra el boton
        document.getElementById("mensaje").classList.add("displayNone");
        document.getElementById("boton").classList.remove("disabled");
        document.getElementById("boton").disabled = false;
    }else{
        //en caso de que se modifiquen nuevamente se vuelve a bloquear
        document.getElementById("boton").classList.add("disabled");
        document.getElementById("boton").disabled = true;
    }
    
    return val;
};



/*
function ValidarDatos(){
    //Variable que me valide el objeto
    var validado = false;
    //Recibo las variables desde el DOM como etiquetas html
    var nombre = document.getElementById('username');
    var correo = document.getElementById('correo');
    var pass1 = document.getElementById('password');
    var pass2 = document.getElementById('password2');
    //Ejecuto las funciones de validacion con un perador ternario 
    //Estructura de un operador ternario es: CONDICION ? SI SE CUMPLE LA CONDICION : EN CASO DE QUE NO SE CUMPLA
    ValidarCadena(nombre) ? NuevoUsuario.nombre = nombre.value : alert("El nombre esta vacio");
    ValidarCadena(correo) ? NuevoUsuario.correo = correo.value  : alert("El correo esta vacio");
    ValidarPasword(pass1,pass2) ? NuevoUsuario.password = pass1.value: alert("Las contraseñas no coinciden");
    
    if(validado){
        
    }
    //Imprimo el objeto usuario
    console.log(NuevoUsuario);
    
}


function ValidarCadena(elemento){
    //Recibo el elemento del DOM, el documento html
    //Separo el documento html en una variable
    var contenedor = elemento;
    // y guardo el valor que hay en ese documento html en otra variable para validarlo como un texto
    var cadena = elemento.value.trim();
    //Mi variable validar la inicializo en false
    var validar = false;
    //Valido si mi cadena es diferente de vacia, es decir si tiene texto
    if(cadena != ""){
        // en caso de que si tenga texto la valido y cambio el valor del la variable booleana
        validar = true;
        //Asigno la clase al elemento validado (le da colorsito)
        contenedor.classList.add("valido")
    }else{
        //Asigno la clase al elemento invalidado (se pone en rojito)
        contenedor.classList.add("invalido")
    }
    //Se regresa el valor para que se evalue
    return validar;
}

function ValidarPasword(p1,p2){
    //Inicio las variables que validaran en mi funcion
    //Valido evalua si las cadenas son iguales
    var Valido = false;
    //Cadena evalue si las cadenas no estan vacias
    var cadenas = false;
    //Realizo otro operador ternario que cambie la variable cadena en caso de que esta no este vacia
    ValidarCadena(p1) ?  cadenas = true : alert('la contraseña esta vacia');
    //Realizo la otra validacion de la otra variable, si la primera si esta llena, pero la segunda no, cambia el valor para que no  se ejecute
    ValidarCadena(p2) ?  cadenas = true : cadenas = false;
    
    if(cadenas){
        //si ambas cadenas estan llenas evalua que sean iguales
       if(p1.value.trim() == p2.value.trim()){
           //si es igual entonces lo valido y cambi el valor a verdadero
           Valido = true;
       }
    }
    //Retorno el estado, si son iguales regresa un true si no regresa un false
    return Valido;
}

function EnviarDatos(){
    
}

*/