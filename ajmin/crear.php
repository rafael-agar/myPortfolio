<?php

require '../includes/functions.php';
$auth = estaAuth();

if(!$auth){
    header('Location: /');
}

require '../includes/config/database.php';
    $db = connectDB();

$errores = [];

$name = '';
$client = '';
$role = '';
$description = '';
$description2 = '';
$link = '';
$date = date('Y/m/d');

 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // sanitizando
    // $name = mysqli_real_escape_string( $db, $_POST['name'] );
    // $client = mysqli_real_escape_string( $db, $_POST['client'] );
    // $role = mysqli_real_escape_string( $db, $_POST['role '] );
    // $description = mysqli_real_escape_string( $db, $_POST['description'] );
    // $description2 = mysqli_real_escape_string( $db, $_POST['description2'] );
    // $link = mysqli_real_escape_string( $db, $_POST['link'] );
    
   
    $name = filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
    $client = filter_var($_POST['client'], FILTER_SANITIZE_SPECIAL_CHARS);
    $role = filter_var($_POST['role'], FILTER_SANITIZE_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_SPECIAL_CHARS);
    $description2 = filter_var($_POST['description2'], FILTER_SANITIZE_SPECIAL_CHARS);
    $link = filter_var($_POST['link'], FILTER_SANITIZE_SPECIAL_CHARS);
    $tech = $_POST['tech'];
    $tech2 = $_POST['tech2'];
    $tech3 = $_POST['tech3'];
    

    $image = $_FILES['image'];
    $image2 = $_FILES['image2'];
    $image3 = $_FILES['image3'];

    if(!$name) {
        $errores[] = "Debes añadir un name";
    }

    if(!$client) {
        $errores[] = "El client es obligatorio";
    }

    if(!$role) {
        $errores[] = "El role es obligatorio";
    }

    if(!$description) {
        $errores[] = "La descripción es obligatoria";
    }


    if (!$link) {
        $errores[] = "olvidastes el link";
    }

    //'name' es el array de la $_FILE
    if(!$image['name'] || $image['error']){
        $errores[] = 'La image es obligatoria';
    }


    //validar tamano 100kb maximo
    $medida = 1000 * 500;
    
    if ($image['size'] > $medida) {
        $errores[] = "La image es muy grande";
    }

    if ($image2['size'] > $medida) {
        $errores[] = "La image es muy grande";
    }

    if ($image3['size'] > $medida) {
        $errores[] = "La imagen es muy grande";
    }

//     echo "<pre>";
//     var_dump($_POST);
//     echo "<pre>";

// echo "<hr>";

// echo "<pre>";
// var_dump($_FILES);
// echo "<pre>";
// exit;

//     exit;
    
    if(empty($errores)){

        /** SUBIDA DE ARCHIVOS **/

        //crear carpeta, en la rais del proyecto
        $carpetaImagenes = '../images/';

        //is_dir si la carpeta existe
        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }

        // /generar nombre unico
        $nombreImagen = md5(uniqid( rand(), true )) . ".jpg";
        $nombreImagen2 = md5(uniqid( rand(), true )) . ".jpg";
        $nombreImagen3 = md5(uniqid( rand(), true )) . ".jpg";

        // echo "<pre>";
        // echo (gettype($nombreImagen));
        // echo "<pre>";
        // exit;

        //subir la imagen
        //tmp_name viene de $_FILES
        move_uploaded_file($image['tmp_name'], $carpetaImagenes . $nombreImagen );
        move_uploaded_file($image2['tmp_name'], $carpetaImagenes . $nombreImagen2 );
        move_uploaded_file($image3['tmp_name'], $carpetaImagenes . $nombreImagen3 );

//         echo "<pre>";
// var_dump($_FILES);
// echo "<pre>";
// exit;


         // /insertar en la base de datos
        $query = "INSERT INTO my_portfolio (name, client, role, description, description2, link, date, image, image2,image3,tech,tech2,tech3) 
        VALUES ( '$name', '$client', '$role', '$description', '$description2', '$link', '$date', '$nombreImagen', '$nombreImagen2','$nombreImagen3', '$tech', '$tech2', '$tech3' )";

        // echo $query;

        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            //redirecionar al usuario
            //function header para redireccionar a un usuario o cambiar direccion usuario
            header('Location: /ajmin?resultado=1'); //query string ?
        }
    }

}

?>

<link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=PT+Mono&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/owl.carousel.min.css">
  <link rel="stylesheet" href="../css/owl.theme.default.min.css">
  <link rel="stylesheet" href="../css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="../fonts/icomoon/style.css">
  <link rel="stylesheet" href="../fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="../css/aos.css">
  <link rel="stylesheet" href="../css/style.css">

<main class='untree_co-section untree_co-section-4'>
    
    <div class="container">
        <h1 class="text-dark">Crear New Portfolio</h1>

        <?php foreach($errores as $error): ?>
            <div class="alert alert-warning" role="alert">
                <?php echo $error; ?>
            </div>   
        <?php endforeach ?>

    <!-- enctype="multipart/form-data" habilitarlo para file, usando la global $_FILES -->

        
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name">name:</label>
                <input class="form-control" type="text" id="name" placeholder="name" name="name" value="<?php echo $name; ?>">

            <div class="mb-3">
                <label for="client">client:</label>
                <input class="form-control" type="text" id="client" placeholder="client" name="client" value="<?php echo $client; ?>">
            </div>

            <div class="mb-3">
                <label for="role">role:</label>
                <input class="form-control" type="text" id="role" placeholder="role" name="role" value="<?php echo $role; ?>">
            </div>

            <div class="mb-3">
            <label for="descripcion">Descripcion:</label>
            <textarea class="form-control" id="description" name="description"></textarea>
            </div>

            <div class="mb-3">
            <label for="description2">Descripcion2:</label>
            <textarea class="form-control" id="description2" name="descripcion2"></textarea>
            </div>

            <div class="mb-3">
            <label for="link">link:</label>
            <input class="form-control" type="text" id="link" placeholder="link" name="link" value="<?php echo $link; ?>">
            </div>

            <div class="mb-3">
            <label for="image">Image:</label>
            <input type="file" id="image" accept="image/jpeg, image/png" name="image" name="image">
            </div>

            <div class="mb-3">
                <label for="image2">Image2:</label>
                <input type="file" id="image2" accept="image/jpeg, image/png" name="image2" name="image2">
            </div>

            <div class="mb-3">
            <label for="image3">Image3:</label>
            <input type="file" id="image3" accept="image/jpeg, image/png" name="image3" name="image3">
            </div>

            <label for="pet-select">Choose a Tech:</label>

            <div class="mb-3">
                <select name="tech" id="tech-select">
                    <option value="">--Please choose an option--</option>
                    <option value="html">html</option>
                    <option value="css">css</option>
                    <option value="bootstrap">bootstrap</option>
                    <option value="sass">sass</option>
                    <option value="javascript">javascript</option>
                    <option value="Wordpress">Wordpress</option>
                    <option value="php">php</option>
                    <option value="mysql">mysql</option>
                    <option value="figma">figma</option>
                    <option value="photoshop">photoshop</option>
                    <option value="premier">premiere</option>
                </select>
            </div>

            <div class="mb-3">
                <select name="tech2" id="tech-select">
                    <option value="">--Please choose an option--</option>
                    <option value="html">html</option>
                    <option value="css">css</option>
                    <option value="bootstrap">bootstrap</option>
                    <option value="sass">sass</option>
                    <option value="javascript">javascript</option>
                    <option value="Wordpress">Wordpress</option>
                    <option value="php">php</option>
                    <option value="mysql">mysql</option>
                    <option value="figma">figma</option>
                    <option value="photoshop">photoshop</option>
                    <option value="premier">premiere</option>
                </select>
            </div>

            <div class="mb-3">
                <select name="tech3" id="tech-select">
                    <option value="">--Please choose an option--</option>
                    <option value="html">html</option>
                    <option value="css">css</option>
                    <option value="bootstrap">bootstrap</option>
                    <option value="sass">sass</option>
                    <option value="javascript">javascript</option>
                    <option value="Wordpress">Wordpress</option>
                    <option value="php">php</option>
                    <option value="mysql">mysql</option>
                    <option value="figma">figma</option>
                    <option value="photoshop">photoshop</option>
                    <option value="premier">premiere</option>
                </select>
            </div>


            

            <input type="submit" class="btn btn-dark" value="Create Project">
            <button onclick="goBack()" class="btn btn-success">Back</button>
        </form>

        <script>
          function goBack() {
              window.history.back();
          }
        </script>




    </div>

</main>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/jquery.animateNumber.min.js"></script>
    <script src="../js/jquery.waypoints.min.js"></script>
    <script src="../js/jquery.fancybox.min.js"></script>
    <script src="../js/aos.js"></script>
    <script src="../js/wave-animate.js"></script>
    <script src="../js/circle-progress.js"></script>
    <script src="../js/imagesloaded.pkgd.js"></script>
    <script src="../js/isotope.pkgd.min.js"></script>
    <script src="../js/jquery.easing.1.3.js"></script>
    <script src="../js/TweenMax.min.js"></script>
    <script src="../js/ScrollMagic.min.js"></script>
    <script src="../js/scrollmagic.animation.gsap.min.js"></script>


    <script src="js/custom.js"></script>