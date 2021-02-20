<?php 
    if(isset($_GET['numero'])){
        session_start();
        include('conexao.php');
        $hoje = date('d/m/Y');
        // realiza a devolução do item emprestado e tambem salvando a data.
            $email = $_SESSION['email'];
            $sql = "delete from emprestimos where iditem = '$_GET[numero]' and dono = '$email'  ";
            $recebendo = mysqli_query($conn,$sql) or die(mysqli_error($conn));
            $sql = "update relatorio set datadevolveu = '$hoje' where id = '$_GET[numero]' and quememprestou = '$email'";
            $requisicao = mysqli_query($conn,$sql);
            echo"<script>alert('Item devolvido com sucesso');
            window.location.href = 'paginausuario.php';
            </script>";

    }



?>