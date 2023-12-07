
// Después de un registro exitoso
document.getElementById("messageText").innerHTML = "' . $acierto . '";
var modal = document.getElementById("messageModal");
modal.style.display = "block";

setTimeout(function() {
    modal.style.display = "none";
}, 5000); // Cierra el modal después de 5 segundos