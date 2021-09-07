<?php 

//VARIÁVEIS GLOBAIS
$email = 'diogodurvalkoerichpereira@gmail.com';
$email_adm = $email;

$url_site = "localhost";

//VARIAVEIS DO BANCO DE DADOS
$servidor = 'localhost';
$usuario = 'root';
$senha = '1234';
$banco = 'contabil';

/*
//VARIAVEIS DO BANCO DE DADOS
$servidor = '';
$usuario = '';
$senha = '';
$banco = '';
*/

//VARIAVEIS DO SITE

//DISPAROS AUTOMATIZADOS DE EMAIL MARKETING
//total de emails que o seu servidor suporta enviar por hora (no meu hostgator são 500)
$enviar_total_emails = 480;
$intervalo_envio_email = 70;  //tempo em minutos (enviar de 70 em 70 minutos 480 emails por vez, essa é a configuração que fiz)


/* Create table doesn't return a resultset */

$itens_por_pagina = 5;
$itens_por_pagina_produtos = 25;

//valor que o usuario pode alterar para mostrar a paginação
$itens_por_pagina_1 = 5;
$itens_por_pagina_2 = 10;
$itens_por_pagina_3 = 20;


/* Select queries return a resultset */




   
 ?>