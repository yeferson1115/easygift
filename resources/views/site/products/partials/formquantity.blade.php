<p class="mt-3 price-unit"><label class="price-unit">${{number_format($pricemax, 0, 0, '.')}}</label> valor por unidad</p>
 
<form action="javascript:void(0)" id="main-form" autocomplete="off">
    <input type="hidden" name="producto_id" id="producto_id" value="{{$product->id}}">
    <input type="hidden" id="_url" value="{{route('cart.add')}}">
    <input type="hidden" id="_token" value="{{ csrf_token() }}">
    <input type="hidden" id="minima" value="{{$cantidadminima}}">
    <input type="hidden" id="color" name="color" >
    <input type="hidden" id="size" name="size" >

    @foreach($product->adicional as $additional)
        <div class="row mt-2 mb-2">  
            <div class="col-md-12">
                <label for="exampleInputEmail1" class="form-label">{{$additional->extra->name}} (Opcional)</label>
                <select class="form-select extra" style="border-radius: 15px;"  name="extras[]">
                    <option value="" selected>Seleccione una opción</option>
                        @foreach($additional->extra->items as $i)
                            <option value="{{$i->id}}">{{$i->name}}</option>
                        @endforeach
                            
                </select>
            </div>
        </div> 
    @endforeach
        
    <div class="mt-5 mb-3 row align-items-center">
        <label for="quantity" class="col-sm-6 col-form-label label-cantidad">Escribe la cantidad:</label>
        <div class="col-sm-6">
            <div class="input-group quantity-selector">
                <button class="btn btn-outline-secondary" type="button" id="btn-decrement" style="border-radius: 15px 0 0 15px;">-</button>
                <input type="number" 
                       class="form-control text-center" 
                       style="border-radius: 0; border-left: none; border-right: none;" 
                       id="quantity" 
                       name="quantity" 
                       value="{{$cantidadminima}}" 
                       min="{{$cantidadminima}}" 
                       step="1"
                       readonly>
                <button class="btn btn-outline-secondary" type="button" id="btn-increment" style="border-radius: 0 15px 15px 0;">+</button>
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
            <div class="col-md-12">
                <button type="submit" id="btn-pedir-ahora" class="btn btn-add-cart mt-2" style="font-weight: 700;">Pedir ahora</button>
            </div>
        @endauth
    </div>
</form>

<style>
.quantity-selector {
    display: flex;
    width: 100%;
}

.quantity-selector .btn {
    border: 1px solid #ced4da;
    padding: 0.375rem 0.75rem;
    background-color: #f8f9fa;
    font-weight: bold;
}

.quantity-selector .btn:hover {
    background-color: #e9ecef;
}

.quantity-selector .btn:active {
    background-color: #dee2e6;
}

/* Ocultar las flechas del input number */
.quantity-selector input[type=number]::-webkit-inner-spin-button,
.quantity-selector input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

.quantity-selector input[type=number] {
    -moz-appearance: textfield;
    background-color: #f8f9fa;
    cursor: default;
}

.quantity-selector input[type=number]:focus {
    outline: none;
    box-shadow: none;
    border-color: #ced4da;
}
</style>

@push('scripts')
<script>
// Agregar evento para los botones + y -
document.addEventListener('DOMContentLoaded', function() {
    const quantityInput = document.getElementById('quantity');
    const btnDecrement = document.getElementById('btn-decrement');
    const btnIncrement = document.getElementById('btn-increment');
    const minValue = {{$cantidadminima}};

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
});
</script>


<script src="{{ asset('js/app/cart/addcart.js').'?'.rand() }}"></script>
<script>
$("#quantity").keyup(function(){
    Getprice();
});
$("#quantity").on( "blur", function() {
    Getprice();
});

$(document).on('change', '.extra', function () {
   Getprice();
});

function Getprice(){
    var min={{$cantidadminima}};
    if(min>$('#quantity').val()){
        //_alertGeneric('info','Información','Debes ingresar la cantidad minima requerida',null);
        //$('#quantity').val('');
        $('.text-price').text('$'+formatNumber(0));
        $('.price-unit').text('$'+formatNumber(0)+' valor por unidad');
        return false;
    }
    $.ajax({
            url: "{{route('getprice')}}",
            headers: {'X-CSRF-TOKEN': $('#_token').val()},
            type: 'POST',
            data: {quantity:$('#quantity').val(),producto_id:$('#producto_id').val(),extras: $("select[name='extras[]']").length
                ? $("select[name='extras[]']").map(function () { return $(this).val(); }).get()
                : []},
            success: function (response) {
                var json = $.parseJSON(response);
                if(json.success){
                    console.log(json);
                    $('.text-price').text('$'+formatNumber(json.price*$('#quantity').val()));
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