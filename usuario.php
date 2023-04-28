<?php
//Importar conexion
include 'includes/config/database.php';
$db = conectarDB();

//Crear email y password
$email = "alvchavito@gmail.com";
$password = "Antony12042002.";
$password_hash = password_hash($password, PASSWORD_DEFAULT);

//Query para crear usuario
$query = "INSERT INTO usuarios(email, password) VALUES ('$email', '$password_hash');";
mysqli_query($db,$query);

?>