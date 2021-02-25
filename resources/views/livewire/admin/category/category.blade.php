<div>
    <div>

        @section('css')
            <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}">
        @endsection


        @section('title', 'Category')

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
                        <h6 class="m-0 font-weight-bold text-primary">Data Category</h6>
                         <button wire:click='create' class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                        id="#myBtn">Create Category</button>

                    </div>
                    <div class="table-responsive p-3">
                        @if($isFormCreate)
                           @include('livewire.admin.category.create')
                        @else

                            @if (session()->has('successCreate'))
                               <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ session('successCreate') }}
                                </div>
                            @endif

                            @if(session()->has('successUpdate'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ session('successUpdate') }}
                                </div>
                            @endif

                             @if(session()->has('successDelete'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ session('successDelete') }}
                                </div>
                            @endif

                            <table class="table table-bordered table-flush table-hover align-items-center" id="dataCategory">
                            <thead class="thead-light">

                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Parent</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>

                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->category }}</td>
                                        <td>{{ $item->parent ? $item->parent->category : '-' }}</td>
                                        <td>{{ Carbon\Carbon::parse($item->created_at)->format('d M Y - H:i:s') }}</td>
                                        <td class="d-flex">
                                            <button wire:click="delete({{ $item->id }})" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                            <button wire:click="edit({{ $item->id }})" class="btn btn-primary btn-sm ml-1"><i class="fas fa-edit"></i></button>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
             </div>


        </div>

        @section('js')
              <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
              <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

              <!-- Page level custom scripts -->
              <script>
                $(document).ready(function () {
                  $('#dataCategory').DataTable(); // ID From dataTable with Hover
                });
              </script>
        @endsection

     </div>

</div>
