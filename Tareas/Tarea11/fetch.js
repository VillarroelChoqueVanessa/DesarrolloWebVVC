function obtenerDepartamentos() {
    fetch('departamento.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('departamento').innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
}

function obtenerProvincias() {
    const departamentoId = document.getElementById('departamento').value;
    fetch('provincia.php?departamento=' + departamentoId)
        .then(response => response.text())
        .then(data => {
            document.getElementById('provincia').innerHTML = data;
            document.getElementById('municipio').innerHTML = '<option value=""> </option>';
        })
        .catch(error => console.error('Error:', error));
}

function obtenerMunicipios() {
    const provinciaId = document.getElementById('provincia').value;
    fetch('municipio.php?provincia=' + provinciaId)
        .then(response => response.text())
        .then(data => {
            document.getElementById('municipio').innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
}