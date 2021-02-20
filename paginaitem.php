<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="estilo.css">
    <meta charset="UTF-8">
    <title>Emprestar item</title>
  
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
<?php
// Gera a pagina personalizada do item a partir de um id que é recebido atraves de um formulario invisivel
    include('conexao.php');
    $sql = "select arquivo,item,data,dono,descricao,contato from itens where codigo = '$_GET[idproduto]' ";
    $recebendo = mysqli_query($conn,$sql) ;
    while($dados = mysqli_fetch_array($recebendo)){
     $data = explode('-',$dados['data']);
        
?>
    <div id="emprestarctn">

<section id="emprestaritem">
    <img src=<?php echo "uploads/".$dados['arquivo']; ?>>
    <p class="desc"><?php echo $dados['descricao'];?></p>
    <p class="caracteristica">Dono: <?php echo $dados['dono'];?><br>Contato: <?php echo $dados['contato'];}?></p>
   
    <form style="bottom:120px;position:absolute;visibility:hidden;display:inline-block;width:fit-content;float:right;margin-right:auto;"method="GET" action="validaemprestimo.php">
        <input type="submit" style="visibility:visible;margin:0 auto;margin-top:20px;margin-left:50px;" value="emprestar" >
        <input type="number" name="id" hidden value="<?php echo $_GET['idproduto'];?>">
    </form>
</section>
<section id="relatorio">
    <table>
    
        <tr>
            <td>Data de empréstimo</td>
            <td>Data de devolução</td>
            <td>Quem emprestou.</td>
        </tr>
        <?php 
        /// temos aqui o relatorio de emprestimo do item.
        $sql = "select dataemprestimo,datadevolveu,quememprestou from relatorio where id = '$_GET[idproduto]'";
        $requisicao = mysqli_query($conn,$sql) or die(mysqli_error($conn));
        while($drelatorio = mysqli_fetch_array($requisicao)){
            $datae = $drelatorio['dataemprestimo'];
            $datad = $drelatorio['datadevolveu'];
            if($datad == 'default'){
                $datad = "À devolver";
            }
            $dono = $drelatorio['quememprestou'];
    ?>
        <tr>
            <td><?php echo $datae;?></td>
            <td><?php echo $datad; ?></td>
            <td><?php echo $dono;} ?></td>
        </tr>
    </table>
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