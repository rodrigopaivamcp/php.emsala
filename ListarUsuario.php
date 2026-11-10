<?php
// Bloco PHP para buscar os dados no banco de dados
try {
    $host = 'localhost';
    $port = 3307;
    $dbname = 'sistema_cadastro';
    $usuario_db = 'root';
    $senha_db = '';

    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
    $pdo = new PDO($dsn, $usuario_db, $senha_db, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    // Busca todos os alunos ordenados do mais recente para o mais antigo
    $sql = "SELECT id, nome, email, data_cadastro FROM alunos ORDER BY id DESC";
    $stmt = $pdo->query($sql);
    $alunos = $stmt->fetchAll();

} catch (PDOException $e) {
    $alunos = [];
    $erro = $e->getMessage();
}
?>

<div style="margin-top: 20px;">
    <h2>Alunos Cadastrados</h2>

    <?php if (isset($erro)): ?>
        <p style="color: red;">Erro ao carregar a lista de alunos: <?php echo htmlspecialchars($erro); ?></p>
    <?php elseif (empty($alunos)): ?>
        <p style="color: #666;">Nenhum aluno cadastrado até o momento.</p>
    <?php else: ?>
        <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse; font-family: Arial, sans-serif;">
            <thead>
                <tr style="background-color: #f2f2f2; text-align: left;">
                    <th style="border: 1px solid #ddd; padding: 8px;">ID</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">Nome</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">E-mail</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">Data de Cadastro</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alunos as $aluno): ?>
                    <tr>
                        <td style="border: 1px solid #ddd; padding: 8px;"><?php echo htmlspecialchars($aluno['id']); ?></td>
                        <td style="border: 1px solid #ddd; padding: 8px;"><?php echo htmlspecialchars($aluno['nome']); ?></td>
                        <td style="border: 1px solid #ddd; padding: 8px;"><?php echo htmlspecialchars($aluno['email']); ?></td>
                        <td style="border: 1px solid #ddd; padding: 8px;"><?php echo htmlspecialchars($aluno['data_cadastro']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>