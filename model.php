<?php
class Tarefas{
    private $pdo;
    public function __construct(){
        $this->pdo = new PDO("mysql:dbname=task;host=localhost", "root", "");
    }
    //inseri novas tarefas no banco
    public function addNewTask($task, $idList){
        $sql = "INSERT INTO tasks (taskName, listId) value (:task, :listId)";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':task', $task);
        $sql->bindValue(':listId', $idList);
        $sql->execute();
    } 
    public function addNewList($list){
        $sql = "INSERT INTO list(listName) value (:list)";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':list', $list);
        $sql->execute();
    }

    //pega as tarefas do banco
    public function getAllTask(){
        $sql = "SELECT * FROM tasks";

        $sql = $this->pdo->query($sql);
        return $sql->fetchAll();
    }
    public function getAllList(){
        $sql = "SELECT * FROM list";
        $sql = $this->pdo->query($sql);
        return $sql->fetchAll();
    }
    public function getTaskList($id){
        $sql = "SELECT * FROM tasks WHERE listId = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function deleteTask($id) {
        $sql = "DELETE FROM tasks WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    public function tarefa($id, $concluido){
        $sql = "UPDATE tasks SET taskCompleted = :concluido WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':concluido', $concluido);
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
}
?>