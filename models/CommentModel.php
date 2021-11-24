<?php

require_once('Model.php');

class CommentModel extends Model {

    
    //@return array
    //Retorna todos los comentarios en la tabla comentario ordenados por id_comentario
    function getAll() {
        $query = $this->getDb()->prepare('SELECT * FROM comentarios ORDER BY id_comentario ASC');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    
    //@param $id
    //@return mixed
    //Retorna una tupla a partir de un id pasado por parámtro
    function getComment($id){
        $query = $this->getDb()->prepare('SELECT * FROM comentarios WHERE id_comentario = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    //@param $id
    //@return mixed
    //Retorna todos los comentarios sobre un producto en especifico
    function getProductComments($id){
        $query = $this->getDb()->prepare('SELECT comentarios.*, usuarios.usuario FROM comentarios JOIN usuarios ON comentarios.id_fk_usuario = usuarios.ID_usuario WHERE id_fk_producto = ?');
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }


    //@param "$producto, $usuario, $calificacion, $texto"
    //Crea un comentario a partir del valor de los parámetros
    function newProductComment($producto, $usuario, $calificacion, $texto) {
        $query = $this->getDb()->prepare('INSERT INTO comentarios(id_fk_producto, id_fk_usuario, calificacion, comentario) VALUES(?, ?, ?, ?)');
        $success = $query->execute([$producto, $usuario, $calificacion, $texto]);
        return $success;
    }

    //@param $id
    //Elimina un comentario en base al id pasado por parámetro
    function deleteComment($id) {
        $query = $this->getDb()->prepare('DELETE FROM comentarios WHERE id_comentario = ?');
        $success = $query->execute([$id]);
        return $success;
    }
}
