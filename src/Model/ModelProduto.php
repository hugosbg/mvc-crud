<?php

namespace Model;

class ModelProduto
{
    private $db;

    public function __construct(\DataBase $database)
    {
        $this->db = $database->getConnection();
    }

    public function getProdutos()
    {
        $stmt = $this->db->query('
            SELECT
                p.id,
                p.descricao,
                p.valor,
                c.nome as categoria
            FROM produtos AS p
            JOIN categorias AS c ON c.id = p.categoria'
        );
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function findById($id)
    {
        $stmt = $this->db->prepare('
            SELECT * 
            FROM produtos 
            WHERE id = ?'
        );
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    public function find($world)
    {
        $stmt = $this->db->prepare('
            SELECT
                p.id,
                p.descricao,
                p.valor,
                c.nome as categoria
            FROM produtos AS p
            JOIN categorias AS c ON c.id = p.categoria
            WHERE (p.id = ? OR p.descricao LIKE ?)'
        );
        $stmt->execute([$world, "%$world%"]);
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare('
            DELETE 
            FROM produtos 
            WHERE id = ?'
        );
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }

    public function insert(array $data)
    {
        $stmt = $this->db->prepare('
            INSERT 
            INTO produtos (
                `descricao` 
                ,`valor` 
                ,`categoria`
            )
            VALUES (
                :descricao 
                ,:valor 
                ,:categoria
            )'
        );
        $stmt->execute($data);
        return $stmt->rowCount();
    }

    public function getCategorias()
    {
        $stmt = $this->db->query('
            SELECT * 
            FROM categorias'
        );
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function update(array $data)
    {
        $stmt = $this->db->prepare('
            UPDATE produtos
            SET
                descricao = :descricao,
                valor = :valor,
                categoria = :categoria
            WHERE id = :id'
        );
        return $stmt->execute($data);
    }
}
