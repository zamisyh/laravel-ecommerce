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
