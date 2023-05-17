<?php

require_once("conection.php");

session_start();
session_unset();
session_destroy();

header('location:System.php');

?>
