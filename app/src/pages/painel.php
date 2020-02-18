<?php 
require_once '../classes/User.php'; 
require_once '../classes/Conn.php';

$User = new User();
$Userlist = $User->list();
?>

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
                    <?php foreach($Userlist as $User): ?>
                        <tr>
                            <td><?php echo $User['idUsuario'] ?></td>
                            <td><?php echo $User['nomeUsuario'] ?></td>
                            <td><?php echo $User['emailUsuario']?></td>
                            <td><?php echo $User['nivel'] ?></td>
                            <td><a href=""><i class="fas fa-edit edit"></a></td>
                            <td><a href=""><i class="far fa-trash-alt delete"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>

        <footer class="footer">
            <?php require_once '../assets/includes/footer.php'; ?>
        </footer>
    </body>
</html>