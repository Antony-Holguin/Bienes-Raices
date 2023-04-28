<?php
require('app.php');
function incluirTemplate(string $nombreTemplate, bool $inicio = false ){
    include TEMPLATES_URL."/$nombreTemplate.php";
}

function estaAutenticado():bool
{
    session_start();
    $auth = $_SESSION['AUTENTICADO'];
    if($auth){
        return true;
    }else{
        return false;
    }
}
?>