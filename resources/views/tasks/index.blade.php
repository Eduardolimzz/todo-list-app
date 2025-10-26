@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-bold text-gray-700 mb-4">Lista de Tarefas</h1>
        
        <a href="{{ route('tasks.create') }}" class="text-white bg-blue-600 hover:bg-blue-700 py-2 px-4 rounded-md mb-4 inline-block">
            Criar Nova Tarefa
        </a>
        
        <!-- Lista de tarefas -->
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Título</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Status</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @foreach ($tasks as $task)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $task->title }}</td>
                            <td class="px-4 py-2">
                                <span class="px-3 py-1 rounded-full text-white {{ $task->status === 'pending' ? 'bg-yellow-500' : 'bg-green-500' }}">
                                    {{ ucfirst($task->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-2">
                                <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-600 hover:underline">Editar</a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline ml-4">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Paginação -->
        <div class="mt-4">
            {{ $tasks->links() }}
        </div>
    </div>
@endsection
