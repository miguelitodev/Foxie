<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php require_once '../assets/includes/head.php'; ?>
    </head>
    <body>

        <header>
            <a href="home.php">
                <img src="../assets/img/geral/origami.png"/>
            </a>
            <nav>
                <li><a href="painel.php">Painel</a></li>
            </nav>
        </header>

        <div class="card-painel">
            <div class="foto-painel">
                <img src="../assets/img/geral/origami.png" width="15%"/>
                <hr>
            </div>
            <div class="titulo">
                <h4>Usuários</h4>
                <p>Aqui você terá acesso a todos os usuários cadastrados.</p>
                <button class="nUser">Novo usuário</button>
            </div>
            <div class="tabela">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Nivel de acesso</th>
                        <th>Editar</th>
                        <th>Apagar</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Miguel Riquelme</td>
                        <td>miguel@gmail.com</td>
                        <td>Funcionário</td>
                        <td><a href=""><i class="fas fa-edit edit"></a></td>
                        <td><a href=""><i class="far fa-trash-alt delete"></i></a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Gabriel Teodoro</td>
                        <td>gabriel@gmail.com</td>
                        <td>Gerente</td>
                        <td><a href=""><i class="fas fa-edit edit"></a></td>
                        <td><a href=""><i class="far fa-trash-alt delete"></i></a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Tabata Fernanda</td>
                        <td>tabata@gmail.com</td>
                        <td>Gerente</td>
                        <td><a href=""><i class="fas fa-edit edit"></a></td>
                        <td><a href=""><i class="far fa-trash-alt delete"></i></a></td>
                    </tr>
                </table>
            </div>
        </div>

        <footer class="footer">
            <?php require_once '../assets/includes/footer.php'; ?>
        </footer>
    </body>
</html>