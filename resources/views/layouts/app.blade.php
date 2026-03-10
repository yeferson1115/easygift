<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Kanbai - @yield('title')</title>
    <meta name="description" content="Encuentra todo lo que necesita tu empresa en Kanbai. Ahorra tiempo y dinero">
    <!-- Favicons -->
    <link href="{{ asset('images/kanbai-favicon.svg') }}" rel="icon">
    <link href="{{ asset('images/kanbai-favicon.svg') }}" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
    <!-- Vendor CSS Files -->
    <link href="{{ asset('app-assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('app-assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('app-assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('app-assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.1/nouislider.css" integrity="sha512-MKxcSu/LDtbIYHBNAWUQwfB3iVoG9xeMCm32QV5hZ/9lFaQZJVaXfz9aFa0IZExWzCpm7OWvp9zq9gVip/nLMg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
    <link href="{{ asset('app-assets/css/style.css').'?'.rand() }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="{{ asset('app-assets/css/simple-lightbox.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @livewireStyles
    
</head>

<body>
    <!-- ======= Property Search Section ======= -->
    <div class="click-closed"></div>
    <!-- ======= Header/Navbar ======= -->
    <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top header-dark" style="padding: 0px 0px 0px 0px;">
        @include('layouts.partials.appmenu')
    </nav><!-- End Header/Navbar -->


 


    <main id="main">
        @yield('content')
    </main><!-- End #main -->
    <!-- ======= Footer ======= -->
    <section class="section-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-3 border-right">
                    <div class="widget-a">
                        <div class="w-body-a footer-logo text-center">
                            <div class="d-flex align-items-center justify-content-center">
                                <img class="logo-footer" src="{{ asset('images/logo/easygiftblanco.png') }}" alt="EasyGift" />
                                <span class="separador-largo">|</span>
                                <img class="logo-footer ms-2" src="{{ asset('images/logo/logo-kanbai-blanco.png') }}" alt="Kanbai" />
                            </div>
                            <p class="text-footer">Transformando la manera en que las empresas compran, regalan y conectan con sus equipos.</p>
                            <ul class="social-footer mt-2">
                                <li class="icons-social">
                                    <a href="https://www.instagram.com/kanbai.col/">
                                        <i class="fa-brands fa-square-instagram"></i>
                                    </a>
                                </li>
                                
                                <li class="icons-social">
                                    <a href="#" style="padding: 10px 14px;">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>
                                </li>
                                 <li class="icons-social">
                                    <a href="#">
                                        <i class="fa-brands fa-x-twitter"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                 
                <div class="col-sm-12 col-md-6 section-md-t3">
                    <div class="widget-a">
                        <div class="w-body-a">
                            <div class="w-footer-a">
                                <h4 class="title-menu">Accesos rápidos</h4>
                                <ul class="list-unstyled menu-footer">
                                    <li class="color-a">
                                        <a href="#">Para empresas</a>
                                    </li>
                                    <li class="color-a">
                                        <a href="/login">Mi cuenta</a>
                                    </li>
                                    <li class="color-a">
                                        <a href="/terminos-y-condiciones">Términos y Condiciones</a>
                                    </li>
                                    <li class="color-a">
                                        <a href="/politica-de-privacidad">Política de Privacidad y Treatamiento de Datos Personales</a>
                                    </li>
                                    <li class="color-a">
                                        <a href="#">Preguntas frecuentes</a>
                                    </li>
                                    <li class="color-a">
                                        <a href="#">Contáctanos</a>
                                    </li>
                                    <li class="color-a">
                                        <a href="#">Rastrea tu pedido</a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-12 col-md-3 section-md-t3 contact-mobile">
                    <div class="widget-a">
                        <div class="w-body-a">
                            <div class="action-shedule">
                                <h4 class="title-shedule">¿Listo para empezar?</h4>
                                <p class="text-shedule mt-3">Agenda una llamada con uno de nuestros consultores hoy</p>
                                <button type="button" class="btn btn-shedule">Solicitar llamada</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cont-logo-sic">
                        <!--<img src="{{ asset('images/logo-sic.png') }}" alt="Twitter" class="logo-sic">-->
                    </div>
                    <div class="copyright-footer">
                        <p class="copyright color-text-a">
                            &copy; Copyright
                            <span class="color-year">2022</span> All Rights Reserved.
                        </p>
                    </div>
                    <div class="credits">
                        Powered by <a href="https://kanbai.co/" target="_blank">kanbai.co</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="btn-whatsapp">
            <a id="btn-whatsapp-2" target="_blank" data-service_number="313102088" data-service_client_id="1552319547" class="btn-whatsapp" rel="noopener noreferrer" href="https://api.whatsapp.com/send?phone=3502045177&amp;text=Hola me interesa esto de Kanbai, ...">
                <svg style=" pointer-events:none; display:block; height:50px; width:50px;" width="50px" height="50px" viewBox="0 0 1024 1024">
                    <defs>
                        <path id="htwasqicona-chat" d="M1023.941 765.153c0 5.606-.171 17.766-.508 27.159-.824 22.982-2.646 52.639-5.401 66.151-4.141 20.306-10.392 39.472-18.542 55.425-9.643 18.871-21.943 35.775-36.559 50.364-14.584 14.56-31.472 26.812-50.315 36.416-16.036 8.172-35.322 14.426-55.744 18.549-13.378 2.701-42.812 4.488-65.648 5.3-9.402.336-21.564.505-27.15.505l-504.226-.081c-5.607 0-17.765-.172-27.158-.509-22.983-.824-52.639-2.646-66.152-5.4-20.306-4.142-39.473-10.392-55.425-18.542-18.872-9.644-35.775-21.944-50.364-36.56-14.56-14.584-26.812-31.471-36.415-50.314-8.174-16.037-14.428-35.323-18.551-55.744-2.7-13.378-4.487-42.812-5.3-65.649-.334-9.401-.503-21.563-.503-27.148l.08-504.228c0-5.607.171-17.766.508-27.159.825-22.983 2.646-52.639 5.401-66.151 4.141-20.306 10.391-39.473 18.542-55.426C34.154 93.24 46.455 76.336 61.07 61.747c14.584-14.559 31.472-26.812 50.315-36.416 16.037-8.172 35.324-14.426 55.745-18.549 13.377-2.701 42.812-4.488 65.648-5.3 9.402-.335 21.565-.504 27.149-.504l504.227.081c5.608 0 17.766.171 27.159.508 22.983.825 52.638 2.646 66.152 5.401 20.305 4.141 39.472 10.391 55.425 18.542 18.871 9.643 35.774 21.944 50.363 36.559 14.559 14.584 26.812 31.471 36.415 50.315 8.174 16.037 14.428 35.323 18.551 55.744 2.7 13.378 4.486 42.812 5.3 65.649.335 9.402.504 21.564.504 27.15l-.082 504.226z"></path>
                    </defs>
                    <linearGradient id="htwasqiconb-chat" gradientUnits="userSpaceOnUse" x1="512.001" y1=".978" x2="512.001" y2="1025.023">
                        <stop offset="0" stop-color="#61fd7d"></stop>
                        <stop offset="1" stop-color="#2bb826"></stop>
                    </linearGradient>
                    <use xlink:href="#htwasqicona-chat" overflow="visible" fill="url(#htwasqiconb-chat)"></use>
                    <g>
                        <path fill="#FFF" d="M783.302 243.246c-69.329-69.387-161.529-107.619-259.763-107.658-202.402 0-367.133 164.668-367.214 367.072-.026 64.699 16.883 127.854 49.017 183.522l-52.096 190.229 194.665-51.047c53.636 29.244 114.022 44.656 175.482 44.682h.151c202.382 0 367.128-164.688 367.21-367.094.039-98.087-38.121-190.319-107.452-259.706zM523.544 808.047h-.125c-54.767-.021-108.483-14.729-155.344-42.529l-11.146-6.612-115.517 30.293 30.834-112.592-7.259-11.544c-30.552-48.579-46.688-104.729-46.664-162.379.066-168.229 136.985-305.096 305.339-305.096 81.521.031 158.154 31.811 215.779 89.482s89.342 134.332 89.312 215.859c-.066 168.243-136.984 305.118-305.209 305.118zm167.415-228.515c-9.177-4.591-54.286-26.782-62.697-29.843-8.41-3.062-14.526-4.592-20.645 4.592-6.115 9.182-23.699 29.843-29.053 35.964-5.352 6.122-10.704 6.888-19.879 2.296-9.176-4.591-38.74-14.277-73.786-45.526-27.275-24.319-45.691-54.359-51.043-63.543-5.352-9.183-.569-14.146 4.024-18.72 4.127-4.109 9.175-10.713 13.763-16.069 4.587-5.355 6.117-9.183 9.175-15.304 3.059-6.122 1.529-11.479-.765-16.07-2.293-4.591-20.644-49.739-28.29-68.104-7.447-17.886-15.013-15.466-20.645-15.747-5.346-.266-11.469-.322-17.585-.322s-16.057 2.295-24.467 11.478-32.113 31.374-32.113 76.521c0 45.147 32.877 88.764 37.465 94.885 4.588 6.122 64.699 98.771 156.741 138.502 21.892 9.45 38.982 15.094 52.308 19.322 21.98 6.979 41.982 5.995 57.793 3.634 17.628-2.633 54.284-22.189 61.932-43.615 7.646-21.427 7.646-39.791 5.352-43.617-2.294-3.826-8.41-6.122-17.585-10.714z"></path>
                    </g>
                </svg>
            </a>
        </div>
    </footer><!-- End  Footer -->
    
    <div id="preloadersite"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Vendor JS Files -->
    <script src="{{ asset('app-assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.1/nouislider.min.js" integrity="sha512-1mDhG//LAjM3pLXCJyaA+4c+h5qmMoTc7IuJyuNNPaakrWT9rVTxICK4tIizf7YwJsXgDC2JP74PGCc7qxLAHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('app-assets/js/alpinejs.js') }}"></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('app-assets/js/main.js') }}"></script>
    <link rel="stylesheet" href="node_modules/@splidejs/splide/dist/css/splide.min.css">
    <!-- or the reference on CDN -->
    
    
    <script src="{{ asset('app-assets/js/splide.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/sweetalert2@9.js') }}"></script>
    <script src="{{ asset('app-assets/js/intlTelInput.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/simple-lightbox.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @livewireScripts
    
    <script>
    
    function _alertGeneric(type, title, text, reload = null) {
        Swal.fire({
            //icon: type,
            icon: type,
            title: title,
            text: text,
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            //$('#page-loader').fadeOut(100);
            if (reload != '' && reload != null && reload != 1) {
                window.location.href = reload;
            }
            if (reload === 1) {
                location.reload();
            }
            if (reload === 2) {
                window.history.go(-1);
            }
        });
    }

    @if(Session::has('message_cart'))
    console.log('sss');
    Swal.fire({
      icon: 'success',
      text: "{{ Session::get('message_cart') }}",
      showCancelButton: true,
      confirmButtonClass: 'btn btn-success btn-fill',
      cancelButtonClass: 'btn btn-danger btn-fill',
      confirmButtonText: 'Carrito de compras',
      cancelButtonText: 'Seguir Comprando',
      buttonsStyling: false
      }).then(function(e) {
        console.log(e.dismiss);
        if(e.dismiss=='cancel'){
          location.reload();
        }else{
          window.location.href = "/carrito";
        }
        //

      }).catch(function(e) {
        location.reload();

      });
      @endif


      
    </script>
    @stack('scripts')
</body>

</html>
