<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="estilo.css">
    <meta charset="UTF-8">
    <title>Adicionar</title>
    <style>
        body{
            
        }
    </style>
</head>
<body>
<header>
    <?php 
        session_start();
        // verifica se o usúario esta logado.
        if(!isset($_SESSION['usuario']))
        {
            echo"<script>alert('Faça o login antes!');
            window.location.href = 'login.html';
            </script>";

        }
    
    
    ?>
    <div>
        <img id="logo">
    </div>
    
</header>
<div id="container">
<nav>
        
        <ul>
            <img src="imagens/blank-profile-picture-973460_960_720.webp" alt="usúario sem foto">
            <p>Bem vindo <?php echo $_SESSION['usuario'];?></p>
            <li><a href="paginausuario.php">Home</a></li>
            <li><a href="configuracoes.php">Configurações</a></li>
            <li><a href="listadeitens.php">Lista de itens</a></li>
            <li><a href="">Sobre nós</a></li>
            <li><a href="">Contato</a></li>
            <li><a href="">Suporte </a></li>
            <li><a href="logout.php">Sair</a></li>
        </ul>
    </nav>
<form method="post" action="validaitemcadastrado.php" enctype="multipart/form-data" id="add" autocomplete="off">
<label id="itemname" for="cNomeitem">Produto</label>
<input required autocomplete="off" placeholder="Nome aqui..." name="tNomeitem" id="cNomeitem" maxlength="100">
<label for="cDescricao" id="descricao">Descrição</label>
<textarea required autocomplete="off" placeholder="Descrição do item..." name="tDescricao" id="cDescricao" maxlength="500"></textarea>
    <input required name="cFoto"id="foto" type="file" >
    <button type="submit" name="tAdicionar" id="cAdicionar">Adicionar</button>

</form>
</div>
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