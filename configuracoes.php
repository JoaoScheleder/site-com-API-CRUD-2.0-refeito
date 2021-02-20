<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="estilo.css">
    <meta charset="UTF-8">
    <title>Configurações</title>
</head>
<body>
<header>
    <div>
        <img id="logo">
    </div>
    
</header>
<div id="container">
<nav>
        
        <ul>
            <img src="imagens/blank-profile-picture-973460_960_720.webp" alt="usúario sem foto">
            <p>Bem vindo <?php session_start(); echo $_SESSION['usuario'];?></p>
            <li><a href="paginausuario.php">Home</a></li>
            <li><a href="configuracoes.php">Configurações</a></li>
            <li><a href="listadeitens.php">Lista de itens</a></li>
            <li><a href="">Sobre nós</a></li>
            <li><a href="">Contato</a></li>
            <li><a href="">Suporte </a></li>
            <li><a href="logout.php">Sair</a></li>
        </ul>
    </nav>
<section id="configurar">

    <div id="config">

        <?php
        include('conexao.php');
        if(isset($_SESSION['email'])){
            $sql = "select nome ,email,contato from loginesenha where email =  '$_SESSION[email]' ";
            $recebe = mysqli_query($conn,$sql);
            $array = mysqli_fetch_array($recebe);
            // mostra ao usuario seus dados 
            $nome = $array['nome'];
            $email = $array['email'];
            $contato = $array['contato'];
        }else{
            echo"<script>
            alert('faça o login para acessar esta pagina!');
            window.location.href = 'login.html';
            </script>";
        }
        
        
        ?>

        <h1>Seus Dados</h1>
    Nome:<?php echo $nome; ?><br>
    E-mail: <?php echo $email;?><br>
    <form action="alterarsenha.php" method="POST" style="width: fit-content;padding:20px;">
    alterar senha<input type="password" name = "novasenha" style="margin-bottom: 20px;">
    <input type="submit" value="Salvar" style=" display:block; , width:fit-content; margin: 0 auto;margin-top:20px;">
    </form>
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
</div>
</footer>

</body>
</html>