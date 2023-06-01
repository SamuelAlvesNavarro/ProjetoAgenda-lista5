<?php
    require 'conexao.php';
    $id_agenda = $_GET['id_agenda'];
    $sql = 'DELETE FROM agenda WHERE id_agenda='.$id_agenda;
    echo "<h1> Exclusão de Agenda </h1>";
	$result = mysqli_query($con, $sql);
	if($result){
		header("Location:listar_agendas.php");
  } else{
    echo "Erro ao tentar excluir usuário: ".mysqli_error($con) . "<br>";
    echo "<a href='listar_agendas.php'>Voltar</a>";
  }
?>
