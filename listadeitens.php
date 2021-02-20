<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="estilo.css">
    <meta charset="UTF-8">
    <title>Lista de Itens</title>
</head>
<body>
<header>
    <div>
        <img id="logo">
    </div>
    
</header>
<div id="container">
<nav id="infinite">
        
        <ul>
            <img src="imagens/blank-profile-picture-973460_960_720.webp" alt="usúario sem foto">
            <p>Bem vindo <?php session_start();
            
            if(!isset($_SESSION['usuario'])){
                header("Location: login.html");
                exit();} 
            
            echo $_SESSION['usuario'];?></p>
            <li><a href="paginausuario.php">Home</a></li>
            <li><a href="configuracoes.php">Configurações</a></li>
            <li><a href="listadeitens.php">Lista de itens</a></li>
            <li><a href="">Sobre nós</a></li>
            <li><a href="">Contato</a></li>
            <li><a href="">Suporte </a></li>
            <li><a href="logout.php">Sair</a></li>
        </ul>
    </nav>
    <div id="emprestarctn">
        <section id="lista">
    <?php   
            include('conexao.php');
            $sql = "select arquivo,item,data,dono,descricao from itens ";
            $recebendo = mysqli_query($conn,$sql) ;
            $cont = 1;
            // loop que pega todos os itens cadastrados do banco.
            while($dados = mysqli_fetch_array($recebendo)){
                $data = explode('-',$dados['data']);
             
                 
        ?>
    <div class="item">
    <img src=<?php echo"uploads/".$dados['arquivo'];?>>
        <p><?php echo $dados['item'];?><br>
            Dono: <?php echo $dados['dono'];?><br></p>
            <p><?php echo $dados['descricao'];?></p>
            <form class="helper" method="GET" action="paginaitem.php">
            <input class="ver" type = "submit" value = 'Visualizar'> 
            <input name = "idproduto" hidden type="number" value="<?php echo"$cont";$cont++;?>">
            </form>
            </div>
        <?php }?>
    
</section>

</div>
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