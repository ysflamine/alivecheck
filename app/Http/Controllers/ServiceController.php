<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use Illuminate\Support\Facades\Http;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //todos los servicios, ordenados por el más reciente primero
        $services = Service::latest()->get();
        //retorna la vista 'services.index' con los servicios
        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        /* aqui laravel ya ha validado los datos, si llega hasta aqui, es porque son válidos */
        /* aunque siempre es buena práctica validar los datos */
        Service::create($request->validated());
        /* redirige a la vista de servicios con un mensaje de éxito, como funcinoa? con route indicamos que use servicio index, cuando lo haga, tenemos un helper 
        que nos permite enviar un mensaje de éxito, que se mostrará en la vista, el succes lo recogera la vista y lo muestro con un alert de bootstrap */
        return redirect()->route('services.index')->with('exito', 'Servicio creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service){
        $service->delete();
        return redirect()->route('services.index')->with('exito', 'Servicio eliminado correctamente.');
    }

public function check(Service $service){
$status = 'down';
    try {
        // Hacemos la petición con timeout
        $respuesta = Http::timeout(5)->get($service->target);

        // Si la respuesta es exitosa, el servicio está arriba
        if ($respuesta->successful()) {
            $status = 'up';
        }
    } catch (\Throwable $e) {
        // Si hay un error de red, timeout, DNS, etc., el estado sigue siendo 'down'
        $status = 'down';
    }

    // Actualizamos el servicio una sola vez
    $service->update([     
        'last_status' => $status,         
        'last_checked_at' => now(),
    ]);

    return redirect()
        ->route('services.index')
        ->with('exito', 'Verificación realizada correctamente. Estado: ' . $status);
}
}
