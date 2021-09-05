<?php 

require_once("../../conexao.php");
@session_start();



$nome = $_POST['nome'];
$id = $_POST['id'];	


$telefone = $_POST['telefone'];
$email = $_POST['email'];	
$cpf = $_POST['cpf'];
$estado = $_POST['estado'];
$cidade = $_POST['cidade'];
$bairro = $_POST['bairro'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$cep = $_POST['cep'];



//SCRIPT PARA FOTO NO BANCO

 



if($email == ''){
	echo "Preencha o email!!";
	exit();
}

if($nome == ''){
	echo "Preencha o Nome!";
	exit();
}




	//verificar duplicaidade de dados
	$res = $pdo->query("SELECT * from clientes where email = '$email'");
	$dados = $res->fetchAll(PDO::FETCH_ASSOC);
	$linhas = count($dados);
	if($linhas > 0){
		echo 'Registro já Cadastrado';
		exit();
	}


	$res = $pdo->prepare("INSERT into clientes (nome, telefone, email, cpf, estado, cidade, bairro, rua, numero, cep) values (:nome, :telefone, :email, :cpf, :estado, :cidade, :bairro, :rua, :numero, :cep)");


	$res->bindValue(":nome", $nome);
	$res->bindValue(":telefone", $telefone);
	$res->bindValue(":email", $email);
	$res->bindValue(":cpf", $cpf);
	$res->bindValue(":estado", $estado);
	$res->bindValue(":cidade", $cidade);
	$res->bindValue(":bairro", $bairro);
	$res->bindValue(":rua", $rua);
	$res->bindValue(":numero", $numero);
	$res->bindValue(":cep", $cep);
	

	
	$res->execute();

	

	echo "Cadastrado com Sucesso!!";



?>