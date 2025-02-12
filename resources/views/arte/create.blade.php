<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create de Artes</title>
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h1 class="title">Adicionar Nova Arte</h1>
            <form method="post" action="{{ route('arte.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="id-input-id" class="form-label">ID</label>
                    <input id="id-input-id" type="text" class="form-control" value="#" disabled>
                    <small class="form-text">Não é necessário informar o ID para cadastrar um novo dado.</small>
                </div>

                <div class="mb-3">
                    <label for="id-input-nome" class="form-label">Título</label>
                    <input id="id-input-nome" type="text" class="form-control" placeholder="Digite um título" name="titulo" required>
                </div>

                <div class="mb-3">
                    <label for="id-input-descricao" class="form-label">Descrição</label>
                    <textarea id="id-input-descricao" class="form-control" placeholder="Digite uma descrição" name="descricao" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="id-input-categoria" class="form-label">Categoria</label>
                    <input id="id-input-categoria" type="text" class="form-control" placeholder="Digite uma categoria" name="categoria" required>
                </div>

                <div class="mb-3">
                    <label for="id-input-imagem" class="form-label">Imagem</label>
                    <input id="id-input-imagem" type="file" class="form-control" name="imagem">
                </div>

                <div class="button-group">
                    <button type="submit" class="btn btn-success">Enviar</button>
                    <a href="{{ route('arte.index') }}" class="btn btn-outline-light">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
