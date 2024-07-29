<body>
    <div class="container">
        <div class="row mt-5">
            <?php if($_SESSION["usuario"]["nivelAcesso"] == 'admin'){ ?>
            <a class="nav-link col text-center" href="?action=home">Admin</a> 
            <?php }?>
            <div class="col text-center">
                <h1>28/07/2024 20:30</h1>
            </div>
            <a class="nav-link col text-center" href="?action=sair">Sair</a>
        </div>
        <div class="row text-center" width="50">
            <div class="col text-center">
                <form action="">
                    <div class="form-floating">
                        <input type="datetime-local" class="form-control" name="dataFormSalaInicio" id="dataFormSalaInicio">
                        <label for="dataFormSalaInicio">De</label>
                    </div>
                    <div class="form-floating">
                        <input type="datetime-local" class="form-control" name="dataFormSalaFim" id="dataFormSalaFim">
                        <label for="dataFormSalaFim">Até</label>
                    </div>
                    <input type="submit" class="btn btnm- btn-primary" value="Buscar">
                </form>
            </div>
        </div>
            
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