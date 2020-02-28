<?php

class User
{
    private $id;
    private $name;
    private $email;
    private $pass;
    private $access_level;

    public function insert($User)
    { # C
        $query = "INSERT INTO tbusuario(nomeUsuario, emailUsuario, senhaUsuario, idNivelAcesso)
                  VALUES ('$User->name'
                        , '$User->email'
                        , '$User->senhaUsuario'
                        , '$User->access_level')
                 ";
    }

    public static function list()
    { # R
        $query = "SELECT U.idUsuario, U.nomeUsuario, U.emailUsuario, N.nivel
                  FROM tbusuario AS U
                  INNER JOIN tbnivelacesso AS N
                  ON U.idNivelAcesso = N.idNivelAcesso";

        $Conn = DB::getConn();

        $stmt = $Conn->query($query);
        $result = $stmt->fetchAll();

        return $result;
    }

    public function update($User)
    { # U
        $query = "UPDATE tbusuario
                  SET nomeUsuario = '$User->name',
                      emailUsuario = '$User->email',
                      senhaUsuario = '$User->pass',
                      idNivelAcesso = '$User->access_level'
                  WHERE idUsuario = $User->id
                  ";

        try {
            $Conn = DB::getConn();
            $stmt = $Conn->exec($query);
            if ($stmt->rowCount())
                return 0;
        } catch (PDOException $e) {
            echo $e->getMessage;
        }
    }

    public function delete($id)
    { # D
        $query = "DELETE FROM tbusuario
                  WHERE idUsuario = $id;";

        try {
            $Conn = DB::getConn();
            $stmt = $Conn->exec($query);
            if ($stmt->rowCount())
                return 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
