<div>
    @section('title', 'Product')

     <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>

        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Products</h6>
                    @if ($mass)
                        <button wire:click='createMass' class="btn btn-primary">Mass Upload Product</button>
                    @else
                    <button wire:click='create' class="btn btn-primary">Create Product</button>
                    @endif

                </div>

                <div class="table-responsive p-3">
                    @if($isFormCreate)
                        @include('livewire.admin.product.create')
                    @else


                        @if (session()->has('successCreate'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ session('successCreate') }}
                            </div>
                        @endif
                         @if (session()->has('successDelete'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ session('successDelete') }}
                            </div>
                        @endif
                        @if (session()->has('successUpdate'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ session('successUpdate') }}
                            </div>
                        @endif

                        @if (session()->has('successUpload'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ session('successUpload') }}
                            </div>
                        @endif

                        <div class="mb-3 mb-3">
                            <input type="text" name="search" id="search" style="max-width: 250px" class="form-control" placeholder="Search products..." wire:model='search'>
                        </div>

                        <table class="table table-bordered table-flush table-hover align-items-center">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Weight</th>
                                    <th>Price</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>





                                @forelse($product as $item)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ asset('storage/images/product/' . $item->image) }}" height="100px"></td>
                                        <td>{{ $item->name }} <br> Kategori : <span class="badge badge-primary"> {{ $item->category->category }} </span></td>
                                        <td>{{ $item->weight }} gr</td>
                                        <td>Rp. {{ number_format($item->price) }}</td>
                                        <td>{{ $item->created_at->format('d M Y') }}</td>
                                        <td>
                                            @if($item->status == 0)
                                                <span class="badge badge-secondary">Draft</span>
                                            @else
                                                <span class="badge badge-success">Aktif</span>
                                            @endif
                                        </td>
                                        <td class="d-flex">
                                            <button class="btn btn-danger btn-sm" wire:click='delete({{ $item->id }})'><i class="fas fa-trash-alt"></i></button>
                                            <button class="btn btn-primary btn-sm ml-1" wire:click='edit({{ $item->id }})'><i class="fas fa-edit"></i></button>
                                        </td>
                                    </tr>

                                    @empty
                                       <td>{{ $search ? 'Product not founds' : 'data does not exist in the database' }}</td>
                                @endforelse
                            </tbody>
                        </table>

                        <div class="mt-3 mb-3">
                            {{ $product->links() }}

                        </div>
                    @endif
                </div>
            </div>
        </div>

   </div>
</div>
