<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $userRole = Auth::check() ? Auth::user()->roles->pluck('name')->first() : null;

        if ($userRole == 'operario') {
            $tasks = Task::where('operario_encargado', Auth::user()->name)->paginate(5);
        } else {
            $tasks = Task::paginate(5);
        }

        return view('task.index', compact('tasks'))
            ->with('i', ($request->input('page', 1) - 1) * $tasks->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $task = new Task();
        $operarios = User::role('operario')->get();
        $userRole = Auth::check() ? Auth::user()->roles->pluck('name')->first() : 'guest';

        return view('task.create', compact('task', 'operarios', 'userRole'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'persona_contacto' => 'required|string|max:255',
            'telefono_contacto' => 'required|string|regex:/^[0-9\s\-\+]+$/|max:255',
            'descripcion' => 'required|string',
            'correo_electronico' => 'required|string|email|max:255',
            'direccion' => 'required|string|max:255',
            'poblacion' => 'required|string|max:255',
            'codigo_postal' => 'required|string|size:5',
            'provincia' => 'required|integer',
            'fecha_realizacion' => 'required|date_format:d/m/Y',
            'operario_encargado' => 'required|string',
            'anotaciones_anteriores' => 'nullable|string',
            'fichero_resumen' => 'nullable|string',
        ], [
            'telefono_contacto.regex' => 'El campo teléfono de contacto solo puede contener números, espacios, guiones y el signo más.',
        ]);

        // Validación personalizada
        $client = Client::find($request->client_id);
        if (!$client || $client->telefono !== $request->telefono_contacto) {
            return Redirect::back()->withErrors(['client_id' => 'El ID del cliente o el teléfono no coinciden con los datos del cliente.']);
        }

        // Convertir la fecha al formato correcto
        $validatedData['fecha_realizacion'] = Carbon::createFromFormat('d/m/Y', $validatedData['fecha_realizacion'])->format('Y-m-d');

        // Asignar valor predeterminado si el usuario no es administrador
        if (Auth::check() && Auth::user()->roles->pluck('name')->first() != 'super-admin') {
            $validatedData['operario_encargado'] = 'operario por asignar';
        }

        // Establecer el estado predeterminado a "Pendiente"
        $validatedData['estado'] = 'P';
        $validatedData['fecha_creacion'] = now(); // Fecha de creación actual

        Task::create($validatedData);

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
        $operarios = User::role('operario')->get();
        $userRole = Auth::check() ? Auth::user()->roles->pluck('name')->first() : 'guest';

        return view('task.edit', compact('task', 'operarios', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task): RedirectResponse
    {
        $validatedData = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'persona_contacto' => 'required|string|max:255',
            'telefono_contacto' => 'required|string|regex:/^[0-9\s\-\+]+$/|max:255',
            'descripcion' => 'required|string',
            'correo_electronico' => 'required|string|email|max:255',
            'direccion' => 'required|string|max:255',
            'poblacion' => 'required|string|max:255',
            'codigo_postal' => 'required|string|size:5',
            'provincia' => 'required|integer',
            'estado' => 'required|in:P,R,C',
            'fecha_realizacion' => 'required|date_format:d/m/Y',
            'anotaciones_anteriores' => 'nullable|string',
            'anotaciones_posteriores' => 'nullable|string',
            'fichero_resumen' => 'nullable|string',
        ], [
            'telefono_contacto.regex' => 'El campo teléfono de contacto solo puede contener números, espacios, guiones y el signo más.',
        ]);

        // Validación personalizada
        $client = Client::find($request->client_id);
        if (!$client || $client->telefono !== $request->telefono_contacto) {
            return Redirect::back()->withErrors(['client_id' => 'El ID del cliente o el teléfono no coinciden con los datos del cliente.']);
        }

        // Convertir la fecha al formato correcto
        $validatedData['fecha_realizacion'] = Carbon::createFromFormat('d/m/Y', $validatedData['fecha_realizacion'])->format('Y-m-d');

        // Asignar valor predeterminado si el usuario no es administrador
        if (Auth::check() && Auth::user()->roles->pluck('name')->first() != 'super-admin') {
            // No actualizar el campo 'operario_encargado' si el usuario no es administrador
            unset($validatedData['operario_encargado']);
            // No actualizar el campo 'estado' si el usuario no es administrador o operario
            unset($validatedData['estado']);
        } else {
            // Asegúrate de que el valor de 'operario_encargado' se actualice solo si el usuario es administrador
            $validatedData['operario_encargado'] = $request->input('operario_encargado');
        }

        $task->update($validatedData);

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
