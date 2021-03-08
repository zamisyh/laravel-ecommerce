<div>
      <!--? slider Area Start -->
      <div class="slider-area ">
        <div class="slider-active">
            <!-- Single Slider -->
            @foreach ($product['slider'] as $item)
                <div class="single-slider slider-height d-flex align-items-center slide-bg">
                    <div class="container">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="hero__caption">
                                    <h1 data-animation="fadeInLeft" data-delay=".4s" data-duration="2000ms">{{ $item->name }}</h1>
                                    <p data-animation="fadeInLeft" data-delay=".7s" data-duration="2000ms">{{ $item->description }}</p>
                                    <!-- Hero-btn -->
                                    <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s" data-duration="2000ms">
                                        <a href='{{ url("product/{$item->slug}") }}' class="btn hero-btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
