<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Factura;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index()
    {



        return view('panel.index');
    }

    public function generar_factura_pendiente(Request $request)
    {
        $facturas = Factura::where('estado', 'emitida')->get();
        return response()->json($facturas, 200);
    }

    public function factura($id)
    {
        $factura = Factura::find($id);

        $compras = Compra::where('factura_id', $id)->get()->toArray();

        $compras = array_map(function ($compra) {

            $impuesto_del_producto = ($compra['producto']['precio'] * $compra['producto']['impuesto'] / 100);
            $precio_producto_sin_impuesto = $compra['producto']['precio'] - $impuesto_del_producto;
            $compra['producto']['precio_sin_impuesto'] = $precio_producto_sin_impuesto;
            $compra['producto']['valor_impuesto'] = $impuesto_del_producto;
            return $compra;
        }, $compras);

        $factura->compras = $compras;
        $factura->subtotal = array_reduce($compras, function ($subtotal, $compra) {
            $subtotal += $compra['producto']['precio_sin_impuesto'];
            return $subtotal;
        }, 0);

        $factura->impuesto_total = array_reduce($compras, function ($impuesto_total, $compra) {
            $impuesto_total += $compra['producto']['valor_impuesto'];
            return $impuesto_total;
        }, 0);

        $factura->total = array_reduce($compras, function ($total, $compra) {
            $total += $compra['producto']['precio'];
            return $total;
        }, 0);








        return view('panel.factura')->with(compact('factura'));
    }
}
