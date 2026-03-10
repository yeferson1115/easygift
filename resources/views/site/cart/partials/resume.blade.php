<div class="accordion accordion-flush mt-3" id="productsdesktap1">
    <div class="accordion-item">
        <h2 class="accordion-header" id="productstap1">
            <button class="accordion-button btn-products-cart" type="button" data-bs-toggle="collapse" data-bs-target="#product_tap1" aria-expanded="true" aria-controls="product_tap1">
                Productos carrito
            </button>
        </h2>
        <div id="product_tap1" class="accordion-collapse collapse show" aria-labelledby="productstap1" data-bs-parent="#productsdesktap1">
            <div class="accordion-body" style="padding: 1rem 15px;">
                @foreach (Cart::getContent() as $item)
                <div class="row item-product">
                    <div class="col-4" style="padding-left: 0;">
                        <img class="image-cart-detail" src="https://kanbai.co/images/products/thumbnail/{{$item->attributes->urlfoto }}" />
                    </div>
                    <div class="col-8" style="padding-left: 0;">
                        <h5 class="title-product-cart" style="font-size: 14px;">{{$item->name}}</h5>
                        <div class="row">
                            <div class="col-8" >
                                <p class="info-product-cart f-14">Precio und: <span class="resume-item">${{number_format($item->price, 0, 0, '.')}}</span></p>
                            </div>
                            <div class="col-4" style="padding-left: 0;">
                                 <p class="info-product-cart q-resume">Cant: <span class="resume-item">{{$item->quantity}}</span></p>
                            </div>
                        </div>
                        <input type="hidden" value="{{$product = App\Models\Products::find($item->id)}}">
                        @if(!is_null($product->delivery_time))
                        <!--<p class="info-product-cart f-14"><i class="fa fa-truck c-green" aria-hidden="true"></i> Tiempo de Entrega: <span class="resume-item">{{$product->delivery_time}}</span></p>-->
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div> 
</div>