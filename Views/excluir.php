<?php 
    include '../Controller/controller.php';
    $apagar = new Controller();

    $id = $_GET['id'];
    $apagar->controllerDeleteTask($id);

    header("Location: index.php");
?>