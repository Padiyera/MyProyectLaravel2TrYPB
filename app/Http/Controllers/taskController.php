<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $tasks = Task::paginate();

        return view('task.index', compact('tasks'))
            ->with('i', ($request->input('page', 1) - 1) * $tasks->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $task = new Task();

        return view('task.create', compact('task'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'persona_contacto' => 'required|string|max:255',
            'telefono_contacto' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'correo_electronico' => 'required|string|email|max:255',
            'direccion' => 'required|string|max:255',
            'poblacion' => 'required|string|max:255',
            'codigo_postal' => 'required|string|size:5',
            'provincia' => 'required|integer',
            'fecha_realizacion' => 'required|date|after:today',
            'anotaciones_anteriores' => 'nullable|string',
            'fichero_resumen' => 'nullable|string',
        ]);

        // Validación personalizada
        $client = Client::find($request->client_id);
        if (!$client || $client->telefono !== $request->telefono_contacto) {
            return Redirect::back()->withErrors(['client_id' => 'El ID del cliente o el teléfono no coinciden con los datos del cliente.']);
        }

        $data = $request->all();
        $data['estado'] = 'P'; // Estado pendiente
        $data['fecha_creacion'] = now(); // Fecha de creación actual

        Task::create($data);

        return Redirect::route('tasks.index')
            ->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $task = Task::find($id);

        return view('task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $task = Task::find($id);

        return view('task.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task): RedirectResponse
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'persona_contacto' => 'required|string|max:255',
            'telefono_contacto' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'correo_electronico' => 'required|string|email|max:255',
            'direccion' => 'required|string|max:255',
            'poblacion' => 'required|string|max:255',
            'codigo_postal' => 'required|string|size:5',
            'provincia' => 'required|integer',
            'estado' => 'required|in:P,R,C',
            'fecha_realizacion' => 'required|date|after:today',
            'anotaciones_anteriores' => 'nullable|string',
            'anotaciones_posteriores' => 'nullable|string',
            'fichero_resumen' => 'nullable|string',
        ]);

        // Validación personalizada
        $client = Client::find($request->client_id);
        if (!$client || $client->telefono !== $request->telefono_contacto) {
            return Redirect::back()->withErrors(['client_id' => 'El ID del cliente o el teléfono no coinciden con los datos del cliente.']);
        }

        $task->update($request->all());

        return Redirect::route('tasks.index')
            ->with('success', 'Task updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Task::find($id)->delete();

        return Redirect::route('tasks.index')
            ->with('success', 'Task deleted successfully');
    }
}
