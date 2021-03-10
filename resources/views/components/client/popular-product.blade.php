<div style="margin-top: -10%">
      <!--? Popular Items Start -->
      <div class="popular-items section-padding30">
        <div class="container">
            <!-- Section tittle -->
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-10">
                    <div class="section-tittle mb-70 text-center">
                        <h2>Popular Items</h2>
                        <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                    </div>
                </div>
            </div>
            <div class="row">
               @foreach ($product['popularProduct'] as $item)
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <div class="single-popular-items mb-50 text-center">
                        <div class="popular-img">
                            <img src="{{ asset('storage/images/product/' . $item->image) }}" alt="">
                            <div class="img-cap">
                                <span wire:click="addToCart({{$item->id}})">Add to cart</span>



                            </div>
                            <div class="favorit-items">
                                <li class="badge badge-primary" style="list-style: none">{{ $item->category->category }}</li>
                            </div>
                        </div>
                        <div class="popular-caption">
                            <h3><a href='{{ url("product/{$item->slug}") }}'>{{ $item->name }}</a></h3>
                            <span>Rp. {{ number_format($item->price) }}</span>
                        </div>
                    </div>
                </div>
               @endforeach
            </div>



            <!-- Button -->
            <div class="row justify-content-center">
                <div class="room-btn pt-70">
                    <a wire:click='loadMore' wire:loading.remove class="btn view-btn1 text-white">View More Products</a>
                    <a wire:loading wire:target='loadMore' class="btn view-btn1 text-white">Load Data..</a>
                </div>

            </div>
        </div>
    </div>
</div>
