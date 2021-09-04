<?php 

require_once("../../conexao.php");
@session_start();


$nome = $_POST['nome'];

$nome_novo = strtolower(preg_replace("[^a-zA-Z0-9-]", "-", 
        strtr(utf8_decode(trim($nome)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),
        "aaaaeeiooouuncAAAAEEIOOOUUNC-")) );

$nome_url = preg_replace('/[ -]+/' , '-' , $nome_novo);


//SCRIPT PARA FOTO NO BANCO












	//verificar duplicaidade de dados
	$res = $pdo->query("SELECT * from categorias where nome = '$nome'");
	$dados = $res->fetchAll(PDO::FETCH_ASSOC);
	$linhas = count($dados);
	if($linhas > 0){
		echo 'Registro já Cadastrado';
		exit();
	}


	$res = $pdo->prepare("INSERT into categorias (nome) values (:nome)");

	
	$res->bindValue(":nome", $nome);

	
	$res->execute();

	

	echo "Cadastrado com Sucesso!!";



?>