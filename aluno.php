<?php
require_once 'classes/Aluno.class.php';

//instanciar a classe
$aluno1 = new Aluno();

$aluno1 -> nome = 'Rodrigo Paiva';
$aluno1 -> email = 'rodrigo.mcpaiva@sempreceub.com'; 


$aluno2 = new Aluno();

$aluno2 -> nome = 'Neymar';
$aluno2 -> email = 'neymar@gmailcom';

echo 'Nome: '.$aluno1->nome.'<br>';
echo 'E-mail: '.$aluno1->email.'<br><br>';

echo '<hr>';

echo 'Nome: '.$aluno2->nome.'<br>';
echo 'E-mail: '.$aluno2->email.'<br><br>';

echo '<hr>';


echo "<pre>"
print_r($aluno1);
var_dump($aluno1);


echo "<pre>";
print_r($aluno2);
var_dump($aluno2);



?>
