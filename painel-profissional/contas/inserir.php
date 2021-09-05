<?php 

require_once("../../conexao.php");
@session_start();

$descricao = $_POST['descricao'];

$codigoconta = $_POST['codigoconta'];
$conta = $_POST['conta'];
$categoria = $_POST['categoria'];










//SCRIPT PARA FOTO NO BANCO





if($codigoconta == ''){
	echo "Preencha a Descrição!!";
	exit();
}

if($conta == ''){
	echo "Preencha o Valor!";
	exit();
}




	//verificar duplicaidade de dados
	$res = $pdo->query("SELECT * from contas where codigoconta = '$codigoconta'");
	$dados = $res->fetchAll(PDO::FETCH_ASSOC);
	$linhas = count($dados);
	if($linhas > 0){
		echo 'Registro já Cadastrado';
		exit();
	}


	$res = $pdo->prepare("INSERT into contas (descricao, codigoconta, conta, categoria) values (:descricao, :codigoconta, :conta, :categoria)");

	$res->bindValue(":descricao", $descricao);
	$res->bindValue(":codigoconta", $codigoconta);
	

	$res->bindValue(":conta", $conta);

	$res->bindValue(":categoria", $categoria);

	
	$res->execute();



	//INCREMENTAR VALOR DE 1 NA CATEGORIA ONDE O PRODUTO FOI COLOCADO
	$res = $pdo->query("SELECT * from categorias where id = '$categoria'");
	$dados = $res->fetchAll(PDO::FETCH_ASSOC);
	$contas = $dados[0]['contas'];
	$total_contas = $contas + 1;

	//ATUALIZAR O NOVO VALOR DO CAMPO PRODUTOS NA CATEGORIA
	$pdo->query("UPDATE categorias set contas = '$total_contas' where id = '$categoria'");
	

	echo "Cadastrado com Sucesso!!";



?>