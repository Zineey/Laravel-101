@section('login')

<div class="container col-xxl-8 px-4 py-5 justify-content-between">
    <div class="row d-flex align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img class="d-block mx-auto mb-4" src= "{{asset('assets/signup.svg')}}" alt="Forum" height= "500" width= "500">
      </div>
    <div class="col-md-10 mx-auto col-lg-5">
        <form action = "{{ route('register-user') }}" method = "POST" class="shadow p-3 mb-5 px-4 py-5 my-5 text-center bg-light rounded">
          @csrf
        <label><h4>Register</h4></label>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name = "name" required>
            <label for="floatingInput">Name
            @if ($errors->has('name'))
          <span class="text-danger">{{ $errors->first('name') }}</span>
          @endif
            </label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" name = "email" required>
            <label for="floatingInput">Email address
            @if ($errors->has('email'))
          <span class="text-danger">{{ $errors->first('email') }}</span>
          @endif
            </label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" name = "password" required>
            <label for="floatingPassword">Password
            @if ($errors->has('password'))
          <span class="text-danger">{{ $errors->first('password') }}</span>
          @endif
            </label>
          </div>
          <div class="d-flex justify-content-center">
          <a href="/login" class="nav-link text-primary pt-2">Back to Login</a>
          <button class="w-40 btn btn-lg btn-primary ml-2" type="submit">Sign Up</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection