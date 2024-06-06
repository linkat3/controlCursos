<?php

// borrar datos de sesiones, o cookies
session_start(); //arranca la sesión

session_unset(); //elimina los datos de sesión

header("location:../index.php");



?>