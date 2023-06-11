<?php

    require 'includes/config/database.php';
    $db = connectDB();

    $errores = [];

    //autenticar usuario
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
        $password = mysqli_real_escape_string($db, $_POST['password']);

        if (!$email) {
            $errores[] = "El email es obligatorio";
        }

        if (!$password) {
            $errores[] = "El password es obligatorio";
        }

        if (empty($errores)){

            //revisar si el usuario existe
            $query = "SELECT * FROM usuarios WHERE email = '{$email}' ";
            $resultado = mysqli_query($db, $query);

            // var_dump($resultado);

            if ($resultado->num_rows) {
                //revisar si el password es correcto
                $usuario = mysqli_fetch_assoc($resultado);
                // var_dump($password);
                // var_dump($usuario['password']);
                // var_dump($usuario['email']);
                
                // exit;

                //verificar password, esta func devuelve un booleano
                $auth = password_verify($password, $usuario['password']);  
                
                if($auth){
                    //usuario autenticado, usando super global
                    session_start();
                    //llenamo el arreglo de la session
                    $_SESSION['usuario'] = $usuario['email'];
                    $_SESSION['login'] = true;

                    // var_dump($_SESSION);
                    // exit;

                    header ('Location: /ajmin');

                } else {
                    $errores[] = "El password es incorrecto";
                }

            } else {
                $errores[] = "El usuario no existe";
            }

        }
    }

    //header
    require 'includes/functions.php';
    incluirTemplate('header'); 
?>

<div class="untree_co-section untree_co-section-4">

    <br><br>
    <main class="container mt-5">
        <h1 class="mt-5 text-dark">Iniciar Sesión</h1>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <!-- <form method="POST" class="formulario">
            <fieldset class="d-flex">

                <label for="email">E-mail</label><br>
                <input type="email" name="email" placeholder="Tu Email" id="email" >

                <label for="password">Password</label><br>
                <input type="password" name="password" placeholder="Tu Password" id="password" >

            </fieldset>

            <input type="submit" value="Iniciar Sesión" class="mt-3 btn btn-dark">
        </form> -->


<form method="POST" class="mt-5">
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" name="email" placeholder="Tu Email" id="email" >

  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" placeholder="Tu Password" id="password" >
  </div>
  <input type="submit" value="Iniciar Sesión" class="btn btn-dark"></input>
</form>


    </main>

</div>

    
