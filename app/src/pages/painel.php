<?php 
require_once '../classes/User.php'; 
require_once '../classes/DB.php';

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

            <div class="form">
                <form action="">
                    <input type="text" name="" id="" placeholder="Nome">
                    <input type="text" name="" id="" placeholder="Email">
                    <select id="nivel">
                        <option value="">Funcionário</option>
                        <option value="">Administrador</option>
                    </select>
                    <input type="password" name="" id="" placeholder="Senha">
                    <input type="password" name="" id="" placeholder="Confirmar Senha">

                    <input id="buttonEnviar" type="button" value="ENVIAR">
                </form>
            </div>

            <?php if(count($Userlist)): ?>
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
            <?php else: echo "<pre>Não há usuários cadastrados.</pre>";?>
            <?php endif; ?>
        </div>

        <footer class="footer">
            <?php require_once '../assets/includes/footer.php'; ?>
        </footer>
    </body>
</html>