<?php
// destroi a sessão
    session_start();
    session_unset();
    session_destroy();
    echo"<script>alert('Saindo...');
    window.location.href = 'login.html';
    </script>";
    

?>