<?php 

require_once("../../conexao.php");
@session_start();


$codigoconta= $dados[$i]['codigoconta'];	
$conta = $dados[$i]['conta'];

$descricao = $dados[$i]['descricao'];

$categoria = $dados[$i]['categoria'];



if($descricao == ''){
	echo "Preencha a Descrição!!";
	exit();
}

if($nome == ''){
	echo "Preencha o nome!";
	exit();
}


if($reg_antigo != $nome){
	//verificar duplicaidade de dados
	$res = $pdo->query("SELECT * from contas where conta = '$conta'");
	$dados = $res->fetchAll(PDO::FETCH_ASSOC);
	$linhas = count($dados);
	if($linhas > 0){
		echo 'Registro já Cadastrado';
		exit();
	}



 	$res = $pdo->prepare("UPDATE contas SET conta = :conta, descricao = :descricao, codigoconta = :codigoconta, categoria = :categoria where id = :id");
 	$res->bindValue(":imagem", $imagem);
 }



	$res->bindValue(":descricao", $descricao);
	$res->bindValue(":conta", $conta);
	
	$res->bindValue(":codigoconta", $codigoconta);
	$res->bindValue(":categoria", $categoria);

	
	$res->execute();

	

	echo "Editado com Sucesso!!";


?>