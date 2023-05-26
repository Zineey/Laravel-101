@section('login')

<div class="container col-xxl-8 px-4 py-5 justify-content-between">
    <div class="row d-flex align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img class="d-block mx-auto mb-4" src= "{{asset('assets/welcome.svg')}}" alt="Forum" height= "500" width= "500">
      </div>
    <div class="col-md-10 mx-auto col-lg-5">
        <form class="shadow p-3 mb-5 px-4 py-5 my-5 text-center bg-light rounded" action = "{{ route('login-auth') }}" method="POST">
          @csrf
        <label><h4>Log in</h4></label>
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" name = "email" >
            <label for="floatingInput">Email</label>
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror 
          </div>
          
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" name="password">
              <label for="floatingPassword">Password</label>
              @error('password')
                <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>

          <div class="d-flex justify-content-center">
          <a href="/register" class="nav-link text-primary pt-2">Sign up</a>
          <button class="w-40 btn btn-lg btn-primary ml-2" type="submit">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection