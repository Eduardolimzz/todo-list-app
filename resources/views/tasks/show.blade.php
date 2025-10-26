@extends('layouts.app')

@section('content')
    <h1>Tarefa: {{ $task->title }}</h1>
    <p>{{ $task->description }}</p>
    <p>Status: {{ $task->status }}</p>
    <a href="{{ route('tasks.edit', $task->id) }}">Editar</a>
@endsection
