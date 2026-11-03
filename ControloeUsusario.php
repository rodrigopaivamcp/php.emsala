<?php
require_once '../Modelo/ClassUsuario.php';
require_once '../Modelo/DAO/ClassUsuarioDAO.php';

$id =@$_POST['idex'];
$nome =@$_POST['nome'];
$email =@$_POST['email'];
$acao = $_GET['ACAO'];



