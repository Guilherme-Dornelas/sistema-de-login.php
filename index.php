<?php
include('conexao.php');

if(isset($_COOKIE['usuario'])){
    $_SESSION['usuario'] = $_COOKIE['usuario']; // Define a sessão a partir do cookie
}

if(!isset($_SESSION['usuario'])){
    header('location: login.php?false');
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>pagina</title>

    <style>
        *{
            padding: 0;
            margin: 0;
            list-style: none;
            box-sizing: border-box;  
        }
          header{
            width:100%;
            height: 50px auto;
            padding: 10px;
        } 
    </style> 
</head>
<body>
     <header>
     <nav class="navbar navbar-expand-lg bg-body-tertiary" style=" display:flex; justify-content: space-around;">
        <h2><?php echo "Bem vindo " . $_SESSION['usuario']?></h2>
          <button class="btn btn-danger"><a  style="text-decoration:none; color: white;" href="logout.php">sair</a></button>
     </nav>
     </header>

  
</body>
</html>