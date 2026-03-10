<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 col-logo">
                    <a class="navbar-brand text-brand c-two logo-desck d-flex align-items-center" href="/">
                        <img  class="logo" src="{{ asset('images/logo/easygiftblanco.png').'?'.rand() }}" alt="EasyGift" />
                    </a>
                </div>
                <div class="col-md-6">

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