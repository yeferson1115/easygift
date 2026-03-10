@extends('layouts.app')
@section('title', 'Inicio')
@section('content')
<!-- END SERVICES -->
<section class="section-agents section-t8 home">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner carousel-inner-home">
            @if((new \Jenssegers\Agent\Agent())->isDesktop() || (new \Jenssegers\Agent\Agent())->isTablet())
            @foreach($banners as $key=>$banner)
            <div class="carousel-item @if($key==0) active @endif desk">
                <a target="_blank" href="{{$banner->url_desk}}">
                    <img src="https://kanbai.co/images/banners/desktop/{{ $banner->imagedesk }}" class="d-block w-100" alt="...">
                </a>
            </div>
            @endforeach
            @endif
            @if((new \Jenssegers\Agent\Agent())->isMobile())
            @foreach($banners as $key=>$banner)
            <div class="carousel-item @if($key==0) active @endif banner-mobile">
                <a target="_blank" href="{{$banner->url_mobile}}">
                    <img src="https://kanbai.co/images/banners/mobile/{{ $banner->imagemobile }}" class="d-block w-100" >
                </a>
            </div>
            @endforeach
            @endif
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container">
        <div class="row mb-3 align-items-center">

            <div class="col-sm-6 text-start">
                <h2 class="mt-5 mb-5 title-asy tittle-home-cat">
                    Regalos para cada ocasión
                </h2>
            </div>

            <div class="col-sm-6 text-end d-m-none">
                <a href="/catalogo/{{$categories->slug}}" class="view-more">
                    Ver todas <i class="fa-solid fa-angle-right"></i>
                </a>
            </div>

        </div>
        <div class="row">
            @foreach($categories->subcategories as $item)
            
            
            <div class="col-md-3 col-6 categories-home text-center mb-4" onclick="location.href='/catalogo/{{$categories->slug}}/{{$item->slug}}'">
                <div class="content-category-home">
                    <div class="btn-categories">
                        <img class="image-subcategory-list-product" src="https://kanbai.co/images/subcategories/{{ $item->file }}" alt="{{ $item->name }}">
                    </div>
                    <h4>{{ $item->name }}</h4>
                </div>
            </div>
            
            @endforeach
            <a href="/catalogo/{{$categories->slug}}" class="view-more d-d-none">
                Ver todas <i class="fa-solid fa-angle-right"></i>
            </a>
        </div>
    </div>
    <div class="container mt-5" >
        <h2 class="mt-5 mb-5 title-gray">
             Empresas que confían en nosotros
        </h2>
        <div class="swiper mySwiperclientes ">
            <div class="swiper-wrapper">
                @foreach($imagesFactory as $img)
                <div class="swiper-slide empresas-slide">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <img src="{{ asset($img.'?'.rand()) }}" alt="{{ $img }}" class="img-d img-fluid">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <div class="swiper mySwiperclientesmobile ">
            <div class="swiper-wrapper">              
                @foreach($imagesFactory as $img)
                <div class="swiper-slide empresas-slide">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <img src="{{ asset($img.'?'.rand()) }}" alt="{{ $img }}" class="img-d img-fluid">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>    
    <div class="container">
        <div class="row mt-5 info-easygift">
            <h2 class="mt-5 mb-5 titles-home title-nosotros">Por qué elegir EasyGift</h2>
            <p class="text-center">
                Simplificamos la logística emocional de tu empresa para que te enfoques en tu gente.  
            </p>
            <div class="row mt-5 info-easygift">

                <div class="container py-5">
            

                    <!-- fila de tres columnas (Centralización / Facilidad / Ahorro) -->
                    <div class="row g-4 justify-content-center">
                        
                        <!-- COLUMNA 1: Centralización -->
                        <div class="col-12 col-md-6 col-lg-4 d-flex align-items-stretch">
                            <div class="card-feature card1 text-center w-100">
                                <div class="feature-icon">
                                    <i class="fa-solid fa-diagram-project"></i>   <!-- icono de centralización / diagrama -->
                                </div>
                                <h3 class="h4 fw-semibold">Centralización</h3>
                                <p class="text-secondary section-sub px-2">
                                    Simplificamos la logística emocional de tu empresa<br>para que te enfoques en tu gente.
                                </p>
                            </div>
                        </div>

                        <!-- COLUMNA 2: Facilidad -->
                        <div class="col-12 col-md-6 col-lg-4 d-flex align-items-stretch">
                            <div class="card-feature card2 text-center w-100">
                                <div class="feature-icon">
                                    <i class="fa-solid  fa-wand-magic-sparkles"></i>  <!-- icono clic / interacción -->
                                </div>
                                <h3 class="h4 fw-semibold">Facilidad</h3>
                                <p class="text-secondary section-sub px-2">
                                    Interfaz intuitiva diseñada para enviar detalles corporativos<br>en un par de clics.
                                </p>
                            </div>
                        </div>

                        <!-- COLUMNA 3: Ahorro -->
                        <div class="col-12 col-md-6 col-lg-4 d-flex align-items-stretch">
                            <div class="card-feature card3 text-center w-100">
                                <div class="feature-icon">
                                    <i class="fa-solid fa-piggy-bank"></i>
                                </div>
                                <h3 class="h4 fw-semibold">Ahorro</h3>
                                <p class="text-secondary section-sub px-2">
                                    Optimiza tu presupuesto corporativo y recupera<br>valiosas horas de trabajo.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            
             
             
             
            </div>
        </div>
        
    </div>
</section>





@endsection
@push('scripts')
<script src="{{ asset('js/app/schedulemeeting/create.js') }}"></script>
<script>
$(document).ready(function() {

    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 4,
        spaceBetween: 30,
        loop: true,
        loopFillGroupWithBlank: true,


        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },

    });

    var swiper = new Swiper(".mySwiperclientesmobile", {
        slidesPerView: 3,
        spaceBetween: 15,
        loop: true,
        loopFillGroupWithBlank: true,

        autoplay: {
            delay: 500,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },

    });

    var swiper = new Swiper(".mySwiperclientes", {
        slidesPerView: 7,
        spaceBetween: 15,
        loop: true,
        loopFillGroupWithBlank: true,

        autoplay: {
            delay: 500,
        },

        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },

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


   
});

</script>
@endpush
