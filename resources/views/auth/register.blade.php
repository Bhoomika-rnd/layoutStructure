@include('admin.layouts.header')
<div class="wrapper wrapper-full-page ">
    <div class="full-page register-page section-image" filter-color="black" data-image="../../assets/img/bg16.jpg">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 ml-auto">
                        <div class="info-area info-horizontal mt-5">
                            <div class="icon icon-primary">
                                <i class="now-ui-icons media-2_sound-wave"></i>
                            </div>
                            <div class="description">
                                <h5 class="info-title">Marketing</h5>
                                <p class="description">
                                    We've created the marketing campaign of the website. It was a very interesting collaboration.
                                </p>
                            </div>
                        </div>
                        <div class="info-area info-horizontal">
                            <div class="icon icon-primary">
                                <i class="now-ui-icons media-1_button-pause"></i>
                            </div>
                            <div class="description">
                                <h5 class="info-title">Fully Coded in HTML5</h5>
                                <p class="description">
                                    We've developed the website with HTML5 and CSS3. The client has access to the code using GitHub.
                                </p>
                            </div>
                        </div>
                        <div class="info-area info-horizontal">
                            <div class="icon icon-info">
                                <i class="now-ui-icons users_single-02"></i>
                            </div>
                            <div class="description">
                                <h5 class="info-title">Built Audience</h5>
                                <p class="description">
                                    There is also a Fully Customizable CMS Admin Dashboard for this product.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mr-auto">
                        <div class="card card-signup text-center">
                            <div class="card-header ">
                                <h4 class="card-title">Register</h4>
                                <div class="social">
                                    <button class="btn btn-icon btn-round btn-twitter">
                                    <i class="fab fa-twitter"></i>
                                    </button>
                                    <button class="btn btn-icon btn-round btn-dribbble">
                                    <i class="fab fa-dribbble"></i>
                                    </button>
                                    <button class="btn btn-icon btn-round btn-facebook">
                                    <i class="fab fa-facebook-f"></i>
                                    </button>
                                    <h5 class="card-description"> or be classical </h5>
                                </div>
                            </div>
                            <div class="card-body ">
                                <form method="POST" action="{{ route('register') }}">
                                            @csrf

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons users_circle-08"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Name..." name="name" :value="old('name')" required  autocomplete="name" >
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons ui-1_email-85"></i>

                                            </div>
                                        </div>
                                        <input type="text" placeholder="Email..." class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" >
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons text_caps-small"></i>
                                            </div>
                                        </div>
                                        <input class="form-control" placeholder="Password..." type="password" name="password"required autocomplete="new-password" >
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons text_caps-small"></i>
                                            </div>
                                        </div>
                                        <input class="form-control" placeholder="Confirm Password..." type="password" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                    <div class="form-check text-left">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox">
                                            <span class="form-check-sign"></span>
                                            I agree to the
                                            <a href="#something">terms and conditions</a>.
                                        </label>
                                    </div>


                                    <div class="card-footer ">

                                        <div class="flex items-center justify-end mt-4">
                                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                                                {{ __('Already registered?') }}
                                            </a>

                                            <x-primary-button class="btn btn-primary btn-round btn-lg">
                                                {{ __('Register') }}
                                            </x-primary-button>
                                        </div>
                                    </div>  
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @include('admin.layouts.footer')
        <!--   Core JS Files   -->
        @include('admin.layouts.scripts')
    </div>
</div>
</body>
</html>