@extends('layouts.app')
@section('content')
<div class="container flex-column d-flex align-items-center justify-content-center">
    <div class="card w-100">
        <div class="card-header d-flex justify-content-between align-items-center w-100">
            <h2 class="">Factura de {{ $factura->user->name }}</h2>
            <h4 class="">{{ $factura->created_at->format('d/m/Y') }}</h4>
        </div>
        <div class="card-body">
            <h3>Detalle de los productos</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Producto</th>
                        <th scope="col">Precio</th>
                        <th scope="col">impuesto</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($factura['compras'] as $compra)
                    <tr>

                        <td>{{ $compra['producto']['nombre']}}</td>
                        <td>{{ round($compra['producto']['precio_sin_impuesto'],2)}} $</td>
                        <td>{{ round($compra['producto']['valor_impuesto'],2)}} $</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class=" d-flex flex-column justify-content-end align-items-end">
                <h4 class="font-weight-bold">Cliente: {{ $factura->user->name }}</h4>
                <h4 class="font-weight-bold">Subtotal: {{ round($factura->subtotal,2) }}$</h4>
                <h4 class="font-weight-bold">Impuesto: {{ round($factura->impuesto_total,2) }}$</h4>
                <h4 class="font-weight-bold">Total: {{ round($factura->total,2) }}$</h4>
            </div>
        </div>

    </div>


    @endsection