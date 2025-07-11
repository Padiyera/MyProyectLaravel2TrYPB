<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Services\CurrencyConverterService;

class ClientController extends Controller
{

    protected $currencyConverterService;

    public function __construct(CurrencyConverterService $currencyConverterService)
    {
        $this->currencyConverterService = $currencyConverterService;
    }

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
            'España' => 'eur',
            'Italia' => 'eur',
            'Alemania' => 'eur',
            'Francia' => 'eur',
            'Andorra' => 'eur',
            'Estados Unidos' => 'usd',
            'Reino Unido' => 'gbp',
            'Japón' => 'jpy',
            'México' => 'mxn',
            'Canadá' => 'cad',
            'Australia' => 'aud',
            'China' => 'cny',
            'India' => 'inr',
            'Brasil' => 'brl',
            'Rusia' => 'rub',
            'Sudáfrica' => 'zar',
            'Argentina' => 'ars',
            'Chile' => 'clp',
            'Colombia' => 'cop',
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
            'España' => 'eur',
            'Italia' => 'eur',
            'Alemania' => 'eur',
            'Francia' => 'eur',
            'Andorra' => 'eur',
            'Estados Unidos' => 'usd',
            'Reino Unido' => 'gbp',
            'Japón' => 'jpy',
            'México' => 'mxn',
            'Canadá' => 'cad',
            'Australia' => 'aud',
            'China' => 'cny',
            'India' => 'inr',
            'Brasil' => 'brl',
            'Rusia' => 'rub',
            'Sudáfrica' => 'zar',
            'Argentina' => 'ars',
            'Chile' => 'clp',
            'Colombia' => 'cop',
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


        // Convertir el importe_cuota_mensual a EUR
        $currencyCode = $data['moneda'];
        $amount = $data['importe_cuota_mensual'];
        $convertedAmount = $this->currencyConverterService->convert($amount, $currencyCode);

        if ($convertedAmount === null) {
            return Redirect::back()->withErrors(['importe_cuota_mensual' => 'No se pudo convertir el importe a EUR.']);
        }

        $data['importe_cuota_mensual'] = $convertedAmount;

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
            'España' => 'eur',
            'Italia' => 'eur',
            'Alemania' => 'eur',
            'Francia' => 'eur',
            'Andorra' => 'eur',
            'Estados Unidos' => 'usd',
            'Reino Unido' => 'gbp',
            'Japón' => 'jpy',
            'México' => 'mxn',
            'Canadá' => 'cad',
            'Australia' => 'aud',
            'China' => 'cny',
            'India' => 'inr',
            'Brasil' => 'brl',
            'Rusia' => 'rub',
            'Sudáfrica' => 'zar',
            'Argentina' => 'ars',
            'Chile' => 'clp',
            'Colombia' => 'cop',
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
            'España' => 'eur',
            'Italia' => 'eur',
            'Alemania' => 'eur',
            'Francia' => 'eur',
            'Andorra' => 'eur',
            'Estados Unidos' => 'usd',
            'Reino Unido' => 'gbp',
            'Japón' => 'jpy',
            'México' => 'mxn',
            'Canadá' => 'cad',
            'Australia' => 'aud',
            'China' => 'cny',
            'India' => 'inr',
            'Brasil' => 'brl',
            'Rusia' => 'rub',
            'Sudáfrica' => 'zar',
            'Argentina' => 'ars',
            'Chile' => 'clp',
            'Colombia' => 'cop',
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

        // Convertir el importe_cuota_mensual a EUR
        $currencyCode = $data['moneda'];
        $amount = $data['importe_cuota_mensual'];
        $convertedAmount = $this->currencyConverterService->convert($amount, $currencyCode);

        if ($convertedAmount === null) {
            return Redirect::back()->withErrors(['importe_cuota_mensual' => 'No se pudo convertir el importe a EUR.']);
        }

        $data['importe_cuota_mensual'] = $convertedAmount;

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
