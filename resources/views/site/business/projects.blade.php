@extends('layouts.appheaderlogo')
@section('title', 'Pedidos')
@section('content')

<section class="row pedidos-page">
    <div class="col-md-12 pedidos-container">
        <div class="pedidos-header">
            <div class="pedidos-header-left">
                <h2 class="pedidos-title">Pedidos</h2>
                <div class="pedidos-resumen">
                    <span class="badge rounded-pill pedidos-badge pedidos-badge-total">
                        Total pedidos: {{ $projects->count() }}
                    </span>
                    <span class="badge rounded-pill pedidos-badge pedidos-badge-warning">
                        <span class="pedidos-badge-dot"></span>
                        En curso: {{ $projects->where('state', 0)->count() }}
                    </span>
                </div>
            </div>

            <a class="btn pedidos-export-btn" href="{{ route('projects.export', ['source' => 'pedidos']) }}">
                <i class="bi bi-download"></i>
                Descargar CSV
            </a>
        </div>

        <div class="pedidos-table-card" style="padding: 50px 20px;">
            <div class="table-responsive">
                <table class="table align-middle mb-0 pedidos-table" id="pedidos-datatable">
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
            background: #eff1f5;
            min-height: calc(100vh - 90px);
            padding: 2.25rem 0 2.5rem;
        }

        .pedidos-container {
            padding: 0 54px;
        }

        .pedidos-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 1.35rem;
            flex-wrap: wrap;
        }

        .pedidos-header-left {
            display: flex;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .pedidos-title {
            color: #241f7a;
            font-size: 2.2rem;
            line-height: 1;
            margin: 0;
            font-weight: 800;
        }

        .pedidos-resumen {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            margin-top: 2px;
        }

        .pedidos-badge {
            font-size: 0.9rem;
            border: 1px solid;
            padding: 0.38rem 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            font-weight: 700;
        }

        .pedidos-badge-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: currentColor;
            display: inline-block;
        }

        .pedidos-badge-total {
            color: #4348d9;
            background: #ecefff;
            border-color: #d9ddff;
        }

        .pedidos-badge-warning {
            color: #d07a00;
            background: #fff7e8;
            border-color: #f0e1bc;
        }

        .pedidos-export-btn {
            border-radius: 11px;
            background: #030303;
            color: #fff;
            font-weight: 700;
            font-size: 1.02rem;
            padding: 0.56rem 1.3rem;
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
        }

        .pedidos-export-btn:hover {
            color: #fff;
            opacity: 0.92;
        }

        .pedidos-table-card {
            background: #fff;
            border: 1px solid #e3e4e8;
            border-radius: 1.8rem;
            overflow: hidden;
            box-shadow: 0 2px 12px rgba(16, 24, 40, 0.04);
        }

        .pedidos-table {
            margin-bottom: 0;
        }

        .pedidos-table {
            margin-bottom: 0;
        }

        .pedidos-table thead th {
            font-weight: 700;
            color: #637793;
            border-bottom: 2px dashed #e7e7ec;
            background: #fff;
            white-space: nowrap;
            padding: 1.15rem 1rem;
            font-size: 1.03rem;
        }

        .pedidos-table tbody td {
            padding: 0.95rem 1rem;
            color: #5b5d64;
            font-weight: 600;
            border-top: 1px solid #ececf1;
            vertical-align: middle;
            font-size: 1.02rem;
        }

        .pedido-image {
            width: 52px;
            height: 52px;
            border-radius: 11px;
            object-fit: cover;
            display: inline-block;
            background: #ececef;
        }

        .pedido-placeholder {
            background: #dbdde0;
        }

        .estado {
            font-weight: 800;
            text-decoration: underline;
        }

        .estado-proceso {
            color: #e28b00;
        }

        .estado-enviado {
            color: #11813d;
        }

        .estado-entregado {
            color: #2b62b4;
        }

        .pedidos-action-btn {
            border-radius: 10px;
            background: #6366f1;
            color: #fff;
            font-weight: 700;
            padding: 0.43rem 1.05rem;
            line-height: 1;
            border: 0;
        }

        .pedidos-action-btn:hover {
            color: #fff;
            opacity: 0.92;
        }

        @media (max-width: 991.98px) {
            .pedidos-container {
                padding: 0 20px;
            }

            .pedidos-header-left {
                gap: 0.8rem;
            }

            .pedidos-title {
                font-size: 1.9rem;
            }
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
    <script>
        $(function () {
            $('#pedidos-datatable').DataTable({
                pageLength: 10,
                lengthMenu: [10, 25, 50, 100],
                order: [[1, 'asc']],
                responsive: true,
                language: {
                    search: 'Buscar:',
                    lengthMenu: 'Mostrar _MENU_ pedidos',
                    info: 'Mostrando _START_ a _END_ de _TOTAL_ pedidos',
                    infoEmpty: 'Mostrando 0 a 0 de 0 pedidos',
                    zeroRecords: 'No se encontraron pedidos',
                    paginate: {
                        first: 'Primero',
                        last: 'Último',
                        next: 'Siguiente',
                        previous: 'Anterior'
                    }
                }
            });
        });
    </script>
@endpush
