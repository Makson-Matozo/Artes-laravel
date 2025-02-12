<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalhes da Arte</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body data-bs-theme="dark">
    <div class="container">
        <h1 class="text-center my-5">Detalhes da Arte</h1>

        <div class="my-3">
            <label for="id-input-id" class="form-label">ID</label>
            <input id="id-input-id" type="text" class="form-control" value="{{ $arte->id }}" disabled>
        </div>

        <div class="my-3">
            <label for="id-input-urlImage" class="form-label">Imagem</label>
            <input id="id-input-urlImage" type="text" class="form-control" value="{{ $arte->urlImage }}" disabled>
            <div class="text-center">
                <img src="{{ $arte->urlImage }}" class="img-fluid rounded" alt="Imagem da Arte">
            </div>

        <div class="my-3">
            <label for="id-input-nome" class="form-label">Título</label>
            <input id="id-input-nome" type="text" class="form-control" value="{{ $arte->titulo }}" disabled>
        </div>
        <div class="my-3">
            <label for="id-input-descricao" class="form-label">Descrição</label>
            <input id="id-input-descricao" type="text" class="form-control" value="{{ $arte->descricao }}" disabled>
        </div>
        <div class="my-3">
            <label for="id-input-ingredientes" class="form-label">Categoria</label>
            <input id="id-input-ingredientes" type="text" class="form-control" value="{{ $arte->categoria }}" disabled>
        </div>
        </div>
        <div class="my-3">
            <label for="id-input-updated_at" class="form-label">Última Atualização</label>
            <input id="id-input-updated_at" type="text" class="form-control" value="{{ $arte->updated_at }}" disabled>
        </div>
        <div class="my-3">
            <label for="id-input-created_at" class="form-label">Data de Criação</label>
            <input id="id-input-created_at" type="text" class="form-control" value="{{ $arte->created_at }}" disabled>
        </div>

        <div class="my-3 text-center">
            <a href="{{ route('arte.index') }}" class="btn btn-primary">Voltar</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
