// Tiempo de inactividad en milisegundos (5 segundos = 5000 ms) (30 minutos: 1800000)
var inactivityTime = 1800000;

var inactivityTimeout;

// Función para redirigir al login si hay inactividad
function logout() {
    // alert("Por inactividad, serás redirigido al login.");
    window.location.href = 'cerrar_sesion.php'; // Redirige al login
}

// Función para reiniciar el temporizador de inactividad
function resetTimer() {
    clearTimeout(inactivityTimeout); // Limpia el temporizador anterior
    inactivityTimeout = setTimeout(logout, inactivityTime); // Inicia un nuevo temporizador
}

// Detectar cualquier tipo de actividad en la página y reiniciar el temporizador
window.onload = function () {
    resetTimer(); // Iniciar el contador cuando la página se carga
    document.body.addEventListener('mousemove', resetTimer); // Detecta movimiento del mouse
    document.body.addEventListener('keydown', resetTimer);   // Detecta presiones de teclas
    document.body.addEventListener('click', resetTimer);     // Detecta clics
    document.body.addEventListener('scroll', resetTimer);    // Detecta desplazamiento
}
