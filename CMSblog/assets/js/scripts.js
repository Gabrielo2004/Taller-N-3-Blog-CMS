document.getElementById("postForm").addEventListener("submit", function(event) {
    const titulo = document.getElementById("titulo").value.trim();
    const contenido = document.getElementById("contenido").value.trim();
    const mensaje = document.getElementById("mensaje");

    if (titulo === "" || contenido === "") {
        event.preventDefault(); // Evita el envío del formulario
        mensaje.textContent = "Todos los campos son obligatorios.";
        mensaje.style.color = "red";
    } else {
        mensaje.textContent = "Publicando...";
        mensaje.style.color = "green";
    }
});
