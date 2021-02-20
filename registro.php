<!DOCTYPE html>
<html lang="pt-br" >
<head>
    <link rel="stylesheet" href="estilo.css">
    <meta charset="UTF-8">
    <title>Registro</title>
</head>
<body>
<header>
    <div>
        <img id="logo">
    </div>
</header>
<section class="box">
    <form method="post" id="registro" action="cadastrorealizado.php">
        <fieldset><legend>Login e Senha</legend>
            <ul>
            <li><p class="el"><label for="cNome" >Nome:</label></p>
            <input name="tNome" id="cNome" placeholder="Nome completo" ></li>
            <li><p class="el"><label for="cEmail">E-mail:</label></p>
            <input type="email" name="tEmail" id="cEmail" placeholder="nome@exemplo.com"></p></li>
            <li><p class="el"><label for="cSenha">Senha:</label></p>
            <input type="password" name="tSenha" id="cSenha" placeholder="Minimo 8 digitos"></li>
            <li><p class="el"><label id="confirmar" for="cConfirmarSenha">Confirmar senha:</label></p>
            <input type="password" name="tConfirmarSenha" id="cConfirmarSenha"></li>
            <li><p class="el"><label for='contato'>Telefone</label></p>
            <input type="text" placeholder="EX: 41 99999-9999" name='contato' id="contato"></li>
            </ul>
            <input type="button" onclick="validaForm();" value="Enviar" id="cad">
        </fieldset>
    </ul>
            <script>
                // validação de formulario por javascript
                // função disparada atraves de um botão.
                function validaForm(){
                var tamanho_nome = document.getElementById("cNome").value.length;
                var form = document.getElementById("registro")
                var email = document.getElementById("cEmail").value
                var senha = document.getElementById("cSenha").value
                var csenha = document.getElementById("cConfirmarSenha").value
                if(tamanho_nome == 0){
                    alert("Prencha o campo nome!")
                    form.reset()
                    return false;
                }
                else if(tamanho_nome < 5 || tamanho_nome > 64){
                    alert("O campo nome deve ter entre 5 e 64 caracteres")
                    form.reset()
                    return false;
                }
                else if(email.indexOf('@') == - 1 || email.indexOf('.') == -1 || email.length <5 || email.length >128){
                    alert("Digite um e-mail valido!")
                    form.reset()
                    return false
                }
                else if(senha.length == 0){
                    alert("Por favor insira uma senha")
                    form.reset()
                    return false;
                }
                else if(senha.length <8 || senha.length >25){
                    alert("A senha precisa de 8 caracteres no minimo e 25 caracteres no maximo")
                    form.reset()
                    return false;
                }
                else if(senha != csenha){
                    alert("As senhas precisam ser iguais.")
                    form.reset()
                    return false;
                }
                else{
                    alert("Cadastro realizado com sucesso")
                    document.forms["registro"].submit();
                }
                }
            </script>
        
            <br><br><br>
            
    </form>
</section>
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