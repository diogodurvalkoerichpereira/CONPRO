<?php 

//VARIÁVEIS GLOBAIS
$email = 'diogodurvalkoerichpereira@gmail.com';
$email_adm = $email;


}


//VARIAVEIS DO BANCO DE DADOS
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'loja';

/*
//VARIAVEIS DO BANCO DE DADOS
$servidor = 'sh-pro24.hostgator.com.br';
$usuario = 'hugocu75_lojahug';
$senha = 'hugo_loja';
$banco = 'hugocu75_loja';
*/

//VARIAVEIS DO SITE

//DISPAROS AUTOMATIZADOS DE EMAIL MARKETING
//total de emails que o seu servidor suporta enviar por hora (no meu hostgator são 500)
$enviar_total_emails = 480;
$intervalo_envio_email = 70;  //tempo em minutos (enviar de 70 em 70 minutos 480 emails por vez, essa é a configuração que fiz)


 ?>