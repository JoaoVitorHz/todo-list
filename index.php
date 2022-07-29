<?php 
    include 'model.php';
    $tarefas = new Tarefas();
?>

<!DOCTYPE html>
<html lang="pt-br">
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


        <div class="listas">
                <div class="inserirNovaLista">
                    <form action="">
                        <input type="text" name="addNameList" placeholder="Digite aqui uma nova lista">
                        <button type="submit">Criar nova Lista</button>
                    </form>
                    <?php 
                        if(!empty($_GET['addNameList'])){
                            $nameList = $_GET['addNameList'];
                            $tarefas->addNewList($nameList);
                            header("Location: index.php");
                        }
                    ?>
                </div>
                <div class="ListarListas">
                    <?php 
                        $button = $tarefas->getAllList();
                        foreach($button as $t):
                    ?>
                        <a href="index.php?id=<?php echo $t['id']?>"><?php echo $t['listName']?></a>
                    <?php endforeach?>
                </div>
         
           
        </div>

        <form action="" method="">
            <div class="input">
                      
                        
                <input type="hidden" name="idList" value="<?php if(!empty($_GET['id'])){ echo $idList = $_GET['id'];}?>">
                <input type="text" name="newTask" placeholder="Digite aqui uma nova tarefas">
                <button type="submit">Adicionar</button>
            </div>
       

            <table width="500">
                <?php 
                    if(!empty($_GET['id'])){
                    $idList = $_GET['id'];
                        
                    $lista = $tarefas->getTaskList($idList);
                    foreach($lista as $iten):
                ?>
                <tr class="linha">
                    <td class="task"><?php echo $iten['taskName'];?></td>
                    <td class="actions">
                        <a class="cheked <?php echo ($iten['taskCompleted']) ? 'feito' : 'falta'?>" href="taskCompleted.php?concluido=<?php echo $iten['taskCompleted']?>&id=<?php echo $iten['id']?>"> <?php echo ($iten['taskCompleted'] ? '<i class="icone fa-solid fa-arrow-rotate-right"></i>': '<i class="icone fa-solid fa-check"></i>')?></a>
                        <a class="apagar" href="excluir.php?id=<?php echo $iten['id']; ?>"><i class="icone fa-solid fa-x"></i></a>
                    </td>
                </tr>
                <?php endforeach;}?>
            </table>
        </form>
    </div>
    
    <?php 
        if(!empty($_GET['newTask'])){
            $task = $_GET['newTask'];
            $idList = $_GET['idList'];
            echo $idList;
            $tarefas->addNewTask($task, $idList);
            header("Location: index.php");
        }
    ?>
</body>
</html>

