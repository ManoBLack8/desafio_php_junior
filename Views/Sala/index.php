<body>
    <div class="container">
        <div class="row mt-5">
            <div class="mb-5">Filtros</div>
            <?php foreach ($data as $sala) { ?>
            <div class="col">
                <div class="card" style="width: 10rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $sala['nome'] ?></h5>
                        <a href="#" class="btn btn-primary">Reservar</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

    </div>
</body>