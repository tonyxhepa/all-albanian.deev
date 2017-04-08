<nav class="topBar navbar-fixed-top">
    <div class="container">
        <ul class="list-inline pull-left  hidden-xs">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false"> <i class="fa fa-usd mr-5"></i>Shqiperia<i class="fa fa-angle-down ml-5"></i>
                </a>
                <ul class="dropdown-menu w-100" role="menu">
                    <li><a href="#"><i class="fa fa-eur mr-5"></i>Shqiperia</a>
                    </li>
                    <li class=""><a href="#"><i class="fa fa-usd mr-5"></i>Kosova</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gbp mr-5"></i>Maqedonia</a>
                    </li>
                </ul>
            </li>

        </ul>
        <ul class="topBarNav pull-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false"> <i class="fa fa-usd mr-5"></i>USD<i class="fa fa-angle-down ml-5"></i>
                </a>
                <ul class="dropdown-menu w-100" role="menu">
                    <li><a href="#"><i class="fa fa-eur mr-5"></i>EUR</a>
                    </li>
                    <li class=""><a href="#"><i class="fa fa-usd mr-5"></i>USD</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gbp mr-5"></i>GBP</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false"> <img src="http://diamondcreative.net/plus-v1.2/img/flags/flag-french.jpg" class="mr-5" alt=""> <span class="hidden-xs"> French <i class="fa fa-angle-down ml-5"></i></span> </a>
                <ul class="dropdown-menu w-100" role="menu">
                    <li>
                        <a href="#"><img src="http://diamondcreative.net/plus-v1.2/img/flags/flag-english.jpg" class="mr-5" alt="">English</a>
                    </li>
                    <li class="">
                        <a href="#"><img src="http://diamondcreative.net/plus-v1.2/img/flags/flag-french.jpg" class="mr-5" alt="">French</a>
                    </li>
                    <li>
                        <a href="#"><img src="http://diamondcreative.net/plus-v1.2/img/flags/flag-german.jpg" class="mr-5" alt="">German</a>
                    </li>
                    <li>
                        <a href="#"><img src="http://diamondcreative.net/plus-v1.2/img/flags/flag-spain.jpg" class="mr-5" alt="">Spain</a>
                    </li>
                </ul>
            </li>
            @if(Auth::check())
                @if(Auth::user()->isAdmin())
                    <li><a href="{{ url('/admin') }}">Admin</a> </li>
                @endif
            @endif
            @if (Auth::guest())
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @else
                `
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url(Auth::user()->slug.'/profile') }}">Profile</a> </li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false"> <i class="fa fa-shopping-basket mr-5"></i> <span class="hidden-xs">
                                Cart<sup class="text-primary">(3)</sup>
                                <i class="fa fa-angle-down ml-5"></i>
                            </span> </a>
                <ul class="dropdown-menu cart w-250" role="menu">
                    <li>
                        <div class="cart-items">
                            <ol class="items">
                                <li>
                                    <a href="#" class="product-image"> <img src="https://lh3.googleusercontent.com/-uwagl9sPHag/WM7WQa00ynI/AAAAAAAADtA/hio87ZnTpakcchDXNrKc_wlkHEcpH6vMwCJoC/w140-h148-p-rw/profile-pic.jpg" class="img-responsive" alt="Sample Product "> </a>
                                    <div class="product-details">
                                        <div class="close-icon"> <a href="#"><i class="fa fa-close"></i></a> </div>
                                        <p class="product-name"> <a href="#">Sumi9xm@gmail.com</a> </p> <strong>1</strong> x <span class="price text-primary">$59.99</span> </div>
                                    <!-- end product-details -->
                                </li>
                                <!-- end item -->
                                <li>
                                    <a href="#" class="product-image"> <img src="https://lh3.googleusercontent.com/-Gy3KAlilHAw/WNf7a2eL5YI/AAAAAAAAD2Y/V3jUt14HiZA3HLpeOKkSaOu57efGuMw9ACL0B/w245-d-h318-n-rw/shoes_01.jpg" class="img-responsive" alt="Sample Product "> </a>
                                    <div class="product-details">
                                        <div class="close-icon"> <a href="#"><i class="fa fa-close"></i></a> </div>
                                        <p class="product-name"> <a href="#">Lorem Ipsum dolor sit</a> </p> <strong>1</strong> x <span class="price text-primary">$39.99</span> </div>
                                    <!-- end product-details -->
                                </li>
                                <!-- end item -->
                                <li>
                                    <a href="#" class="product-image"> <img src="https://lh3.googleusercontent.com/-ydDc-0L0WFY/WNf7a6Awe_I/AAAAAAAAD2Y/I8IzJtYRWegkOUxCZ5SCK6vbdiiSxVsCQCL0B/w245-d-h318-n-rw/bags_07.jpg" class="img-responsive" alt="Sample Product "> </a>
                                    <div class="product-details">
                                        <div class="close-icon"> <a href="#"><i class="fa fa-close"></i></a> </div>
                                        <p class="product-name"> <a href="#">Lorem Ipsum dolor sit</a> </p> <strong>1</strong> x <span class="price text-primary">$29.99</span> </div>
                                    <!-- end product-details -->
                                </li>
                                <!-- end item -->
                            </ol>
                        </div>
                    </li>
                    <li>
                        <div class="cart-footer"> <a href="#" class="pull-left"><i class="fa fa-cart-plus mr-5"></i>View
                                Cart</a> <a href="#" class="pull-right"><i class="fa fa-shopping-basket mr-5"></i>Checkout</a> </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav><!--=========-TOP_BAR============-->

<!--=========MIDDEL-TOP_BAR============-->

<div class="middleBar">
    <div class="container">
        <div class="row display-table">
            <div class="col-sm-6 vertical-align text-left hidden-xs">
                <a href="javascript:void(0);"> <img width="" src="https://lh3.googleusercontent.com/-r0Fhzz-so14/WNf9-4M65JI/AAAAAAAAD3E/ht6IhlL9gG4ujE2Hqiq70U3jBb6KQmaAQCL0B/w180-d-h43-p-rw/logo-2.png" alt=""></a>
            </div>
            <!-- end col -->
            <div class="col-sm-14 vertical-align text-center">
                <img class="img-responsive" src="{{ asset('storage/banner/banner-header.jpg') }}">
                {{--<form>--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-sm-12">--}}
                            {{--<input type="text" name="keyword" class="form-control input-lg" placeholder="Search">--}}
                        {{--</div>--}}
                        {{--<!-- end col -->--}}
                        {{--<div class="col-sm-6">--}}
                            {{--<select class="form-control input-lg" name="category">--}}
                                {{--<option value="all">All Categories</option>--}}
                                {{--<optgroup label="Mens">--}}
                                    {{--<option value="shirts">Shirts</option>--}}
                                    {{--<option value="coats-jackets">Coats & Jackets</option>--}}
                                    {{--<option value="underwear">Underwear</option>--}}
                                    {{--<option value="sunglasses">Sunglasses</option>--}}
                                    {{--<option value="socks">Socks</option>--}}
                                    {{--<option value="belts">Belts</option>--}}
                                {{--</optgroup>--}}
                                {{--<optgroup label="Womens">--}}
                                    {{--<option value="bresses">Bresses</option>--}}
                                    {{--<option value="t-shirts">T-shirts</option>--}}
                                    {{--<option value="skirts">Skirts</option>--}}
                                    {{--<option value="jeans">Jeans</option>--}}
                                    {{--<option value="pullover">Pullover</option>--}}
                                {{--</optgroup>--}}
                                {{--<option value="kids">Kids</option>--}}
                                {{--<option value="fashion">Fashion</option>--}}
                                {{--<optgroup label="Sportwear">--}}
                                    {{--<option value="shoes">Shoes</option>--}}
                                    {{--<option value="bags">Bags</option>--}}
                                    {{--<option value="pants">Pants</option>--}}
                                    {{--<option value="swimwear">Swimwear</option>--}}
                                    {{--<option value="bicycles">Bicycles</option>--}}
                                {{--</optgroup>--}}
                                {{--<option value="bags">Bags</option>--}}
                                {{--<option value="shoes">Shoes</option>--}}
                                {{--<option value="hoseholds">HoseHolds</option>--}}
                                {{--<optgroup label="Technology">--}}
                                    {{--<option value="tv">TV</option>--}}
                                    {{--<option value="camera">Camera</option>--}}
                                    {{--<option value="speakers">Speakers</option>--}}
                                    {{--<option value="mobile">Mobile</option>--}}
                                    {{--<option value="pc">PC</option>--}}
                                {{--</optgroup>--}}
                            {{--</select>--}}
                        {{--</div>--}}
                        {{--<!-- end col -->--}}
                        {{--<div class="col-sm-6">--}}
                            {{--<input type="submit" class="btn btn-default btn-block btn-lg" value="Search">--}}
                        {{--</div>--}}
                        {{--<!-- end col -->--}}
                    {{--</div>--}}
                    {{--<!-- end row -->--}}
                {{--</form>--}}
            </div>
            <!-- end col -->
            <div class="col-sm-4 vertical-align header-items hidden-xs">
                <div class="header-item mr-5">
                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Wishlist"> <i class="fa fa-heart-o"></i> <sub>32</sub> </a>
                </div>
                <div class="header-item">
                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare"> <i class="fa fa-refresh"></i> <sub>2</sub> </a>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end  row -->
    </div>
</div>


<nav class="navbar navbar-main navbar-default" role="navigation" style="opacity: 1;">
    <div class="container">
        <!-- Brand and toggle -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-1">
                <span class="sm-only sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links,  -->
        <div class="collapse navbar-collapse navbar-1" style="margin-top: 0px;">
            <ul class="nav navbar-nav">
                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">Home</a></li>

                <li class="dropdown megaDropMenu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">Profili im <i class="fa fa-angle-down ml-5"></i></a>
                    <ul class="dropdown-menu row">
                        <li class="col-sm-6 col-xs-24">
                            <ul class="list-unstyled">
                                <li>Products Grid View</li>
                                <li><a href="#">Products</a></li>
                                <li><a href="#">Sidebar Left</a></li>
                                <li><a href="#">Products Left</a></li>
                            </ul>
                        </li>
                        <li class="col-sm-6 col-xs-24">
                            <ul class="list-unstyled">
                                <li>Products List View</li>
                                <li><a href="#"> Sidebar Left</a></li>
                                <li><a href="#">Products Left</a></li>
                                <li><a href="#">Products Sidebar</a></li>
                            </ul>
                        </li>
                        <li class="col-sm-6 col-xs-24">
                            <ul class="list-unstyled">
                                <li>Checkout</li>

                            </ul>
                        </li>
                        <li class="col-sm-6 col-xs-24">
                            <ul class="list-unstyled">
                        <li>E fundit</li>

                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">Page <i class="fa fa-angle-down ml-5"></i></a>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Register</a></li>
                        <li><a href="#">Register or Login</a></li>
                        <li><a href="#">Login</a></li>
                        <li><a href="#">Password Recovery</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">404 Not Found</a></li>
                        <li><a href="#">Short Code</a></li>
                        <li><a href="#">Coming Soon</a></li>
                    </ul>
                </li>
                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">Blog</a></li>
                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">My List</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>