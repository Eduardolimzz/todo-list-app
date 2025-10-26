@extends('layouts.app')

@section('content')
    <h1>Editar Tarefa</h1>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Título:</label>
        <input type="text" name="title" id="title" value="{{ $task->title }}" required>
        <br>
        <label for="description">Descrição:</label>
        <textarea name="description" id="description">{{ $task->description }}</textarea>
        <br>
        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pendente</option>
            <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Concluída</option>
        </select>
        <br>
        <button type="submit">Atualizar</button>
    </form>
@endsection
