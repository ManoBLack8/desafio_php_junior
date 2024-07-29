<body>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto mt-5">
                <div id="first">
                    <div class="meuform form">
                        <div class="titulo-login mb-3">
                            <div class="col-md-12 text-center">
                                <h1>Cadastro de Sala</h1>
                            </div>
                        </div>

                        <form action="" method="post">
                            <div class="form-group mb-3">
                                <label for="nome">Nome da Sala</label>
                                <input type="text" name="nome" class="form-control" id="nome" placeholder="Digite o nome da sala" value="<?= @$data["nome"] ?>" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="capacidade">Capacidade</label>
                                <input type="number" name="capacidade" class="form-control" id="capacidade" placeholder="Digite a capacidade da sala" value="<?= @$data["capacidade"] ?>" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="localizacao">Localização</label>
                                <input type="text" name="localizacao" class="form-control" id="localizacao" placeholder="Digite a localização da sala" value="<?= @$data["localizacao"] ?>" required>
                            </div>
                            <div class="col-md-12 text-center mb-3 mt-5">
                                <button type="submit" class="btn btn-block mybtn btn-primary tx-tfm">Cadastrar Sala</button>
                            </div>
                        </form>
                    </div>    
                </div>
            </div>
        </div>
    </div>
</body>