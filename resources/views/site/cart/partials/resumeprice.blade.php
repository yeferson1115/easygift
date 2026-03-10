<h4 class="title-resume mb-5">Resumen carrito</h4> 
                                    <p class="resume-check">Subtotal: <span>${{number_format(Cart::session('secondary')->getTotal(), 0, 0, '.')}}</span></p>
                                    
                                    @php
                                        $totalenvio = 0;
                                    @endphp
                                    @if (count(Cart::session('secondary')->getContent()))
                                    
                                    @foreach (Cart::session('secondary')->getContent() as $item)  
                                        @if($item->attributes->extra!=null && count($item->attributes->extra)>0)
                                            @foreach($item->attributes->extra as $extra)
                                                @php
                                                $totalextras=$totalextras+($extra['price'] * $item->quantity);
                                                $noextras++;
                                                @endphp
                                                <p class="resume-check">{{$extra['name']}} <span style="color: #1FD161;">x{{$item->quantity}}</span>: <span>${{number_format($extra['price'] * $item->quantity, 0, 0, '.')}}</span></p>
                                                
                                            @endforeach
                                        @endif
                                    @endforeach
                                    @php                                       
                                        $product = \App\Models\Products::where('id', $item->id)->first();
                                    @endphp

                                    @if($product->shipping_price && $product->shipping_price != 0 && $product->packaging_unit_quantity > 0)
                                        @php
                                            $packaging_unit_quantity = $product->packaging_unit_quantity;
                                            $quantity_requested = $item->quantity;
                                            $empaques = ceil($quantity_requested / $packaging_unit_quantity);
                                            $totalenvio += $product->shipping_price * $empaques;
                                        @endphp

                                        <p class="resume-check">
                                            Valor Envío <span>${{ number_format($totalenvio, 0, 0, '.') }}</span>
                                        </p>
                                    @endif


                                @endif

                                    <hr class="separated-dotted">
                                    <p class="resume-check" >Valor Total: <span>${{number_format(Cart::session('secondary')->getTotal()+$totalextras+$totalenvio, 0, 0, '.')}}</span></p>