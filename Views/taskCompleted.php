<?php 
    include '../Controller/controller.php';
    $taskCompleted = new Controller();

    $concluido = $_GET['concluido'];
    $id = $_GET['id'];
    if($concluido == 0){
        $concluido = 1;
    } else if($concluido == 1){
        $concluido = 0;
    }

    $taskCompleted->controllerTaskCompleted($id, $concluido);
    header("Location: index.php");
?>