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
    if(file_exists($_FILES['foto']['tmp_name'])){
        $pasta = "fotos/";
        $extensao = strtolower(substr($_FILES['foto']['name'],-4));
        $nome_foto = $pasta.date("Ymd-His").$extensao;
        move_uploaded_file($_FILES['foto']['tmp_name'], $nome_foto);

        $sql = "SELECT * FROM agenda WHERE id_agenda = '$id'";
        $result = mysqli_query($con, $sql);
        foreach($result as $key => $value){
            $fotoAntiga = $value['foto'];
        }
        unlink($fotoAntiga);
    }else{
        $sql = "SELECT * FROM agenda WHERE id_agenda = '$id'";
        $result = mysqli_query($con, $sql);
        foreach($result as $key => $value){
            $nome_foto = $value['foto'];
        }
    }


    $sql = "UPDATE agenda SET nome='$nome', email='$email', telefone='$tel', apelido='$apelido', endereco='$endereco', bairro='$bairro', cidade='$cidade', estado='$estado', celular='$celular', foto='$nome_foto' WHERE id_agenda= $id_agenda";
    $result = mysqli_query($con, $sql);

    if($result){
        header("Location:listar_agendas.php");
    } else{ 
        echo "Erro ao alterar o banco de dados: ".mysqli_error($con)."<br>";
        echo "<a href='index.php'>Voltar</a>";
    }

?>
