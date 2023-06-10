<?php

namespace App\Http\Controllers;

use App\Models\Carrucel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CarrucelController extends Controller
{
    public function index() {

        $carruceles = Carrucel::all();

        return view('admin-carrucel', compact('carruceles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
        ]);

        $carrucel = new Carrucel();

        $carrucel->nombre = $request->input('nombre');

        if ($request->hasFile("imagen")) {
            $image = $request->file("imagen");
            $carrucel->imagen = $image->getClientOriginalName();
        }
        $carrucel->save();

        $image->move(public_path('carrucel/' . $carrucel->id), $image->getClientOriginalName());

        try {
            return redirect()->back()->with('success', 'Guardado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'No se pudo guardar: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $carrucel = Carrucel::find($id);

        if ($carrucel) {
            $carrucel_path = public_path("carrucel/{$carrucel->id}");

            if (File::exists($carrucel_path)) {
                File::deleteDirectory($carrucel_path);
            }

            $carrucel->delete();

            try {
                return redirect()->back()->with('success', 'Eliminado exitosamente.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'No se pudo eliminar: ' . $e->getMessage());
            }
        }
    }
}
