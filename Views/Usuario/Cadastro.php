<title>Cadastro de Usuario</title>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto mt-5">
            <div id="first">
                <div class="meuform form">
                    <div class="titulo-login mb-3">
                        <div class="col-md-12 text-center">
                            <h1>Cadastre-se</h1>
                        </div>
                    </div>

                    <form action="?acao=create" method="post">
                        <div class="form-group">
                            <label for="Unome">Nome:</label>
                            <input type="text" name="Unome"  class="form-control" id="Unome" placeholder="Digite seu nome">
                        </div>
                        <div class="form-group">
                            <label for="Uemail">Email:</label>
                            <input type="email" name="Uemail"  class="form-control" id="Uemail" placeholder="Digite seu email">
                        </div>
                        <div class="form-group">
                            <label for="Usenha">Senha</label>
                            <input type="password" name="Usenha"  class="form-control" id="Usenha" placeholder="Digite sua senha">
                        </div>
                        <div class="form-group">
                            <label for="Usenha2">Confime a senha:</label>
                            <input type="password" name="Usenha2"  class="form-control" id="Usenha2" placeholder="Confirme sua senha">
                        </div>
                        <div class="col-md-12 text-center mb-3 mt-5">
                            <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Cadastre-se</button>
                        </div>
                        <div class="col-md-12 text-center">
                            <a href="index.php?action=login">Já possui conta ?</a>
                        </div>
                    </form>
                </div>    
            </div>
        
        </div>
    </div>
</body>

