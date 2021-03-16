<div>
    @section('title', 'Cart')

    @livewire('client.components.navbar')

    <main>
        <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Blanja Shop | Cart List</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if ($redirectCheckout)
            <script>
                var url = "{{ route('client.checkout') }}";
                setTimeout(function(){
                    window.location = url;
                },2000);
            </script>
        @endif

        <section class="cart_area section_padding">
            <div class="container">
              <div class="cart_inner">
                <div class="table-responsive">
                  <table class="table" id="tableData">
                    <thead>
                      <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($cart as $item)
                        <tr>
                            <td>
                              <div class="media">
                                <div class="d-flex">
                                  <img src="assets/img/gallery/card2.png" alt="" />
                                </div>
                                <div class="media-body">
                                  <span>{{ $item->name }}</span>
                                </div>
                              </div>
                            </td>
                            <td>
                              <span>Rp. {{ number_format($item->price) }}</span>
                            </td>
                            <td>
                                <div class="product_count">
                                    <span class="input-number-decrement" wire:click='decrement("{{ $item->rowId }}")'> <i class="ti-minus"></i></span>
                                    <input class="input-number" type="text" value="{{ $item->qty }}" min="1" max="10">
                                    <span class="input-number-increment" wire:click='increment("{{ $item->rowId }}")'> <i class="ti-plus"></i></span>
                                </div>
                            </td>
                            <td>
                              <span>Rp. {{ number_format($item->subtotal) }}</span>
                            </td>
                            <td>
                                <button wire:click='removeItem("{{ $item->rowId }}")' class="genric-btn danger small"><i class="fas fa-trash-alt"></i></button>
                            </td>
                          </tr>

                          @empty
                            <td> No Products | Lets buy something your products</td>
                          @endforelse

                        <td></td>
                        <td></td>
                        @if (Cart::count() > 0)
                        <td>
                            <h5>Tax</h5><br>
                            <h5>Subtotal</h5><br>
                            <h5>Total</h5>
                          </td>
                          <td>
                            <h5>Rp. {{ Cart::tax() }}</h5><br>
                            <h5>Rp. {{ Cart::subtotal() }}</h5><br>
                            <h5>Rp. {{ Cart::total() }}</h5>
                          </td>

                        @endif
                      </tr>

                    </tbody>
                  </table>
                  <div class="checkout_btn_inner float-right">

                    <a class="btn_1" href="{{ route('client.shop') }}">Continue Shopping</a>
                    @if (Cart::count() > 0)

                        @if ($redirectCheckout)
                            <a class="btn_1 checkout_btn_1" ><span class="spinner-border spinner-border-sm"></span> Loading..</a>
                        @else
                            <a class="btn_1 checkout_btn_1" wire:click='checkout'>Proceed to checkout</a>
                        @endif


                    @endif
                  </div>
                </div>
              </div>
          </section>



            <x-client.shop-method />
        </main>
    <x-client.footer />




</div>
