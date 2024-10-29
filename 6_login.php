<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login de Usuário</title>
</head>
<body>
    <form method="post" action="">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required><br>

        <button type="submit">Entrar</button>
    </form>

    <?php
    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Recebe os valores enviados pelo formulário
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];

        // Abre o arquivo usuarios.txt para leitura
        $arquivo = fopen('usuarios.txt', 'r');

        // Começar assumindo que ele não pode acessar o sistema (para que não acesse sem nome e sem senha)
        $login_sucesso = false;

        // Lê cada linha do arquivo
        while (($linha = fgets($arquivo)) !== false) {
            // Divide a linha pelo delimitador ";"
            list($usuario_arquivo, $senha_arquivo) = explode(';', trim($linha));

            // Verifica se o nome e a senha correspondem aos valores no arquivo
            if ($nome === $usuario_arquivo && $senha === $senha_arquivo) {
                $login_sucesso = true;
                break;
            }
        }

        // Fecha o arquivo
        fclose($arquivo);

        // Exibe a mensagem de sucesso ou erro
        if ($login_sucesso) {
            echo "<p>Login realizado com sucesso! <p style='color: darkgreen;'>Bem-vindo, $nome!</p></p>";
        } else {
            echo "<p style='color: red;'>Usuário ou senha incorretos.</p>";
        }
    }
    ?>
</body>
</html>