<?php

class User
{
    private $id;
    private $name;
    private $email;
    private $pass;
    private $access_level;


    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPass() {
        return $this->pass;
    }

    public function getAccessLevel() {
        return $this->access_level;
    }


    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPass($pass) {
        $this->pass = $pass;
    }

    public function setAccessLevel($level) {
        $this->access_level = $level;
    }



    public function insert()
    { # C
        $query = "INSERT INTO tbUsuario(nomeUsuario, emailUsuario, senhaUsuario, idNivelAcesso)
                  VALUES ('$this->name'
                        , '$this->email'
                        , '$this->pass'
                        , '$this->access_level')
                 ";
        try {
            $Conn = DB::getConn();
            $stmt = $Conn->exec($query);
        } catch (PDOException $e) {
            echo $e->getMessage;
        }

    }

    public static function list($id = null)
    { # R

        $query = '';
        if (!$id) {
            $query = "SELECT U.idUsuario, U.nomeUsuario, U.emailUsuario, U.senhaUsuario, N.descNivelAcesso
                  FROM tbUsuario AS U
                  INNER JOIN tbNivelAcesso AS N
                  ON U.idNivelAcesso = N.idNivelAcesso";
        } else
            $query = "SELECT U.idUsuario, U.nomeUsuario, U.emailUsuario, U.senhaUsuario, N.descNivelAcesso
            FROM tbUsuario AS U
            INNER JOIN tbNivelAcesso AS N
            ON U.idNivelAcesso = N.idNivelAcesso
            WHERE U.idUsuario = $id";
        $Conn = DB::getConn();

        $stmt = $Conn->query($query);
        $result = $stmt->fetchAll();

        return $result;
    }

    public function update()
    { # U
        $query = "UPDATE tbUsuario
                  SET nomeUsuario = '$this->name',
                      emailUsuario = '$this->email',
                      senhaUsuario = '$this->pass',
                      idNivelAcesso = '$this->access_level'
                  WHERE idUsuario = $this->id
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

    public function delete()
    { # D
        $query = "DELETE FROM tbusuario
                  WHERE idUsuario = $this->id;";

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
