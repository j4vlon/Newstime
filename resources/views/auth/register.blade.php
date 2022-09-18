	@extends('layouts.header') @section('content')
	<div class="main" style="margin: 0 auto">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="reg-label"> <i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="login" class="reg-label"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="login" placeholder="Your login"/>
                            </div>
                            <div class="form-group">
                                <label for="email" class="reg-label"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass" class="reg-label"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass" class="reg-label"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="password_repeat" placeholder="Repeat your password"/>
                            </div>
                            {{-- <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div> --}}
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="{{ asset('assets/img/signup-image.jpg') }}" alt="sing up image"></figure>
                        <a href="#" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

        

    </div>

@endsection