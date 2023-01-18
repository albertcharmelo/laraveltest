<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Factura;
use App\Models\Producto;
use Illuminate\Http\Request;

class ComprasController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('compras.index')->with(compact('productos'));
    }

    public function comprar(Request $request)
    {

        $producto = Producto::find($request->producto);
        try {
            //comprobar si existe una factura pendiente
            $factura = Factura::where('estado', 'emitida')->where('user_id', auth()->user()->id)->first();
            if ($factura) {
                $compra = Compra::create([
                    'user_id' => auth()->user()->id,
                    'producto_id' => $producto->id,
                    'factura_id' => $factura->id,
                ]);
            } else {
                $factura_creada = Factura::create([
                    'user_id' => auth()->user()->id,
                    'estado' => 'emitida',
                ]);
                $compra = Compra::create([
                    'user_id' => auth()->user()->id,
                    'producto_id' => $producto->id,
                    'factura_id' => $factura_creada->id,
                ]);
            }

            return redirect()->route('compras.index')->with('success', 'Producto agregado a la factura');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->route('compras.index')->with('error', 'Error al agregar producto a la factura');
        }
    }
}
