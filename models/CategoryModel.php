<?php

require_once('Model.php');

class CategoryModel extends Model {

    function getAll() {
        $query = $this->getDb()->prepare('SELECT * FROM categorias');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getCategoryById($id) {
        $query = $this->getDb()->prepare('SELECT * FROM categorias WHERE categoria = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function deleteCategoria($id) {
        $query = $this->getDb()->prepare('DELETE FROM categorias WHERE categoria = ?');
        $query->execute([$id]);
    }

    function editCategoria($id,$nombre) {
        $query = $this->getDb()->prepare('UPDATE categorias SET categoria = ? WHERE categoria = ?');
        $query->execute([$nombre,$id]);
    }
    
    function addCategoria($nombre,$unidad,$apto) {
        $query = $this->getDb()->prepare('INSERT INTO categorias (categoria,aptovegan,package) VALUES (?,?,?)');
        $query->execute([$nombre,$unidad,$apto]);
    }
    
}
?>