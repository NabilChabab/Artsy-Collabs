@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row gx-lg-5 align-items-center mb-5" style="margin-top: 10%">
        <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
            <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                Welcome To Wiki <br />
                <span style="color: white">All on One Platform</span>
            </h1>
            <p class="mb-4 opacity-70" style="color: white">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Temporibus, expedita iusto veniam atque, magni tempora mollitia
                dolorum consequatur nulla, neque debitis eos reprehenderit quasi
                ab ipsum nisi dolorem modi. Quos?
            </p>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
            <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
            <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

            <div class="card1 bg-glass">
                <div class="card-body px-4 py-5 px-md-5">
                
                    <form action="{{ route('login') }}" enctype="multipart/form-data" method="POST" id="form">
                        @csrf
               

                        <div class="form-outline mb-4">
                            <input type="email" id="email" class="form-control" placeholder="Email"
                                name="email" />
                                @error('email')
                                <p class="fname-error text-danger">{{$message}}</p>
                                    
                                @enderror
                        </div>

                        <div class="form-outline mb-4">
                            <input type="password" id="password" class="form-control" placeholder="Password"
                                name="password" />
                                @error('password')
                                <p class="fname-error text-danger">{{$message}}</p>
                                    
                                @enderror
                        </div>

                        <div class="col-md-8 offset-md-4">
                                

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}" style="margin-left: 46%">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block mb-4 col-12">
                            Login
                        </button>

                            
                        
                        <a type="submit" class="mb-4 col-12 register text-primary" href="{{route('register')}}" style="margin-left: 35%">
                            Dont have an account
                        </a>

                        <!-- Register buttons -->
                        <div class="text-center">
                            <button type="button" class="btn btn-link btn-floating mx-1">
                                <i class='bx bxl-meta'></i>
                            </button>

                            <button type="button" class="btn btn-link btn-floating mx-1">
                                <i class='bx bxl-google'></i>
                            </button>

                            <button type="button" class="btn btn-link btn-floating mx-1">
                                <i class='bx bxl-linkedin'></i>
                            </button>

                            <button type="button" class="btn btn-link btn-floating mx-1">
                                <i class='bx bxl-github'></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
