@extends('layouts.app-auth')

@section('title', 'Login')

@section('content')
<div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
    <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
            <div class="col-md-8 col-lg-6 col-xxl-3">
                <div class="card mb-0">
                    <div class="card-body">
                        <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                            <img src="../assets/images/logos/dark-logo.svg" width="180" alt="">
                        </a>
                        <p class="text-center">Your Social Campaigns</p>
                        <form action="{{ route('login') }}" method="POST" id="loginForm">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Username</label>
                                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                                    <label class="form-check-label text-dark" for="flexCheckChecked">
                                        Remember this Device
                                    </label>
                                </div>
                                <a class="text-primary fw-bold" href="./index.html">Forgot Password ?</a>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                            <div id="responseMessage"></div>
                            <div class="d-flex align-items-center justify-content-center">
                                <p class="fs-4 mb-0 fw-bold">New to Modernize?</p>
                                <a class="text-primary fw-bold ms-2" href="./authentication-register.html">Create an account</a>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    
    $(document).ready(function(){
        $('#loginForm').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url: "{{ route('login') }}",
                method: 'POST',
                data: $(this).serialize()
                
                success: function(response){
                    if(response.success) {
                        console.log('Show aqui');
                        $('#responseMessage').html('<div class="alert alert-success">'+response.message+'</div>');
                        window.location.href = "/home"; // Redirecionar após login bem-sucedido
                    } else {
                    console.log('Erro aqui');
                        $('#responseMessage').html('<div class="alert alert-danger">'+response.message+'</div>');
                    }
                },
                error: function(response){
                    $('#responseMessage').html('<div class="alert alert-danger">'+response.responseJSON.message+'</div>');
                }
            });
        });
    });
</script>


@endsection
