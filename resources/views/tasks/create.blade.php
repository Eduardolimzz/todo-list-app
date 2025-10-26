@extends('layouts.app')

@section('content')
    <h1>Criar Nova Tarefa</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <label for="title">Título:</label>
        <input type="text" name="title" id="title" required>
        <br>
        <label for="description">Descrição:</label>
        <textarea name="description" id="description"></textarea>
        <br>
        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="pending">Pendente</option>
            <option value="completed">Concluída</option>
        </select>
        <br>
        <button type="submit">Salvar</button>
    </form>
@endsection
