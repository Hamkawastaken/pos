<?php

require_once __DIR__ . '/../Model/Model.php';
require_once __DIR__ . '/../Model/Items.php';

$id = $_GET['id'];
if(!isset($id)) {
    header("Location: ../Views/index-menu.php");
}

$menu = new Item(); 
if (isset($id)) 
$menu->delete($_GET['id']);
header("Location: ../Views/index-menu.php")

?>