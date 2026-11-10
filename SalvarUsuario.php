<?php
// Verifica se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');

    // Validação simples
    if (empty($nome) || empty($email)) {
        header("Location: ../index.php?MSG=" . urlencode("Por favor, preencha todos os campos!"));
        exit;
    }

    try {
        $host = 'localhost';
        $port = 3307;
        $dbname = 'sistema_cadastro'; // Nome do banco de dados
        $usuario_db = 'root';        // Usuário do banco
        $senha_db = '';              // Senha do banco

        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
        $pdo = new PDO($dsn, $usuario_db, $senha_db, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);

        $sql = "INSERT INTO alunos (nome, email) VALUES (:nome, :email)";
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute([
            ':nome' => $nome,
            ':email' => $email
        ]);

        header("Location: ../index.php?MSG=" . urlencode("Aluno cadastrado com sucesso!"));
        exit;

    } catch (PDOException $e) {
        header("Location: ../index.php?MSG=" . urlencode("Erro no banco de dados: " . $e->getMessage()));
        exit;
    }
} else {
    header("Location: ../index.php");
    exit;
}