<div>
    <!-- ? New Product Start -->
    <section class="new-product-area section-padding30">
        <div class="container">
            <!-- Section tittle -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="section-tittle mb-70">
                        <h2>New Arrivals</h2>
                    </div>
                </div>
            </div>
            <div class="row">
               @foreach ($product['newArrivals'] as $item)
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <div class="single-new-pro mb-30 text-center">
                        <div class="product-img">
                            <img src="{{ asset('storage/images/product/' . $item->image) }}" alt="">
                        </div>
                        <div class="product-caption">
                            <h3><a href='{{ url("product/{$item->slug}") }}'>{{ $item->name }}</a></h3>
                            <span>Rp. {{ number_format($item->price) }}</span>
                        </div>
                    </div>
                </div>
               @endforeach
            </div>
        </div>
    </section>
</div>
