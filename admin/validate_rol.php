<?php
session_start();
var_dump($_SESSION);
//Archivo para luego validar Roles en el LogIn  
$roles_permitidos = ['Administrador', 'Editor'];
//!array_key_exists('rol', $_SESSION)|| !in_array($_SESSION['rol'], $roles_permitidos)
if(!isset($_SESSION['rol']) || !in_array($_SESSION['rol'], $roles_permitidos)){
    header('Location: /php/2c2024-main/session/login.php');///ver donde pegar
    exit;
}
?>