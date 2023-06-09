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
    $data = date('d-m-y');

    $nome_foto = "";
    if(file_exists($_FILES['foto']['tmp_name'])){
        $pasta = "fotos/";
        $extensao = strtolower(substr($_FILES['foto']['name'],-4));
        $nome_foto = $pasta.date("Ymd-His").".".$extensao;
        echo move_uploaded_file($_FILES['foto']['tmp_name'], $nome_foto);
    }

    $check = "SELECT * FROM agenda WHERE email = '$email'";
    foreach(mysqli_query($con, $check) as $key => $value){
        $emailExiste = $value['email'];
    }
    if($email == $emailExiste){
        echo "Esse email já existe<br>";
        echo "<a href='cadastro_agenda.html'>Voltar</a>";
    }else{
        $sql = "INSERT INTO agenda VALUES(NULL, '$nome', '$apelido', '$endereco', '$bairro', '$cidade', '$estado', '$tel', '$cel', '$email', '$data', '$nome_foto')";
        $res = mysqli_query($con, $sql);
            if(mysqli_affected_rows($con) == 1){
                header("Location:listar_agendas.php");
            } else{
                echo "Falha na gravação do registro<br>";
                echo "<a href='cadastro_agenda.html>Voltar</a>'";
            }
    }

?>
