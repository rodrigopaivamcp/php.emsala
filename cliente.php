<?php 
require_once 'classes/Cliente.class.php';

$cliente1 = new Cliente();
$cliente2 = new Cliente();

$cliente1->validar("Maria das Dores","mariadasdores@gmail.com");
$cliente1->exibir();

$cliente2->validar("José do Egito","jopseegito@gmail.com");
$cliente2->exibir();
?>
