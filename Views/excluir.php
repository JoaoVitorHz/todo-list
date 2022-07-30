<?php 
    include '../Model/model.php';
    $tarefas = new Tarefas();

    $id = $_GET['id'];
    $tarefas->deleteTask($id);

    header("Location: index.php");
?>