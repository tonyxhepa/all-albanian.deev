
<nav class="navbar navbar-main navbar-fixed-top" role="navigation" style="opacity: 1;">
    <div class="container">
        <!-- Brand and toggle -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-1" style="background-color: #00BCD4">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar" style="background-color: #0f0f0f"></span>
                <span class="icon-bar" style="background-color: #0f0f0f"></span>
                <span class="icon-bar" style="background-color: #0f0f0f"></span>
            </button>
        </div>

        <!-- Collect the nav links,  -->
        <div class="collapse navbar-collapse navbar-1" style="margin-top: 0px;">
            <ul class="nav navbar-nav">
                <li class="dropdown megaDropMenu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">Lajme <i class="fa fa-angle-down ml-5"></i></a>
                    <ul class="dropdown-menu row" style="border-bottom: 2px solid red;">
                        <li class="col-sm-6 col-xs-24">
                            <ul class="list-unstyled">
                                <li><a href="{{ url('/lajme') }}">Kryesoret</a> </li>
                                <li><a href="{{ url('/lajme/al') }}">Shqiperia</a></li>
                                <li><a href="{{ url('/lajme/ks') }}">Kosova</a></li>
                                <li><a href="{{ url('/lajme/mk') }}">Maqedonia</a></li>
                                <li><a href="{{ url('/lajme/bota') }}">Bota</a></li>
                            </ul>
                        </li>
                        @foreach($lajme_menu as $menu)
                            <li class="col-md-6 hidden-sm hidden-xs">
                                <ul class="list-unstyled">

                                    <a href="">
                                        <li class="thumbnail">
                                            @if(count($menu->photos) > 0)
                                                <img class="img-responsive"  src="{{ asset('storage').$menu->photos->first()->threezerozero }}" alt="">
                                            @endif
                                        </li>
                                        <li>{{ $menu->title }}</li>
                                    </a>
                                </ul>
                            </li>
                        @endforeach

                    </ul>
                </li>
                <li class="dropdown megaDropMenu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">Sport <i class="fa fa-angle-down ml-5"></i></a>
                    <ul class="dropdown-menu row" style="border-bottom: 2px solid green;">
                        <li class="col-sm-6 col-xs-24">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="list-unstyled">
                                        <li><a href="{{ url('/sport/') }}">Kryesoret</a></li>
                                        <li><a href="{{ url('/sport/superliga/') }}">Superliga</a></li>
                                        <li><a href="{{ url('/sport/sup-kosoves/') }}">Sup-Kosova</a></li>
                                        <li><a href="{{ url('/sport/liga-pare/') }}">Liga e Pare Maqedonise</a></li>
                                        <li><a href="{{ url('/sport/boterori/') }}">Boterori 2018</a></li>
                                        <li><a href="{{ url('/sport/formula-1/') }}">Formula 1</a></li>
                                        <li><a href="{{ url('/sport/bota/') }}">Bota</a></li>

                                    </ul>
                                </div>
                                <div class="col-md-12">

                                    <ul class="list-unstyled">
                                        <li><a href="{{ url('/sport/seria-a/') }}">Seria A</a></li>
                                        <li><a href="{{ url('/sport/premier/') }}">Premier_liga</a></li>
                                        <li><a href="{{ url('/sport/laliga/') }}">Laliga</a></li>
                                        <li><a href="{{ url('/sport/liga1/') }}">Liga 1</a></li>
                                        <li><a href="{{ url('/sport/bundesliga/') }}">Bundesliga</a></li>
                                        <li><a href="{{ url('/sport/eredivisie') }}">Eredivisie</a></li>
                                    </ul>
                                </div>
                            </div>

                        </li>
                        @foreach($sport_menu as $menu)
                            <li class="col-md-6 hidden-sm hidden-xs">
                                <ul class="list-unstyled">
                                  <a href="{{ url('/sport/'. $menu->slug) }}">
                                      <li>{{ $menu->title }}</li>
                                      @if(count($menu->photos) > 0)
                                          <img class="img-responsive height-233"  src="{{ asset('storage').$menu->photos->first()->thumbnail }}" alt="">
                                      @endif
                                  </a>
                                </ul>
                            </li>
                        @endforeach

                    </ul>
                </li>
                <li class="dropdown megaDropMenu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">Njoftime <i class="fa fa-angle-down ml-5"></i></a>
                    <ul class="dropdown-menu row" style="border-bottom: 2px solid darkolivegreen">
                        <li class="col-md-6 col-xs-24">
                            <ul class="list-unstyled">
                                <li><a href="{{ url('/njoftime/') }}">Kryesoret</a></li>
                                <li><a href="{{ url('/njoftime/prona') }}">Prona</a></li>
                                <li><a href="{{ url('/njoftime/puna') }}">Puna</a></li>
                                <li><a href="{{ url('/njoftime/makina') }}">Makina</a></li>
                                <li><a href="{{ url('/njoftime/elektroniket') }}">Elektroniket</a></li>
                                <li><a href="{{ url('/njoftime/shitje') }}">shitje</a></li>
                            </ul>
                        </li>
                        <div class="col-md-18 hidden-sm hidden-xs" style="background-color: #0f0f0f">

                            <div class="row">
                                @foreach($makina_menu as $menu)
                                    <li class="col-md-8 hidden-sm hidden-xs">
                                        <ul class="list-unstyled">
                                            <a href="">
                                                <li class="thumbnail">
                                                    @if(count($menu->photos) > 0)
                                                        <img class="img-responsive"  src="{{ asset('storage').$menu->photos->first()->threezerozero }}" alt="">
                                                    @endif
                                                </li>
                                                <li>{{ $menu->title }}</li>
                                            </a>

                                        </ul>
                                    </li>
                                @endforeach
                            </div>


                        </div>


                    </ul>
                </li>
                <li class="dropdown megaDropMenu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">Argetim <i class="fa fa-angle-down ml-5"></i></a>
                    <ul class="dropdown-menu row">
                        <li class="col-md-6 col-xs-24">
                            <ul class="list-unstyled">
                                <li><a href="{{ url('/argetim') }}">Kryesoret</a></li>
                                <li><a href="{{ url('/argetim/funvideo') }}">Fun Videos</a></li>
                                <li><a href="{{ url('/argetim/funlajme') }}">Fun Lajme</a></li>
                                <li><a href="{{ url('/argetim/barsoleta') }}">Barsoleta</a></li>
                            </ul>
                        </li>
                        <div class="col-md-18 hidden-sm hidden-xs">

                            <div class="row">
                                @foreach($argetim_menu as $menu)
                                    <li class="col-md-8 hidden-sm hidden-xs">
                                        <ul class="list-unstyled">
                                            <a href="">
                                                <li>
                                                    @if(count($menu->photos) > 0)
                                                        <img class="img-responsive"  src="{{ asset('storage').$menu->photos->first()->threezerozero }}" alt="">
                                                    @endif
                                                </li>
                                                <li>{{ $menu->title }}</li>
                                            </a>

                                        </ul>
                                    </li>
                                @endforeach
                            </div>


                        </div>


                    </ul>
                </li>
                <li class="dropdown megaDropMenu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">Magazina <i class="fa fa-angle-down ml-5"></i></a>
                    <ul class="dropdown-menu row">
                        <li class="col-md-6 col-xs-24">
                            <ul class="list-unstyled">
                                <li><a href="{{ url('/magazina/') }}">Kryesoret</a></li>
                                <li><a href="{{ url('/magazina/vipat/') }}">Vipat</a></li>
                                <li><a href="{{ url('/magazina/muzike/') }}">Muzike</a></li>
                                <li><a href="{{ url('/magazina/film/') }}">Film</a></li>

                            </ul>
                        </li>
                        <div class="col-md-18 hidden-sm hidden-xs">

                            <div class="row">
                                @foreach($magazina_menu as $menu)
                                    <li class="col-md-8 hidden-sm hidden-xs">
                                        <ul class="list-unstyled">
                                            <a href="">
                                                <li>
                                                    @if(count($menu->photos) > 0)
                                                        <img class="img-responsive"  src="{{ asset('storage').$menu->photos->first()->threezerozero }}" alt="">
                                                    @endif
                                                </li>
                                                <li>{{ $menu->title }}</li>
                                            </a>

                                        </ul>
                                    </li>
                                @endforeach
                            </div>


                        </div>


                    </ul>
                </li>
                <li class="dropdown megaDropMenu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">Femra <i class="fa fa-angle-down ml-5"></i></a>
                    <ul class="dropdown-menu row">
                        <li class="col-md-6 col-xs-24">
                            <ul class="list-unstyled">
                                <li><a href="{{ url('/femrat/') }}">Kryesoret</a></li>
                                <li><a href="{{ url('/femrat/mode/') }}">Mode</a></li>
                                <li><a href="{{ url('/femrat/familja/') }}">Familja</a></li>
                                <li><a href="{{ url('/femrat/karriera/') }}">Karriera</a></li>
                                <li><a href="{{ url('/femrat/bukuri/') }}">Bukuri</a></li>
                            </ul>
                        </li>
                        <div class="col-md-18 hidden-sm hidden-xs">

                            <div class="row">
                                @foreach($femrat_menu as $menu)
                                    <li class="col-md-8 hidden-sm hidden-xs">
                                        <ul class="list-unstyled">
                                            <a href="{{ url('/femrat/'. $menu->slug) }}">
                                                <li>
                                                    @if(count($menu->photos) > 0)
                                                        <img class="img-responsive"  src="{{ asset('storage').$menu->photos->first()->threezerozero }}" alt="">
                                                    @endif
                                                </li>
                                                <li>{{ $menu->title }}</li>
                                            </a>

                                        </ul>
                                    </li>
                                @endforeach
                            </div>


                        </div>


                    </ul>
                </li>
                <li class="dropdown megaDropMenu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">Kuzhina <i class="fa fa-angle-down ml-5"></i></a>
                    <ul class="dropdown-menu row">
                        <li class="col-md-6 col-xs-24">
                            <ul class="list-unstyled">
                                <li><a href="{{ url('/kuzhina/') }}">Kryesoret</a></li>
                                <li><a href="{{ url('/kuzhina/embelsira') }}">Embelsira</a></li>
                                <li><a href="{{ url('/kuzhina/tradicionale/') }}">Tradicionale</a></li>
                                <li><a href="{{ url('kuzhina/sallata/') }}">Sallata</a></li>
                                <li><a href="{{ url('/kuzhina/gjellera/') }}">Gjellera</a></li>
                            </ul>
                        </li>
                        <div class="col-md-18 hidden-sm hidden-xs">

                            <div class="row">
                                @foreach($kuzhina_menu as $menu)
                                    <li class="col-md-8 hidden-sm hidden-xs">
                                        <ul class="list-unstyled">
                                            <a href="{{ url('/kuzhina/'. $menu->slug) }}">
                                                <li>
                                                    @if(count($menu->photos) > 0)
                                                        <img class="img-responsive"  src="{{ asset('storage').$menu->photos->first()->threezerozero }}" alt="">
                                                    @endif
                                                </li>
                                                <li>{{ $menu->title }}</li>
                                            </a>

                                        </ul>
                                    </li>
                                @endforeach
                            </div>


                        </div>


                    </ul>
                </li>
                <li class="dropdown megaDropMenu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">Tech <i class="fa fa-angle-down ml-5"></i></a>
                    <ul class="dropdown-menu row">
                        <li class="col-md-6 col-xs-24">
                            <ul class="list-unstyled">
                                <li><a href="{{ url('/tech/') }}">Kryesoret</a></li>
                                <li><a href="{{ url('/tech/app/') }}">Apps</a></li>
                                <li><a href="{{ url('/tech/media-sociale/') }}">Media Sociale</a></li>
                                <li><a href="{{ url('/tech/mobile/') }}">Mobile</a></li>
                                <li><a href="{{ url('/tech/internet/') }}">Internet</a></li>
                            </ul>
                        </li>
                        <div class="col-md-18 hidden-sm hidden-xs">

                            <div class="row">
                                @foreach($tech_menu as $menu)
                                    <li class="col-md-8 hidden-sm hidden-xs">
                                        <ul class="list-unstyled">
                                            <a href="{{ url('/tech/'. $menu->slug) }}">
                                                <li>
                                                    @if(count($menu->photos) > 0)
                                                        <img class="img-responsive"  src="{{ asset('storage').$menu->photos->first()->threezerozero }}" alt="">
                                                    @endif
                                                </li>
                                                <li>{{ $menu->title }}</li>
                                            </a>

                                        </ul>
                                    </li>
                                @endforeach
                            </div>


                        </div>


                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>



<div class="middleBar">
    <div class="container">
        <div class="row display-table">
            <div class="col-sm-6 vertical-align text-left hidden-xs">
                <a href="javascript:void(0);"> <img width="" src="https://lh3.googleusercontent.com/-r0Fhzz-so14/WNf9-4M65JI/AAAAAAAAD3E/ht6IhlL9gG4ujE2Hqiq70U3jBb6KQmaAQCL0B/w180-d-h43-p-rw/logo-2.png" alt=""></a>
            </div>
            <!-- end col -->
            <div class="col-sm-14 vertical-align text-center">
                <img class="img-responsive" style="margin-bottom: 5px" src="{{ asset('storage/banner/banner-header.jpg') }}">
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
<!--=========MIDDEL-TOP_BAR============-->

<nav class="topBar">
    <div class="container">
        <ul class="list-inline pull-left hidden-sm hidden-xs">

        </ul>
        <ul class="topBarNav pull-right">
            @if(Auth::check())
                @if(Auth::user()->isAdmin())
                    <li><a href="{{ url('/admin') }}">Admin</a> </li>
                @endif
            @endif
            @if (Auth::guest())
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @else

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
        </ul>
    </div>
</nav><!--=========-TOP_BAR============-->



