<form action="../SalvarUsuario.php" method="POST">    
    <fieldset style="max-width: 400px; padding: 15px; border-radius: 5px;">
        <legend><b>Cadastro de Aluno</b></legend>
        
        <label for="nome">Nome Completo:</label><br>
        <input type="text" id="nome" name="nome" required style="width: 100%; padding: 5px; margin: 5px 0 15px 0;"><br>

        <label for="email">E-mail:</label><br>
        <input type="email" id="email" name="email" required style="width: 100%; padding: 5px; margin: 5px 0 15px 0;"><br>

        <button type="submit" style="padding: 10px 15px; background-color: #4CAF50; color: white; border: none; cursor: pointer;">
            Salvar Aluno
        </button>
    </fieldset>
</form>