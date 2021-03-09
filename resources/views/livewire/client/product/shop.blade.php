<div>
    @section('title', 'Shop')

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

            <section class="popular-items latest-padding">
                <div class="container">
                    <div class="row product-btn justify-content-between mb-40">
                        <div class="properties__button">
                            <!--Nav Button  -->
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">

                                    <div class="default-select" id="default-select">
                                        @if (!$filter)
                                        <button wire:click='filterBtn' class="genric-btn primary btn-sm ml-3"><i class="fas fa-search"></i> Filter</button>
                                        @else
                                            <select wire:model='filter' name='filter'>
                                                <option value="default" selected="selected">Default sorting</option>
                                                <option value="1">New Product</option>
                                                <option value="2">Product Price To High</option>
                                                <option value="3">Product Price To Low</option>
                                                <option value="4">Most Popular</option>
                                                <option value="5">Category</option>
                                                <option value="6">Searching</option>
                                            </select>
                                        @endif
                                    </div>

                                    @if ($searchBox)
                                        <input type="text" wire:model="search" class="ml-3" placeholder="Search Product">
                                    @endif



                                    @if ($categoryBox)
                                        <select wire:model='categoryModel' class="default-select nav-item nav-link ml-3" id="default-select nav-contact-tab"  data-toggle="tab">
                                            <option disabled>By Category</option>
                                            @foreach ($category as $item)
                                                <option value="{{ $item->_id }}">{{ $item->category }}</option>
                                            @endforeach
                                        </select>
                                    @endif

                                </div>
                            </nav>
                            <!--End Nav Button  -->
                        </div>
                        <!-- Grid and List view -->
                        <div class="grid-list-view">
                        </div>
                        <!-- Select items -->
                       @if ($filter)
                        <div class="select-this">

                            <select id="select1" wire:model="pagesize">
                                <option value="6" selected="selected">6 per page</option>
                                <option value="12">12 per page</option>
                                <option value="18">18 per page</option>
                                <option value="24">24 per page</option>
                                <option value="30">30 Per page</option>

                            </select>
                        </div>
                       @endif
                    </div>

                    <!-- Nav Card -->
                    <div class="tab-content" id="nav-tabContent">

                        <div>
                            <h3>{{ $title }}</h3>
                        </div>
                        <!-- card one -->
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                           @if ($searchBox && $search == null)
                                No Product Found | Searching to get your products..
                           @endif

                           @if ($categoryBox && $categoryModel == null)
                                No category Found | Choose to get your categorys..
                           @endif
                            <div class="row">
                                @forelse ($products as $item)
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="single-popular-items mb-50 text-center">
                                            <div class="popular-img">
                                                <img src="{{ asset('storage/images/product/' . $item->image) }}" alt="">
                                                <div class="img-cap">
                                                    <span wire:click='addToCart({{ $item->id }})'>Add to cart</span>
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
                                    @empty

                                    @if ($categoryModel && $search != null)
                                       <span class="ml-3"> Data does not exist in the database</span>
                                    @endif

                                @endforelse
                            </div>
                        </div>
                    </div>

                    {{ $products->links() }}

                    <!-- End Nav Card -->
                </div>
            </section>

            <x-client.shop-method />
        </main>
    <x-client.footer />

    @section('js')
    <script type='text/javascript'>

        (function()
        {
          if( window.localStorage )
          {
            if( !localStorage.getItem('firstLoad') )
            {
              localStorage['firstLoad'] = true;
              window.location.reload();
            }
            else
              localStorage.removeItem('firstLoad');
          }
        })();

        </script>
    @endsection

</div>
