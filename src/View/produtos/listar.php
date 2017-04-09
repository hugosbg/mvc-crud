<?php include __DIR__ . '/../head.php'; ?>

<div class="container">
    <div class="starter-template">
        <h1>Buscar por: <span class="text-danger"><?php echo $buscar ?></span></h1>
        <table class="table">
            <thead class="thead-inverse">
            <tr>
                <th>#</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Categoria</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            <?php if (count($produtos)): ?>
                <?php foreach ($produtos as $produto): ?>
                <tr>
                    <th scope="row"><?php echo $produto->id ?></th>
                    <td><?php echo $produto->descricao ?></td>
                    <td><?php echo $produto->valor ?></td>
                    <td><?php echo $produto->categoria ?></td>
                    <td>
                        <a href="/editar/<?php echo $produto->id ?>"
                           class="btn btn-info">Editar</a>

                        <a href="/excluir/<?php echo $produto->id ?>"
                           class="btn btn-danger"
                           onclick="mvc.confirm(event);">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" align="center">Nenhum produto encontrato.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require __DIR__ . '/../footer.php'; ?>

