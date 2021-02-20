<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="estilo.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Página do usuário</title>
    <?php 
        session_start();
        if(!isset($_SESSION['usuario'])){
            header("Location: login.html");
            exit();}
    ?>
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
    <div id="emprestarctn">
<section class="emprestarmais">
<h1>Itens emprestados.</h1>
<button type="button" style="visibility:visible;"id="tEmprestarmais" id="cEmprestarmais"><a href="listadeitens.php">Emprestar +</a></button>

    <?php 
    // pega todos os itens emprestados pelo usuario 
    include('conexao.php');
        $msg = "select iditem from emprestimos where dono = '$_SESSION[email]'";
        $requisicao = mysqli_query($conn,$msg) or die(mysqli_error($conn));
        $array = array();
        $cont = 0;
        while($id = mysqli_fetch_array($requisicao)){
        $sql = "select arquivo,codigo,item,data,dono,descricao,contato from itens where codigo = '$id[iditem]' ";
        $recebendo = mysqli_query($conn,$sql) or die(mysqli_error($conn)) ;
        while($dados = mysqli_fetch_array($recebendo)){
        $data = explode('-',$dados['data']);
    
    ?>
    
            <?php $cont += 1; ?>
            <img src=<?php echo "uploads/".$dados['arquivo']; ?>>
        <p><a style="color:white;" href="paginaitem.php?idproduto=<?php echo $dados['codigo'];?>"><p style="color:white;"><?php echo $dados['item'];?></p></a><br>
             <?php echo "Dono:".$dados['dono'];?></p>
            <p><?php echo "Contato: ".$dados['contato']; ?></p>
            <form style="margin: 0; visibility:hidden;margin-bottom: 30px;display:inline-block;width:fit-content;" method="GET" action="devolver.php">
        <input type="submit"  style="visibility:visible;" value="Devolver" id="devolver">
        <input type="number" hidden id ="numero" name="numero" value="<?php echo $dados['codigo'];?>">

        </form><?php }}?>
            
</section>
<section class="emprestarmais">
<h1>Itens Adicionados.</h1>

    <?php 
    // mostra todos os itens que foram adicionados pelo usúario
        $msg = "select iditem from emprestimos where dono = '$_SESSION[email]'";
        $recebe = mysqli_query($conn,$msg);
            $sql = "select arquivo,item,codigo,data,dono,descricao,contato from itens where dono = '$_SESSION[email]' ";
            $recebendo = mysqli_query($conn,$sql) ;
            $c = 0;
            while($dados = mysqli_fetch_array($recebendo)){
                $data = explode('-',$dados['data']);
    
    ?>

    
   
        
    <img src=<?php echo "uploads/".$dados['arquivo']; ?>>
    <p><a href="paginaitem.php?idproduto=<?php echo $dados['codigo'];?>"><?php echo $dados['item'];?></a><br>
     <?php echo "Dono:".$dados['dono'];?>&nbsp;&nbsp;<br> <?php echo "Adicionado ".$data[2][0].$data[2][1].'/'.$data[1].'/'.$data[0];?></p>
                <p><?php echo "Contato: ".$dados['contato'];}?></p>
                <button type="button" name="tAmprestarmais" id="cAmprestarmais"><a href="adicionaritem.php">Adicionar +</a></button>


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
<script>
    let itens_emp = document.getElementsByClassName("emprestarmais")[0]
    let itens_add = document.getElementsByClassName("emprestarmais")[1];
    let nav = document.getElementsByTagName("nav")[0]

    if(itens_emp.childElementCount >= 4 || itens_add.childElementCount >= 4){
        nav.id = "infinite"
    }
    else{
        nav.removeAttribute("id")
    }

</script>
</body>
</html>