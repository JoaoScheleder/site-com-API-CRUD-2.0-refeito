<?php
    session_start();
    include('conexao.php');
    // verifica se o usuario veio a pagina atraves do post e com um email gravado na superglobal.
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_SESSION['email'])){
        // verifica o tamanho da senha.
        if(strlen($_POST['novasenha']) <= 25 && strlen($_POST['novasenha'])>= 8){
                $novasenha = md5($_POST['novasenha']);
                $sql = "update loginesenha set senha = '$novasenha' where email = '$_SESSION[email]'";
                mysqli_query($conn,$sql);
                // realiza a requisição ao banco de dados 

                echo"<script>alert('Senha atualizada com sucesso!');
                window.location.href = 'paginausuario.php';
                </script>";
            
        }else{
            echo"<script>alert('Faça o login para acessar esta pagina ou altere a senha');
            window.location.href = 'login.html';
            </script>";


        }
    }


?>