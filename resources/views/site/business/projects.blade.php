@extends('layouts.appheaderlogo')
@section('title', 'Pedidos')
@section('content')

<section class="row pedidos-page">
    <div class="col-md-12 pedidos-container">
        <a href="javascript:history.back()" class="previos-profile">
            <i class="bi bi-arrow-left-circle"></i> Volver
        </a>

        <div class="pedidos-header">
            <div>
                <h2 class="pedidos-title mb-2">Pedidos</h2>
                <div class="pedidos-resumen">
                    <span class="badge rounded-pill pedidos-badge pedidos-badge-total">
                        <span class="pedidos-badge-dot"></span>
                        Total pedidos: {{ $projects->count() }}
                    </span>
                    <span class="badge rounded-pill pedidos-badge pedidos-badge-warning">
                        <span class="pedidos-badge-dot"></span>
                        En preparación: {{ $projects->where('state', 0)->count() }}
                    </span>
                    <span class="badge rounded-pill pedidos-badge pedidos-badge-success">
                        <span class="pedidos-badge-dot"></span>
                        Enviados: {{ $projects->where('state', 1)->count() }}
                    </span>
                    <span class="badge rounded-pill pedidos-badge pedidos-badge-info">
                        <span class="pedidos-badge-dot"></span>
                        Entregados: {{ $projects->where('state', 2)->count() }}
                    </span>
                </div>
            </div>

            <a class="btn pedidos-export-btn" href="{{ route('projects.export') }}">
                <i class="bi bi-download"></i>
                Descargar CSV
            </a>
        </div>

        <div class="pedidos-table-card">
            <div class="table-responsive">
                <table class="table align-middle mb-0 pedidos-table">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Fecha</th>
                            <th># Orden</th>
                            <th>Nombre</th>
                            <th>Valor</th>
                            <th>Qty</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($projects as $item)
                            @php
                                $firstProduct = $item->productos->first();
                                $imagePath = $item->easybuy == 1
                                    ? 'https://kanbai.co/images/images/products/'
                                    : 'https://kanbai.co/images/images/custom_request/';
                                $qty = $item->productos->sum('quantity');
                            @endphp
                            <tr>
                                <td>
                                    @if ($firstProduct && $firstProduct->imagen)
                                        <img
                                            class="pedido-image"
                                            src="{{ $imagePath . $firstProduct->imagen }}"
                                            alt="{{ $firstProduct->producto }}"
                                        >
                                    @else
                                        <span class="pedido-image pedido-placeholder"></span>
                                    @endif
                                </td>
                                <td>{{ \\Carbon\\Carbon::parse($item->created_at)->translatedFormat('M d/y') }}</td>
                                <td>{{ $item->no_project }}</td>
                                <td>{{ $firstProduct->producto ?? 'Sin nombre' }}</td>
                                <td>${{ number_format($item->total, 0, 0, '.') }}</td>
                                <td>{{ $qty }}</td>
                                <td>
                                    @if ($item->state == 0)
                                        <span class="estado estado-proceso">En preparación</span>
                                    @elseif($item->state == 1)
                                        <span class="estado estado-enviado">Enviado</span>
                                    @else
                                        <span class="estado estado-entregado">Entregado</span>
                                    @endif
                                </td>
                                <td>
                                    <a
                                        class="btn pedidos-action-btn"
                                        href="{{ route('pedidosempresa.show', $item->encode_id) }}"
                                        title="Ver detalles"
                                    >
                                        Ver detalles
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-5 text-muted">Aún no tienes pedidos registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
    <style>
        .pedidos-page {
            background: #f3f4f6;
            padding-bottom: 2.5rem;
        }

        .pedidos-container {
            padding: 0 30px;
        }

        .pedidos-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .pedidos-title {
            color: #271f7e;
            font-size: 2rem;
            font-weight: 800;
        }

        .pedidos-resumen {
            display: flex;
            flex-wrap: wrap;
            gap: 0.65rem;
        }

        .pedidos-resumen {
            display: flex;
            flex-wrap: wrap;
            gap: 0.65rem;
        }

        .pedidos-badge {
            font-size: 0.96rem;
            border: 1px solid;
            padding: 0.5rem 0.95rem;
            display: inline-flex;
            align-items: center;
            gap: 0.55rem;
            font-weight: 700;
        }

        .pedidos-badge-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: currentColor;
            display: inline-block;
            opacity: 0.9;
        }

        .pedidos-badge-total {
            color: #3f46d3;
            background-color: #eef0ff;
            border-color: #d9ddff;
        }

        .pedidos-badge-warning {
            color: #c97800;
            background-color: #fff6e6;
            border-color: #f6deb0;
        }

        .pedidos-badge-success {
            color: #11833f;
            background-color: #e9f9ef;
            border-color: #c8edda;
        }

        .pedidos-badge-info {
            color: #2b63b8;
            background-color: #ebf3ff;
            border-color: #cfe1ff;
        }

        .pedidos-export-btn {
            border-radius: 12px;
            background-color: #060606;
            color: #fff;
            font-weight: 700;
            padding: 0.55rem 1.15rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .pedidos-export-btn:hover {
            color: #fff;
            opacity: 0.93;
        }

        .pedidos-table-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 1.6rem;
            overflow: hidden;
            box-shadow: 0 2px 12px rgba(16, 24, 40, 0.04);
        }

        .pedidos-table {
            margin-bottom: 0;
        }

        .pedidos-table thead th {
            font-weight: 700;
            color: #5e7090;
            border-bottom: 2px dashed #e4e7ec;
            background-color: #fff;
            white-space: nowrap;
            padding: 1.3rem 1rem;
            font-size: 1.05rem;
        }

        .pedidos-table tbody td {
            padding: 1.05rem 1rem;
            color: #505a6d;
            font-weight: 600;
            border-top: 1px solid #eef1f5;
            vertical-align: middle;
        }

        .pedido-image {
            width: 52px;
            height: 52px;
            border-radius: 0.75rem;
            object-fit: cover;
            display: inline-block;
            background-color: #e5e7eb;
        }

        .pedido-placeholder {
            background-color: #d1d5db;
        }

        .estado {
            font-weight: 800;
            text-decoration: underline;
        }

        .estado-proceso {
            color: #d28600;
        }

        .estado-enviado {
            color: #15803d;
        }

        .estado-entregado {
            color: #1d4ed8;
        }

        .pedidos-action-btn {
            border-radius: 10px;
            background: #6366f1;
            color: #fff;
            font-weight: 700;
            padding: 0.45rem 1rem;
            line-height: 1;
        }

        .pedidos-action-btn:hover {
            color: #fff;
            opacity: 0.92;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('js/app/user/create.js') }}"></script>
@endpush
