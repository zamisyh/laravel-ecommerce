<div>

    @if (Cart::count() == 0)
        @section('title', 'Checkout Errors')
        <script>alert('You must purchase a product or confirm checkout, in order to open this page');</script>
        <script>window.location='/cart'</script>
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
                    
                      <div class="col-md-12 form-group p_star">
                        <input type="text" wire:model='name' class="form-control @error('name') is-invalid @enderror " value="{{ old('name') }}"/>
                        <span class="placeholder" data-placeholder="Name"></span>
                        @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                      </div>
                      <div class="col-md-12 form-group p_star">
                        <input type="text" wire:model='email' class="form-control @error('email') is-invalid @enderror " value="{{ old('email') }}" />
                        <span class="placeholder" data-placeholder="Email Address"></span>
                        @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                      </div>
                      <div class="col-md-12 form-group p_star">
                        <input type="text" wire:model='address' class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" />
                        <span class="placeholder" data-placeholder="Address"></span>
                        @error('address') <span class="error text-danger">{{ $message }}</span> @enderror
                      </div>

                      {{-- @livewire('client.components.dropdowns') --}}
                      <div class="col-md-12 form-group p_star">

                        <select wire:model='selectedCountry' class="form-control">
                            <option value="" selected>Choose a Country</option>
                            @foreach ($countries as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        
                        <br>
                    
                        @if (!is_null($cities))
                            <select wire:model='selectedCity' class="form-control">
                                <option value="" selected>Choose a City</option>
                                @foreach ($cities as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        @endif
                    
                        <br>
                    
                        @if (!is_null($district))
                            <select wire:model='selectedDistrict' class="form-control">
                                <option value="" selected>Choose a District</option>
                                @foreach ($district as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        @endif
                    
                        <br>
                    
                        @if (!is_null($village))
                            <select wire:model='selectedVillage' class="form-control">
                                <option value="" selected>Choose a Village</option>
                                @foreach ($village as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        @endif
                      
                       
                    </div>
                    

                      <div class="col-md-12 form-group">
                        <textarea class="form-control @error('notes') is-invalid @enderror" wire:model='notes'
                          placeholder="Order Notes"></textarea>
                          @error('notes') <span class="error text-danger">{{ $message }}</span> @enderror
                      </div>

                      <div class="form-group">
                        <button class="btn btn-primary" wire:loading.remove wire:click='saveOrder'>Checkout</button>
                        <button class="btn btn-primary" wire:loading wire:target='saveOrder'>Loading..</button>
                        
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
                        @foreach ($cart as $item)
                        <li>
                            <a href="#">{{ $item->name }}
                              <span class="middle">x {{ $item->qty }}</span>
                              <span class="last">Rp. {{ number_format($item->subtotal) }}</span>
                            </a>
                          </li>
                        @endforeach
                      </ul>
                      <ul class="list list_2">
                        <li>
                          <a href="#">Subtotal
                            <span>Rp. {{ Cart::subtotal() }}</span>
                          </a>
                        </li>
                        <li>
                          <a href="#">Shipping
                            <span>Free Shipping</span>
                          </a>
                        </li>
                        <li>
                            <a href="#">Tax
                              <span>Rp. {{ Cart::tax() }}</span>
                            </a>
                          </li>
                        <li>
                          <a href="#">Total
                            <span>Rp. {{ Cart::total() }}</span>
                          </a>
                        </li>
                      </ul>
                      <div class="payment_item">
                        <div class="radion_btn">
                          <input type="radio" id="f-option5" name="selector" />
                          <label for="f-option5">Check payments</label>
                          <div class="check"></div>
                        </div>
                        <p>
                          Please send a check to Store Name, Store Street, Store Town,
                          Store State / County, Store Postcode.
                        </p>
                      </div>
                      <div class="payment_item active">
                        <div class="radion_btn">
                          <input type="radio" id="f-option6" name="selector" />
                          <label for="f-option6">Paypal </label>
                          <img src="img/product/single-product/card.jpg" alt="" />
                          <div class="check"></div>
                        </div>
                        <p>
                          Please send a check to Store Name, Store Street, Store Town,
                          Store State / County, Store Postcode.
                        </p>
                      </div>
                      <div class="creat_account">
                        <input type="checkbox" id="f-option4" name="selector" />
                        <label for="f-option4">I’ve read and accept the </label>
                        <a href="#">terms & conditions*</a>
                      </div>
                      <a class="btn_3" href="#">Proceed to Paypal</a>
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
