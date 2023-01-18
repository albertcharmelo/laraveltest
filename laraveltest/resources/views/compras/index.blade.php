@extends('layouts.app')

@section('content')
<div>
    {{-- droplist con productos --}}
    <div class="container d-flex align-items-center justify-content-center">
        <div class="card w-50">
            <div class="card-header">
                <h2 class="font-weight-bolder">Compra de Producto</h2>
            </div>
            <div class="card-body">
                <form class="form-group d-flex flex-column" action="{{ route('compras.comprar') }}" method="POST">
                    @csrf
                    <div class="">

                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                    </div>
                    <label for="producto" class="mb-1">Producto</label>
                    <select class="form-control" name="producto" id="producto">
                        <option disabled selected value="0">Seleccione un producto</option>
                        @foreach ($productos as $producto)
                        <option value="{{ $producto->id }}">{{ $producto->nombre }} ~ {{ $producto->precio }}$</option>
                        @endforeach
                    </select>

                    <button type="submit" class="btn btn-primary mt-3">Comprar producto</button>


                </form>
            </div>

        </div>
    </div>



</div>


@endsection