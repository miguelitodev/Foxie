<?php


class User {
    private $id;
    private $name;
    private $email;
    private $pass;
    private $access_level;

    public function insert($User) { # C
        $query = "INSERT INTO tbusuario(nomeUsuario, emailUsuario, senhaUsuario, idNivelAcesso)
                  VALUES ('". $User->name ."'
                        , '". $User->email . "'
                        , '". $User->senhaUsuario ."'
                        , '". $User->access_level ."')
                 ";
        
    }

    public static function list() {        # R
        $query = "SELECT U.idUsuario, U.nomeUsuario, U.emailUsuario, N.nivel
                  FROM tbusuario AS U
                  INNER JOIN tbnivelacesso AS N
                  ON U.idNivelAcesso = N.idNivelAcesso";
        
        $DB = Conn::getConn();

        $stmt = $DB->query($query);
        $result = $stmt->fetchAll();
        
        return $result;
    }

    public function update($User) { # U

    }

    public function delete($id) { # D
        $query = "DELETE FROM tbusuario
                  WHERE idUsuario = " . $id . ";";
        try {
            $DB = Conn::getConn();
            $stmt = $DB->exec($query);
            if($stmt->rowCount())
                return 0;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

}