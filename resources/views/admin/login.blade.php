<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login Page</title>
    <link rel="stylesheet" href="{{asset('/assets/css/argon.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-4 offset-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Admin login
                </div>
                @if($errors->any())
                    @foreach($errors->all() as $e)
                        <div class="alert alert-danger">{{$e}}</div>
                    @endforeach
                @endif
                <div class="card-body">
                    <form action="{{url('/admin/login')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Enter Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Enter Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <input type="submit" value="Login" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@if(session()->has('error'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: '{{session('error')}}',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
@endif
</body>
</html>
