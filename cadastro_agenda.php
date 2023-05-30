<?php
    require 'conexao.php';
    $nome = $_POST['nome'];
    $apelido = $_POST['apelido'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $tel = $_POST['tel'];
    $cel = $_POST['cel'];
    $email = $_POST['email'];
    $data = date('Ymd-His');

    $check = "SELECT * FROM agenda WHERE email = '$email'";
    foreach(mysqli_query($con, $check) as $key => $value){
        $emailExiste = $value['email'];
    }
    if($email == $emailExiste){
        header("Location:cadastro_usuarioHTML.php?v=<span class='text-danger'>Este email já existe</span>");
    }else{
        $sql = "INSERT INTO usuario VALUES(NULL, '$nome', '$apelido', '$endereco', '$bairro', '$cidade', '$estado', '$tel', '$cel', '$email', '$data')";
        $res = mysqli_query($con, $sql);
            if(mysqli_affected_rows($con) == 1){
                header("Location:listar_agendas.php");
            } else{
                echo "Falha na gravação do registro<br>";
            }
    }

?>