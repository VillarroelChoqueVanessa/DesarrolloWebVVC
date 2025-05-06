function cargarContenido(abrir) {
    var contenedor = document.getElementById('contenido');
    fetch(abrir)
        .then(response => response.text())
        .then(data => contenedor.innerHTML = data);
}

function createPerson(event) {
    event.preventDefault();
    var contenedor = document.getElementById('contenido');
    var datos = new FormData(document.getElementById('personForm'));

    fetch("create.php", {
        method: "POST",
        body: datos
    })
    .then(response => response.text())
    .then(data => {
        contenedor.innerHTML = data;
        setTimeout(() => cargarContenido('read.php'), 2000);
    });
}

function deletePerson(id) {
    if(confirm('¿Está seguro de que desea eliminar este registro?')) {
        fetch(`delete.php?id=${id}`)
            .then(response => response.text())
            .then(data => {
                cargarContenido('read.php');
            });
    }
}

function editPerson(id) {
    cargarContenido(`edit.php?id=${id}`);
}

function updatePerson(event) {
    event.preventDefault();
    var contenedor = document.getElementById('contenido');
    var datos = new FormData(document.getElementById('updateForm'));

    fetch("update.php", {
        method: "POST",
        body: datos
    })
    .then(response => response.text())
    .then(data => {
        contenedor.innerHTML = data;
        setTimeout(() => cargarContenido('read.php'), 2000);
    });
}