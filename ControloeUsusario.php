<?php
require_once '../Modelo/ClassUsuario.php';
require_once '../Modelo/DAO/ClassUsuarioDAO.php';

$id =@$_POST['idex'];
$nome =@$_POST['nome'];
$email =@$_POST['email'];
$acao = $_GET['ACAO'];

$novoUsuario = new ClassUsuario();
$novoUsuario->setIdUsuario($id);
$novoUsuario->setNome($nome);
$novoUsuario->setEmail($email);


$classUsuarioDAO = new ClassUsusarioDAO();
switch($acao){
    case "cadastrarUsuario";
        $usuario = $classUsuarioDAO->cadastrar($novoUsuario);
        if($usuario >=1){
            header('Location:../index.php?&MSG= Cadastro realizado com sucesso!');
        
        } else {
             header('Location:../index.php?&MSG= Não foi ossível atualizar!');
        
        }
        break;
    
        case 'alterarUsuario':
            $usuario = $classUsuarioDAO->cadastrar($novoUsuario);
            if(usuario == 1){
                 header('Location:../index.php?&MSG= Cadastro realizado com sucesso!');
        
        } else {
             header('Location:../index.php?&MSG= NÃO foi possível atualizar!');
            }
            break;
        case "excluirUsuario";
        if(isset($_GET['idex'])){
            $idUsuario = $_GET['idex'];
            $classUsuarioDAO = new ClassUsusarioDAO();
            $us = $classUsuarioDAO->excluirUsuario($idUsuario);
            if($us == TRUE){
                header('Location:../index.php?PAGINA=listarUsuario&MSG= Usuario excluído com sucesso!');
            } else {
                header('Location:../index.php?PAGINA=listarUsuario&MSG= Usuario NÃO foi excluído!');
            }
        }
        break;
        default;
        break;

    
}