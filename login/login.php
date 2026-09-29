<?php require_once 
__DIR__ . '/../includes/functions.php';
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mini_sistema/style/style.css">
    <title>Login</title>
</head>
<body>
    <?php include __DIR__ . '/../includes/header.php'; ?>
    <main>
        <h1>Fala login para continuar.</h1>
        <form action="" method="post">
            <label for="email">E-mail: </label>
            <input type="text" name="email" id="name" placeholder="Insira o email"required><br>
            <label for="senha">Senha: </label>
            <input type="password" name="senha" id="senha" placeholder="Insira a senha"required><br>
            <input type="submit" valeu="Entrar">
        </form>
        <?php
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $usuarios = consultar_user($conexao, $_POST['email']);
            if($usuarios['email'] == $_POST['email'] && $usuarios['senha'] == $_POST['senha']){
                $_SESSION['id'] = $usuarios['id'];
                echo "Usuário logado com sucesso.";
                header("Location: /mini_sistema/index.php");
            } else {
                echo "Usuário ou senha inválidos!!";
            }
        }
        ?>
    </main>
    <?php include __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>