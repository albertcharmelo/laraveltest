@extends('layouts.app')
@section('content')

<div class="container card-body card d-flex flex-column justify-content-center align-items-center">
    <div class="tabla">
        <button class="btn btn-primary" id="btngenerar">Generar facturas</button>
        <table class="table mt-4">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Estado de factura</th>
                    <th scope="col">Fecha de facturación</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody id="bodyTableFacturas">

            </tbody>
        </table>
    </div>


</div>
@endsection

@section('js')
<script src="{{ asset('js/panel/panel.js') }}"></script>
@endsection