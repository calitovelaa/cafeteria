@extends('master')

@section('pestaña')
    <style>
        :root {
            --primary-color: #6F4E37;
            --secondary-color: #8B6F47;
            --accent-color: #A0826D;
            --cta-color: #9B7653;
            --highlight: #D4C5B9;
            --earth: #5C4A39;
            --paper: #F8F7F5;
            --text-dark: #3E3E3E;
            --text-light: #ffffff;
        }

        html, body {
            height: 100%;
        }

        body {
            background-color: var(--paper);
            color: var(--text-dark);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1 0 auto;
        }

        h1, h2, h3 {
            color: var(--primary-color);
        }

        .hero {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: var(--text-light);
            padding: 80px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero h1 {
            color: var(--text-light);
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.3rem;
            margin-bottom: 30px;
            opacity: 0.95;
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2rem;
            }

            .hero p {
                font-size: 1rem;
            }
        }
    </style>
@endsection

@section('contenido')
    <section class="hero">
        <div class="hero-content">
            <h1>Ordenar Productos</h1>
            <p>Gestiona y realiza tus pedidos de café favorito</p>
        </div>
    </section>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div style="border-radius: 15px; overflow: hidden; box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1); padding: 30px; background-color: white;">
                    <h2 class="mb-4">Productos Disponibles</h2>
                    
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Imagen</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($productos as $producto)
                                <tr>
                                    <td>{{ $producto->id }}</td>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>${{ $producto->precio }}</td>
                                    <td> 
                                        @if($producto->imagen)
                                            <img src="{{ asset('img/' . $producto->imagen) }}"
                                             alt="{{ $producto->nombre }}" 
                                             class="img-fluid"
                                             style="width: 100px; height: auto;">
                                             @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('/agregarProducto') }}/{{ $producto->id }}"
                                            class="btn btn-primary btn-sm">Agregar</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
