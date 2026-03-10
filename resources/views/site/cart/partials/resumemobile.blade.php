<div class="detail-mobile mt-4">
    <p class="resume-check " >Total Pedido: <span>${{number_format(Cart::getTotal()+$totalextras, 0, 0, '.')}}</span></p>
    <div class="accordion accordion-flush mt-3" id="productsdesktap1">
        <div class="accordion-item back-trans">
            <h2 class="accordion-header" id="productstap1">
                <button class="accordion-button collapsed btn-products-cart" type="button" data-bs-toggle="collapse" data-bs-target="#product_tap1" aria-expanded="false" aria-controls="flush-collapseOne">
                    Productos carrito
                </button>
            </h2>
            <div id="product_tap1" class="accordion-collapse collapse show" aria-labelledby="productstap1" data-bs-parent="#productsdesktap1">
                <div class="accordion-body" style="padding: 1rem 15px;">
                    @foreach (Cart::getContent() as $item)
                        <div class="row item-product">
                            <div class="col-4" style="padding-left: 0;">
                                <img class="image-cart-detail" src="https://kanbai.co/images/products/thumbnail/{{$item->attributes->urlfoto}}" />
                            </div>
                            <div class="col-8" style="padding-left: 0;">
                                <h5 class="title-product-cart" style="font-size: 18px;">{{$item->name}}</h5>
                                <p class="info-product-cart f-14"> Precio und: <span class="resume-item">${{number_format($item->price, 0, 0, '.')}}</span></p>
                                <p class="info-product-cart f-14" > Cant: <span class="resume-item">{{$item->quantity}} </span></p>
                                <input type="hidden" value="{{$product = App\Models\Products::find($item->id)}}">
                               
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>