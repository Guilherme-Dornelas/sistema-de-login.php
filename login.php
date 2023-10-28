<?php
include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $conexao->prepare("SELECT * FROM logins WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($senha, $row['senha'])) {
            session_start();
            $_SESSION['usuario'] = $row['nome'];
            setcookie("usuario",  $row['nome'], time() + (86400 * 30), "/"); 
            header('location: index.php');
            exit();
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Usuário não encontrado.";
    }
}

$conexao->close();
?>




<!DOCTYPE html>
<html lang="pr-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>login - php</title>

</head>
<body>

    <div  class="card" style="width: 18rem;">   
    <form class="row g-3" action="" method="post">

        <div>
            <h1>login</h1>
        </div>

        <div>
            <label  class="form-label">Nome: </label>
            <input type="text" class="form-control" name="userName" placeholder="nome de usuario">
        </div>

        <div>
            <label  class="form-label">E-mail:</label>
            <input type="email"  class="form-control" name="email"  placeholder="email">
        </div> 

        <div>
            <label  class="form-label">Senha:</label>
            <input type="password"  class="form-control" name="senha" placeholder="Senha">
        </div>

        <button type="submit" class="btn btn-success" style="width: 300px; height: 50px; border-radius: 0px; margin-left: 70px;">login</button>

        <div>
            <h4>ainda nao tem conta?<a href="cadastro.php" style="text-decoration: none;">cadastre-se!</a></h4>
        </div>
    </form>

  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/index.js"></script>
    
</body>
</html>