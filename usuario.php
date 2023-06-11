<?php 

//importar conexion
require "includes/config/database.php";
$db = connectDB();

// crar el email
$email = "agargato@gmail.com";
$password = "G@tomiau#9";
$passwordHash = password_hash($password, PASSWORD_BCRYPT);

//query
$query = " INSERT INTO usuarios (email, password) VALUES ('{$email}', '{$passwordHash}'); ";



echo $passwordHash;

mysqli_query($db, $query);