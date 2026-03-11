@extends('layouts.appuser')
@section('title', 'Pedidos')

<section class="row">
    <div class="col-md-12" style="padding: 0px 30px;">
        <a href="javascript:history.back()" class="previos-profile">
            <i class="bi bi-arrow-left-circle"></i> Volver
        </a>

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
            <div>
                <h2 class="pedidos-title mb-2">Pedidos</h2>
                <div class="d-flex flex-wrap gap-2">
                    <span class="badge rounded-pill text-bg-light pedidos-badge">Total pedidos: {{ $projects->count() }}</span>
                    <span class="badge rounded-pill pedidos-badge pedidos-badge-warning">En curso: {{ $projects->where('state', 0)->count() }}</span>
                </div>
            </div>
        </div>

        <div class="card pedidos-table-card">
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
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('M d/y') }}</td>
                                <td>{{ $item->no_project }}</td>
                                <td>{{ $firstProduct?->producto ?? 'Pedido personalizado' }}</td>
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
                                        class="btn btn-primary btn-sm px-3 rounded-pill"
                                        href="{{ route('pedidosempresa.show', $item->encode_id) }}"
                                        title="Ver detalles"
                                    >
                                        Ver detalles
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4 text-muted">Aún no tienes pedidos registrados.</td>
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
        .pedidos-wrapper {
            padding-bottom: 2rem;
        }

        .pedidos-title {
            color: #271f7e;
            font-size: 2rem;
            font-weight: 700;
        }

        .pedidos-badge {
            color: #586b8e;
            font-size: 0.95rem;
            border: 1px solid #d8ddea;
            padding: 0.5rem 0.9rem;
        }

        .pedidos-badge-warning {
            color: #b67200;
            background-color: #fff7e7;
            border-color: #f9e3b6;
        }

        .pedidos-table-card {
            border-radius: 1.25rem;
            border: 1px solid #e5e7eb;
            overflow: hidden;
        }

        .pedidos-table thead th {
            font-weight: 700;
            color: #64748b;
            border-bottom: 1px dashed #d8ddea;
            background-color: #fff;
            white-space: nowrap;
        }

        .pedidos-table tbody td {
            padding-top: 1rem;
            padding-bottom: 1rem;
            color: #4b5563;
            font-weight: 600;
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
            background-color: #e5e7eb;
        }

        .estado {
            font-weight: 700;
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
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('js/app/user/create.js') }}"></script>
@endpush
