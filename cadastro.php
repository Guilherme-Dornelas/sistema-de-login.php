
<?php
include("conexao.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $NOME = $_POST['nome'];
    $EMAIL = $_POST['email'];
    $SENHA = $_POST['senha'];
    $senhaSegura = password_hash( $SENHA, PASSWORD_DEFAULT, ['cost' => 12]);
    $CIDADE = $_POST['cidade'];
    $SEXO = $_POST['sexo'];
    $TELEFONE = $_POST['telefone'];

    if(isset($NOME, $EMAIL, $senhaSegura, $CIDADE, $SEXO, $TELEFONE )){

        // Preparar e executar a consulta
        $sql = "INSERT INTO logins (nome, email, senha, cidade, sexo, telefone) VALUES ('$NOME', '$EMAIL', '$senhaSegura', '$CIDADE', '$SEXO', '$TELEFONE')";

        if($conexao->query($sql) === TRUE){
            header('location: login.php');
            exit();
        }else{
            echo "dados não foram enviados";
        }
    }   
}

$conexao->close();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>cadastre-se - php</title>
</head>
<body>
        <form class="form-floating" style="height: auto; padding: 10px;" action="" method="post">
            <div style="margin-top: 10px;">
                <h1>cadastre-se</h1>
            </div>
            <br>
            <div>
                <label for="floatingInputInvalid"  class="form-label">Nome: </label>
                <input type="text" class="form-control" id="floatingInputInvalid" name="nome" placeholder="digite seu nome">
            </div><br>

            <div>
                <label  class="form-label">Telefone:</label>
                <input type="tel" name="telefone" class="form-control" id="telefone" placeholder="seu telefone">
            </div><br>

            <div>
                <label for="floatingInputInvalid"  class="form-label">E-mail:</label>
                <input type="email" id="floatingInputInvalid" class="form-control" name="email" placeholder="email">
            </div><br>

            <div>
                <label for="floatingInputInvalid"  class="form-label">Senha:</label>
                <input type="password" id="floatingInputInvalid" class="form-control" name="senha" id="senha">
            </div> <br>

            <div>
                <select class="form-select" name="sexo" aria-label="Default select example">
                    <option selected disabled >Sexo</option>
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                  </select>
            </div>
            <br>

            <div>
                <label for="floatingInputValue">Cidade:</label>
                <input type="text" class="form-control" name="cidade" id="cidade" placeholder="qual sua cidade">
            </div><br><br>

            <button class="btn btn-success" type="submit">enviar</button><br>

            <div>
                <h4>ja tem conta?<a href="login.php">faça login</a></h4>
            </div>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>