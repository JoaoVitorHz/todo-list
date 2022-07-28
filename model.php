<?php
class Tarefas{
    private $pdo;
    public function __construct(){
        $this->pdo = new PDO("mysql:dbname=task;host=localhost", "root", "");
    }
    //inseri novas tarefas no banco
    public function addNewTask($task){
        $sql = "INSERT INTO tasks(taskName) value (:task)";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':task', $task);
        $sql->execute();
        if(!empty($task)){
            echo "Inseriu a task ".$task;
        }
    } 

    //pega as tarefas do banco
    public function getAllTask(){
        $sql = "SELECT * FROM tasks";

        $sql = $this->pdo->query($sql);
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