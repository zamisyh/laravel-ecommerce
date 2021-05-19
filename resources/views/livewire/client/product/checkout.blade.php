
<div>
    @section('css')
        <link rel="stylesheet" href="{{ asset('assets/vendor/select2/select2.min.css') }}">
    @endsection

    @if (Cart::count() == 0)
        @section('title', 'Checkout Errors')
        <script>alert('You must purchase a product or confirm checkout, in order to open this page');</script>
        <script>window.location='/cart'</script>
    @endif


    @if ($toLogin)
      <script>
        var url = "{{ route('login') }}";
        setTimeout(function(){
            window.location = url;
        },3500);
     </script>
    @endif


    @section('title', 'Checkout')

    @livewire('client.components.navbar')
    <main>
        <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Checkout</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="checkout_area section_padding">
            <div class="container">
              {{-- <div class="cupon_area">
                <div class="check_title">
                  <h2>
                    Have a coupon?
                    <a href="#">Click here to enter your code</a>
                  </h2>
                </div>
                <input type="text" placeholder="Enter coupon code" />
                <a class="tp_btn" href="#">Apply Coupon</a>
              </div> --}}
              <div class="billing_details">
                <div class="row">
                  <div class="col-lg-8">
                    <h3>Billing Details</h3>

                      @if (!Auth::check())
                      <div class="col-md-12 form-group p_star">
                        <label for="name">Name</label><span class="text-danger"> *</span>
                        <input type="text" wire:model='name' placeholder="Input your name" class="form-control @error('name') is-invalid @enderror " value="{{ old('name') }}"/>
                        @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                      </div>
                      <div class="col-md-12 form-group p_star">
                        <label for="email">Email</label><span class="text-danger"> *</span>
                        <input type="text" wire:model='email' placeholder="Input your email" class="form-control @error('email') is-invalid @enderror " value="{{ old('email') }}" />
                        @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                      </div>
                      <div class="col-md-12 form-group p_star">
                        <label for="notelp">No Telp</label><span class="text-danger"> *</span>
                        <input type="text" wire:model='notelp' placeholder="Input your number telephone" class="form-control @error('notelp') is-invalid @enderror " value="{{ old('notelp') }}" />
                        @error('notelp') <span class="error text-danger">{{ $message }}</span> @enderror
                      </div>

                      {{-- @livewire('client.components.dropdowns') --}}
                      <div class="col-md-12 form-group p_star">
                        <label for="name">Country</label><span class="text-danger"> *</span>
                        <select wire:model='selectedCountry' class="form-control @error('selectedCountry') is-invalid @enderror">
                            <option value="" selected>Choose a Country</option>
                            @foreach ($countries as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('selectedCountry') <span class="error text-danger">{{ $message }}</span> @enderror

                        <br>

                        @if (!is_null($cities))
                            <label for="name">City</label><span class="text-danger"> *</span>
                            <select wire:model='selectedCity' class="form-control @error('selectedCity') is-invalid @enderror">
                                <option value="" selected>Choose a City</option>
                                @foreach ($cities as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('selectedCity') <span class="error text-danger">{{ $message }}</span> @enderror
                        @endif

                        <br>

                        @if (!is_null($district))
                            <label for="name">District</label><span class="text-danger"> *</span>
                            <select wire:model='selectedDistrict' class="form-control @error('selectedDistrict') is-invalid @enderror">
                                <option value="" selected>Choose a District</option>
                                @foreach ($district as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('selectedDistrict') <span class="error text-danger">{{ $message }}</span> @enderror
                        @endif

                        <br>

                        @if (!is_null($village))
                        <label for="name">Village</label><span class="text-danger"> *</span>
                            <select wire:model='selectedVillage' class="form-control @error('selectedVillage') is-invalid @enderror">
                                <option value="" selected>Choose a Village</option>
                                @foreach ($village as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('selectedVillage') <span class="error text-danger">{{ $message }}</span> @enderror
                        @endif


                        @if (Auth::check())
                      </div>
                        @endif


                    @endif



                    <div class="form-group" @if (!Auth::check())
                        style="margin-top: -7%"
                    @endif>
                       @if (!Auth::check())
                       <h3>Calculate Ongkir</h3>
                       @endif
                        <label for="origin">Origin</label><span class="text-danger"> *</span>
                        <select wire:model='origin' name="origin" id="origin" class="origin js-states form-control">
                            @foreach ($ongkir['rajaongkir']['results'] as $item)
                                <option value="{{ $item['city_id'] }}">
                                    @if ($item['type'] == 'Kabupaten')
                                        [Kab]
                                    @else
                                        [Kota]
                                    @endif
                                    {{ $item['city_name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                      <label for="destination">Destination</label><span class="text-danger"> *</span>
                      <select wire:model='destination' name="destination" id="destination" class="destination js-states form-control">
                        @foreach ($ongkir['rajaongkir']['results'] as $item)
                            <option value="{{ $item['city_id'] }}">
                                @if ($item['type'] == 'Kabupaten')
                                    [Kab]
                                @else
                                    [Kota]
                                @endif
                                {{ $item['city_name'] }}
                            </option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="courier">Courier</label><span class="text-danger"> *</span>
                      <select name="courier" wire:model='courier' id="courier" class="form-control">
                          <option value="" selected>Choose a Courier</option>
                          <option value="jne">JNE</option>
                          <option value="pos">POS Indonesia</option>
                          <option value="tiki">Tiki</option>
                      </select>
                    </div>

                    @if (!is_null($service))
                    <label for="name">Services</label><span class="text-danger"> *</span>
                        <select wire:model='selectedService' class="form-control @error('selectedVillage') is-invalid @enderror">
                            <option value="" selected>Services</option>

                        </select>
                        @error('selectedVillage') <span class="error text-danger">{{ $message }}</span> @enderror
                    @endif

                 @if (!Auth::check())
                      </div>
                 @endif



                    <div class="col-md-12 form-group p_star">
                      <label for="address">Address</label><span class="text-danger"> *</span>
                      <textarea wire:model='address' class="single-textarea @error('address') is-invalid @enderror"
                      placeholder="Home/Address/Street/Office" onfocus="this.placeholder = ''"
                      onblur="this.placeholder = 'Home/Address/Street/Office'"></textarea>
                      @error('address') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                      <div class="col-md-12 form-group">
                        <label for="notes">Notes</label><span class="text-danger"> *</span>
                        <textarea class="single-textarea @error('notes') is-invalid @enderror" wire:model='notes'
                          placeholder="Order Notes" onfocus="this.placeholder = ''"
                          onblur="this.placeholder = 'Order Notes'"></textarea>
                          @error('notes') <span class="error text-danger">{{ $message }}</span> @enderror
                      </div>


                  </div>
                  <div class="col-lg-4">
                    <div class="order_box">
                      <h2>Your Order</h2>
                      <ul class="list">
                        <li>
                          <a href="#">Product
                            <span>Total</span>
                          </a>
                        </li>

                        @php
                            $getWeight = 0;
                        @endphp

                        @foreach ($cart as $item)
                          <li>
                            <a href="#">{{ $item->name }}
                              <span class="middle">x {{ $item->qty }}</span>
                              <span class="last">Rp. {{ number_format($item->subtotal) }}</span>
                            </a>
                          </li>
                          <li class="d-none">
                              {{ $getWeight += $item->weight }}
                          </li>
                        @endforeach
                      </ul>
                      <ul class="list list_2">

                        <li>
                          <a href="#">Weight
                              <span>{{ $getWeight }} g</span>

                          </a>
                        </li>
                        <li>
                          <a href="#">Subtotal
                            <span>Rp. {{ Cart::subtotal() }}</span>
                          </a>
                        </li>
                          <a href="#">Total
                            <span>Rp. {{ Cart::total() }}</span>
                          </a>
                        </li>
                      </ul>

                      <div class="creat_account">
                        <input type="checkbox" id="f-option4" name="selector" />
                        <label for="f-option4">I’ve read and accept the </label>
                        <a href="#">terms & conditions*</a>
                      </div>


                      <button class="btn btn-primary btn-block" wire:loading.remove wire:click='saveOrder'>Checkout</button>
                      <button class="btn btn-primary btn-block" wire:loading wire:target='saveOrder'>Loading..</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <x-client.shop-method />
    </main>

    <x-client.footer />


</div>

@section('js')
    <script src="{{ asset('assets/vendor/select2/select2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $(".origin").select2({
                placeholder: "Select a Origin",
                allowClear: true
            });

            $(".destination").select2({
                placeholder: "Select a Destination",
                allowClear: true
            });

            $('#select2').select2({
                    theme: "classic"
                });

            $('#origin').on('change', function() {
                @this.origin = $(this).val();
            });

            $('#destination').on('change', function() {
                @this.destination = $(this).val();
            });



        });
    </script>
@endsection
