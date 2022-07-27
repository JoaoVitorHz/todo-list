<?php 
    include 'model.php';
    $tarefas = new Tarefas();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1>Lista de tarefas</h1>

    <form action="" method="">
         Adicionar nova tarefa <br/>
        <input type="text" name="newTask" placeholder="Digite aqui uma nova tarefas"><br/>
        <button type="submit">Adicionar nova Tarefa</button><br/><br/>

        <table border="1" width="500">
            <?php 
                $lista = $tarefas->getAllTask();
                foreach($lista as $iten):
            ?>
            <tr>
                <td><?php echo $iten['taskName'];?></td>
                <td>
                    <a href="">[ OK ]</a>
                    <a href="excluir.php?id=<?php echo $iten['id']; ?>">[ APAGAR ]</a>
                </td>
            </tr>
            <?php endforeach;?>
        </table>
    </form>

    <?php 
        if(!empty($_GET['newTask'])){
            $task = $_GET['newTask'];

            $tarefas->addNewTask($task);
            header("Location: index.php");
        }
    ?>
</body>
</html>

