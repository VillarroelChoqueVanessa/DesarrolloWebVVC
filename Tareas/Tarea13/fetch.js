function cargarContenido(abrir) {
    fetch(abrir)
        .then(response => response.text())
        .then(data => {
            document.querySelector('#contenido').innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
}

function cargarFormularioInsertar() {
    fetch('forminsertar.html')
        .then(response => response.text())
        .then(data => {
            document.getElementById('modalContent').innerHTML = data;
            document.getElementById('modalTitle').innerHTML = 'Insertar Nueva Persona';
            let modal = new bootstrap.Modal(document.getElementById('modalForm'));
            modal.show();
        });
}

function cargarFormularioEditar(id) {
    fetch(`formeditar.php?id=${id}`)
        .then(response => response.text())
        .then(data => {
            document.getElementById('modalContent').innerHTML = data;
            document.getElementById('modalTitle').innerHTML = 'Editar Persona';
            let modal = new bootstrap.Modal(document.getElementById('modalForm'));
            modal.show();
        });
}

function crear() {
    const datos = new FormData(document.querySelector('#form-insertar'));
    fetch('create.php', {
        method: 'POST',
        body: datos
    })
    .then(response => response.text())
    .then(data => {
        const modal = bootstrap.Modal.getInstance(document.getElementById('modalForm'));
        modal.hide();
        document.querySelector('#contenido').innerHTML = data;
    });
}

function editar() {
    const datos = new FormData(document.querySelector('#form-editar'));
    fetch('edit.php', {
        method: 'POST',
        body: datos
    })
    .then(response => response.text())
    .then(data => {
        const modal = bootstrap.Modal.getInstance(document.getElementById('modalForm'));
        modal.hide();
        document.querySelector('#contenido').innerHTML = data;
    });
}

function confirmarEliminar(id) {
    if(confirm('¿Estás seguro de que deseas eliminar este registro?')) {
        eliminar(id);
    }
}

function eliminar(id) {
    fetch(`delete.php?id=${id}`)
        .then(response => response.text())
        .then(data => {
            document.querySelector('#contenido').innerHTML = data;
        });
}
