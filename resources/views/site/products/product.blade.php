@extends('layouts.app')
@section('title', 'Inicio')
@section('content')
<!-- ======= product Section ======= -->
<section class="section-agents section-t8 mt-5 product-desk only-product-desk">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6">
                <div id="main-slider" class="splide">
                    <div class="splide__track">
                        <ul class="splide__list small-demo">
                            @foreach($product->gallery as $item)
                                <li class="splide__slide">
                                    <a href="https://kanbai.co/images/products/thumbnail/{{ $item->file }}">
                                        <img src="https://kanbai.co/images/products/thumbnail/{{ $item->file }}" />
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <ul id="thumbnails" class="thumbnails small-demo1">
                    @foreach($product->gallery as $item)
                        <li class="thumbnail">
                            <a href="https://kanbai.co/images/products/{{ $item->file }}">
                                <img src="https://kanbai.co/images/products/thumbnail/list/{{ $item->file }}" />
                            </a>
                        </li>
                    @endforeach
                </ul>

            </div>
            <div class="col-md-6">
                <h2 class="title-product-view mb-3">{{$product->name}}</h2>
                 @if(!is_null($product->delivery_time))
                <label class="delivery-time mb-3">
                    <i class="fa fa-truck" aria-hidden="true"></i>
                    Entrega: <span>{{$product->delivery_time }} </span>
                </label>
                @endif

                <div class="col-md-12">
                    @if(count($product->colores)>0)
                        <label style="display: block;">Elige Color:</label>
                        <div style="display: inline-flex;">
                            <ul class="list-color">
                                @foreach($product->colores as $color)
                                    <li><label id="color_{{$color->id}}" onclick="selectColor({{$color->id}},'{{$color->file}}');" style="background: {{$color->color}};cursor:pointer;"></label></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(count($product->tallas)>0)
                        <label style="display: block;">Tallas disponibles:</label>
                        <div style="display: inline-flex;width: 100%;">
                            <ul class="list-tallas">
                                @foreach($product->tallas as $talla)
                                    <li><label id="talla_{{$talla->id}}" onclick="selectTalla({{$talla->id}});" style="cursor:pointer;position: relative;">{{$talla->talla}}</label></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="row mt-2 mb-4">
                    <div class="col-md-6"><label class="text-price">${{number_format($pricemax, 0, 0, '.')}}</label> IVA Incl.</div>
                  
                </div>
                @include('site.products.partials.formquantity')
                <hr>
                {!! $product->description !!}


            </div>

        </div>
        <!--Preguntas Frecuentes-->
        <div class="container my-5 faq-section">

            @if(count($product->questions)>0)
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <h2 class="text-center mb-5 fw-bold faq-title">
                        Preguntas frecuentes
                    </h2>

                    <div class="accordion faq-accordion" id="accordionExample">

                        @foreach($product->questions as $index => $q)
                        <div class="accordion-item faq-item">
                            <h2 class="accordion-header" id="heading{{$q->id}}">
                                <button class="accordion-button collapsed faq-button"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{$q->id}}"
                                        aria-expanded="false"
                                        aria-controls="collapse{{$q->id}}">

                                    {{$q->question}}

                                    <span class="faq-icon">
                                        <i class="fa-solid fa-chevron-down"></i>
                                    </span>
                                </button>
                            </h2>

                            <div id="collapse{{$q->id}}"
                                class="accordion-collapse collapse"
                                aria-labelledby="heading{{$q->id}}"
                                data-bs-parent="#accordionExample">

                                <div class="accordion-body faq-body">
                                    {{$q->answer}}
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            @endif

        </div>

    </div>



</section><!-- End product Section -->
<!-- ======= product Section ======= -->
<section class="section-agents section-t8 mt-3 product-mobile only-product-mobile">
    <div class="container">
        <div class="row ">            
            <div class="col-md-12">
                <div id="galleryproduct" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @foreach($product->gallery as $key=>$item)
                        <button type="button" data-bs-target="#galleryproduct" data-bs-slide-to="{{$key}}" class="@if($key==0) active @endif" aria-label="Slide {{$key}}"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner small-demo2">
                        @foreach($product->gallery as $key=>$item)
                        <div class="carousel-item @if($key==0) active @endif">
                            <a href="https://kanbai.co/images/images/products/thumbnail/{{$item->file}}">
                                <img src="https://kanbai.co/images/products/thumbnail/{{ $item->file }}" alt="{{$item->name}}" class="img-d img-fluid image-list" style="max-height: initial;">
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#galleryproduct" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#galleryproduct" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Siguiente</span>
                    </button>
                </div>
            </div>
            <div class="col-md-12 ">
                <h2 class="title-product-view mb-2 mt-2">{{$product->name}}</h2>
                <!--<span class="seller"><i class="bi bi-star-fill"></i> Seller verificado</span>-->
            </div>
            <div class="col-md-12 mt-2">
                 @if(!is_null($product->delivery_time))
                    <label class="delivery-time mb-3">
                        <i class="fa fa-truck" aria-hidden="true"></i>
                        Entrega: <span>{{$product->delivery_time }} </span>
                    </label>
                @endif
            </div>
            <div class="col-md-12">
            @if(count($product->colores)>0)
            <label style="display: block;">Elige Color:</label>
                <div style="display: inline-flex;">
                    <ul class="list-color">
                        @foreach($product->colores as $color)
                            <li><label id="color_mobile_{{$color->id}}" onclick="selectColorMobile({{$color->id}},'{{$color->file}}');"style="background: {{$color->color}};cursor:pointer;"></label></li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(count($product->tallas)>0)
            <label style="display: block;">Tallas disponibles:</label>
                <div style="display: inline-flex;width: 100%;">
                    <ul class="list-tallas">
                        @foreach($product->tallas as $talla)
                            <li><label id="talla_mobile_{{$talla->id}}" onclick="selectTallaMobile({{$talla->id}});" style="cursor:pointer;position: relative;">{{$talla->talla}}</label></li>
                        @endforeach
                    </ul>
                </div>
            @endif
            </div>

            <div class="row mt-2">
                <div class="col-6">
                    <label class="text-price">${{number_format($pricemax, 0, 0, '.')}} </label> IVA Incl.
                </div>
                   
            </div>
            @include('site.products.partials.formquantitymobile')
                

            <div class="col-md-12 mt-3">
                <hr>
            </div>
            <div class="col-md-12 mt-3">
                <h2 class="title-product-view mb-3">Especificaciones</h2>
                {!! $product->description !!}
                <!--<div class="mt-4">
                    <a href="/catalogo/cotizacion/porducto/{{$product->id}}" class="btn btn-go-quotation btn-lg">Solicitar Cotización</a>
                </div>-->
            </div>
            <div class="col-md-12 mt-3">
                <hr>
            </div>
            <!--Preguntas Frecuentes-->
        <div class="container my-5 faq-section">

            @if(count($product->questions)>0)
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <h2 class="text-center mb-5 fw-bold faq-title">
                        Preguntas frecuentes
                    </h2>

                    <div class="accordion faq-accordion" id="accordionExample">

                        @foreach($product->questions as $index => $q)
                        <div class="accordion-item faq-item">
                            <h2 class="accordion-header" id="heading{{$q->id}}">
                                <button class="accordion-button collapsed faq-button"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{$q->id}}"
                                        aria-expanded="false"
                                        aria-controls="collapse{{$q->id}}">

                                    {{$q->question}}

                                    <span class="faq-icon">
                                        <i class="fa-solid fa-chevron-down"></i>
                                    </span>
                                </button>
                            </h2>

                            <div id="collapse{{$q->id}}"
                                class="accordion-collapse collapse"
                                aria-labelledby="heading{{$q->id}}"
                                data-bs-parent="#accordionExample">

                                <div class="accordion-body faq-body">
                                    {{$q->answer}}
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            @endif

        </div>
        </div>
    </div>

   
</section><!-- End product Section -->
@endsection
@push('scripts')
<script>
$(document).ready(function() {
    let $gallery = new SimpleLightbox('.small-demo a', {});
    let $gallery1 = new SimpleLightbox('.small-demo1 a', {});
    let $gallery2= new SimpleLightbox('.small-demo2 a', {});

    var myCarousel = document.querySelector('#galleryproduct')
    var carousel = new bootstrap.Carousel(myCarousel, {
        interval: 2000,
        wrap: false
    })


    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 4,
        spaceBetween: 15,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },

        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },

    });


    var splide = new Splide('#main-slider', {
        pagination: false,
    });


    var thumbnails = document.getElementsByClassName('thumbnail');
    var current;


    for (var i = 0; i < thumbnails.length; i++) {
        initThumbnail(thumbnails[i], i);
    }


    function initThumbnail(thumbnail, index) {
        thumbnail.addEventListener('click', function() {
            splide.go(index);
        });
    }


    splide.on('mounted move', function() {
        var thumbnail = thumbnails[splide.index];


        if (thumbnail) {
            if (current) {
                current.classList.remove('is-active');
            }


            thumbnail.classList.add('is-active');
            current = thumbnail;
        }
    });


    splide.mount();


});

function selectColor(color,file){
    var path="https://kanbai.co/images/products/color/";
    if(file!=''){
        $('li.is-active  img').attr('src', path+'/'+file);
    }    
    $('.color-active i').remove();
    $('.color-active').removeClass('color-active');
    $('#color_'+color).append('<i class="fa fa-check" aria-hidden="true"></i>');
    $('#color_'+color).addClass('color-active');
    $('#color').val(color);
}
function selectColorMobile(color,file){
    var path="https://kanbai.co/images/products/color/";
    if(file!=''){
        $('div.carousel-inner div.active  img').attr('src', path+'/'+file);
    }  
    $('.color-active i').remove();
    $('.color-active').removeClass('color-active');
    $('#color_mobile_'+color).append('<i class="fa fa-check" aria-hidden="true"></i>');
    $('#color_mobile_'+color).addClass('color-active');
    $('#color_mobile').val(color);
}

function selectTalla(talla){
    $('.talla-active i').remove();
    $('.talla-active').removeClass('talla-active');
    $('#talla_'+talla).append('<i class="fa fa-check" aria-hidden="true"></i>');
    $('#talla_'+talla).addClass('talla-active');
    $('#size').val(talla);
}

function selectTallaMobile(talla){
    $('.talla-active i').remove();
    $('.talla-active').removeClass('talla-active');
    $('#talla_mobile_'+talla).append('<i class="fa fa-check" aria-hidden="true"></i>');
    $('#talla_mobile_'+talla).addClass('talla-active');
    $('#size_mobile').val(talla);
}



</script>
@endpush
