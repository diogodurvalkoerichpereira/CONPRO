<?php 

require_once("../../conexao.php");

$id = $_POST['id'];

$res = $pdo->query("SELECT * from contas where codigoconta = '$id'");
	$dados = $res->fetchAll(PDO::FETCH_ASSOC);
	$categoria = $dados[0]['categoria'];


$pdo->query("DELETE from contas where codigoconta = '$id' ");

echo "Excluído com Sucesso!!";


//INCREMENTAR VALOR DE 1 NA CATEGORIA ONDE O PRODUTO FOI COLOCADO
	$res = $pdo->query("SELECT * from categorias where id = '$categoria'");
	$dados = $res->fetchAll(PDO::FETCH_ASSOC);
	$produtos = $dados[0]['contas'];
	

	//ATUALIZAR O NOVO VALOR DO CAMPO PRODUTOS NA CATEGORIA
	$pdo->query("UPDATE categorias set contas = id = '$categoria'");

?>