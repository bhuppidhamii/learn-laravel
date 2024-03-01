<!doctype html>
<html lang="en">

<head>
    <title>Form</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <form action="{{ url('/') }}/register" method="POST">
        @csrf
        {{-- {{}} --}}
        <div class="container">
            <h1 class="text-center">Registration</h1>
            <div class="form-group">
                <label for="name">Name </label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name ">
               
               {{-- error print msg  --}}
               <span class="text-danger">
                    @error('name')
                    {{$message}}
                    @enderror
               </span>
            </div>
            <div class="form-group">
                <label for="email">Email </label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email ">

                {{-- error print msg  --}}
               <span class="text-danger">
                    @error('email')
                    {{$message}}
                    @enderror
               </span>
            </div>
            <div class="form-group">
                <label for="password">Password </label>
                <input type="password" name="password" id="password" class="form-control"
                    placeholder="Enter Password ">

                {{-- error print msg  --}}
               <span class="text-danger">
                    @error('password')
                    {{$message}}
                    @enderror
               </span>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password </label>
                <input type="confirm_password" name="confirm_password" id="confirm_password" class="form-control"
                    placeholder="Enter Password ">
                    
                {{-- error print msg  --}}
               <span class="text-danger">
                    @error('confirm_password')
                    {{$message}}
                    @enderror
               </span>
            </div>
            <button class="btn btn-primary">
                Submit
            </button>
        </div>
    </form>

</body>

</html>
