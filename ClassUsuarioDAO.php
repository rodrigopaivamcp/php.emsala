<?php
require_once 'Conexao.php';
class ClassUsuarioDAO
{
    public function cadastrar(ClassUsuario $cadastrarUsuario)
    {
        try{
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO usuario (nome, email) values (?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrarUsuario->getNome());
            $stmt->bindValue(2, $cadastrarUsuario->getEmail());
            $stmt->execute();
            return TRUE;
        }catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }

    public function buscarUsuario($idUusario)
    {
        try
        {
            $usuario = new ClassUsuario();
            $pdo = Conexao::getInstance();
            $sql = "SELECT idUusario, nome, email FROM usuario WHERE idUsuario =:id LIMIT 1";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue (':id', $idUsuario);

            $stmt->execute();
            $usuarioAssoc = $stmt->fetch(PDO::FETCH_ASSOC);
            $usuario->setIdUsuario($usuarioAssoc['idUsuario']);
            $usuario->setNome($usuarioAssoc['nome']);
            $usuario->setEmail($usuarioAssoc['email']);
            return $usuario;
        }catch (PDOException $ex){
            return $ex->getMessage();
        }
    }

    public function listarUsuarios()
    {
        try{
            $pdo = Conexao::getInstance();
            $sql = "SELECT * FROM usuario";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $alunos = $stmt->fetchALL(PDO::FETCH_ASSOC);
            return $alunos;
        }catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }

    public function alterarUsuario(ClassUsuario $alterarUsuario);
    {
         try{
            $pdo = Conexao::getInstance();
            $sql = "UPDATE usuario SET nome=?, email=? WHERE idUsuario=? ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $alterarUsusario->getNome());   
            $stmt->bindValue(2, $alterarUsusario->getEmail());   
            $stmt->bindValue(3, $alterarUsusario->getIdUsuario());   
            $stmt->execute();
            return $stmt->rowCount();   
        }catch (PDOException $ex){
            echo $ex->getMessage();
        }
}
    public function excluirUsuarios ($idUsusario){
        try{
        $pdo = Conexao::getInstance();
        $sql = "DELETE FROM usuario WHERE idUsuario=:idUsusario";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':idUsuario', $idUsuario);
        $stmt->execute();
        return TRUE;
    }catch(PDOException $exc){
        //echo $exc->getMessage();
    }
}

}
