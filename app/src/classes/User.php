<?php


class User {
    private $name;
    private $email;
    private $pass;
    private $access_level;

    public function insert($User) { # C

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

    public function delete($User) { # D

    }

}