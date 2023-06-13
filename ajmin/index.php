<?php

require '../includes/functions.php';
$auth = estaAuth();

if(!$auth){
    header('Location: /');
}
    
    // echo "<pre>";
    // var_dump($_GET);
    // echo "</pre>";

     // /incluye un template

    incluirTemplate('header'); 

    //importar la coneccion
    require '../includes/config/database.php';
    $db = connectDB();

    //escribir el query
    $query = "SELECT * FROM my_portfolio";
    $queryLabs = "SELECT * FROM labs";
    
    //la consulta DB
    $resultadoConsulta = mysqli_query($db, $query);
    $resultadoConsultaLabs = mysqli_query($db, $queryLabs);

    // ?? placeholder, si no exite? le asigna X
    $resultado = $_GET['resultado'] ?? null;

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        //normalizamos
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id) {
            //eliminar el archivo DE IMAGEN
            $query = "SELECT image FROM my_portfolio WHERE id = {$id}";
            $resultado = mysqli_query($db, $query);
            $project = mysqli_fetch_assoc($resultado);
            unlink('../imagenes/' .$project['imagen']);
            //elimina la propiedad
            $query = "DELETE FROM my_portfolio WHERE id = {$id}";
            $resultado = mysqli_query($db, $query);

            if ($resultado) {
                header('location: /ajmin?resultado=3');
            }
        }
    }

   
?>

<main class='untree_co-section untree_co-section-4 mb-5'>
    

    <!-- //resultado es enviado desde crear.php 
    // el viene como intero, o tambien se puede usar intval( intval($resultado) === 1)
    -->
    

    <div class="container mt-5">
    <br>
    <?php if ( intval($resultado) === 1): ?> 
        <p class="alert alert-primary" role="alert">Creado Correctamente</p>
    <?php elseif ( intval($resultado) === 2): ?>
        <p class="alert alert-primary" role="alert">Actializado Correctamente</p>
    <?php elseif ( intval($resultado) === 3): ?>
        <p class="alert alert-primary" role="alert">Eliminado Correctamente</p>   
    <?php endif; ?>
    <h1 class="text-dark mt-5 mb-4">Portfolio Admin</h1>
    
    <div class="d-flex justify-content-between align-items-center">
        <a href="/ajmin/crear.php" class="boton boton-verde">New Project</a>
        <a href="logout.php" type="submit" class="btn btn-dark">Log Out</a>
    </div>

<table class="table">
    <thead>
        <tr class="tr-text">
            <th>Name</th>
            <th>Client</th>
            <th>Role</th>
            <th>Description</th>
            <th>Link</th>
            <th>Date</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody> <!-- Mostrar los resultado de la BD -->
        <?php while($project = mysqli_fetch_assoc($resultadoConsulta)): ?>
        <tr class="tr-text">
            <td><?php echo $project['name']; ?></td>
            <td><?php echo $project['client']; ?></td>
            <td><?php echo $project['role']; ?></td>
            <td>Description</td>
            <td><?php echo $project['link']; ?></td>
            <td><?php echo $project['date']; ?></td>
            <td><img width="80px" src="/images/<?php echo $project['image']; ?>" /></td>
            <td>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $project['id']; ?> ">
                    <input type="submit" class="boto-rojo-block" value="Eliminar">
                </form>
                <!-- <a href="/admin/propiedades/actualizar.php?id=" class="boto-verde-block">Actualizar</a> -->
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>

</table>

<hr> <!-- ***************************************************** -->

<h1 class="text-dark mt-5 mb-4">Labs Admin</h1>
    
    <div class="d-flex justify-content-between align-items-center">
        <a href="/ajmin/crearLab.php" class="boton boton-verde">New Lab</a>
        <a href="logout.php" type="submit" class="btn btn-dark">Log Out</a>
    </div>

<table class="table">
    <thead>
        <tr class="tr-text">
            <th>Name</th>
            <th>Description</th>
            <th>Link</th>
            <th>GitHub</th>
            <th>tech</th>
            <th>tech2</th>
            <th>tech3</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody> <!-- Mostrar los resultado de la BD -->
        <?php while($projectLabs = mysqli_fetch_assoc($resultadoConsultaLabs)): ?>
        <tr class="tr-text">
            <td><?php echo $projectLabs['name']; ?></td>
            <td><?php echo substr($projectLabs['description'],0,40); ?></td>
            <td><?php echo $projectLabs['link']; ?></td>
            <td><?php echo $projectLabs['github']; ?></td>
            <td><?php echo $projectLabs['tech1']; ?></td>
            <td><?php echo $projectLabs['tech2']; ?></td>
            <td><?php echo $projectLabs['tech3']; ?></td>
            <td><img width="80px" src="/images/<?php echo $projectLabs['image']; ?>" /></td>
            <td>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $projectLabs['id']; ?> ">
                    <input type="submit" class="boto-rojo-block" value="Eliminar">
                </form>
                <!-- <a href="/admin/propiedades/actualizar.php?id=" class="boto-verde-block">Actualizar</a> -->
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>

</table>

    </div>
    
</main>

<?php 

//cerrar conexion BD
mysqli_close($db);
 ?>
