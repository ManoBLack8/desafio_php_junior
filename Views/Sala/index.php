<body>
    <div class="container">
        <div class="row mt-5">
            <?php if($_SESSION["usuario"]["nivelAcesso"] == 'admin'){ ?>
            <a class="nav-link col text-center" href="?action=home">Admin</a> 
            <?php }?>
            <div class="col text-center">
                <h1><?= date("d/m/y H:i") ?></h1>
            </div>
            <a class="nav-link col text-center" href="?action=sair">Sair</a>
        </div>
        <div class="row text-center" width="50">
            <div class="col text-center">
                <form action="?action=filtrarSala" method="post">
                    <div class="form-floating">
                        <input type="datetime-local" class="form-control" name="dataFormSalaInicio" id="dataFormSalaInicio">
                        <label for="dataFormSalaInicio">De</label>
                    </div>
                    <div class="form-floating">
                        <input type="datetime-local" class="form-control" name="dataFormSalaFim" id="dataFormSalaFim">
                        <label for="dataFormSalaFim">Até</label>
                    </div>
                    <input type="submit" class="btn btn-primary mt-1" value="Buscar">
                </form>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row">
                <?php foreach ($data as $sala) { ?>
                    <div class="card border-5 border-<?= @$sala['alerta'] ?> col-6 m-2" style="width: 15rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $sala['nome'] ?></h5>
                            <h6>Capacidade: <?= $sala['capacidade'] ?></h6>
                            <p>Localização: <?= $sala['localizacao'] ?></p>
                            <a href="?action=reservar&id=<?= $sala['id'] ?>" class="btn btn-primary">Reservar</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
