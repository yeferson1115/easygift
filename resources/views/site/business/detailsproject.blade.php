@extends('layouts.appuser')
@section('title', 'Detalle del pedido')

@section('content')
<style>
    .order-detail-wrapper {
        padding: 0 24px;
    }

    .order-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
        gap: 14px;
        flex-wrap: wrap;
    }

    .order-header-left {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .order-back {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #d7e2ea;
        color: #2b237b;
        font-size: 20px;
        text-decoration: none;
    }

    .order-title {
        font-size: 40px;
        margin: 0;
        font-weight: 700;
        color: #2b237b;
    }

    .order-code {
        color: #65768a;
    }

    .order-help {
        border: 2px solid #1fb55f;
        color: #1fb55f;
        border-radius: 10px;
        font-weight: 600;
        padding: 6px 16px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
    }

    .order-main-card {
        background: #fff;
        border-radius: 28px;
        padding: 34px;
        box-shadow: 0 1px 0 rgba(0, 0, 0, 0.03);
        border: 1px solid #ececec;
    }

    .order-block-title {
        font-size: 38px;
        font-weight: 700;
        color: #414141;
        margin-bottom: 26px;
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        gap: 18px;
        margin-bottom: 10px;
        color: #555;
        font-size: 28px;
    }

    .detail-row .value {
        font-weight: 600;
        color: #4d4d4d;
        text-align: right;
    }

    .detail-row .value.status {
        color: #ec9f11;
        text-decoration: underline;
    }

    .order-divider {
        border: 0;
        border-top: 1px solid #e9e9e9;
        margin: 22px 0;
    }

    .product-line {
        display: flex;
        gap: 12px;
        align-items: center;
    }

    .product-line img {
        width: 64px;
        height: 64px;
        object-fit: cover;
        border-radius: 8px;
    }

    .product-name {
        font-size: 30px;
        font-weight: 700;
        color: #484848;
        margin: 0;
    }

    .product-meta {
        font-size: 24px;
        color: #616161;
        margin: 0;
    }

    .product-price {
        font-weight: 700;
    }

    .timeline-card .timeline {
        padding-left: 0;
        margin: 0;
    }

    .timeline-card .timeline-item {
        padding-left: 60px;
    }

    .timeline-card .timeline-point {
        width: 34px;
        height: 34px;
        line-height: 34px;
        margin-left: -18px;
    }

    .timeline-card h6 {
        font-size: 32px;
        font-weight: 700;
        color: #4b4b4b;
        margin-bottom: 4px;
    }

    .timeline-card p {
        margin: 0;
        color: #777;
        font-size: 22px;
    }

    .evidence-box {
        margin-top: 22px;
        border: 1px solid #e2e2e2;
        border-radius: 22px;
        padding: 22px;
        background: #fafafa;
    }

    @media (max-width: 768px) {
        .order-detail-wrapper {
            padding: 0 10px;
        }

        .order-title {
            font-size: 30px;
        }

        .order-block-title {
            font-size: 28px;
        }

        .detail-row,
        .timeline-card h6,
        .product-name {
            font-size: 20px;
        }

        .timeline-card p,
        .product-meta {
            font-size: 16px;
        }

        .order-main-card {
            padding: 18px;
        }
    }
</style>

<section class="row">
    <div class="col-md-12 order-detail-wrapper">
        <div class="order-header">
            <div class="order-header-left">
                <a href="javascript:history.back()" class="order-back">
                    <i class="bi bi-chevron-left"></i>
                </a>
                <h1 class="order-title">Pedidos: <span class="order-code">#OV{{ $project->id }}</span></h1>
            </div>
            @if($project->comercio!=null && $project->comercio->asesor!=null)
                <a href="https://api.whatsapp.com/send?phone={{ $project->comercio->asesor->whatsapp }}&text=Hola,%20necesito%20ayuda%20con%20mi%20pedido%20{{ $project->id }}" target="_blank" class="order-help">
                    <i class="fa-brands fa-whatsapp"></i> ¿Necesitas ayuda?
                </a>
            @endif
        </div>

        <div class="order-main-card row g-4">
            <div class="col-lg-6">
                <h2 class="order-block-title">Información general:</h2>

                <div class="detail-row"><span>Cliente:</span><span class="value">{{ $project->customer }}</span></div>
                <div class="detail-row"><span>Estado proyecto:</span><span class="value status">En ejecución</span></div>
                <div class="detail-row"><span>Fecha de inicio</span><span class="value">{{ \Carbon\Carbon::parse($project->created_at)->translatedFormat('j M. Y') }}</span></div>

                <hr class="order-divider">

                @foreach($project->productos as $product)
                    <div class="product-line mb-3">
                        @if($project->easybuy==1)
                            <img src="https://kanbai.co/images/images/products/{{ $product->imagen }}" alt="{{ $product->producto }}">
                        @else
                            <img src="https://kanbai.co/images/images/custom_request/{{ $product->imagen }}" alt="{{ $product->producto }}">
                        @endif
                        <div>
                            <p class="product-name">{{ $product->producto }}</p>
                            <p class="product-meta"><span class="product-price">$ {{ number_format($product->price, 0, 0, '.') }}</span> &nbsp;&nbsp; {{ $product->quantity }} uds</p>
                        </div>
                    </div>
                @endforeach

                <hr class="order-divider">

                <div class="detail-row"><span>Valor pedido:</span><span class="value">$ {{ number_format($total, 0, 0, '.') }}</span></div>

                <hr class="order-divider">

                <h2 class="order-block-title" style="margin-bottom: 12px;">Información de envío:</h2>
                <p class="mb-0" style="color:#5d5d5d; font-size:24px; line-height:1.4;">
                    {{ $project->delivery_name ?? $project->customer }}<br>
                    {{ $project->delivery_address ?? 'Dirección no registrada' }}<br>
                    {{ $project->delivery_city ?? '' }}
                    @if(!empty($project->delivery_phone))<br>Cel {{ $project->delivery_phone }}@endif
                </p>
            </div>

            <div class="col-lg-6 timeline-card">
                <h2 class="order-block-title">Timeline del proyecto:</h2>

                <ul class="timeline timeline-kn container">
                    <li class="timeline-item element" id='div_1'>
                        <span class="timeline-point timeline-point-indicator timeline-kanbai-active">1</span>
                        <div class="timeline-event row">
                            <div class="col-md-12">
                                <h6>Pedido confirmado</h6>
                                <p>{{ \Carbon\Carbon::parse($project->created_at)->format('d/m/y g:ia') }}</p>
                            </div>
                        </div>
                    </li>
                    @foreach($project->timeline as $key => $item)
                        <li class="timeline-item element" id='div_{{ $key + 2 }}'>
                            <span class="timeline-point timeline-point-indicator timeline-kanbai-active">{{ $key + 2 }}</span>
                            <div class="timeline-event row">
                                <div class="col-md-12">
                                    <h6>{{ $item->description }}</h6>
                                    <p>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/y g:ia') }}</p>
                                    @if($item->file!=null)
                                        <img style="max-width: 100%; border-radius: 14px; margin-top: 8px;" class="mb-1" src="{{ asset('images/projects/'.$item->file.'') }}">
                                    @endif
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>

                @if($project->guia!=null)
                    <div class="evidence-box">
                        <h2 class="order-block-title" style="margin-bottom: 14px;">Evidencias despacho:</h2>
                        <div class="detail-row"><span>Número de guía:</span><span class="value">{{ $project->guia }}</span></div>
                        <div class="detail-row"><span>Empresa:</span><span class="value">{{ $project->empresa }}</span></div>

                        @if ($project->imagenes)
                            <div class="mt-2">
                                @foreach ($project->imagenes as $img)
                                    <img src="{{ asset($img) }}" alt="imagen" width="80" height="80" class="img-thumbnail img-ampliable me-2 mb-2 rounded" style="object-fit: cover; cursor: zoom-in;">
                                @endforeach
                            </div>
                        @endif

                        @if ($project->videos)
                            <div class="mt-2">
                                @foreach ($project->videos as $vid)
                                    <video width="150" controls class="mb-2 me-2">
                                        <source src="{{ asset($vid) }}" type="video/mp4">
                                        Tu navegador no soporta videos.
                                    </video>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modalGaleria" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content bg-dark bg-opacity-75 border-0">
            <div class="modal-body d-flex justify-content-center align-items-center position-relative p-0">
                <img id="imagenGaleria" src="" class="img-fluid rounded shadow" style="max-height: 90vh; max-width: 90vw;">
                <button type="button" class="btn btn-light position-absolute top-0 end-0 m-3" data-bs-dismiss="modal">&times;</button>
                <button type="button" class="btn btn-light position-absolute start-0 top-50 translate-middle-y ms-3" id="anteriorImagen">‹</button>
                <button type="button" class="btn btn-light position-absolute end-0 top-50 translate-middle-y me-3" id="siguienteImagen">›</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/app/user/create.js') }}"></script>
<script>
    let imagenesGaleria = [];
    let indiceActual = 0;

    $(document).on('click', '.img-ampliable', function() {
        imagenesGaleria = $('.img-ampliable').map(function() {
            return $(this).attr('src');
        }).get();

        let src = $(this).attr('src');
        indiceActual = imagenesGaleria.indexOf(src);
        mostrarImagen(indiceActual);
        $('#modalGaleria').modal('show');
    });

    function mostrarImagen(indice) {
        $('#imagenGaleria').attr('src', imagenesGaleria[indice]);
    }

    $('#siguienteImagen').click(function() {
        if (indiceActual < imagenesGaleria.length - 1) {
            indiceActual++;
            mostrarImagen(indiceActual);
        }
    });

    $('#anteriorImagen').click(function() {
        if (indiceActual > 0) {
            indiceActual--;
            mostrarImagen(indiceActual);
        }
    });
</script>
@endpush
