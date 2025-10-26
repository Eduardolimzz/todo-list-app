<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\TaskRequest;  // Importando o TaskRequest para validação
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Pega todas as tarefas do banco e passa para a view
        $tasks = Task::paginate(10);  // Paginação para mostrar 10 tarefas por página
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        // Criação da nova tarefa com dados validados
        Task::create($request->validated());  // Apenas dados válidos são criados

        // Redireciona de volta para a lista de tarefas
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Busca a tarefa pelo ID
        $task = Task::findOrFail($id);
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Busca a tarefa pelo ID
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TaskRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, $id)
    {
        // Busca a tarefa e atualiza com os dados validados
        $task = Task::findOrFail($id);
        $task->update($request->validated());  // Atualiza a tarefa com dados válidos

        // Redireciona de volta para a lista de tarefas
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Busca a tarefa e deleta permanentemente
        $task = Task::findOrFail($id);
        $task->delete();

        // Redireciona de volta para a lista de tarefas
        return redirect()->route('tasks.index');
    }

    /**
     * Soft delete a task (exclusão lógica).
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function softDelete($id)
    {
        // Busca a tarefa pelo ID e a exclui logicamente (soft delete)
        $task = Task::findOrFail($id);
        $task->delete();

        // Retorna uma resposta com mensagem
        return response()->json(['message' => 'Tarefa excluída logicamente']);
    }

    /**
     * Restore a soft deleted task.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        // Busca a tarefa excluída logicamente e a restaura
        $task = Task::withTrashed()->findOrFail($id);
        $task->restore();

        // Retorna uma resposta com mensagem
        return response()->json(['message' => 'Tarefa restaurada']);
    }
}
