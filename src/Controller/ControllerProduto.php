<?php

namespace Controller;

class ControllerProduto extends \ControllerBase
{
    public function listar()
    {
        return $this->view->make('produtos/index.php', [
            'title' => 'Home',
            'produtos' => $this->model->getProdutos()
        ]);
    }

    public function editar($id)
    {
        $produto = $this->model->findById($id);
        if (empty($produto)) {
            $this->redirect('/');
        }
        return $this->view->make('produtos/editar.php', [
            'title' => 'Editar',
            'produto' => $produto,
            'categorias' => $this->model->getCategorias()
        ]);
    }

    public function excluir($id)
    {
        $this->model->delete($id);
        $this->redirect('/');
    }

    public function cadastrar()
    {
        return $this->view->make('produtos/cadastrar.php', [
            'title' => 'Cadastrar',
            'categorias' => $this->model->getCategorias()
        ]);
    }

    public function buscar()
    {
        $buscar = $_POST['q'];
        $produtos = $this->model->find($buscar);
        return $this->view->make('produtos/listar.php', [
            'title' => 'Resultado de busca',
            'buscar' => $buscar,
            'produtos' => $produtos
        ]);
    }

    public function salvar()
    {
        $data = $_POST;
        if (array_key_exists('id', $data)) {
            $this->model->update($data);
        } else {
            $this->model->insert($data);
        }
        $this->redirect('/');
    }
}
