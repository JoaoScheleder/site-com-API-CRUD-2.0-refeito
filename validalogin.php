<?php
    session_start();
    include('conexao.php');
    $email = $_POST['eemail'];
    // senha criptografada.
    $senha = md5($_POST['seenha']);
    // faz a requisição ao banco para procurar uma linha onde tenha o email digitado e a senha batem com a do banco
    $query = mysqli_query($conn,"select senha,email from loginesenha where email = '{$email}' and senha = '{$senha}'");
    $linha = mysqli_num_rows($query);
    //verifica se existe uma linha afetada pela operação.
    if ($linha == 1){

        $recebendo = mysqli_query($conn,"select nome,contato from loginesenha where email = '{$email}'");
        $nome = mysqli_fetch_array($recebendo);
        $primeironome = explode(' ',$nome['nome']);
        $_SESSION['usuario'] = $primeironome[0];
        $_SESSION['email'] = $email;
        $_SESSION['contato'] = $nome['contato'];
        header("Location: paginausuario.php");
    }
    // caso nao ache uma linha o usuario volta para pagina de login.
    else{
        echo "<script>alert('Login e senha não conferem');</script>";
        echo "<script>window.location.href='login.html';</script>";
    }
?>