<!doctype html>
<html lang="en">

<head>
    <title>Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <form action="{{ url('/') }}/register" method="POST">
        @csrf
        <h1 class="text-center">Form Validation by Component</h1>
        <div class="container">

            <x-InputComponent type='text' name='name' label='Enter name' />
            <x-InputComponent type='email' name='email' label='Enter email' />
            <x-InputComponent type='password' name='password' label='Password' />
            <x-InputComponent type='password' name='conf_password' label='Confirm Password' />

            <button class="btn btn-primary">Submit</button>
        </div>
    </form>

</body>

</html>
