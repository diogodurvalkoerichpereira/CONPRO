<?php 

require_once("../../conexao.php");
@session_start();


$nome = $_POST['nome'];
$contas = $_POST['contas'];



//SCRIPT PARA FOTO NO BANCO





if($contas == ''){
	echo "Preencha a Descrição!!";
	exit();
}

if($nome == ''){
	echo "Preencha o Valor!";
	exit();
}




	//verificar duplicaidade de dados
	$res = $pdo->query("SELECT * from categorias where nome = '$nome'");
	$dados = $res->fetchAll(PDO::FETCH_ASSOC);
	$linhas = count($dados);
	if($linhas > 0){
		echo 'Registro já Cadastrado';
		exit();
	}


	$res = $pdo->prepare("INSERT into categorias (nome, contas) values (:nome, :contas)");


	$res->bindValue(":nome", $nome);
	$res->bindValue(":contas", $contas);
	
	$res->execute();

	

	echo "Cadastrado com Sucesso!!";



?>