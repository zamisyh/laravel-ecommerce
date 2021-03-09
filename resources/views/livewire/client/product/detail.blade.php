<div>
   @section('title', 'Ecommerce No 1 Terbaik di Indonesia')

   @livewire('client.components.navbar')

    <main>
    <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Blanja Shop</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="product_image_area">
            <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                <div class="product_img_slide owl-carousel">
                    <div class="single_product_img">
                       <center>
                            <img src="{{ asset('storage/images/product/' . $product->image) }}" alt="#" class="img-fluid" style="width:500px;">
                       </center>
                    </div>
                </div>
                </div>
                <div class="col-lg-8">
                <div class="single_product_text text-center">
                    <h3>{{ $product->name }}</h3>
                    <p>
                        {{ $product->description }}
                    </p>
                    <div class="card_area table-responsive">
                       <table class="table table-bordered table-striped">
                           <thead>
                              <tr>
                                 <th>Price</th>
                                 <th>Weight</th>
                                 <th>Category</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>Rp. {{ number_format($product->price) }}</td>
                                 <td>{{ $product->weight }}</td>
                                 <td>{{ $product->category->category }}</td>
                              </tr>
                           </tbody>
                       </table>
                    <div class="add_to_cart">
                        <a wire:click='addToCart({{ $product->id }})' Class="btn_3">add to cart</a>
                    </div>

                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>

        <x-client.shop-method />
    </main>
    <x-client.footer />
</div>


