<?php 

require_once("../../conexao.php");
@session_start();

$contas = $_POST['contas'];
$nome = $_POST['nome'];



//SCRIPT PARA FOTO NO BANCO

 



if($contas == ''){
	echo "Preencha a conta!!";
	exit();
}

if($nome == ''){
	echo "Preencha o Nome!";
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

	$res->bindValue(":contas", $contas);
	$res->bindValue(":nome", $nome);

	
	$res->execute();

	

	echo "Cadastrado com Sucesso!!";



?>