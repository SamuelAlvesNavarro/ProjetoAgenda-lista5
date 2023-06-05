<?php
    require 'conexao.php';
    session_start();

    $id_agenda = $_SESSION['id_agenda'];

    $nome = $_POST['nome'];
    $apelido = $_POST['apelido'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $celular = $_POST['celular'];



    $sql = "UPDATE agenda SET nome='$nome', email='$email', telefone='$tel', apelido='$apelido', endereco='$endereco', bairro='$bairro', cidade='$cidade', estado='$estado', celular='$celular' WHERE id_agenda= $id_agenda";
    $result = mysqli_query($con, $sql);

    if($result){
        header("Location:listar_agendas.php");
    } else{ 
        echo "Erro ao alterar o banco de dados: ".mysqli_error($con)."<br>";
        echo "<a href='index.php'>Voltar</a>";
    }

?>
