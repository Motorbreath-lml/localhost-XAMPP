// Copiar invitacion al portapapeles
const modalElement = document.getElementById('modalCopiar'); // Para poder usar Listener correctamente
const modalCopiar = bootstrap.Modal.getOrCreateInstance(modalElement);// para mostrar u ocultar el modal
const tituloModalCopiar = document.getElementById('tituloModalCopiar');

modalElement.addEventListener('hidden.bs.modal', () => {
  tituloModalCopiar.innerHTML = '';
});


function copyStringToClipboard(stringToCopy) {
  navigator.clipboard.writeText(stringToCopy)
    .then(() => {
      tituloModalCopiar.innerHTML = '<p>Enlace:</p><p class="fw-semibold">' + stringToCopy + '</p><p>Copiado al portapapeles!</p>';
      modalCopiar.show();
      setTimeout(function () {
        modalCopiar.hide();
      }, 3000);
    })
    .catch(error => {
      console.error('Failed to copy string:', error);
    });
}