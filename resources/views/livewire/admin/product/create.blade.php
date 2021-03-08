<div>
    @if ($massOpenForm)
      @include('livewire.admin.product.mass')
    @else

    <div enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" wire:model.lazy="name">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select name="category" id="category" class="form-control @error('category') is-invalid @enderror" wire:model.lazy="category">
                <option>Pilih</option>
                @foreach($dataCategory as $item)
                     <option value="{{ $item->_id }}">{{ $item->category }}</option>
                @endforeach
            </select>
            @error('category') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        @if ($product_id)
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" wire:model.lazy="status">
                    <option>Pilih</option>
                    <option value="1">Publish</option>
                    <option value="0">Draft</option>
                </select>
                @error('status') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        @endif
        <div class="form-group">
            <label for="description">Desctiption</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="5" wire:model.lazy="description"></textarea>
            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="weight">Weight</label>
            <input type="number" name="weight" id="weight" class="form-control @error('weight') is-invalid @enderror" wire:model.lazy="weight">
            @error('weight') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" wire:model.lazy="price">
            @error('price') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label class="image">Image</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" wire:model.lazy='image'>
                @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                <div wire:loading wire:target="image"><span class="spinner-border spinner-border-sm"></span> Uploading...</div>

                <div class="mt-3">
                    @if ($product_id)
                        <div class="mt-4">
                            <img src="{{ asset('storage/images/product/' . $image) }}" alt="" height="100px">
                        </div>
                    @elseif($image || $product_id)
                        <div class="mt-4">
                            <img src="{{ $image->temporaryUrl() }}" height="100px">
                        </div>
                    @endif


                </div>
        </div>
        <div class="form-group">
           @if ($product_id)
               <button class="btn btn-primary" wire:click='update({{ $product_id }})'>Update</button>
           @else
               <button class="btn btn-primary" wire:click='store'>Submit</button>
           @endif
        </div>
    </div>

    @endif
</div>
