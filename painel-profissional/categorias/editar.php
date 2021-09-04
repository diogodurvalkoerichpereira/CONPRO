<?php 

require_once("../../conexao.php");
@session_start();

$id = $_POST['id'];
$reg_antigo = $_POST['reg_antigo'];


$nome = $_POST['nome'];




//SCRIPT PARA FOTO NO BANCO





if($nome == ''){
	echo "Preencha o Nome!";
	exit();
}


if($reg_antigo != $nome){
	//verificar duplicaidade de dados
	$res = $pdo->query("SELECT * from categorias where nome = '$nome'");
	$dados = $res->fetchAll(PDO::FETCH_ASSOC);
	$linhas = count($dados);
	if($linhas > 0){
		echo 'Registro já Cadastrado';
		exit();
	}
}






	$res->bindValue(":nome", $nome);
	

	$res->bindValue(":id", $id);
	
	$res->execute();

	

	echo "Editado com Sucesso!!";


?>