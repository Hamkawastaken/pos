<?php

require_once __DIR__ . '/../Model/Model.php';
require_once __DIR__ . '/../Model/Category.php';

$id = $_GET['id'];
if(!isset($id)) {
    header("Location: ../Views/index-category.php");
}

$categories = new Category(); 
if (isset($id)) 
$categories->delete($_GET['id']);
header("Location: ../Views/index-category.php")

?>