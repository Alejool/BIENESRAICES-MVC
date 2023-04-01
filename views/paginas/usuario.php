<?php

require 'includes/app.php';

$db=conectarDB();

// crear email y contraseña
$email="alejandro@gmail.com";
$password="123456.";

// hashear password
$passwordHash=password_hash($password, PASSWORD_BCRYPT);

$query="INSERT INTO usuarios(email, password) VALUES ('$email', '$passwordHash')";

// var_dump($query);


// agregarlo a la base de datos
mysqli_query($db, $query);