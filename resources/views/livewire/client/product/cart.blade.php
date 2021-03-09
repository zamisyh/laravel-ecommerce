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

        <section class="cart_area section_padding">
            <div class="container">
              <div class="cart_inner">
                <div class="table-responsive">
                  <table class="table">
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
                        @forelse ($cart['products'] as $item)
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
                                  {{ $totalPrice }}
                                  <input class="input-number" type="number" value="1" min="0" max="10">

                              </div>
                            </td>
                            <td>
                              <h5>$720.00</h5>
                            </td>
                            <td>
                                <button wire:click='removeItem({{ $item->id }})' class="genric-btn danger small"><i class="fas fa-trash-alt"></i></button>
                            </td>
                          </tr>

                          @empty
                            <td> No Products | Lets buy something your products</td>
                          @endforelse

                        <td></td>
                        <td></td>
                        @if ($cart['products'])
                        <td>
                            <h5>Subtotal</h5>
                          </td>
                          <td>
                            <h5>$2160.00</h5>
                          </td>
                        @endif
                      </tr>

                    </tbody>
                  </table>
                  <div class="checkout_btn_inner float-right">
                    <a class="btn_1" href="{{ route('client.shop') }}">Continue Shopping</a>
                    @if ($cart['products'])
                        <a class="btn_1 checkout_btn_1" wire:click='checkout'>Proceed to checkout</a>
                    @endif
                  </div>
                </div>
              </div>
          </section>



            <x-client.shop-method />
        </main>
    <x-client.footer />


</div>