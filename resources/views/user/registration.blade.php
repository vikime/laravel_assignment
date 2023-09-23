<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style= "margin-top : 20px">
                <h4>Registration</h4>
                <hr>
                <form action="{{route('register-user')}}" method="post">
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('failed'))
                    <div class="alert alert-danger">{{Session::get('failed')}}</div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" placeholder="Enter Your first Name..." name="firstname" value="{{old('firstname')}}">
                        <span class="text-danger">@error('first name') {{$message}} @enderror</span>
                    </div>
                     <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" placeholder="Enter Your Last Name..." name="lastname" value="{{old('lastname')}}">
                        <span class="text-danger">@error('last name') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" placeholder="Enter Your Email..." name="email" value="{{old('email')}}">
                        <span class="text-danger">@error('email') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="number" class="form-control" placeholder="Enter Your Mobile number..." name="mobile" value="{{old('mobile')}}">
                        <span class="text-danger">@error('mobile') {{$message}} @enderror</span>
                    </div>
                     <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Enter Your Password..." name="password" value="{{old('password')}}">
                        <span class="text-danger">@error('password') {{$message}} @enderror</span>
                    </div>
                     <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit">Register</button>
                    </div>
                    <br>
                       <a href="login"> Already Register !! login Here</a>
                </form>
            </div>
        </div>
    </div>
    
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>