 @php                        
    $categories = App\Models\Categories::with('subcategories')
        ->where('is_menu', 1)
        ->get();
        $isLogged = Auth::check();
@endphp
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <!-- PRIMERA FILA: Logo, buscador, iconos (diseño como imagen 1) -->
            <div class="row align-items-center py-2">
                <div class="col-md-3 col-6 col-logo d-flex align-items-center">
                    <button id="openSidebar" class="hamburger-btn  me-3">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    
                   

                    <a class="navbar-brand text-brand c-two logo-header" href="/">
                        <img class="logo" src="{{ asset('images/logo/easygiftblanco.png').'?'.rand() }}">
                    </a>
                </div>
                
                <div class="col-md-7 d-none d-md-block">
                    <div class="d-flex justify-content-center">
                        <div class="input-wrapper position-relative w-75">
                            <input type="search" name="search" id="search" class="input" placeholder="Busca lo que quieras">
                            <svg xmlns="http://www.w3.org/2000/svg" class="input-icon" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                            <div id="search-results" class="list-group position-absolute w-100" style="z-index: 999; display:none; border-bottom-left-radius: 20px; border-bottom-right-radius: 20px;background: #fff;"></div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-2 col-6">
                    <div class="d-flex justify-content-end align-items-center gap-3">
                        <!-- Icono usuario -->
                        @if(Auth::user())
                        <a href="/mi-perfil" class="text-white">
                            <i class="fa-solid fa-user fs-5"></i>
                        </a>
                        @else
                        <a href="/home" class="text-white">
                            <i class="fa-solid fa-user fs-5"></i>
                        </a>
                        @endif

                        <!-- Carrito -->
                        <a href="/carrito" class="text-white position-relative cart-menu">
                            <i class="fa fa-shopping-basket fs-5"></i>
                            @if(count(Cart::getContent()) > 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 10px;">
                                {{count(Cart::getContent())}}
                            </span>
                            @else
                            0
                            @endif
                        </a>
                    </div>
                </div>
            </div>

            <!-- BUSCADOR MÓVIL (se mantiene igual) -->
            <div class="row d-block d-md-none">
                <div class="col-12">
                    <div class="input-group mb-3 contenedor-search position-relative">
                        <input type="text" id="search-mobile" class="form-control" placeholder="Busca lo que quieras" aria-label="Busca lo que quieras" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary boton-search" type="button">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                        <div id="search-results-mobile" class="list-group position-absolute w-100" style="z-index: 999; display:none; border-bottom-left-radius: 20px; border-bottom-right-radius: 20px; background: #fff; position: relative;">
                            <button id="close-search-results-mobile" style="background: transparent;border: none;font-size: 20px;font-weight: bold;cursor: pointer;z-index: 1000;text-align: right;padding-right: 15px;">&times;</button>
                            <div id="search-results-mobile-list"></div>
                        </div>
                    </div>
                </div>
            </div>

           
        </div>
    </div>
</div>

<!-- Overlay -->
<div id="menuOverlay" class="menu-overlay"></div>

<!-- Sidebar Desktop (se mantiene igual) -->
<div id="desktopSidebar" class="desktop-sidebar">
    <div class="sidebar-header">
        <img src="{{ asset('images/logo/easygift.png') }}" class="sidebar-logo">
        <button id="closeSidebar" class="close-btn">&times;</button>
    </div>

    <ul class="sidebar-menu">
        <li><a href="/"><i class="fa-solid fa-house-chimney"></i> Inicio</a></li>
        @foreach ($categories as $category)
         @if ($category->name == 'EasyGift')
        
            <li><a href="/catalogo/{{$category->slug}}" alt="{{ $category->name }}"><i class="fa-solid fa-gift"></i> Categorías</a></li>
        
        @endif
        @endforeach
        <li><a href="/mi-perfil"><i class="fa-solid fa-user"></i> Mi cuenta</a></li>
        <li><a href="#"><i class="fa-solid fa-equals"></i> Pedidos</a></li>
        <li><a href="#"><i class="fa-solid fa-calendar-days"></i> Calendario</a></li>
        <li><a href="#"><i class="fa-solid fa-credit-card"></i> Métodos de pago</a></li>
    </ul>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>



@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {
    const openBtn = document.getElementById("openSidebar");
    const sidebar = document.getElementById("desktopSidebar");
    const overlay = document.getElementById("menuOverlay");
    const closeBtn = document.getElementById("closeSidebar");

    if (openBtn) {
        openBtn.addEventListener("click", function() {
            sidebar.classList.add("active");
            overlay.classList.add("active");
        });
    }

    if (closeBtn) {
        closeBtn.addEventListener("click", function() {
            sidebar.classList.remove("active");
            overlay.classList.remove("active");
        });
    }

    if (overlay) {
        overlay.addEventListener("click", function() {
            sidebar.classList.remove("active");
            overlay.classList.remove("active");
        });
    }
});

$("#search111").change(function() {    
    url='/buscar/'+$('#main-form-search #search').val();
    window.location.href = url;
});

$(document).ready(function () {
    function setupSearch(inputSelector, resultsSelector) {
        $(inputSelector).on("keyup", function () {
            let query = $(this).val();

            if (query.length >= 3) {
                $.ajax({
                    url: "{{ route('search.ajax') }}",
                    method: "GET",
                    data: { q: query },
                    success: function (data) {
                        let resultsDiv = $(resultsSelector);
                        resultsDiv.empty();

                        resultsDiv.append(`<button id="close-search-results-mobile" style="background: transparent;border: none;font-size: 20px;font-weight: bold;cursor: pointer;z-index: 1000;text-align: right;padding-right: 15px;"><i class="fa-solid fa-xmark"></i></button>`)

                        if (data.length > 0) {
                            data.forEach(item => {
                                resultsDiv.append(`
                                    <a style="border: none;" href="${item.url}" class="list-group-item list-group-item-action d-flex align-items-center mb-2">
                                        <img style="border-radius: 7px;" src="${item.image}" alt="${item.name}" class="me-2" width="60" height="60" style="object-fit:cover;">
                                        <div class="d-flex flex-column">
                                            <span class="fw-bold">${item.name}</span>
                                            <small class="text-muted">${item.category}</small>
                                        </div>
                                    </a>
                                `);
                            });
                            resultsDiv.show();
                        } else {
                            resultsDiv.hide();
                        }
                    }
                });
            } else {
                $(resultsSelector).hide();
            }
        });

        $(document).click(function (e) {
            if (!$(e.target).closest(inputSelector + ", " + resultsSelector).length) {
                $(resultsSelector).hide();
            }
        });
    }

    setupSearch("#search", "#search-results");
    setupSearch("#search-mobile", "#search-results-mobile");
});

$(document).on('click', '#close-search-results-mobile', function() {    
    $('#search-results-mobile').hide();
});
</script>
@endpush