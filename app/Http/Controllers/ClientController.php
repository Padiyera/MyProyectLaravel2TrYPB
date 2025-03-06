<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $clients = Client::paginate(5); 

        return view('client.index', compact('clients'))
            ->with('i', ($request->input('page', 1) - 1) * $clients->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $countries = [
            'España' => 'EUR',
            'Italia' => 'EUR',
            'Alemania' => 'EUR',
            'Francia' => 'EUR',
            'Andorra' => 'EUR',
            'Estados Unidos' => 'USD',
            'Reino Unido' => 'GBP',
            'Japón' => 'JPY',
            'México' => 'MXN',
            'Canadá' => 'CAD',
            'Australia' => 'AUD',
            'China' => 'CNY',
            'India' => 'INR',
            'Brasil' => 'BRL',
            'Rusia' => 'RUB',
            'Sudáfrica' => 'ZAR',
            'Argentina' => 'ARS',
            'Chile' => 'CLP',
            'Colombia' => 'COP',
        ];

        $client = new Client();

        return view('client.create', compact('client', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $countries = [
            'España' => 'EUR',
            'Italia' => 'EUR',
            'Alemania' => 'EUR',
            'Francia' => 'EUR',
            'Andorra' => 'EUR',
            'Estados Unidos' => 'USD',
            'Reino Unido' => 'GBP',
            'Japón' => 'JPY',
            'México' => 'MXN',
            'Canadá' => 'CAD',
            'Australia' => 'AUD',
            'China' => 'CNY',
            'India' => 'INR',
            'Brasil' => 'BRL',
            'Rusia' => 'RUB',
            'Sudáfrica' => 'ZAR',
            'Argentina' => 'ARS',
            'Chile' => 'CLP',
            'Colombia' => 'COP',
        ];

        $request->validate([
            'cif' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|regex:/^[0-9\s\-\+]+$/|max:255',
            'correo' => 'required|string|email|max:255',
            'cuenta_corriente' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'importe_cuota_mensual' => 'required|numeric',
        ], [
            'telefono.regex' => 'El campo teléfono solo puede contener números, espacios, guiones y el signo más.',
        ]);

        $data = $request->all();
        $data['moneda'] = $countries[$data['pais']] ?? '';

        Client::create($data);

        return Redirect::route('clients.index')
            ->with('success', 'Client created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $client = Client::find($id);

        return view('client.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $countries = [
            'España' => 'EUR',
            'Italia' => 'EUR',
            'Alemania' => 'EUR',
            'Francia' => 'EUR',
            'Andorra' => 'EUR',
            'Estados Unidos' => 'USD',
            'Reino Unido' => 'GBP',
            'Japón' => 'JPY',
            'México' => 'MXN',
            'Canadá' => 'CAD',
            'Australia' => 'AUD',
            'China' => 'CNY',
            'India' => 'INR',
            'Brasil' => 'BRL',
            'Rusia' => 'RUB',
            'Sudáfrica' => 'ZAR',
            'Argentina' => 'ARS',
            'Chile' => 'CLP',
            'Colombia' => 'COP',
        ];

        $client = Client::find($id);

        return view('client.edit', compact('client', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client): RedirectResponse
    {
        $countries = [
            'España' => 'EUR',
            'Italia' => 'EUR',
            'Alemania' => 'EUR',
            'Francia' => 'EUR',
            'Andorra' => 'EUR',
            'Estados Unidos' => 'USD',
            'Reino Unido' => 'GBP',
            'Japón' => 'JPY',
            'México' => 'MXN',
            'Canadá' => 'CAD',
            'Australia' => 'AUD',
            'China' => 'CNY',
            'India' => 'INR',
            'Brasil' => 'BRL',
            'Rusia' => 'RUB',
            'Sudáfrica' => 'ZAR',
            'Argentina' => 'ARS',
            'Chile' => 'CLP',
            'Colombia' => 'COP',
        ];

        $request->validate([
            'cif' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|regex:/^[0-9\s\-\+]+$/|max:255',
            'correo' => 'required|string|email|max:255',
            'cuenta_corriente' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'importe_cuota_mensual' => 'required|numeric',
        ], [
            'telefono.regex' => 'El telefono solo puede contener números, espacios, guiones o el signo más.',
        ]);

        $data = $request->all();
        $data['moneda'] = $countries[$data['pais']] ?? '';

        $client->update($data);

        return Redirect::route('clients.index')
            ->with('success', 'Client updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Client::find($id)->delete();

        return Redirect::route('clients.index')
            ->with('success', 'Client deleted successfully');
    }
}
