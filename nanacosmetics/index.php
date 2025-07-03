<?php
session_start();

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'nanacosmetics';

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if (isset($_POST["Sendlogin"])) {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha_usuario"];

    $query_usuario = "SELECT id, senha FROM usuarios WHERE usuario = ? LIMIT 1";
    $stmt = $conn->prepare($query_usuario);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 1) {
        $row_usuario = $resultado->fetch_assoc();
        if (md5($senha) === $row_usuario['senha']) {
            $_SESSION['id'] = $row_usuario['id'];
            $_SESSION['usuario'] = $usuario;

            header("Location: dashboard.php");
            exit();
        } else {
            echo "<p style='color:red'>Erro: Senha incorreta!</p>";
        }
    } else {
        echo "<p style='color:red'>Erro: Usuário não encontrado!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <img src="nanacosmetics.png" class="logo" alt="Logo Nana Cosmetics">
    <img src="cuei.png" class="img-cuei">
    <img src="cuei2.png" class="img-cuei2">

    <form method="POST" action="">
        <label>Usuário:</label>
        <input type="text" name="usuario" required>

        <label>Senha:</label>
        <input type="password" name="senha_usuario" required>

        <input type="submit" name="Sendlogin" value="Acessar">
    </form>
</body>
</html>


