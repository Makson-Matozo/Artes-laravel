<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Arte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body data-bs-theme="dark">
    <div class="container">
        <form action="{{ route('arte.update', $arte->id) }}" enctype="multipart/form-data" method="post">
            @csrf
            @method('put')
            <div class="my-3">
                <label class="form-label" for="id-input-id">ID</label>
                <input id="id-input-id" aria-describedby="id-help-id" class="form-control" disabled type="text" value="{{ $arte->id }}">
                <div id="id-help-id" class="form-text">Não é possível alterar o ID de um dado.</div>
            </div>
            <div class="my-3">
                <label class="form-label" for="id-input-titulo">Título</label>
                <input id="id-input-titulo" class="form-control" name="titulo" placeholder="Digite o título" required type="text" value="{{ $arte->titulo }}">
            </div>
            <div class="my-3">
                <label class="form-label" for="id-input-descricao">Descrição</label>
                <textarea id="id-input-descricao" class="form-control" name="descricao" placeholder="Digite a descrição" required>{{ $arte->descricao }}</textarea>
            </div>
            <div class="my-3">
                <label class="form-label" for="id-input-imagem">Imagem</label>
                <input id="id-input-imagem" class="form-control" name="imagem" type="file">
            </div>
            <div class="my-3">
                <label class="form-label" for="id-input-categoria">Categoria</label>
                <input id="id-input-categoria" class="form-control" name="categoria" placeholder="Digite a categoria" required type="text" value="{{ $arte->categoria }}">
            </div>
            <div class="my-3">
                <button class="btn btn-primary" type="submit">Enviar</button>
                <a class="btn btn-primary" href="{{ route('arte.index') }}">Voltar</a>
            </div>
        </form>
    </div>
</body>

</html>
