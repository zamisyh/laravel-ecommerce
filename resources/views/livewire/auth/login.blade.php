<div>
    @section('title')
        Admin Authentication
    @endsection

     <div class="container-login">
        <div class="row justify-content-center">
          <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card shadow-sm my-5">
              <div class="card-body p-0">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="login-form">
                      <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Login Page</h1>
                      </div>



                      <form class="user" wire:submit.prevent="login">
                        @if (session()->has('successLogin'))
                              <script>
                                var url = "{{ route('admin.home') }}";
                                setTimeout(function(){
                                    window.location = url;
                                },3500);
                            </script>
                        @endif
                        @if (session()->has('errLog'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                           {{ session('errLog') }}
                          </div>
                        @endif
                        <div class="form-group">
                          <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" wire:model.lazy="email" aria-describedby="emailHelp"
                            placeholder="Enter Email Address">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                             <input type="password" name="password" wire:model.lazy="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Password">
                             @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                          <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                            <input type="checkbox" class="custom-control-input" id="customCheck">
                            <label class="custom-control-label" for="customCheck">Remember
                              Me</label>
                          </div>
                        </div>
                        <div class="form-group">
                            @if (session()->has('successLogin'))
                                <button class="btn btn-primary btn-block" disabled> <span class="spinner-border spinner-border-sm"></span> Redirecting...</button>
                            @else
                                <button class="btn btn-primary btn-block">Login</button>
                            @endif
                        </div>
                    </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
