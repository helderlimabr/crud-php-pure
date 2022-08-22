<?php include __DIR__ . '/../header-html.php'; ?>

    <a href="/novo-cliente" class="btn btn-primary mb-2">
        Novo Cliente
    </a>

    <ul class="list-group">
        <?php foreach ($clientes as $cliente): ?>
            <li class="list-group-item d-flex justify-content-between">
                <?= $cliente->getNome() . " " . $cliente->getSobreNome(); ?>

                <span>
                    <a href="/alterar-cliente?id=<?= $cliente->getId(); ?>" class="btn btn-info btn-sm">
                        Alterar
                    </a>
                    <a href="/excluir-cliente?id=<?= $cliente->getId(); ?>" class="btn btn-danger btn-sm"
                       onclick="return confirm('Tem certeza que deseja excluir este cliente?')">
                        Excluir
                    </a>
                </span>
            </li>
        <?php endforeach; ?>
    </ul>

<?php include __DIR__ . '/../footer-html.php'; ?>