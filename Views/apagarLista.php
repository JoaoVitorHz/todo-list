<?php 
    include '../Controller/controller.php';
    $apagarLista = new Controller();

    $id = $_GET['id'];
    $apagarLista->controllerDeleteList($id);

    header("Location: index.php");
?>