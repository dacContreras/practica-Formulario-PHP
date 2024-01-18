<?php
// Estas variables las uso para mostrar diferentes mensajes segun el error que sea
$errores = '';
$enviado = '';

// comprobar si el formulario ha sido enviado
if (isset($_POST['submit'])) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];
    
    // verificar si el nombre tiene contenido
    if (!empty($nombre)) {
        $nombre = trim($nombre);
        /**
         * ! FILTER_SANITIZE_STRING ya no se usa
         * TODO: esto hay que cambiarlo
         */
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
    } else {
        $errores .= 'por favor ingresa un nombre <br/>';
    }
    // verificar si el correo tiene contenido
    if (!empty($correo)) {
        // uso los filtros para que no me agreguen codigo y sea seguro
        $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);
        if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
            $errores .= 'porfavor ingresa un correo valido <br />';
        }
    } else {
        $errores .= 'por favor ingresa un correo <br/>';
    }
    // verificar si el mensaje tiene contenido
    if(!empty($mensaje)){
        $mensaje = htmlspecialchars($mensaje);
        $mensaje = trim($mensaje);
        $mensaje = stripslashes($mensaje);
    } else {
        $errores .= 'porfavor ingresa el mensaje';
    }
    // si no hay errores, entonces podemos enviar los datos
    if(!$errores){
        $enviar_a = 'tunombre@tuempresa.com';
        $asunto = 'correo enviado desde mipagina.com';
        $mensaje_preparado = "de: $nombre \n";
        $mensaje_preparado .= "Correo: $correo \n";
        $mensaje_preparado .= "Mensaje:" .$mensaje;

        /**
         * *la funcion de abajo manda el formulario al correo, pero al estar en xampp(servidor local) hay que hacer
         * * configuraciones, entonces como alternativa pondre que el mensaje es true para simular que si se envio
         */
        // mail($enviar_a, $asunto, $mensaje_preparado);
        $enviado = 'true';
    }

}

require 'index.view.php';
