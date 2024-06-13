const btnEnviar = document.getElementById('btn-enviar');

const validacion = (e) => {
    e.preventDefault();
    const nombreUsuario = document.getElementById('usuario');
    const direcEmail = document.getElementById('email');
    const mensaje = document.getElementById('msg');

    // Validando si hay un nombre usuario en el formulario
    if (usuario.value === "") {
        alert("Por favor, escribe tu nombre.");
        usuario.focus();
        return false;
    }

    // Validando si hay un email, o correo electronico en el formulario
    if (email.value === "") {
        alert("Por favor, escribe tu email para poder ser contactado.");
        email.focus();
        return false;
    }

    if (!emailValido(email.value)){
        alert("Por favor, escriba un email válido.");
        //email.focus();
        //return true;
    }

    if (msg.value === ""){
        alert("Debe escribir el mensaje que quiere enviar");
        msg.focus();
        return false;
    }

    return true; //Al ser validado correctamente como true, se pueden enviar los datos del formulario de contacto.
    
}

    // regexp para validar email válido
    const emailValido = email => {
        return /^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(email);
      }

      
      
btnEnviar.addEventListener('click', validacion);
