<div class="row" id="list-products">
    <div class="container section-products">
        <div class="header-products">
            <h2>Todos los productos</h2>

            <button id="btnFiltro" class="btn-filter">
                Filtro <i class="fa-solid fa-filter"></i>
            </button>
        </div>
        <!--Filtros-->
        <div id="filtros" class="filtros-box">
            @if($info['subcategory_id']==null)
                <div class="row mb-4 mt-5">
                    <h4 class="title-filter">Subcategorias</h4>
                    <input type="hidden" value="{{$subcategories = App\Models\SubCategories::where('category_id',$info['category_id'])->with('category')->get()}}">
                    @foreach ($subcategories as $subcategory)                
                        <div class="col-sm-2 col-6 mb-1">
                            <a class="dropdown-item bt-subcategory-filter {{ (request()->is('catalogo/$subcategory->category->slug/subcategory->slug')) ? 'active' : '' }}" href="/catalogo/{{ $subcategory->category->slug }}/{{ $subcategory->slug }}">
                            <img class="image-subcategory-list-product" src="https://kanbai.co/images/subcategories/{{ $subcategory->file }}" alt="{{ $subcategory->name }}">
                            {{ $subcategory->name }}</a>
                        </div>                 
                    @endforeach
                </div>
            @endif
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Ordenar por</label>
                        <select class="form-select" wire:model="keyword" id="exampleFormControlSelect1">
                            <option >Seleccione</option>
                            <option value="1">Por defecto</option>
                            <option value="2" >Últimos</option>
                            <option value="3">Por Precio: bajo a alto</option>
                            <option value="4">Por Precio: alto a bajo</option>
                        </select>
                    </div>
                </div>                
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group m-b5">
                        <div class="mall-property mt-3">
                            <div class="mall-property__label" >
                                Precio                        
                            </div>
                            <div class="mall-slider-handles" data-start="1000" data-end="1000" data-min="1" data-max="10000000" data-target="price" style="width: 100%" wire:ignore></div>
                            <div class="row filter-container-1">
                                <div class="col-md-6">
                                <input type="text" class="form-control" data-min="price" id="skip-value-lower"  wire:model.lazy="min_price" readonly>  
                                </div>
                                <div class="col-md-6">
                                <input type="text"  class="form-control" data-max="price" id="skip-value-upper"  wire:model.lazy="max_price" readonly>
                                </div>                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--Productos-->
        <div class="products-lis row">

            @foreach($products as $item)
            <!--Estructura desk-->
   
            <div class="col-md-4">
                <a href="/catalogo/producto/{{$item->id}}/{{$item->name}}">
                    <div class="card mb-3 card-related" >
                        <div class="card-body cardproducts padding-0">
                            
                                <div class="col-md-12 col-12 mb-3 cont-img-desk" >
                                    @if(count($item->gallery)>0)
                                        <img  class="image-list-product-desk" src="https://kanbai.co/images/products/thumbnail/list/{{ $item->gallery[0]->file }}">
                                    @endif
                                
                                </div>
                                <div class="col-md-12 mt-1 info-related">
                                    <h4 class="title-product-desk">{{$item->name}}</h4>
                                    <table class="price-shoping mb-3">
                                        <tr>
                                            <td>
                                                <h4 class="price-product">
                                                    <i class="fa-solid fa-dollar-sign"></i> 
                                                    <span>{{number_format($item->escalas[0]->price, 0, 0, '.')}}</span> 
                                                </h4>
                                            </td>
                                            <td>
                                                <p class="quantity">
                                                    <i class="fa-solid fa-truck-fast"></i> 
                                                    <span>{{$item->delivery_time }}</span>
                                                </p>
                                            </td>
                                        </tr>
                                    </table>
                                    <a class="btn-view-product" href="/catalogo/producto/{{$item->id}}/{{$item->name}}">Ver detalle <i class="fa-solid fa-angle-right"></i></a>
                                </div>
                            </div>
                        
                    </div>
                </a>
            </div>
            <!--Fin Estructura desk-->
          
          @endforeach


        </div>
    </div>  

</div>

    
        


       
        
{{ $products->links() }}
</div>

@push('scripts')

<script>
      document.getElementById("btnFiltro").addEventListener("click", function() {
    document.getElementById("filtros").classList.toggle("active");
});
var boton = $('ul.pagination li:last button');
//$(boton).text('Siguiente');
$(boton).addClass('next-pagination');

var boton0 = $('ul.pagination li:last span');
//$(boton0).text('Anterior');
$(boton0).addClass('next-pagination');



var boton1 = $('ul.pagination li:first span');
//$(boton1).text('Anterior');
$(boton1).addClass('previus-pagination');

var boton2 = $('ul.pagination li:first button');
//$(boton2).text('Anterior');
$(boton2).addClass('previus-pagination');

        document.addEventListener('livewire:load', function () {


            
          var $propertiesForm = $('.mall-category-filter');
           $('.mall-slider-handles').each(function () {
               var el = this;
               var start_min=Math.round(@this.start_min);
               var start_max=Math.round(@this.start_max);
               noUiSlider.create(el, {
                   start: [start_min, start_max],
                   connect: true,
                   tooltips: true,
                   range: {
                       min: [start_min],
                       max: [start_max]
                   },
                   pips: {
                       mode: 'range',
                       density: 10
                   }
               }).on('change', function (values) {
                    @this.set('min_price',values[0]),
                    @this.set('max_price',values[1]),
                   $('[data-min="' + el.dataset.target + '"]').val(values[0])
                   $('[data-max="' + el.dataset.target + '"]').val(values[1])
                   //$propertiesForm.trigger('submit');
               });
           })
        })

        const elToggle  = document.querySelector("#toggle");
        const elContent = document.querySelector("#content");

        elToggle.addEventListener("click", function() {
        elContent.classList.toggle("is-hidden");
        });

        $(document).on('click', '.page-item', function (e) {
  $("html, body").animate({ scrollTop: 0 }, "fast");
  return false;
});
    </script>


@endpush

          
