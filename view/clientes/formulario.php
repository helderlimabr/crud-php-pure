<?php include __DIR__ . '/../header-html.php'; ?>

    <form action="/salvar-cliente<?= isset($cliente) ? '?id=' . $cliente->getId() : ''; ?>" method="post">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" class="form-control"
                   value="<?= isset($cliente) ? $cliente->getNome() : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="sobreNome">Sobre-nome</label>
            <input type="text" id="sobreNome" name="sobreNome" class="form-control"
                   value="<?= isset($cliente) ? $cliente->getSobreNome() : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" class="form-control"
                   value="<?= isset($cliente) ? $cliente->getEmail() : ''; ?>" required>
        </div>

        <button class="btn btn-primary">Salvar</button>
    </form>

<?php include __DIR__ . '/../footer-html.php'; ?>