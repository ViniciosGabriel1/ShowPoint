
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
          <form id="registerForm">
            @csrf
            <div class="mb-3">
              <label for="exampleInputtext1" class="form-label">Name</label>
              <input type="text" class="form-control" id="exampleInputtext1" name="name" aria-describedby="textHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email Address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" name = "email" aria-describedby="emailHelp">
            </div>
            <div class="mb-4">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <button  class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Registrar</button>
            {{-- <a href="./index.html" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign Up</a> --}}
            <div class="d-flex align-items-center justify-content-center">
              <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
              <a class="text-primary fw-bold ms-2" href="./authentication-login.html">Sign In</a>
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
        $('#registerForm').on('submit', function(event){
            event.preventDefault();

            $.ajax({
                url: "{{ route('register') }}",
                method: 'POST',
                data: $(this).serialize(),
                success: function(response){
                    if(response.success) {
                        console.log('Show aqui');
                        $('#responseMessage').html('<div class="alert alert-success">'+response.message+'</div>');
                        window.location.href = "/dashboard"; // Redirecionar após login bem-sucedido
                    } else {
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