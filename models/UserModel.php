<?php

require_once('Model.php');

class UserModel extends Model {

    public function getUserByUsername($username) {
        $query = $this->getDb()->prepare('SELECT * FROM usuarios WHERE usuario = ?');
        $query->execute([$username]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getUserByID($id) {
        $query = $this->getDb()->prepare('SELECT * FROM usuarios WHERE ID_usuario = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function add($usuario, $pass) {
        $passEnc = password_hash($pass, PASSWORD_DEFAULT);
        $query = $this->getDb()->prepare('INSERT INTO usuarios (usuario, contraseña) VALUES (?, ?)');
        $query->execute([$usuario, $passEnc]);
    }

    function getAll() {
        $query = $this->getDb()->prepare('SELECT * FROM usuarios');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function deleteUser($id) {
        $query = $this->getDb()->prepare('DELETE FROM usuarios WHERE ID_usuario = ?');
        $query->execute([$id]);
    }

    public function altaAdmin($id) {
        $query = $this->getDb()->prepare('UPDATE usuarios SET esAdmin = 1 WHERE ID_usuario = ?');
        $query->execute([$id]);
    }

    public function bajaAdmin($id) {
        $query = $this->getDb()->prepare('UPDATE usuarios SET esAdmin = 0 WHERE ID_usuario = ?');
        $query->execute([$id]);
    }

    function countAdmin() {
        $query = $this->getDb()->prepare('SELECT COUNT(*) AS total FROM usuarios WHERE esAdmin = 1');
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }
}
?>