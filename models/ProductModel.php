<?php

require_once('Model.php');

class ProductModel extends Model {

    function getAll() {
        $query = $this->getDb()->prepare('SELECT p.id_prod, p.producto, p.precio, p.detalle, p.categoria FROM productos p INNER JOIN categorias c ON c.categoria = p.categoria');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getProductById($id) {
        $query = $this->getDb()->prepare('SELECT p.id_prod, p.producto, p.precio, p.detalle, p.categoria FROM productos p INNER JOIN categorias c ON c.categoria = p.categoria WHERE p.id_prod = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function getPorCategoria($nombre) {
        $query = $this->getDb()->prepare('SELECT p.id_prod, p.producto, p.precio, p.detalle, p.categoria FROM productos p INNER JOIN categorias c ON c.categoria = p.categoria WHERE c.categoria = ?');
        $query->execute([$nombre]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function deleteProducto($id) {
        $query = $this->getDb()->prepare('DELETE FROM productos WHERE ID_prod = ?');
        $query->execute([$id]);
    }

    function getCategorias() {
        $query = $this->getDb()->prepare('SELECT * FROM categorias');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function editProduct($id, $producto, $precio, $detalle, $categoria) {
        $query = $this->getDb()->prepare('UPDATE productos SET producto = ?, precio = ?, detalle = ?, categoria = ? WHERE ID_prod = ?');
        $query->execute([$producto, $precio, $detalle, $categoria, $id]);
    }

    function addProduct($producto, $precio, $detalle, $categoria) {
        $query = $this->getDb()->prepare('INSERT INTO productos (producto, precio, detalle, categoria) VALUES (?, ?, ?, ?)');
        $query->execute([$producto, $precio, $detalle, $categoria]);
    }
}
?>