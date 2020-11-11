<?php

require_once 'clases/Conexion.php';
$obj_conexion=new Conexion();
      //$obj_conexion->saludar();
      $con=$obj_conexion->conectar();



echo'<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/login.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="login">
<h1>Login</h1>
<form method="post">
    <input type="text" name="u" placeholder="Username" required="required" />
    <input type="password" name="p" placeholder="Password" required="required" />
    <button type="submit" class="btn btn-primary btn-block btn-large">Log in.</button>
</form>
</div>
</body>
</html>';