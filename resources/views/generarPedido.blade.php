@extends('master')

@section('pestaña')
  <title>Generar pedido</title>
@endsection


@section('titulo')
  <div class="row">
    <h1 class="col-8">Pedido</h1>
    <a href="{{ url('/ordenarProductos') }}" class="btn btn-success col-3 align-self-start">
      Seleccionar productos
    </a>
  </div>
@endsection


@section('contenido')
  <form action="{{ url('/grabarPedido') }}" method="POST">
    @csrf

    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Importe</th>
            <th>Opciones</th>
          </tr>
        </thead>
        <tbody>
          @php $suma = 0; @endphp

          @foreach($ordenado as $ordenados)
            <tr>
              <td>{{ $ordenados->nombre }}</td>
              <td>
                <img src="{{ asset('img/'.$ordenados->imagen) }}" alt="Imagen de {{ $ordenados->nombre }}" style="width:100px;height:60px;" />
              </td>
              <td>{{ $ordenados->precio }}</td>
              <td>{{ $ordenados->cantidad }}</td>
              <td>{{ $ordenados->precio * $ordenados->cantidad }}</td>
              <td>
                <a href="" class="btn btn-primary btn-sm" aria-label="Incrementar cantidad">+</a>
                <a href="" class="btn btn-secondary btn-sm" aria-label="Decrementar cantidad">-</a>
              </td>
            </tr>

            @php
              $suma += $ordenados->precio * $ordenados->cantidad;
            @endphp
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="row mb-3 align-items-center">
      <label class="col-8 text-end" for="total">Total pedido:</label>
      <input id="total" type="text" class="col-3 align-self-start" name="total" readonly value="{{ $suma }}" required>
    </div>

    <div class="row mb-2">
      <label class="col-2" for="cliente_nombre">Nombre</label>
      <input id="cliente_nombre" type="text" class="col-4" name="nombre" required>
    </div>

    <div class="row mb-2">
      <label class="col-2" for="origen">Origen</label>
      <input id="origen" type="text" class="col-4" name="origen" required>
    </div>

    <div class="row mb-2">
      <label class="col-2" for="fecha">Fecha</label>
      <input id="fecha" type="datetime" class="col-4" name="fecha" value="<?php $currentDateTime = new DateTime('now'); echo $currentDateTime->format('Y-m-d H:i:s'); ?>">

      <input type="submit" class="btn btn-primary col-3 ms-5" value="Grabar pedido">
    </div>
  </form>
@endsection
