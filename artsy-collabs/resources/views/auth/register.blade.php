@extends('layouts.app')

@section('content')





<div class="container">
    <div class="row gx-lg-5 align-items-center mb-5">
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
                
                    <form action="{{ route('users.store') }}" enctype="multipart/form-data" method="POST" id="form">
                        @csrf
                        <div class="card">
                            <img src="{{asset('images/avatar.jpg')}}" id="image">
                            <label for="input-file">Choose Image</label>
                            @error('profile')
                            <p class="fname-error text-danger">{{$message}}</p>
                                
                            @enderror
                            <input type="file" accept="image/jpg, image/png, image/jpeg" name="profile"
                                style="background-color: transparent;" id="input-file">
                        </div>
                                <div class="form-outline mb-4">
                                    <input type="text" id="fullname" class="form-control"
                                        placeholder="FullName" name="name" />
                                    @error('name')
                                    <p class="fname-error text-danger">{{$message}}</p>
                                        
                                    @enderror
                                </div>

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

                        <div class="form-outline mb-4">
                            <input type="password" id="password" class="form-control" placeholder="Confirm Password"
                                name="password_confirmation" />
                             
                        </div>

                        <button type="submit" class="btn btn-primary btn-block mb-4 col-12">
                            Register
                        </button>
                        <a type="submit" class="mb-4 col-12 register text-primary" href="{{route('login')}}">
                            Already have an account Login
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
