<?php 

require_once("../../conexao.php");
@session_start();

$id = $_POST['id'];
$reg_antigo = $_POST['reg_antigo'];

$contas = $_POST['contas'];
$nome = $_POST['nome'];




//SCRIPT PARA FOTO NO BANCO





if($contas== ''){
	echo "Preencha a Conta!!";
	exit();
}

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

 	$res = $pdo->prepare("UPDATE categorias SET nome = :nome, contas = :contas where id = :id");
 	
 }



	$res->bindValue(":contas", $contas);
	$res->bindValue(":nome", $nome);
	

	$res->bindValue(":id", $id);
	
	$res->execute();

	

	echo "Editado com Sucesso!!";


?>