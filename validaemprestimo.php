<?php 
    session_start();
    include('conexao.php');
    $id = $_GET['id'];
    $sql = "select dono from emprestimos where iditem = '$_GET[id]'";
    $recebe = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $emprestado = mysqli_fetch_array($recebe);
    $hoje = date('d/m/Y');
    // verifica se o item nao foi emprestado por outro usuario.
    if($emprestado['dono'] == null){
        $sql = "insert into emprestimos (dono,iditem) values ('$_SESSION[email]','$id')  ";
        $recebendo = mysqli_query($conn,$sql) or die(mysqli_error($conn));
        $sql2 = "insert into relatorio (dataemprestimo,datadevolveu,id,quememprestou) values ('$hoje','default','$id','$_SESSION[email]')";
        $requisicao = mysqli_query($conn,$sql2) or die(mysqli_error($conn));
        echo "<script>alert('ITEM EMPRESTADO COM SUCESSO!');
        window.location.href = 'listadeitens.php';
        </script>"; 
        // Se caso um usúario ja tenha emprestado o item não sera realizado o empréstimo.
    }else{ echo"<script>alert('item ja emprestado')
        window.location.href = 'listadeitens.php';
        </script>";}

?>