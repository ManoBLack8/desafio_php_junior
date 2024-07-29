<body>
    <div class="container">
        <div class="row mt-5">
            <nav class="nav nav-pills nav-fill">
                <a class="nav-link" href="?action=cadastrar_sala">Adicionar</a>
                <a class="nav-link" href="?action=index">Home</a>
                <a class="nav-link" href="?action=sair">Sair</a>
            </nav>
        </div>

        <div class="row mt-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Capacidade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $sala) { ?>
                        <tr>
                            <td><?= $sala["id"] ?></td>
                            <td><?= $sala["nome"] ?></td>
                            <td><?= $sala["capacidade"] ?></td>
                            <td>
                                <a href="?action=editar_sala&id=<?= $sala["id"] ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="?action=excluir_sala&id=<?= $sala["id"] ?>" class="btn btn-danger btn-sm">Excluir</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
