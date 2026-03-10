<p class="mt-3 price-unit"><label class="price-unit">${{number_format($pricemax, 0, 0, '.')}}</label> valor por unidad</p>
 
<form action="javascript:void(0)" id="main-form-mobile" autocomplete="off">
        <input type="hidden" name="producto_id" value="{{$product->id}}">
        <input type="hidden" name="producto_id" id="producto_id" value="{{$product->id}}">
        <input type="hidden" id="_url-m" value="{{route('cartmobile.add')}}">
        <input type="hidden" id="_token-m" value="{{ csrf_token() }}"> 
        <input type="hidden" id="minima-m" value="{{$cantidadminima}}">
        <input type="hidden" id="color_mobile" name="color" >
        <input type="hidden" id="size_mobile" name="size" >
        
        @foreach($product->adicional as $additional)
            <div class="row mt-2 mb-2">  
                <div class="col-md-12">
                    <label for="exampleInputEmail1" class="form-label">{{$additional->extra->name}} (Opcional)</label>
                    <select class="form-select extramobile" style="border-radius: 15px;"  name="extras[]">
                        <option value="" selected>Seleccione una opción</option>
                            @foreach($additional->extra->items as $i)
                                <option value="{{$i->id}}">{{$i->name}}</option>
                            @endforeach
                    </select>
                </div>
            </div> 
        @endforeach
        
        <div class="mb-3 row align-items-center">
            <label for="quantity-m" class="col-8 col-form-label label-cantidad">Escribe la cantidad:</label>
            <div class="col-4">
                <div class="input-group quantity-selector-mobile">
                    <button class="btn btn-outline-secondary" type="button" id="btn-decrement-mobile" style="border-radius: 15px 0 0 15px; padding: 0.5rem 0.75rem;">-</button>
                    <input type="number" 
                           class="form-control text-center" 
                           style="border-radius: 0; border-left: none; border-right: none; padding: 0.5rem 0;" 
                           id="quantity-m" 
                           name="quantity_m" 
                           value="{{$cantidadminima}}" 
                           min="{{$cantidadminima}}" 
                           step="1"
                           readonly>
                    <button class="btn btn-outline-secondary" type="button" id="btn-increment-mobile" style="border-radius: 0 15px 15px 0; padding: 0.5rem 0.75rem;">+</button>
                </div>
            </div>
        </div>
        
        <div class="row mt-3 mb-5">  
            @guest
                <div class="alert alert-light border d-flex align-items-center shadow-sm" role="alert">
                    <i class="fa-solid fa-lock me-3 text-primary fs-4"></i>
                    <div>
                        Necesitas iniciar sesión para continuar con la compra.
                        <a href="/login" class="fw-semibold ms-2">Ingresar</a>
                        o
                        <a href="/register" class="fw-semibold">Crear cuenta</a>
                    </div>
                </div>
            @endguest            
            @auth
            <div class="col-md-12 mb-4">                                                               
                <button type="submit" name="btn" id="btn-cotizar-m" class="btn btn-add-cart-border mt-2" style="font-weight: 700;">Solicitar cotización</button>
            </div>
            <div class="col-md-12">
                <button type="submit" id="btn-pedir-ahora-m" class="btn btn-add-cart mt-2" style="font-weight: 700;">Pedir ahora</button>
            </div>
             @endauth
        </div>
</form>

<style>
.quantity-selector-mobile {
    display: flex;
    width: 100%;
}

.quantity-selector-mobile .btn {
    border: 1px solid #ced4da;
    background-color: #f8f9fa;
    font-weight: bold;
    font-size: 1.2rem;
    line-height: 1;
}

.quantity-selector-mobile .btn:hover {
    background-color: #e9ecef;
}

.quantity-selector-mobile .btn:active {
    background-color: #dee2e6;
}

/* Ocultar las flechas del input number */
.quantity-selector-mobile input[type=number]::-webkit-inner-spin-button,
.quantity-selector-mobile input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

.quantity-selector-mobile input[type=number] {
    -moz-appearance: textfield;
    background-color: #f8f9fa;
    cursor: default;
}

.quantity-selector-mobile input[type=number]:focus {
    outline: none;
    box-shadow: none;
    border-color: #ced4da;
}

/* Ajustes para móvil */
@media (max-width: 768px) {
    .quantity-selector-mobile .btn {
        padding: 0.6rem 0.8rem;
    }
    
    #quantity-m {
        font-size: 16px; /* Evita el zoom automático en iOS */
    }
}
</style>

@push('scripts')
<script>
// Agregar evento para los botones + y - en móvil
document.addEventListener('DOMContentLoaded', function() {
    const quantityInput = document.getElementById('quantity-m');
    const btnDecrement = document.getElementById('btn-decrement-mobile');
    const btnIncrement = document.getElementById('btn-increment-mobile');
    const minValue = {{$cantidadminima}};

    if (btnDecrement && btnIncrement && quantityInput) {
        btnDecrement.addEventListener('click', function() {
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > minValue) {
                quantityInput.value = currentValue - 1;
                // Trigger los eventos existentes
                $(quantityInput).keyup();
            }
        });

        btnIncrement.addEventListener('click', function() {
            let currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
            // Trigger los eventos existentes
            $(quantityInput).keyup();
        });
    }
});
</script>

<script src="{{ asset('js/app/cart/addcartmobile.js').'?'.rand() }}"></script>
<script>

$("#quantity-m").keyup(function(){
    Getpricemobile();
});
$("#quantity-m").on( "blur", function() {
    Getpricemobile();
});
$(document).on('change', '.extramobile', function () {
   Getpricemobile();
});
function Getpricemobile() {
    var min={{$cantidadminima}};
    if(min>$('#quantity-m').val()){
        //_alertGeneric('info','Información','Debes ingresar la cantidad minima requerida',null);
        $('.text-price').text('$'+formatNumber(0));
        $('.price-unit').text('$'+formatNumber(0)+' valor por unidad');
        return false;
    }
    $.ajax({
            url: "{{route('getprice')}}",
            headers: {'X-CSRF-TOKEN': $('#_token-m').val()},
            type: 'POST',
            data: {quantity:$('#quantity-m').val(),producto_id:$('#producto_id').val(),extras: $("select[name='extras[]']").length
                ? $("select[name='extras[]']").map(function () { return $(this).val(); }).get()
                : []},
            success: function (response) {
                var json = $.parseJSON(response);
                if(json.success){
                    console.log(json);
                    $('.text-price').text('$'+formatNumber(json.price*$('#quantity-m').val()));
                    $('.price-unit').text('$'+formatNumber(json.price)+' valor por unidad');
                }
            },error: function (data) {
                    var errors = data.responseJSON;
                    console.log(errors);
                    $.each( errors.errors, function( key, value ) {
                    toastr.error(value);
                    return false;
                    });
                    $('input').iCheck('enable');
                    $('#main-form input, #main-form button').removeAttr('disabled');
                    $('#ajax-icon').removeClass('fa fa-spin fa-refresh').addClass('fa fa-save');
            }
        });   
}
function formatNumber (n) {
    n = String(n).replace(/\D/g, "");
    return n === '' ? n : Number(n).toLocaleString("es-CO");
}
   
</script>
@endpush