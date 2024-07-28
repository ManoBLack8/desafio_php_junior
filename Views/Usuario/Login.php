<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Cadastro de Usuario</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto mt-5">
            <div id="first">
                <div class="meuform form">
                    <div class="titulo-login mb-3">
                        <div class="col-md-12 text-center">
                            <h1>Login</h1>
                        </div>
                    </div>

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="Uemail">Email:</label>
                            <input type="email" name="Uemail"  class="form-control" id="Uemail" placeholder="Digite seu email">
                        </div>
                        <div class="form-group">
                            <label for="Usenha">Senha</label>
                            <input type="password" name="Usenha"  class="form-control" id="Usenha" placeholder="Digite sua senha">
                        </div>
                        <div class="col-md-12 text-center mb-3 mt-5">
                            <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Entrar</button>
                        </div>
                        <div class="col-md-12 text-center">
                            <a href="index.php?action=create">Ainda não possui conta ?</a>
                        </div>
                    </form>
                </div>    
            </div>
        
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</html>
