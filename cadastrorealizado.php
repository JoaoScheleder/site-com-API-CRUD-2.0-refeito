<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="estilo.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        section#principal div h1{
    position: relative;
    left : 200px;
}
section#principal div h2{
    position: relative;
    left:200px;
    text-indent: 40px;
}
button { 
    position: relative;
    width: 100px;
    height: 30px;
    left: 350px;
}
    </style>
    <?php 
        include('conexao.php');
        if(empty($_POST["tSenha"])||empty($_POST["tNome"])){
            header("Location: registro.php");
            exit();
        }
        /* realiza o cadastro do usúario no banco de dados com base nas informações
        do formulario de registro */
        $usuario = $_POST["tNome"];
        $senha = md5($_POST["tSenha"]);
        $email = $_POST["tEmail"];
        $tel = $_POST['contato'];
        $pegaemail = mysqli_query($conn,"select email from loginesenha where email = '$email'");
        // verifica se ja existe um email cadastrado no banco de dados.
        if(mysqli_num_rows($pegaemail) == 1){
            echo "<script>alert('Email já cadastrado');</script>";
            echo "<script>window.location.href='registro.php';</script>";
        }
        else{
        $query = "insert into loginesenha (id,nome,email,senha,contato) values ('default','{$usuario}','{$email}','{$senha}','{$tel}')";
        
        $result = mysqli_query($conn,$query);
        
        
    }
    ?>
</head>
<body>
<header>
    <div>
        <img id="logo">
    </div>
</header>
<section id="principal">
    <div>
    <h1 style="text-decoration: underline;">CADASTRO REALIZADO COM SUCESSO </h1><br>
    <h1>Bem vindo(a) <?php 
    $nome = $_POST["tNome"];
    echo $nome
    ?> <br>a maior plataforma de emprestimos do mundo!</h1>
    <a href="login.html"><button>Login</button></a>
    </div>
</section>
<footer>
    <div id="rodape">
    <hgroup>
        <h3>João Gabriel Scheleder</h3>
        <h4>Todos os direitos reservados</h4>
    </hgroup>
    <div id="termos">
        <p>Termos de uso</p>
        <p>Politica de privacidade</p>
    </div>
        <ul>
            <li><a href="https://www.facebook.com/" target="_blank"><img src="imagens/facebook.png"></a></li>
            <li><a href="https://www.instagram.com/?hl=pt-br" target="_blank"><img src="imagens/instagram.png"></a></li>
            <li><a href="https://twitter.com/" target="_blank"><img src="imagens/twitter.png"></a></li>
        </ul>
    </div>
</footer>
    
</body>
</html>