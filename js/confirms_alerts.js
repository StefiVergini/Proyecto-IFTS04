function confirmDelete(){
    let response = confirm("Esta seguro que desea eliminar el archivo?");

    if(response){
        return true;
    }else{
        return false;
    }
}


function confirmarActualizacion(nombre) {
    let confirmacion = confirm(`¿Estás seguro que deseas Actualizar el horario de la Carrera \n ${nombre}?`);
    if (!confirmacion) {
        window.location.href = '../admin/horarios_cursada_admin.php';
        return false;
    }
    return true;
}

function mostrarNombreArchivo(input) {
    const archivoSeleccionado = document.getElementById('archivoSeleccionado');
    archivoSeleccionado.textContent = input.files.length > 0 ? input.files[0].name : "Ningún archivo seleccionado";
}