<?php 
    session_start();
    include('conexao.php');
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_SESSION['usuario'])){
        if(isset($_FILES['cFoto'])){
        $nomedoitem = $_POST['tNomeitem'];
        $descricao = $_POST['tDescricao'];
        $extensao = strtolower(substr($_FILES['cFoto']['name'],-4));
        $nomearquivo = md5(time()).$extensao;
        $diretorio = "uploads/";
        $sql =  "select * from itens where codigo = (SELECT MAX(codigo) FROM itens)";
        $requisicao = mysqli_query($conn,$sql);
        $id = mysqli_fetch_array($requisicao);
        // variavel id criada para sempre o id do item adicionado ter acréscimo de +1 em relação ao maior disponivel no banco
        $id['codigo']+=1;
        // realiza o cadastro de novos itens.
        move_uploaded_file($_FILES['cFoto']['tmp_name'],$diretorio.$nomearquivo);
        $sql = "insert into itens (codigo,item,arquivo,data,dono,descricao,contato) values('$id[codigo]' ,'$nomedoitem','$nomearquivo', NOW(), '$_SESSION[email]','$descricao','$_SESSION[contato]')";
        
        mysqli_query($conn,$sql) or die(mysqli_error($conn));
        
        echo "<script>alert('Item adicionado!');
        window.location.href = 'adicionaritem.php';
        </script>";
       
            
        

}
}




?>