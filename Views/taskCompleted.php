<?php 
    include '../Model/model.php';
    $tarefas = new Tarefas();

    $concluido = $_GET['concluido'];
    $id = $_GET['id'];
    if($concluido == 0){
        $concluido = 1;
    } else if($concluido == 1){
        $concluido = 0;
    }

    $tarefas->tarefa($id, $concluido);
    header("Location: index.php");
?>