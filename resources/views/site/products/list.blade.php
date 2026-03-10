@extends('layouts.app')
@section('title', 'Productos')
@section('content')
<section class="section-banner-desk section-t8 container" style="padding-top: 7rem;">
    @if($info['banners']!=null)
    <div id="carusel" class="carousel slide carousel-fade" data-bs-ride="carusel">
        <div class="carousel-inner">
            @foreach($info['banners'] as $key=>$item)
                @php $n = 0 @endphp 
                @if($item->type==1)               
                <div class="carousel-item @if($key==0) active @endif banner-category" style="padding: 0;">
                    <a href="{{$item->url}}" target="_blank">
                        <img style="border-radius: 0px;" src="https://kanbai.co/images/categories/banners/{{ $item->file }}" class="d-block w-100"></a>  
                </div>
                @php $n++ @endphp 
                @endif
            @endforeach 
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carusel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carusel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
    @endif
</section>
<section class="section-banner-mobile section-t8 container " style="padding-top: 8rem;">
    @if($info['banners']!=null)
    <div id="carusel-mobile" class="carousel slide carousel-fade" data-bs-ride="carusel-mobile">
        <div class="carousel-inner">
            @foreach($info['banners'] as $key=>$item)
                @php $x = 0 @endphp 
                @if($item->type==2)               
                <div class="carousel-item @if($x==0) active @endif banner-category" >
                    <a href="{{$item->url}}" target="_blank"><img src="https://kanbai.co/images/categories/banners/{{ $item->file }}" class="d-block w-100"></a>  
                </div>
                @php $x++ @endphp 
                @endif
            @endforeach 
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carusel-mobile" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carusel-mobile" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
    @endif
</section>
<!-- ======= list products Section ======= -->
<section class="section-agents ">
    @if($info['namesubcategory']!=null)
    <div class="miga-pan mt-2">
        <div class="container">
            <a href="/catalogo/{{ $info['slugcategory'] }}">< Volver a {{$info['namecategory']}} </a> 
        </div> 
    </div> 
    @endif 

    <div class="container">
        @if($info['namesubcategory']==null)
                <div class="seccion-categorias mt-5">
                  <h2 class="encabezado-categorias mb-5 mt-3">Nuestras categorías</h2>
                    <div class="contenedor-grid">
                      @foreach($categories as $item)
                        <div class="tarjeta-categoria">
                          <a href="/catalogo/{{$info['namecategory']}}/{{$item->slug}}" class="link-tarjeta">
                            <div class="marco-imagen">
                              <img src="https://kanbai.co/images/subcategories/{{ $item->file }}" alt="" />
                            </div>
                            <span class="etiqueta-categoria">{{$item->name}}</span>
                          </a>
                        </div>
                      @endforeach
                    </div>
                </div>        
        @endif
        
        <div class="mt-5 list-products">          
         @livewire('productos',['info'=>$info])
        </div>
    </div>
</section>
<!-- End list products Section -->

@endsection
@push('scripts')
<script>

    
    $(document).ready(function(){
        $('.imagesattributes').slick({
  dots: false,
	prevArrow: $('.prev'),
	nextArrow: $('.next'),
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
$('.responsive').slick({
  dots: false,
  autoplay:true,
	prevArrow: $('.prev'),
	nextArrow: $('.next'),
  infinite: false,
  speed: 300,
  slidesToShow: 7,
  slidesToScroll: 7,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 5,
        slidesToScroll: 5,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 4
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 4
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

$('.bannerscommerce').slick({
  dots: false,
	prevArrow: $('.prev'),
	nextArrow: $('.next'),
  infinite: false,
  speed: 300,
  slidesToShow: 2,
  slidesToScroll: 2,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});


    var myCarousel = document.querySelector('#carusel')
    var carousel = new bootstrap.Carousel(myCarousel, {
    interval: 2000,
    wrap: false
    });

});

</script>
@endpush
