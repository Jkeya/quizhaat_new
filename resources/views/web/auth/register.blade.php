@extends('web.master')
@section('mainContent')
<div class="site-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            
            <div class="col-md-6">
                <!-- Register -->

                 @if(session()->has('message-success'))
                    <div class="alert alert-success">
                        {{ session()->get('message-success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif


                
                <div class="card">

                    <div class="card__header">
                        <h4>Register Now</h4> </div>
                        <div class="card__content">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif                        
                            <!-- Register Form -->
                            <form method="POST" action="{{ route('signup') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="register_name">Your Name</label>
                                    <input type="text" name="name" id="register-name" class="form-control" placeholder="Enter your Name..."> </div>
                                    <div class="form-group">
                                    <label for="email">Your Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email address..."> </div>
                                    <div class="form-group">
                                        <label for="password">Your Password</label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password..."> </div>
                                        <div class="form-group">
                                            <label for="confirm_password">Confirm  Password</label>
                                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm your password..."> </div>
                                            <div class="form-group form-group--submit"> <button class="btn btn-default btn-lg btn-block">Create Your Account</button> </div>
                                        </form>
                                        <!-- Register Form / End -->
                                    </div>
                                </div>
                                <!-- Register / End -->
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                </div>
                @endsection

