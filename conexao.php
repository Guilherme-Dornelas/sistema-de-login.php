<?php

    $Servior = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "pessoas";

    $conexao = new mysqli($Servior,$usuario,  $senha , $banco); 

    if(!$conexao){
        die("houve um erro: " .mysqli_connect_error());
   }

   session_start();
?>