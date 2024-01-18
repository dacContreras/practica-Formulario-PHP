<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario contacto</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wrap">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <!-- el codigo php que esta en los inputs hace que no se pierda el contenido para que el usaurio no tenga que volver a escribirlo si le falta un dato -->
            <!-- revisa dos cosas | 1. que este seteada | 2. que tenga contenido | y hace que no se borre-->
            <input type="text" class="form_control" id="nombre" name="nombre" placeholder="Nombre" value="<?php if (!$enviado && isset($nombre)) echo $nombre ?>">
            <input type="text" class="form_control" id="correo" name="correo" placeholder="Correo" value="<?php if (!$enviado && isset($correo)) echo $correo ?>">

            <textarea name="mensaje" class="form-control" id="mensaje" placeholder="Mensaje"><?php if (!$enviado && isset($mensaje)) echo $mensaje ?></textarea>
            
            <!-- basicamente aca estoy agreando el error -->
            <?php if (!empty($errores)) : ?>
                <div class="alert error">
                    <?php echo $errores; ?>
                </div>
            <!-- aca agrego el mensaje de success si todo salio bien -->
            <?php elseif ($enviado) : ?>
                <div class="alert success">
                    <?php echo 'enviado correctamente'; ?>
                </div>
            <?php endif ?>
            <input type="submit" name="submit" class="btn btn_primary" value="Enviar Correo">
        </form>
    </div>
</body>

</html>