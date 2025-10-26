<?php

namespace App\Http\Controllers;

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
    $tasks = Task::all();  // Você pode adicionar paginação se necessário
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'status' => 'required|in:pending,completed',
        ]);

        // Criação da nova tarefa
        Task::create($request->all());

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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validação dos dados
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'status' => 'required|in:pending,completed',
        ]);

        // Busca a tarefa e atualiza
        $task = Task::findOrFail($id);
        $task->update($request->all());

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
        // Busca a tarefa e deleta
        $task = Task::findOrFail($id);
        $task->delete();
    
        // Redireciona de volta para a lista de tarefas
        return redirect()->route('tasks.index');
    }

}
