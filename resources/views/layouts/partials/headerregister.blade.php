<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4 col-logo">
                    <a class="navbar-brand text-brand c-two logo-desck d-flex align-items-center" href="/">
                        <img  class="logo" src="{{ asset('images/logo/easygiftblanco.png').'?'.rand() }}" alt="EasyGift" />
                        <span class="separador-largo-header mx-3">|</span>
                        <img  class="logo" src="{{ asset('images/logo/logo-kanbai-blanco.png').'?'.rand() }}" alt="Kanbai" />
                    </a>
                    <a class="nav-link account push" href="/home"><i class="bi bi-person"></i></a>
                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#menu_mov" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
                <div class="col-md-6">                   

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 menu-register">
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="/" style="color:#fff !important;">Volver al inicio</a>
                            </li>                            
                            <li class="nav-item separador-menu-register">
                                <a class="nav-link" style="margin-left: 20px;color:#fff !important;"  href="#">Sobre nosotros</a>
                            </li>
                        </ul>
                    
                    </div>

                </div>
                <div class="col-md-2">
                    @if(Route::is('register'))
                    <a class="account-desck-register" href="/home">Ingresa</a>
                    @endif
                    
                    @if(Route::is('login'))
                    <a class="account-desck-register" href="/register">Registrarse</a>
                    @endif
                </div>
            </div>
           
        </div>
    </div>
</div>

<style>
.separador-largo-header {
    color: white;
    font-size: 30px;
    font-weight: 100;
    line-height: 1;
    opacity: 0.9;
    transform: scaleY(1.6);
    display: inline-block;
}

.d-flex {
    display: flex;
}

.align-items-center {
    align-items: center;
}
.navbar-brand {
        margin-top: 5px;
}

.mx-3 {
    margin-left: 1rem;
    margin-right: 1rem;
}

/* Ajustes responsive */
@media (max-width: 768px) {
    .separador-largo-header {
        font-size: 30px;
        transform: scaleY(1.4);
        margin-left: 0.5rem;
        margin-right: 0.5rem;
    }
    
    .col-logo .logo {
        max-width: 100px !important;
        top: 0px !important;
    }
    .account, .navbar-toggler  {
        display:none;
    }
    .navbar-brand{
       width: 100%; 
        margin-top: 20px;
    }
    .navbar-brand img{
        margin: 0 auto;
    }
}
</style>