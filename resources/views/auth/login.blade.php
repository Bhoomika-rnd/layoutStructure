@include('admin.layouts.header')
<div class="wrapper wrapper-full-page ">
    <div class="full-page login-page section-image" filter-color="black" data-image="../../assets/img/bg14.jpg">
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
        <div class="content">
            <div class="container">
                <div class="col-md-4 ml-auto mr-auto">
                    <form id="stripe-login"  method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="card card-login card-plain">
                            <div class="card-header ">
                                <div class="logo-container">
                                    <img src="../../assets/img/now-logo.png" alt="">
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="input-group no-border form-control-lg">
                                    <span class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="now-ui-icons users_circle-08"></i>
                                        </div>
                                    </span>
                                    <input id="email" type="email" class="@error('email') is-invalid @enderror form-control" name="email" required="" autocomplete="email" autofocus  placeholder="Email...">
                                </div>
                                <div class="input-group no-border form-control-lg">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="now-ui-icons text_caps-small"></i>
                                        </div>
                                    </div>
                                    <input id="password" type="password" class="@error('password') is-invalid @enderror form-control" name="password" required="" autocomplete="current-password" minlength="6" placeholder="Password...">
                                </div>
                            </div>
                            <div class="card-footer ">
                                <!-- <a href="#pablo" class="btn btn-primary btn-round btn-lg btn-block mb-3">Get Started</a> -->
                                <button type="submit" class="btn btn-primary btn-round btn-lg btn-block mb-3">Login</button>
                                <div class="pull-left">
                                    <h6>
                                    <a class="link footer-link" href="{{ route('register') }}">Create Account</a>
                                    </h6>
                                </div>
                                <div class="pull-right">
                                    <h6>
                                    <a href="#pablo" class="link footer-link">Need Help?</a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        @include('admin.layouts.footer')
    </div>
</div>
@include('admin.layouts.scripts')
</body>
</html>