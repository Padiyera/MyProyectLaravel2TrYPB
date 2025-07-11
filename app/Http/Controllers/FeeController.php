<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\FeeRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Carbon\Carbon;
use App\Models\Client;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $query = Fee::query();

        if ($request->has('client_name') && $request->input('client_name') != '') {
            $query->where('client_name', 'like', '%' . $request->input('client_name') . '%');
        }

        $fees = $query->paginate(5);

        return view('fee.index', compact('fees'))
            ->with('i', ($request->input('page', 1) - 1) * $fees->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $fee = new Fee();
        $clients = Client::all();

        return view('fee.create', compact('fee', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FeeRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['issue_date'] = Carbon::createFromFormat('d/m/Y', $data['issue_date'])->format('Y-m-d');
        if (!empty($data['payment_date'])) {
            $data['payment_date'] = Carbon::createFromFormat('d/m/Y', $data['payment_date'])->format('Y-m-d');
        }

        // Asegúrate de que el nombre del cliente se guarde
        $data['client_name'] = $request->input('client_name');

        Fee::create($data);

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
        $clients = Client::all();

        if ($fee->payment_date) {
            try {
                $fee->payment_date = Carbon::createFromFormat('Y-m-d', $fee->payment_date)->format('d/m/Y');
            } catch (\Exception $e) {
                // Manejo de error si el formato de la fecha no es válido
                $fee->payment_date = null;
            }
        }

        return view('fee.edit', compact('fee', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FeeRequest $request, Fee $fee): RedirectResponse
    {
        $data = $request->validated();
        $data['issue_date'] = Carbon::createFromFormat('d/m/Y', $data['issue_date'])->format('Y-m-d');
        if (!empty($data['payment_date'])) {
            $data['payment_date'] = Carbon::createFromFormat('d/m/Y', $data['payment_date'])->format('Y-m-d');
        }

        // Asegúrate de que el nombre del cliente se actualice
        $data['client_name'] = $request->input('client_name');

        $fee->update($data);

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

    public function download($id)
    {
        $fee = Fee::find($id);
        $pdf = PDF::loadView('fee.pdf', compact('fee'));
        return $pdf->download('factura_' . $fee->id . '.pdf');
    }

    public function monthlyCharge(): RedirectResponse
    {
        $clients = Client::all();
        $currentDate = Carbon::now()->format('Y-m-d');

        foreach ($clients as $client) {
            Fee::create([
                'client_name' => $client->nombre,
                'concept' => 'Cargo mensual',
                'amount' => $client->importe_cuota_mensual,
                'issue_date' => $currentDate,
                'paid' => true,
                'payment_date' => $currentDate,
                'notes' => 'Gracias por confiar',
            ]);
        }

        return Redirect::route('fees.index')->with('success', 'Facturas mensuales generadas con éxito.');
    }
}
