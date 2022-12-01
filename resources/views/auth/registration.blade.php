<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registration Form</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap Icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- custom css -->
    <link type="text/css" href="{{url('css/style.css')}}" rel="stylesheet">

 
</head>
 
<body>
    <div id="hero-login"></div>
    <div class="register">
        <h2 class="title text-center mt-3 mb-5">Registration</h2>
        <form action="{{ route ('register-user')}}" method="post">
            @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
            @csrf
            <div class="form-group mb-3">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" placeholder="Enter Full Name" name="name" value="{{old('name')}}">   
                <span class="text-danger">@error('name') {{ $message }} @enderror</span>
            </div>
            <div class="form-group mb-3">
                <label for="name">Email Address</label>
                <input type="text" class="form-control" placeholder="Enter Email Address" name="email" value="{{old('email')}}">   
                <span class="text-danger">@error('email') {{ $message }} @enderror</span>
            </div>
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Enter Password" name="password" value="{{old('password')}}">   
                <span class="text-danger">@error('password') {{ $message }} @enderror</span>
            </div>
            <br>
            <div class="form-group mb-3">
                <button class="btn btn-success w-100" type="sumbit">Register</button>      
            </div>
        </form>
        <div class="form-group">
            <a href="{{ route('admin.login') }}">
                <button class="btn btn-warning w-100" type="submit">Back</button>
            </a>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>