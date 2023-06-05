<?php
    require 'conexao.php';
    $id = $_GET['id_agenda'];
    $sql = "SELECT * FROM agenda WHERE id_agenda = '$id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    session_start();
    $_SESSION['id_agenda'] = $id;

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
    <div class="text-center container-fluid p-4">
        <h1 class="h1">Alterar Dados do Usuário - IFSP</h1>
    </div>
    <form method="post" action="alterar_agenda.exe.php" class="container border border-black border-1 align-middle">
        <!-- <input name="id_usuario" type="hidden" value="<?php //echo $row['id_usuario'] ?>" !-->
        <div>
            <label for="" class="form-label pt-3">Nome: </label>
            <input type="text" class="form-control ms-3" name="nome" id="nome" required style="width: 90%;" value="<?php echo $row['nome'] ?>"><br>
        </div>
        <div>
            <label for="" class="form-label">E-mail: </label>
            <input type="text" class="form-control ms-3" name="email" id="nome" required value="<?php echo $row['email'] ?>" style="width: 90%;"><br>
        </div>
        <div>
            <label for="" class="form-label">Telefone: </label>
            <input type="tel" class="form-control ms-3" name="tel" id="nome" pattern="\([0-9]{2}\)([9]{1})?[0-9]{4}-[0-9]{4}" value="<?php echo $row['telefone'] ?>" style="width: 90%;"><br>
        </div>

        <div>
            <label for="" class="form-label">Celular: </label>
            <input type="text" class="form-control" name="celular" id="nome" required value="<?php echo $row['celular'] ?>"><br>
        </div>
        
        <div>
            <label for="" class="form-label">Apelido: </label>
            <input type="text" class="form-control" name="apelido" id="nome" required value="<?php echo $row['apelido'] ?>"><br>
        </div>

        <div>
            <label for="" class="form-label">Endereço: </label>
            <input type="text" class="form-control" name="endereco" id="nome" required value="<?php echo $row['endereco'] ?>"><br>
        </div>

        <div>
            <label for="" class="form-label">Bairro: </label>
            <input type="text" class="form-control" name="bairro" id="nome" required value="<?php echo $row['bairro'] ?>"><br>
        </div>

        <div>
            <label for="" class="form-label">Cidade: </label>
            <input type="text" class="form-control" name="cidade" id="nome" required value="<?php echo $row['cidade'] ?>"><br>
        </div>

        <div>
            <label for="" class="form-label">Estado: </label>
            <input type="text" class="form-control" name="estado" id="nome" style="width: 17%;" required value="<?php echo $row['estado'] ?>" maxlength="2"><br>
        </div>

        <div>
            <input type="submit" value="Enviar" class="btn btn-primary mb-3 ms-3">
        </div>
    </form>
</body>
</html>