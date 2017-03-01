<?php require __DIR__ . '/../head.php'; ?>

<div class="container">
    <div class="starter-template">
        <h1>Editar</h1>
        <form action="/salvar" method="post">
            <input type="hidden" name="id" value="<?php echo $produto->id ?>">
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" value="<?php echo $produto->descricao ?>" id="descricao" name="descricao" placeholder="Descricao">
            </div>
            <div class="form-group">
                <label for="valor">Valor</label>
                <input type="text" class="form-control" value="<?php echo $produto->valor ?>" id="valor" name="valor" placeholder="Valor">
            </div>
            <div class="form-group">
                <label for="categoria">Categoria</label>
                <select class="form-control" id="categoria" name="categoria">
                    <option value="">Selecione</option>
                    <?php foreach ($categorias as $key => $categoria): ?>
                    <option value="<?php echo $categoria->id ?>" <?php echo $categoria->id == $produto->categoria ? 'selected="selected"' : ''  ?>">
                        <?php echo $categoria->nome ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="/" class="btn btn-success">Voltar</a>
        </form>
    </div>
</div>

<?php require __DIR__ . '/../footer.php'; ?>

