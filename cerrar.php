<?php
session_start(); //Para poder acceder a la superglobal session
$_SESSION = []; //Para vaciar el contenido del array

header('Location: index.php');

?>