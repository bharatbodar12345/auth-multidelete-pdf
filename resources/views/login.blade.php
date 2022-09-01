@extends('header')
@section('test')

{{-- <h1>ghgh</h1> --}}
    

    <div class="container pt-5">
        <h1 class="">Login to our website</h1>
        <h4 class="pt-3">Inter a Username and Password to Login</h4>
        @if (session('success'))
            <div class="alert alert-success">
            {!! session('success') !!}
            </div>
        @endif
        <form action="/login/user" method="POST" class="pt-2">
            @csrf
           
            {{-- username --}}
            <div class="col-lg-12">
                <div class=" row form-group ">
                    <div class="col-lg-2">
                        <label for="name">Username  :</label>
                    </div>
                    <div class="col-lg-6">
                        <input type="username" class="form-control" id="username" placeholder="Enter UserName" name="username" id="username">
                    </div>
                    <div>
                        <span class="error">*</span>
                    </div>
                </div>
            </div>

            {{-- password --}}
            <div class="col-lg-12">
                <div class=" row form-group ">
                    <div class="col-lg-2">
                        <label for="name">Password  :</label>
                    </div>
                    <div class="col-lg-6">
                        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" id="password">
                    </div>
                    <div>
                        <span class="error">*</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-12  ">
                <div class="row">
                    <div class="col-lg-2">
                        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <div class="col-lg-2">
                        <a href="/singup" id="sing" class="btn btn-primary">Singup</a>
                    </div>
                </div>      
            </div>
        </form>
       </div>

    </div>
@endsection


{{-- @include('footer') --}}

    