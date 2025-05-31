// ajax.js
function cargarContenido(abrir) {
    var ajax = new XMLHttpRequest();
    ajax.open("get", abrir, true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.getElementById('contenido').innerHTML = ajax.responseText;
            
            const scripts = document.getElementById('contenido').getElementsByTagName('script');
            for (let i = 0; i < scripts.length; i++) {
                eval(scripts[i].innerHTML);
            }
        }
    };
    ajax.setRequestHeader("Content-Type", "text/html; charset=utf-8");
    ajax.send();
}
function pregunta1(){
var ajax = new XMLHttpRequest(); //crea el objeto ajax
    ajax.open("GET", `tresenraya.html?id=${id}`, true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.querySelector('#contenido').innerHTML = ajax.responseText;
        }
    }
    ajax.send();
    
}

function pregunta2(){
var ajax = new XMLHttpRequest(); //crea el objeto ajax
    ajax.open("GET", `tabla.html`, true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.querySelector('#contenido').innerHTML = ajax.responseText;
        }
    }
    ajax.send();
    
}

function mostarmesaje(){
    const mensaje="Texto X";
    document.getElementById('mensaje').inertHTML = mensaje;
}

function cambiarnivel(id, nuevoNivel) {
    var ajax = new XMLHttpRequest();
    ajax.open("GET", `cambiarnivel.php?id=${id}&nivel=${nuevoNivel}`, true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            cargarContenido('listar.php');
        }
    };
    ajax.send();
}
function cargarUsuarios() {
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "listar.php", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.getElementById('contenido').innerHTML = ajax.responseText;
            
        }
    };
    ajax.send();
}