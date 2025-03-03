<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\FeeRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $fees = Fee::paginate();

        return view('fee.index', compact('fees'))
            ->with('i', ($request->input('page', 1) - 1) * $fees->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $fee = new Fee();

        return view('fee.create', compact('fee'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FeeRequest $request): RedirectResponse
    {
        Fee::create($request->validated());

        return Redirect::route('fees.index')
            ->with('success', 'Fee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $fee = Fee::find($id);

        return view('fee.show', compact('fee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $fee = Fee::find($id);

        return view('fee.edit', compact('fee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FeeRequest $request, Fee $fee): RedirectResponse
    {
        $fee->update($request->validated());

        return Redirect::route('fees.index')
            ->with('success', 'Fee updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Fee::find($id)->delete();

        return Redirect::route('fees.index')
            ->with('success', 'Fee deleted successfully');
    }

    public function print($id)
    {
        $fee = Fee::find($id);
        return view('fee.print', compact('fee'));
    }
}
