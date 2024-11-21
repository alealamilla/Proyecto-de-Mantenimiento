@extends('layouts.app')

@section('template_title')
    Dashboard
@endsection

@section('content')
    <div class="container">
        <h1 id="card_title" class="text-primary text-uppercase">Dashboard de Status Recepciones</h1>

        <!-- Filtro de fecha -->
        <form action="{{ route('dashboard') }}" method="GET">
            <div class="row">
                <div class="col-4">

                    {{-- <label for="date_filter">Filtrar por fecha:</label> --}}
                    <input type="date" name="date_filter" class="form-control"
                        value="{{ old('date_filter', $dateFilter) }}">
                </div>
                <div class="col-3">
                    <button class="btn btn-primary" type="submit">Filtrar</button>
                </div>
            </div>
        </form>
        {{-- <!-- Botón para mostrar todos los registros -->
        @if ($dateFilter)
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Mostrar todos los registros</a>
        @endif --}}

        <!-- Gráfica de estatus -->
        <canvas id="statusChart"></canvas>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('statusChart').getContext('2d');
        const statusChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['En espera', 'En proceso', 'Finalizado'],
                datasets: [{
                    label: 'Número de solicitudes',
                    data: [
                        {{ $statusesCount[1] ?? 0 }}, // "En espera"
                        {{ $statusesCount[2] ?? 0 }}, // "En proceso"
                        {{ $statusesCount[3] ?? 0 }} // "Finalizado"
                    ],
                    backgroundColor: [
                        'rgba(255, 182, 193, 0.5)', // Pastel Rojo para "En espera"
                        'rgba(255, 255, 153, 0.5)', // Pastel Amarillo para "En proceso"
                        'rgba(144, 238, 144, 0.5)' // Pastel Verde para "Finalizado"
                    ],
                    borderColor: [
                        'rgba(255, 182, 193, 1)', // Pastel Rojo para "En espera"
                        'rgba(255, 255, 153, 1)', // Pastel Amarillo para "En proceso"
                        'rgba(144, 238, 144, 1)' // Pastel Verde para "Finalizado"
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    </div>
    {{-- <script src="{{ asset('js/works.js') }}" defer></script> --}}
@endpush
