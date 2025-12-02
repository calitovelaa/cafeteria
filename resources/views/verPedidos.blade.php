@extends('master')

@section('pestaña')
  <title>Ver Pedidos</title>
@endsection

@section('titulo')
  <div class="row">
    <h1 class="col-8">Pedidos</h1>
    <a href="{{ route('ordenarProductos') }}" class="btn btn-success col-3 align-self-start">
      Crear Pedido
    </a>
  </div>
@endsection

@section('contenido')
  @if($pedidos->isEmpty())
    <div class="alert alert-info" role="alert">
      No hay pedidos registrados.
    </div>
  @else
    <div class="table-responsive">
      <table class="table table-hover">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Nombre Cliente</th>
            <th>Origen</th>
            <th>Fecha</th>
            <th>Total</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($pedidos as $pedido)
            <tr>
              <td>{{ $pedido->id }}</td>
              <td>{{ $pedido->nombre }}</td>
              <td>{{ $pedido->origen }}</td>
              <td>{{ $pedido->fecha }}</td>
              <td>${{ number_format($pedido->total, 2) }}</td>
              <td>
                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detalleModal{{ $pedido->id }}">
                  Ver Detalles
                </button>
                <form action="{{ route('eliminarPedido', $pedido->id) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar este pedido y todos sus detalles?');">
                    Eliminar
                  </button>
                </form>
              </td>
            </tr>

            <div class="modal fade" id="detalleModal{{ $pedido->id }}" tabindex="-1" aria-labelledby="detalleModalLabel{{ $pedido->id }}" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="detalleModalLabel{{ $pedido->id }}">Detalles del Pedido #{{ $pedido->id }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p><strong>Cliente:</strong> {{ $pedido->nombre }}</p>
                    <p><strong>Origen:</strong> {{ $pedido->origen }}</p>
                    <p><strong>Fecha:</strong> {{ $pedido->fecha }}</p>
                    
                    <h5>Productos:</h5>
                    <div class="table-responsive">
                      <table class="table table-sm table-bordered">
                        <thead>
                          <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Importe</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($pedido->detalles as $detalle)
                            <tr>
                              <td>{{ $detalle->nombre }}</td>
                              <td>${{ number_format($detalle->precio, 2) }}</td>
                              <td>{{ $detalle->cantidad }}</td>
                              <td>${{ number_format($detalle->precio * $detalle->cantidad, 2) }}</td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </tbody>
      </table>
    </div>
  @endif
@endsection
