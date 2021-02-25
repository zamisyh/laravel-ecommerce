<div>
    <span wire:click='logout'>Logout</span>

    @if (session()->has('logout'))
        <script>
            var url = "{{ route('login') }}";
            setTimeout(function(){
                window.location = url;
            },100);
        </script>
    @endif
</div>
