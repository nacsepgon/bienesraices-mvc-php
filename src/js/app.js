document.addEventListener('DOMContentLoaded', function() {
    eventListeners()

    darkMode()
})

function darkMode() {
    const preferencia = window.matchMedia( '(prefers-color-scheme:dark)' )
    // console.log(preferencia.matches)

    if (preferencia.matches) {
        document.body.classList.add('dark-mode')
    }

    preferencia.addEventListener('change', () => {

        if (preferencia.matches) {
            document.body.classList.add('dark-mode')
        }
        else {
            document.body.classList.remove('dark-mode')
        }
    })


    const botonDark = document.querySelector('.boton-dark')

    botonDark.addEventListener('click', () => document.body.classList.toggle('dark-mode') )

}

function eventListeners() {
    const menuMovil = document.querySelector('.menu-movil')

    menuMovil.addEventListener('click', navegacionMovil)

    // Campos de formulario condicionales
    const tipoContacto = document.querySelectorAll('input[name="contacto[contacto]"]')

    tipoContacto.forEach( input => input.addEventListener('click', mostrarTiposContacto) )
}

function navegacionMovil() {
    console.log('me anvorguesa')
    const navegacion = document.querySelector('.navegacion') 
    
    if (navegacion.classList.contains('mostrar')) {
        navegacion.classList.remove('mostrar')
    } // Si la tiene la quita si no la agrega
    else {
        navegacion.classList.add('mostrar')
    }
    // Toggle es lo mismo
    // navegacion.classList.toggle('mostrar');
}

function mostrarTiposContacto(e) {
    const contactoDiv = document.querySelector('.contacto')
    
    if (e.target.value === 'telefono') {
        contactoDiv.innerHTML = `
            <label for="telefono">Número de teléfono</label>
            <input type="tel" id="telefono" name="contacto[telefono]" placeholder="9 1234 5478">
            
            <p>Elija la hora y fecha de llamada</p>

            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="contacto[fecha]">

            <label for="hora">Hora</label>
            <input type="time" id="hora" name="contacto[hora]" min="09:00" max="18:00">
        `
    }
    else { contactoDiv.innerHTML = `
            <label for="email">E-mail</label>
            <input type="email" id="email" name="contacto[email]" placeholder="mariaperez24@correo.cl">        
        `
    }
}