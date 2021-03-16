<div>

    @if (Cart::count() == 0)
        @section('title', 'Checkout Errors')
        <script>alert('You must purchase a product or confirm checkout, in order to open this page');</script>
        <script>window.location='/cart'</script>
    @endif


    @section('title', 'Checkout')
    @livewire('client.components.navbar')

</div>
