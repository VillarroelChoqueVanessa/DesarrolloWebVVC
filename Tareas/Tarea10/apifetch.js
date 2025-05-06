function mostrarFormulario() {
    document.getElementById('formulario').style.display = 'block';
    document.getElementById('contenido').style.display = 'none';
}

function cargarContenido() {
    document.getElementById('formulario').style.display = 'none';
    document.getElementById('contenido').style.display = 'block';
    
    fetch('read.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('contenido').innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
}

function crear(event) {
    event.preventDefault();
    const formData = new FormData(document.getElementById('formInsertar'));

    fetch('create.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert('Registro creado exitosamente');
        cargarContenido();
        document.getElementById('formInsertar').reset();
    })
    .catch(error => console.error('Error:', error));
}

function formEditar(id) {
    fetch('formeditar.php?id=' + id)
        .then(response => response.text())
        .then(data => {
            document.getElementById('contenido').innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
}

function editar(event) {
    event.preventDefault();
    const formData = new FormData(document.getElementById('formEditar'));

    fetch('update.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert('Registro actualizado exitosamente');
        cargarContenido();
    })
    .catch(error => console.error('Error:', error));
}

function eliminar(id) {
    if(confirm('¿Estás seguro de eliminar este registro?')) {
        fetch('delete.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'id=' + id
        })
        .then(response => response.text())
        .then(data => {
            alert('Registro eliminado exitosamente');
            cargarContenido();
        })
        .catch(error => console.error('Error:', error));
    }
}

document.addEventListener('DOMContentLoaded', cargarContenido);