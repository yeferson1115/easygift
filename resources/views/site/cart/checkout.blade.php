@extends('layouts.appheaderlogo')
@section('title', 'Cotización')
@section('content')
<!-- ======= product Section ======= -->
<section class="section-agents section-t3 quotation">
    <div class="container">
        <div class="row no-gutters justify-content-center">
            <form class="form" role="form" action="javascript:void(0)" enctype="multipart/form-data" id="main-form" autocomplete="off">
                <input type="hidden" id="_url" value="{{ url('carrito/easybuy') }}">
                <input type="hidden" id="_token" value="{{ csrf_token() }}">                
                <ul class="nav checkout-steps justify-content-center" id="cotizacion" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab"  data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                            Productos
                        </button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab"  data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="home" aria-selected="false">
                            Pago
                        </button>
                    </li>

                    <li class="nav-item" role="presentation" >
                        <button class="nav-link" id="finish-tab"  data-bs-toggle="tab" data-bs-target="#fisnish" type="button" role="tab" aria-controls="home" aria-selected="false" >
                            Confirmación
                        </button>
                    </li>
                </ul>
                <div class="tab-content" id="cotizacionContent">
                   
                    @php
                        $totalextras = 0;
                        $noextras = 0;
                    @endphp
                    <div class="tab-pane fade show active " id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row mt-5">
                            <div class="col-md-7">
                                <div class="row form-cart">                                    
                                    <h2 class="titlecart mt-3 mb-5 title-checkout"><a href="{{ url()->previous() }}" class="btn-return previus-checkout" ><i class="fa-solid fa-angle-left"></i></a>Completa los datos</h2>
                                    <div class="col-md-12 col-12">
                                        <div class=" mt-1rem">
                                            <label class="form-label " for="name">Nombre completo <span class="obligatory">*</span></label>
                                            <input type="text" class="form-control input-cart" id="name" name="name" value="@if(Auth::user()){{Auth::user()->name}}@endif">
                                            <span class="missing_alert text-danger" id="name_alert"></span>
                                        </div>
                                    </div>                                    
                                    <div class="col-md-12 col-12">
                                        <div class="mt-1rem">
                                            <label class="form-label" for="type_document">Tipo de documento <span class="obligatory">*</span></label>
                                            <select class="form-control input-cart" id="type_document" name="type_document">
                                                <option value="">Seleccione</option>
                                                <option value="Cédula de Ciudadania">Cédula de Ciudadania</option>
                                                <option value="Cédula de Extranjeria">Cédula de Extranjeria</option>
                                                <option value="Pasaporte">Pasaporte</option>
                                                <option value="Nit">Nit</option>
                                            </select>
                                            <span class="missing_alert text-danger" id="type_document_alert"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class=" mt-1rem">
                                            <label class="form-label " for="document">Número de documento <span class="obligatory">*</span></label>
                                            <input type="text" class="form-control input-cart" id="document" name="document" value="@if(Auth::user()){{Auth::user()->document}}@endif">
                                            <span class="missing_alert text-danger" id="document_alert"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class=" mt-1rem">
                                            <label class="form-label " for="cellphone">Número celular</label>
                                            <input type="text" class="form-control input-cart" id="cellphone" name="cellphone" value="@if(Auth::user()){{Auth::user()->phone}}@endif">
                                            <span class="missing_alert text-danger" id="cellphone_alert"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class=" mt-1rem">
                                            <label class="form-label" for="email">Correo electrónico <span class="obligatory"><span class="obligatory">*</span></span></label>
                                            <input type="email" class="form-control input-cart" id="email" name="email" value="@if(Auth::user()){{Auth::user()->email}}@endif">
                                            <span class="missing_alert text-danger" id="email_alert"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class=" mt-1rem">
                                            <label class="form-label " for="name_business">Nombre de tu empresa <span class="obligatory">*</span></label>
                                            <input type="text" class="form-control input-cart" id="name_business" name="name_business" value="{{ Auth::check() && Auth::user()->business ? Auth::user()->business->company_name : '' }}">
                                            <span class="missing_alert text-danger" id="name_business_alert"></span>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-12 col-12">
                                        <div class=" mt-1rem">
                                            <label class="form-label " for="address">Dirección de entrega <span class="obligatory">*</span></label>
                                            <input type="text" class="form-control input-cart" id="address" name="address" value="@if(Auth::user()){{Auth::user()->address}}@endif">
                                            <span class="missing_alert text-danger" id="address_alert"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class=" mt-1rem">
                                            <label class="form-label " for="city">Municipio <span class="obligatory">*</span></label>
                                            <input type="text" class="form-control input-cart" id="city" name="city" >
                                            <span class="missing_alert text-danger" id="city_alert"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class=" mt-1rem">
                                            <label class="form-label " for="date_delivery">Fecha de entrega <span class="obligatory">*</span></label>
                                            <input type="date" class="form-control input-cart" id="date_delivery" name="date_delivery" >
                                            <span class="missing_alert text-danger" id="date_delivery_alert"></span>
                                        </div>
                                    </div>
                                   

                                    <div class="col-md-12 col-12">
                                        <div class="gift-card-box">

                                            <h5 class="gift-title">
                                            ✨ Personaliza el regalo (Postal 12 x 12 cm)
                                            </h5>

                                            <p class="gift-description">
                                            Añade un mensaje para una postal estándar o sube el diseño propio de tu empresa (Opcional).
                                            Las postales son impresas en impresora inkjet y papel opalina.
                                            </p>

                                            <div class="gift-options">
                                            <button type="button" class="gift-option active" id="btn-message">
                                                <i class="fa-regular fa-message"></i> Escribir mensaje
                                            </button>

                                            <button type="button" class="gift-option" id="btn-upload">
                                                <i class="fa-solid fa-upload"></i> Cargar diseño
                                            </button>
                                            </div>

                                            <textarea
                                            class="form-control gift-textarea visible" 
                                            id="observation" 
                                            name="observation"
                                            placeholder="Escribe aquí el mensaje que irá impreso en la postal estándar que acompañará tu regalo..."></textarea>

                                            <input
                                            type="file"
                                            id="upload-design"
                                            name="upload_design"
                                            accept="image/*"
                                            class="hidden" />

                                        </div>
                                    </div>

                                    
                                    
                                </div>
                            </div>
                            <div class="col-md-5 resume-desk" >
                                <div class="resume">
                                    @include('site.cart.partials.resumeprice')
                                    <div class="mt-4">
                                        <a class="btn mb-4 addcart btn-lg btn-sale next-d" >Continuar al pago</a>
                                    </div>
                                    @include('site.cart.partials.resume')

                                </div>
                            </div>

                            <div class="col-md-5 resume-mobile mb-5 mt-3" >
                                @include('site.cart.partials.resumemobile')
                                <div class="mt-4">
                                    <a class="btn mb-4 addcart btn-lg btn-sale next-d" >Continuar al pago</a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <div class="row form-cart">
                                    <h4 class="title-form-cotizacion title-cart-checkout mt-5 mb-5">Elige un método de pago:</h4>
                                    
                                    <div class="col-md-12 col-12">
                                        <div class="mb-3 mt-1rem">
                                        <div class="list-group">
                                           <div class="payment-options">
    <!-- Transferencia bancaria -->
    <label for="payment_method1" class="payment-option">
        <div class="payment-option-content">
            <div class="payment-info">
                <div class="payment-title">Transferencia bancaria</div>
                <div class="payment-bank">
                    <img class="bank-logo" src="{{ asset('images/logo-bancolombia.png').'?'.rand() }}" alt="Bancolombia">
                </div>
            </div>
            <div class="payment-radio">
                <input type="radio" name="payment_method" id="payment_method1" value="Transferencia bancaria Bancolombia">
                <span class="radio-custom"></span>
            </div>
        </div>
    </label>

    <!-- Crédito aprobado (solo si aplica) -->
    @if(Auth::check() && Auth::user()->business && Auth::user()->business->term)
    <label for="payment_method2" class="payment-option">
        <div class="payment-option-content">
            <div class="payment-info">
                <div class="payment-title">Crédito aprobado</div>
                <div class="payment-badge">
                    <i class="fa-regular fa-circle-check"></i>
                    Plazo de {{Auth::user()->business->term}} días
                </div>
            </div>
            <div class="payment-radio">
                <input type="radio" name="payment_method" id="payment_method2" value="Plazo de {{Auth::user()->business->term}} días">
                <span class="radio-custom"></span>
            </div>
        </div>
    </label>
    @endif

    <!-- PSE, Tarjeta débito o crédito -->
    <label for="payment_method3" class="payment-option">
        <div class="payment-option-content">
            <div class="payment-info">
                <div class="payment-title">PSE, Tarjeta débito o crédito</div>
                <div class="payment-cards">
                    <span class="card-icon pse">PSE</span>
                    <span class="card-icon visa">VISA</span>
                    <span class="card-icon mastercard">MasterCard</span>
                    <span class="card-icon amex">AMEX</span>
                </div>
            </div>
            <div class="payment-radio">
                <input type="radio" name="payment_method" id="payment_method3" value="PSE, Tarjeta débito o crédito">
                <span class="radio-custom"></span>
            </div>
        </div>
    </label>
</div>
                                            
                                        </div>
                                        <span class="missing_alert text-danger" id="payment_method_alert"></span>



                                        
                                       
                                        <img class="logo imagessl" src="{{ asset('images/pagoseguro.jpg').'?'.rand() }}" />
                                        </div>
                                    </div>                                   
                                </div>
                            </div>
                            <div class="col-md-6 resume-desk" style="padding-left: 45px;">
                                <div class="resume">
                                    @include('site.cart.partials.resumeprice')
                                    <div class="mt-4">                                       
                                        <a class="btn mb-4 addcart btn-lg btn-sale btn-go-quotation comfirm " id="comfirm">Continuar al pago</a>
                                    </div>
                                    @include('site.cart.partials.resume')
                                </div>
                            </div>
                            <div class="col-md-5 resume-mobile mb-5 mt-5" >
                                @include('site.cart.partials.resumemobile')
                                <div class="mt-4">
                                    <a class="btn mb-4 addcart btn-lg btn-sale btn-go-quotation comfirm" id="comfirm">Continuar al pago</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="fisnish" role="tabpanel" aria-labelledby="fisnish-tab">
                    
                        <div class="row mt-5">
                            <div class="col-md-7">
                                <div class="row conten-form">
                                    <div id="info-trans" class="row">

                                    </div>
                                    <div class="mt-4">
                                        <a class="btn waves-effect waves-float waves-light ajax btn-send-order btn-lg"  data-bs-toggle="modal" data-bs-target="#exampleModal">Envíar comporbante de pago</a>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Enviar comprobante</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-md-12 col-12">
                                                        <div class=" mt-1rem">
                                                            <label class="form-label " for="vaucher">Comprobante</label>
                                                            <input type="file" class="form-control input-cart" id="vaucher" name="vaucher" >
                                                            <span class="missing_alert text-danger" id="vaucher_alert"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn waves-effect waves-float waves-light ajax btn-go-quotation btn-lg" id="comprar">Comprar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                               
                            </div>
                            <div class="col-md-5 resume-desk" style="padding-left: 45px;">
                                <div class="resume">
                                    @include('site.cart.partials.resumeprice')
                                    <div class="mt-4"> 
                                        <button class="btn waves-effect waves-float waves-light ajax btn-go-quotation btn-lg comprar" id="comprar">Comprar</button>
                                    </div>
                                    @include('site.cart.partials.resume')
                                </div>
                            </div>
                            <div class="col-md-5 resume-mobile mb-5 mt-5" >
                                @include('site.cart.partials.resumemobile')
                                <div class="mt-4">
                                <button class="btn waves-effect waves-float waves-light ajax btn-go-quotation btn-lg comprar" id="comprar">Comprar</button>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
    

</section><!-- End product Section -->
@endsection
@push('scripts')
<script src="{{ asset('js/app/cart/create.js').'?'.rand() }}"></script>
<script>
 const btnMessage = document.getElementById('btn-message');
  const btnUpload = document.getElementById('btn-upload');
  const textarea = document.getElementById('observation');
  const uploadInput = document.getElementById('upload-design');

  btnMessage.addEventListener('click', () => {
    btnMessage.classList.add('active');
    btnUpload.classList.remove('active');
    textarea.classList.add('visible');
    textarea.classList.remove('hidden');
    uploadInput.classList.add('hidden');
    uploadInput.classList.remove('visible');
  });

  btnUpload.addEventListener('click', () => {
    btnUpload.classList.add('active');
    btnMessage.classList.remove('active');
    uploadInput.classList.add('visible');
    uploadInput.classList.remove('hidden');
    textarea.classList.add('hidden');
    textarea.classList.remove('visible');
  });
    function copiarAlPortapapeles(id_elemento) {
        var aux = document.createElement("input");
        if(id_elemento==1){
            id_elemento='cuenta';
        }
        if(id_elemento==2){
            id_elemento='name-cuenta';
        }
        if(id_elemento==3){
            id_elemento='nit';
        }
        
        aux.setAttribute("value", document.getElementById(id_elemento).innerHTML);
        document.body.appendChild(aux);
        aux.select();
        document.execCommand("copy");
        document.body.removeChild(aux);
    }
$('.list-group input:radio').click(function() {
    var tipo=$(this).val();

    
    var logobancolombia="{{ asset('images/logo-bancolombia.png').'?'.rand() }}"
    var bancolombia='<div class="col-md-6"><img class="logo logo-bancolombia" src="'+logobancolombia+'" /><p>A continuación encontrarás los datos de nuestra cuenta para la trasferencia, una vez realizada envíanos una foto del comprobante, dando clic en el botón</p></div><div class="col-md-6"><h4 class="title-info-pago">Cuenta de ahorros Bancolombia</h4><hr><div class="row"><div class="col-7"><label class="texto-info-pago">No. de cuenta:</label><label id="cuenta" class="subtext-info-pago">02900001350</label></div><div class="col-5"><a href="#" class="btn-copy" onclick="copiarAlPortapapeles(1)">Copiar</a></div></div><hr><div class="row"><div class="col-7"><label class="texto-info-pago">Nombre del titular:</label><label id="name-cuenta" class="subtext-info-pago">Alma de Colombia S.A.S</label></div><div class="col-5"><a href="#" class="btn-copy" onclick="copiarAlPortapapeles(2)">Copiar</a></div></div><hr><div class="row"><div class="col-7"><label class="texto-info-pago">Documento del titular:</label><label id="nit" class="subtext-info-pago">NIT 901450303-5</label></div><div class="col-5"><a href="#" class="btn-copy" onclick="copiarAlPortapapeles(3)">Copiar</a></div></div></div>';
    var logoscotianbak="{{ asset('images/scotianbak.png').'?'.rand() }}"
    var cotianbak='<div class="col-md-6"><img class="logo logo-bancolombia" src="'+logoscotianbak+'" /><p>A continuación encontrarás los datos de nuestra cuenta para la trasferencia, una vez realizada envíanos una foto del comprobante, dando clic en el botón</p></div><div class="col-md-6"><h4 class="title-info-pago">Cuenta de ahorros Scotiabank Colpatria </h4><hr><div class="row"><div class="col-7"><label class="texto-info-pago">No. de cuenta:</label><label id="cuenta" class="subtext-info-pago">1882017053</label></div><div class="col-5"><a href="#" class="btn-copy" onclick="copiarAlPortapapeles(1)">Copiar</a></div></div><hr><div class="row"><div class="col-7"><label class="texto-info-pago">Nombre del titular:</label><label id="name-cuenta" class="subtext-info-pago">Alma de Colombia S.A.S</label></div><div class="col-5"><a href="#" class="btn-copy" onclick="copiarAlPortapapeles(2)">Copiar</a></div></div><hr><div class="row"><div class="col-7"><label class="texto-info-pago">Documento del titular:</label><label id="nit" class="subtext-info-pago">NIT 901450303-5</label></div><div class="col-5"><a href="#" class="btn-copy" onclick="copiarAlPortapapeles(3)">Copiar</a></div></div></div>';
    
    $('#info-trans div').remove();
    

    if(tipo=='Transferencia bancaria Bancolombia'){
        $('#info-trans').append(bancolombia);
    }
    if(tipo=='Transferencia bancaria Scotiabank'){
        $('#info-trans').append(cotianbak);  
    }

    
    $('.payment-type').removeClass('active_payment');
    $(this).closest('.payment-type').addClass('active_payment');
  });

   var input = document.querySelector("#cellphone");
    window.intlTelInput(input, {
    initialCountry: "auto",
    geoIpLookup: function(callback) {
        $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
        var countryCode = (resp && resp.country) ? resp.country : "co";
        callback(countryCode);
        });
    },
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js" // just for formatting/placeholders etc
    });

    feather.replace({ 'aria-hidden': 'true' });

$(".togglePassword").click(function (e) {
      e.preventDefault();
      var type = $(this).parent().parent().find(".password").attr("type");
      if(type == "password"){
          $("svg.feather.feather-eye").replaceWith(feather.icons["eye-off"].toSvg());
          $(this).parent().parent().find(".password").attr("type","text");
      }else if(type == "text"){
          $("svg.feather.feather-eye-off").replaceWith(feather.icons["eye"].toSvg());
          $(this).parent().parent().find(".password").attr("type","password");
      }
  });

  $(".togglePassword-confirm").click(function (e) {
      e.preventDefault();
      var type = $(this).parent().parent().find(".password-confirm").attr("type");
      if(type == "password"){
          $("svg.feather.feather-eye").replaceWith(feather.icons["eye-off"].toSvg());
          $(this).parent().parent().find(".password-confirm").attr("type","text");
      }else if(type == "text"){
          $("svg.feather.feather-eye-off").replaceWith(feather.icons["eye"].toSvg());
          $(this).parent().parent().find(".password-confirm").attr("type","password");
      }
  });
    </script>
@endpush
