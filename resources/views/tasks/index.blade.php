@extends('layouts.app')

@section('content')
    <h1>Lista de Tarefas</h1>
    <a href="{{ route('tasks.create') }}">Criar Nova Tarefa</a>
    
    <ul>
        @foreach ($tasks as $task)
            <li>
                {{ $task->title }} - {{ $task->status }}
                <a href="{{ route('tasks.edit', $task->id) }}">Editar</a>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
