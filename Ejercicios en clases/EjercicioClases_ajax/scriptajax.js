// Load initial content when page loads
window.onload = function() {
    mostrarBotones();
    mostrarMensaje();
};

function mostrarBotones() {
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "botones.html", true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.querySelector('#men').innerHTML = ajax.responseText;
            document.querySelector('#men').style.display = 'block';  
        }
    }
    ajax.send();
}

function cargarGaleria() {
    fetch('galeria.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('princip').innerHTML = data;
        });
}

function cargarFormulario() {
    var ajax = new XMLHttpRequest();
    ajax.open('GET', 'formulario.html', true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.getElementById('princip').innerHTML = ajax.responseText;
        }
    };
    ajax.send();
}

function registrarLibro() {
    var formData = new FormData(document.getElementById('form-libro'));
    var ajax = new XMLHttpRequest();
    ajax.open("POST", "guardar_libro.php", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            cargarGaleria();
        }
    };
    ajax.send(formData);
}

function mostrarMensaje() {
    const mensaje = "Vanessa Villarroel - 35-5624";
    document.getElementById('mensaj').innerText = mensaje;
}

// Functions for each button
function cargarPregunta1() {
    cargarContenido('pregunta1.html');
}

// Add these functions to your existing JS file
function mostrarModal(imagen, titulo) {
    const modal = document.getElementById('myModal');
    const modalImg = document.getElementById('modalImg');
    const modalTitle = document.getElementById('modalTitle');
    
    modalImg.src = 'imagenes/' + imagen;
    modalTitle.textContent = titulo;
    modal.style.display = 'block';
}

function cerrarModal() {
    document.getElementById('myModal').style.display = 'none';
}

// Update your existing cargarPregunta2 function
function cargarPregunta2() {
    fetch('galeria.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('princip').innerHTML = data;
        });
}

function cargarPregunta3() {
    const ajax = new XMLHttpRequest();
    ajax.open("GET", "formulario.html", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.getElementById('princip').innerHTML = ajax.responseText;
        }
    };
    ajax.send();
}

function registrarLibro() {
    const formData = new FormData(document.getElementById('form-libro'));
    const ajax = new XMLHttpRequest();
    ajax.open("POST", "galeria.php", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.getElementById('princip').innerHTML = ajax.responseText;
        }
    };
    ajax.send(formData);
}

function cargarPregunta4() {
    cargarContenido('pregunta4.html');
}

function cargarPregunta5() {
    cargarContenido('pregunta5.html');
}

// Main Ajax function to load content
function cargarContenido(archivo) {
    const ajax = new XMLHttpRequest();
    ajax.open("GET", archivo, true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.getElementById('princip').innerHTML = ajax.responseText;
        }
    };
    ajax.setRequestHeader("Content-Type", "text/html; charset=utf-8");
    ajax.send();
}