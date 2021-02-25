<div class="form-grouo">
      <label for="category">Category</label>
      <input type="text" wire:model.lazy="category" name="category" id="category"  class="form-control @error('category') is-invalid @enderror">
      @error('category') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
       <label for="parent_id">Parent</label>
       <select name="parent_id" wire:model.lazy="parent_id" class="form-control @error('parent_id') @enderror">
            <option value="">None</option>
            @foreach ($parent as $row)
                <option value="{{ $row->_id }}">{{ $row->category }}</option>
            @endforeach
        </select>
         @error('parent_id') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
       @if($category_id)
          <button wire:click="update({{ $category_id }})" class="btn btn-primary">Update</button>
       @else
          <button wire:click="store" class="btn btn-success">Save</button>
       @endif
</div>
