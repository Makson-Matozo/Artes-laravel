@extends('layouts.app')

@section('content')
<div class="container mt-4" data-bs-theme="dark">
    {{-- Exibição de mensagens --}}
    @if (!empty($message))
        <div class="alert alert-{{ $message[1] }} alert-dismissible fade show text-center fw-bold" role="alert">
            {{ $message[0] }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between mb-4">
        <a href="{{ route('arte.create') }}" class="btn btn-primary shadow-lg">➕ Nova Arte</a>
        <a href="{{ url('/') }}" class="btn btn-secondary shadow-lg">⬅ Voltar</a>
    </div>

    <div class="row">
        @forelse ($artes as $arte)
            <div class="col-md-4 mb-4">
                <div class="card h-100 bg-gradient text-white shadow-lg rounded-4 overflow-hidden">
                    <img src="{{ asset($arte->urlImage) }}" class="card-img-top img-fluid" alt="{{ $arte->titulo }}">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">{{ $arte->titulo }}</h5>
                        <p class="card-text"><strong>Autor:</strong> {{ $arte->users->name ?? 'Desconhecido' }}</p>
                        <p class="card-text">{{ $arte->descricao }}</p>
                    </div>
                    <div class="card-footer d-flex justify-content-around">
                        <a href="{{ route('arte.show', $arte->id) }}" class="btn btn-outline-light">👁️ Mostrar</a>
                        <a href="{{ route('arte.edit', $arte->id) }}" class="btn btn-outline-warning">✏️ Editar</a>
                        <button class="btn btn-outline-danger btnRemover" data-id="{{ $arte->id }}" data-bs-toggle="modal" data-bs-target="#modalRemover">🗑️ Remover</button>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted fs-4">Nenhuma arte disponível no momento.</p>
            </div>
        @endforelse
    </div>
</div>

<!-- Modal de Remoção -->
<div id="modalRemover" class="modal fade" tabindex="-1" aria-labelledby="modalRemoverLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-white shadow-lg rounded-4">
            <div class="modal-header">
                <h1 id="modalRemoverLabel" class="modal-title fs-4">❗ Remoção de Arte</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p class="fs-5">Deseja realmente remover esta arte?</p>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <form id="formRemover" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger px-4">🗑️ Confirmar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        document.querySelectorAll(".btnRemover").forEach(button => {
            button.addEventListener("click", function () {
                document.querySelector("#formRemover").action = `/arte/${this.dataset.id}`;
            });
        });
    });
</script>
@endsection
