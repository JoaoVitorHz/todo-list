<?php
require '../Model/model.php';
class Controller{

    public function controllerAddNewList($nameList){
        $controller = new Model();
        $controller->addNewList($nameList);
    }
    public function controllerGetAllList(){
        $controller = new Model();
        $response = $controller->getAllList();
        return $response;
    }
    public function controllerGetTaskList($idList){
        $controller = new Model();
        $response = $controller->getTaskList($idList);
        return $response;
    }
    public function controllerAddNewTask($task, $idList){
        $controller = new Model();
        $controller->addNewTask($task, $idList);
    }
    public function controllerTaskCompleted($id, $concluido){
        $controller = new Model();
        $controller->taskCompleted($id, $concluido);
    }
    public function controllerDeleteTask($id){
        $controller = new Model();
        $controller->deleteTask($id);
    }
    public function controllerDeleteList($id){
        $controller = new Model();
        $controller->deleteList($id);
    }
}
?>
