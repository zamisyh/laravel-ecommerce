<form wire:submit.prevent='storeMass'>
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
    <div class="form-group">
        <label for="file_excel">File Excel</label>
        <input type="file" name="file_excel" id="file_excel" class="form-control @error('file_excel') is-invalid @enderror"
        wire:model.lazy='file_excel'>
        @error('file_excel') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <button class="btn btn-primary" wire:click='storeMass'>Upload</button>
    </div>
</form>
