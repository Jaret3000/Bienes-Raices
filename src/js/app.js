document.addEventListener('DOMContentLoaded', function(){
    eventListeners();

    darkMode();
});

function darkMode(){
    const botonDarkMode = document.querySelector('.dark-mode-boton');

    botonDarkMode.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode');
    });
}

function eventListeners(){
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive);

    //Muestra campos condicionales
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodoContacto))
}

function navegacionResponsive(){
    const navegacion = document.querySelector('.navegacion');

    navegacion.classList.toggle('mostrar')
}

function mostrarMetodoContacto(evnt){
    const contactoDiv = document.querySelector('#contacto');

    if(evnt.target.value === 'telefono'){
        contactoDiv.innerHTML = `
            <label for="telefono">Numero telefonico: </label>
            <input type="tel" placeholder="Tu telefono" id="telefono" name="contacto[telefono]">

            <p>Elige la fecha y hora de contacto</p>
            <br>

            <label for="fecha">Fecha: </label>
            <input type="date" id="fecha" name="contacto[fecha]">

            <label for="hora">Hora: </label>
            <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">
            </br>
        `;
    } else{
        contactoDiv.innerHTML = `
            <label for="email">E-mail: </label>
            <input type="email" placeholder="Tu E-mail" id="email" name="contacto[email]" required>
        `;
    }
}