
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Point of Sale and Central Management Portal For Chancellor Grand Bhubaneswar Odisha">
    <meta name="author" content="Biswas Sampad,for Arch Technologies & Media ,For Chancellor Grand Bhubaneswar">
    <title>Chancenllor Grand</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">

    

  </head>
  <body>
        <div class="container-fluid">

            <div class="row">
                <div class="col-8 colma">
                    <div class="image-div">
                      <h2>Chancenllor Grand P.O.S</h2>
                    </div>        
                </div>
                <div class="col-4 login-div">
                    <div class="card">
                        <div class="card-header text-center">
                          Login
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                            <label for="inputEmail" class="sr-only">Email address</label>
                            <input type="email" id="inputEmail" class="form-control" placeholder="Email address"  name="email" value="{{ old('email') }}" required autofocus>
                            <label for="inputPassword" class="sr-only">Password</label>
                            <input type="password" id="inputPassword" placeholder="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                        </div>
                </div>
              </div>   
       </div>   
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    {{--  --}}
              {{-- </div>
    <form class="form-signin">
  
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
 
  <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
</form> --}}

</div>

</body>
</html>
