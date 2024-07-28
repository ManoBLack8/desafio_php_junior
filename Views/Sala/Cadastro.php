<body>
    <div class="container">
        <div class="row mt-5">
            <nav class="nav nav-pills nav-fill">
                <a class="nav-link" href="#">Salas</a>
                <a class="nav-link" href="#">Usuarios</a>
                <a class="nav-link" href="#">Reservas</a>
                <a class="nav-link" aria-disabled="true">Sair</a>
            </nav>
        </div>

        <div class="row mt-5">
            <table class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Capacidade</th>
            </thead>
            <tbody>
                <?php foreach ($data as $sala) { ?>
                    <td><?= $sala["id"] ?></td>
                    <td><?= $sala["nome"] ?></td>
                    <td><?= $sala["capacidade"] ?></td>
                    </tr>
                <?php } ?>
            </tbody>

            </table>

        </div>

    </div>
</body>
