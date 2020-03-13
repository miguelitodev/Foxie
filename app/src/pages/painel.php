<?php

require_once '../lib/login-validate.php';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once '../assets/includes/head.php'; ?>
</head>

<body>

    <header>
        <a href="home.php">
            <img src="../assets/img/geral/origami.png" />
        </a>
        <nav>
            <li><a href="home.php">Página Inicial</a></li>
        </nav>
    </header>

    <div class="card-painel">
        <div class="foto-painel">
            <img src="../assets/img/geral/origami.png" width="15%" />
            <hr>
        </div>
        <div class="titulo">
            <h4>Usuários</h4>
            <p>Aqui você terá acesso a todos os usuários cadastrados.</p>
            <button class="nUser">Novo usuário</button>
        </div>

        <div class="form">
            <form>
                <input type="text" id="nome" placeholder="Nome" required>
                <input type="text" id="email" placeholder="E-mail" required>
                <select id="nivel" required>
                    <option>Nível de Acesso</option>
                    <option value="1">Usuário</option>
                    <option value="2">Administrador</option>
                </select>
                <input type="password" id="senha" placeholder="Senha" required>
                <input type="password" id="confirmar-senha" placeholder="Confirmar senha">

                <input id="buttonEnviar" type="button" value="SALVAR">
            </form>
        </div>

        <div class="tabela">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Nível de acesso</th>
                    <th>Editar</th>
                    <th>Apagar</th>
                </tr>
            </table>
        </div>

        <script src="../assets/js/jquery.min.js"></script>

        <script>
            window.onload = listUsers()

            function listUsers() {

                var xhttp = new XMLHttpRequest()

                xhttp.onreadystatechange = () => {

                    if (xhttp.readyState == 4) {

                        var users = JSON.parse(xhttp.responseText)

                        var tableDone = '<div class=\'tabela\'>' +
                                        '<table>' +
                                        '<tr>' +
                                        '<th>ID</th>' + 
                                        '<th>Nome</th>' +
                                        '<th>E-mail</th>' +
                                        '<th>Nível de Acesso</th>' +
                                        '<th>Editar</th>' +
                                        '<th>Apagar</th>'

                        for (let user in users) {
                            tableDone += '<tr>' +
                                '<td>' + users[user]['idUsuario'] + '</td>' +
                                '<td>' + users[user]['nomeUsuario'] + '</td>' +
                                '<td>' + users[user]['emailUsuario'] + '</td>' +
                                '<td>' + users[user]['descNivelAcesso'] + '</td>' +
                                '<td><a href=\'#\'><i class=\'fas fa-edit edit\'></i></a></td>' +
                                '<td><a href=\'#\'><i class=\'fas fa-trash-alt delete\'></i></a></td>' +
                                '</tr>'
                        }
                        tableDone += '</table></div>'

                    }


                    document.querySelector('.tabela').innerHTML = tableDone
                }

                xhttp.open('GET', '../lib/listar-usuario.php')
                xhttp.send()
            }

            listUsers()


            function insertUser() {
                let xhttp = new XMLHttpRequest()
                xhttp.open('POST', '../lib/inserir-usuario.php')

                let nome = document.getElementById('nome')
                let email = document.getElementById('email')
                let senha = document.getElementById('senha')
                let nivel = $('#nivel').val()

                xhttp.send(`nome=${nome}&email=${email}&senha=${senha}&nivel=${nivel}`)

                xhttp.onreadystatechange = () => {
                    if (this.readyState == 4)
                        alert('Usuário cadastrado com sucesso!')

                    listUsers()
                }
            }

            let buttonEnviar = document.getElementById('buttonEnviar')
            buttonEnviar.addEventListener('click', insertUser())
        </script>


        <footer class="footer">
            <?php require_once '../assets/includes/footer.php'; ?>
        </footer>
</body>

</html>