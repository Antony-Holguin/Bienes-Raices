<?php

    function  conectarDB() : mysqli{
        $db = mysqli_connect('localhost', 'root', '' ,'bienesraices_crud');
        if(!$db){
            echo 'Hubo un error al conectar a la base de datos';
            exit;
        }
         return $db;
    }   
?>