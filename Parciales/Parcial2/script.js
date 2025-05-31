function cargarContenido(abrir) {
    fetch(abrir)
        .then(response => response.text())
        .then(data => {
            document.querySelector('#contenido').innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
}
function cargar() {
        document.getElementById('contenido').innerText =  fetch('mostrar.html')
        .then(response => response.text())
        .then(data => {
            document.getElementById('contenido').innerHTML = data;
        });
    }

    function mostrarboton() {
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "boton", true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.querySelector('contenido').innerHTML = ajax.responseText;
            document.querySelector('contenido').style.display = 'block';  
                }
    }
}
  function cargarGaleria() {
    fetch('galeria.php')
        .then(response => response.text())
        .then(data => {
            document.querySelector("#titulo-modal").innerHTML = "Correo recibido";
            document.querySelector("#contenido-modal").innerHTML = data;
            document.getElementById("myModal").style.display = "block";
            var fila = document.getElementById("fila-" + id);
            if (fila) {
                fila.style.backgroundColor = "#90ee90";
            }
        });
}
function bandejaEntrada(id) {
    fetch('VerCorreoEntrada.php?id=' + id)
        .then(response => response.text())
        .then(data => {
            document.querySelector("#titulo-modal").innerHTML = "Correo recibido";
            document.querySelector("#contenido-modal").innerHTML = data;
            document.getElementById("myModal").style.display = "block";
            var fila = document.getElementById("fila-" + id);
            if (fila) {
                fila.style.backgroundColor = "#90ee90";
            }
        });
    }
function mostrarModal(imagen, titulo) {
    const modal = document.getElementById('myModal');
    const modalImg = document.getElementById('modalImg');
    const modalTitle = document.getElementById('modalTitle');
    
    modalImg.src = 'images/' + imagen;
    modalTitle.textContent = titulo;
    modal.style.display = 'block';
}

function cerrarModal() {
    document.getElementById('myModal').style.display = 'none';
}
function cargarFormulario() {
    var ajax = new XMLHttpRequest();
    ajax.open('GET', 'formulario.html', true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.getElementById('contenido').innerHTML = ajax.responseText;
        }
    };
    ajax.send();
}

  function mostarhistorial() {
    fetch('contador.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('historial').innerHTML = data;
        });
}
function cargarlogin() {
    fetch('formlogin.html')
        .then(response => response.text())
        .then(data => {
            document.getElementById('contenido').innerHTML = data;
        });
}
function cargarbarra() {
    fetch('barra.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('barra').innerHTML = data;
        });
}
function cargarlistar() {
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "listar.php", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.getElementById('contenido').innerHTML = ajax.responseText;
            
        }
    };
    ajax.send();
}
function cargarcolor() {
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "color.html", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.getElementById('contenido').innerHTML = ajax.responseText;
            
        }
    };
    ajax.send();
}