<div>
    @section('title', 'Ecommerce No 1 Terbaik di Indonesia')

    @livewire('client.components.navbar')

    <main>
        @include('components.client.slider')
        @include('components.client.new-product')
        @include('components.client.popular-product')
        <x-client.shop-method />
    </main>
    <x-client.footer />

</div>
