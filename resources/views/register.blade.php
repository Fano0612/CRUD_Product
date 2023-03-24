<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fano's Shopping Inc.</title>
    <link rel="icon" type="image/x-icon" href="{{ URL::asset('images/Logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

<div class="container" style="margin-top: 30px; margin-bottom: 30px;">
  <div class="row justify-content-center">
    <div class="col-8">
      <div class="card">
        <div class="card-body">
          @if($errors->any())
          @foreach($errors->all() as $err)
          <p class = "alert alert-danger">{{$err}}</p>
          @endforeach
          @endif
          <form action="{{ route('registeracc') }}" method="POST">
            @csrf
            <div class="text-center">
              <img src="{{ URL::asset('images/Logo.png') }}" class="rounded" alt="" height="150px" width="170px">
              <h1>Register</h1>
            </div>
            <br>
            <div class="form-group mb-3">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="user_username" name="user_username" placeholder="Enter your Username" value="{{ old('user_username') }}">
            </div>

            <div class="form-group mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Enter Email" value="{{ old('user_email') }}">
            </div>

            <div class="form-group mb-3">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>

            <div class="form-group mb-3">
              <label for="passwordconfirmation">Confirm Password</label>
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
            </div>

            <div class="form-group mb-3">
            <label for="user_access_rights">Access</label>
            <div class="form-check d-flex">
              <div class="me-3">
                <input class="form-check-input" type="radio" name="user_access_rights" id="merchant" value="Merchant" required>
                <label class="form-check-label" for="merchant">Merchant</label>
              </div>
              <div class="ms-3">
                <input class="form-check-input" type="radio" name="user_access_rights" id="user" value="User" required>
                <label class="form-check-label" for="user">User</label>
              </div>
            </div>
          </div>

              <a href="{{ route('AccountExist') }}">Already have an account?</a>
              <button type="submit" class="btn btn-primary" style = "float:right">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</html>

