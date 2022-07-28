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
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="toDoList">
        <h1>Lista de tarefas</h1>
        <hr/>

        <form action="" method="">
            <div class="input">
                <input type="text" name="newTask" placeholder="Digite aqui uma nova tarefas">
                <button type="submit">Adicionar</button>
            </div>
       

            <table width="500">
                <?php 
                    $lista = $tarefas->getAllTask();
                    foreach($lista as $iten):
                ?>
                <tr class="linha">
                    <td class="task"><?php echo $iten['taskName'];?></td>
                    <td class="actions">
                        <a class="cheked <?php echo ($iten['taskCompleted']) ? 'feito' : 'falta'?>" href="taskCompleted.php?concluido=<?php echo $iten['taskCompleted']?>&id=<?php echo $iten['id']?>"> <?php echo ($iten['taskCompleted'] ? '<i class="icone fa-solid fa-check"></i>': '<i class="icone fa-solid fa-arrow-rotate-right"></i>')?></a>
                        <a class="apagar" href="excluir.php?id=<?php echo $iten['id']; ?>"><i class="icone fa-solid fa-x"></i></a>
                    </td>
                </tr>
                <?php endforeach;?>
            </table>
        </form>
    </div>
    
    <?php 
        if(!empty($_GET['newTask'])){
            $task = $_GET['newTask'];

            $tarefas->addNewTask($task);
            header("Location: index.php");
        }
    ?>
</body>
</html>

