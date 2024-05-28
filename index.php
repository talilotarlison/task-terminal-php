<?php
# home do programa
# https://www.php.net/manual/pt_BR/function.file.php
# https://pt.stackoverflow.com/questions/174587/capturar-entrada-digitada-pelo-usu%C3%A1rio-com-shell-php

logo();

function createTask(){

    # Nome do arquivo
    $nomeArquivo = 'task.txt'; 
    // Conteúdo a ser adicionado na última linha
    $novaLinha = readline("Qual sua tarefa?: ");
    // Abre o arquivo em modo de escrita (append)
    $handle = fopen($nomeArquivo, 'a');
    // Escreve o conteúdo na última linha
    fwrite($handle, $novaLinha . PHP_EOL);
    // Fecha o arquivo
    fclose($handle);
    echo "Conteúdo adicionado com sucesso!";
}

function removeTask(){
   
    $idTask = readline("ID da tarefa para remover?: ");
    $arquivo = 'task.txt';
    $linhaParaRemover = $idTask; // substitua pelo número da linha que deseja remover

    $linhas = file($arquivo);
    unset($linhas[$linhaParaRemover - 1]); // índice começa em 0, então subtraímos 1
    file_put_contents($arquivo, implode('', $linhas));
}

function showTask(){
    # show tarefas
    $names = file('task.txt');
    // To check the number of lines 
    echo 'Total de tarefas: -> '.count($names). PHP_EOL;
    echo "". PHP_EOL;
    foreach($names as $key=>$name)
    {
      $num = $key + 1;
       echo $num.' - ' . $name;
    }
    echo "". PHP_EOL;
}

function close(){
    echo "Obrigado por usar Task!". PHP_EOL;
    exit();
}

function escolhaUser($escolha){
    // Esta declaração switch:

    switch ($escolha) {
        case 1:
            separador();
            showTask();
            separador();
            main();
            break;
        case 2:
            separador();
            removeTask();
            showTask();
            main();
            break;
        case 3:
            separador();
            createTask();
            separador();
        case 4:
            separador();
            close();
            separador();
            main();
            break;
        default:
            separador();
            echo "Entrada invalida!! tente novamente";
            echo "". PHP_EOL;
            separador();
            main();
    }
}

function separador(){
    echo "############################################". PHP_EOL;
}

function logo(){
    echo "". PHP_EOL;
    echo "  /__  ___/ ". PHP_EOL;
    echo "    / /         ___        ___       / ___ ". PHP_EOL;
    echo "   / /        //   ) )   ((   ) )   //\ \ ". PHP_EOL;
    echo "  / /        //   / /     \ \      //  \ \ ". PHP_EOL;
    echo " / /        ((___( (   //   ) )   //    \ \ ". PHP_EOL;
    echo "". PHP_EOL;
}

function main(){
    echo 'Gerenciados de Tarefas!!'. PHP_EOL;
    echo '[1] - Ver todas tarefas.'. PHP_EOL;
    echo '[2] - Remover tarefas.'. PHP_EOL;
    echo '[3] - Adcionar tarefas.'. PHP_EOL;
    echo '[4] - Exit'. PHP_EOL;
    $escolha = readline("O que deseja fazer? ");
    escolhaUser(intval($escolha));
}

main();

?>