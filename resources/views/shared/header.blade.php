        <header id="header"><!--header-->
            <div class="header_top"><!--header_top-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="contactinfo">
                                <ul class="nav nav-pills">
                                    <li><a href="#"><i class="fa fa-phone"></i> +846969696969</a></li>
                                    <li><a href="#"><i class="fa fa-envelope"></i> E_Shopper@gmail.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="social-icons pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header_top-->

            <div class="header-middle"><!--header-middle-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo pull-left">
                                <a href="{{ route('home') }}"><img src="{{ asset('images/home/logo.png') }}" alt="" /></a>
                            </div>
                            <div class="btn-group pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    VI
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="">Tiếng Việt</a></li>
                                    <li><a href="">English</a></li>
                                </ul>
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="shop-menu pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="{{ Auth::check() ? route('users.show') : route('login') }}"><i class="fa fa-user"></i> {{ Auth::check() ? Auth::user()->name : __('Account') }}</a></li>
                                    @if(!Auth::check())
                                    @else
                                    @if(Auth::user()->hasRole('admin'))
                                    <li><a href="/admin"><i class="fa fa-star"></i> Admin page</a></li>
                                    @endif
                                    @endif
                                    <li><a href="#"><i class="fa fa-crosshairs"></i> {{ __('Checkout') }}</a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i> {{ __('Cart') }}</a></li>
                                    @if(Auth::check())
                                    <li><a href = "{{ route('logout') }}" onclick= "event.preventDefault();
                                        document.getElementById('logout-form').submit(); "><i class="fa fa-lock"></i> {{ __('Logout') }}</a>
                                        {!! Form::open(array('route' => 'logout' , 'method' => 'POST' , 'id' => 'logout-form' , 'style' => 'display: none;' )) !!}
                                        {!! Form::close() !!}
                                    @else
                                    <li><a href= "{{ route('login') }}"><i class="fa fa-lock"></i> {{ __('Login') }}</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-middle-->

            <div class="header-bottom"><!--header-bottom-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="mainmenu pull-left">
                                <ul class="nav navbar-nav collapse navbar-collapse">
                                    <li><a href="{{ route('home') }}" >{{ __('Home') }}</a></li>
                                    <li><a href="{{route('product')}}">{{ __('Products') }}</a></li>
                                    <li><a href="{{ route('posts.index') }}" >{{ __('Blog') }}</a></li>
                                    <li><a href="#" >{{ __('Contact Us') }}</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="search_box pull-right">
                                <input type="text" placeholder="Search"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-bottom-->
        </header><!--/header-->
