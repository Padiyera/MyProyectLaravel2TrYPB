<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Models\task;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class taskController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->authorizeResource(Task::class);
    }
   
    public function index(): View
    {
        $users = Task::paginate();
        return view('task.index', compact('task'));
    }
}
