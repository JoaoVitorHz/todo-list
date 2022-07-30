<?php 
    include 'model.php';
    $tarefas = new Tarefas();

    $id = $_GET['id'];
    $tarefas->deleteList($id);

    header("Location: index.php");
?>