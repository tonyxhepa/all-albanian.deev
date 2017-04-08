@extends('layouts.app')
@section('menu')
    @include('layouts.app-menu')
@endsection
@section('content')
    <div class="container">
        <example></example>
    </div>


    <section>
        <div class="container">
            @foreach($makina_e_par as $epara)
                @if(count($epara->photos) >= 1)
            <div class="row header-row">
                <div class="col-lg-12 col-md-12 col-sm-24 col-xs-24">
                    <div class="row header-row">

                        <div class="col-sm-12">

                            <img class="img-responsive height-233"  src="{{ asset('storage').$epara->photos->first()->thumbnail }}" alt="">
                        </div>
                        <div class="col-sm-12">
                            <a href="{{ url('/makina/'. $epara->slug) }}">
                                <h3>{{ $epara->title }}</h3>
                                <p>{{ $epara->pershkrimi }}</p>
                            </a>

                        </div>
                    </div>
                    <div class="row header-row">
                        <div class="col-sm-6 hover" >
                           <a href="">
                               <img class="img-responsive" src="{{ asset('storage').$epara->photos->first()->threezerozero }}">
                               <p class="max-lines">dfvfd vdfv dfv fdv fdv df vd fv df vdf v fdv df vdf v fd vfd v dfv dfv f vv
                                   dfvd fv fdv fd fd v fdv df vfd vdf vfd v dfv</p>
                           </a>
                        </div>
                        <div class="col-sm-6">
                           <a href="">
                               <img class="img-responsive" src="{{ asset('storage').$epara->photos->first()->threezerozero }}">
                               <p class="max-lines">dfvfd vdfv dfv fdv fdv df vd fv df vdf v fdv df vdf v fd vfd v dfv dfv f vv
                                   dfvd fv fdv fd fd v fdv df vfd vdf vfd v dfv</p>

                           </a>   </div>
                        <div class="col-sm-6">
                            <a href="">
                                <img class="img-responsive" src="{{ asset('storage').$epara->photos->first()->threezerozero }}">
                                <p class="max-lines">dfvfd vdfv dfv fdv fdv df vd fv df vdf v fdv df vdf v fd vfd v dfv dfv f vv
                                    dfvd fv fdv fd fd v fdv df vfd vdf vfd v dfv</p>

                            </a>    </div>
                        <div class="col-sm-6">
                          <a href="">
                              <img class="img-responsive" src="{{ asset('storage').$epara->photos->first()->threezerozero }}">
                              <p class="max-lines">dfvfd vdfv dfv fdv fdv df vd fv df vdf v fdv df vdf v fd vfd v dfv dfv f vv
                                  dfvd fv fdv fd fd v fdv df vfd vdf vfd v dfv</p>

                          </a>   </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-24 col-xs-24">
                    <div class="row header-row">
                        <div class="col-sm-12 col-xs-24">
                            <a href="">
                                <div class="imageHolder">
                                    <img class="img-responsive height-233" src="{{ asset('storage').$epara->photos->first()->thumbnail }}">
                                    <h3 class="caption-bottom">hrdt rdtdtrd trd tr</h3>
                                </div>
                            </a>

                        </div>
                        <div class="col-sm-12 col-xs-24">
                            <div class="imageHolder">
                                <img class="img-responsive height-233" src="{{ asset('storage').$epara->photos->first()->thumbnail }}">
                                <h3 class="caption-bottom">hrdt rdtdtrd trd tr</h3>
                            </div>

                        </div>
                    </div>
                    <div class="row header-row">
                        <div class="col-sm-12 col-xs-24">
                            <div class="imageHolder">
                                <img class="img-responsive height-233" src="{{ asset('storage').$epara->photos->first()->thumbnail }}">
                                <h3 class="caption-bottom">hrdt rdtdtrd trd tr</h3>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xs-24">
                            <div class="imageHolder">
                                <img class="img-responsive height-233" src="{{ asset('storage').$epara->photos->first()->thumbnail }}">
                                <h3 class="caption-bottom">hrdt rdtdtrd trd tr</h3>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
                @endif

                @endforeach
        </div>
    </section>
    <div id="app">
        <example>

        </example>
    </div>
    <div class="container">
        <div class="row">
            <div class="news-row-menu">
                <ul class="list-inline">
                    <li>
                        <a style="color: #eb9316" href="">Kreu</a>
                    </li>
                    <li class="hidden-xs">
                        <a href="">Kreu</a>
                    </li>
                    <li class="hidden-xs">
                        <a href="">Kreu</a>
                    </li>
                    <li class="hidden-xs">
                        <a href="">Kreu</a>
                    </li>
                    <li class="hidden-xs">
                        <a href="">Kreu</a>
                    </li>
                    <li class="hidden-xs">
                        <a href="">Kreu</a>
                    </li>
                    <li class="pull-right hidden-xs">
                        <a href="">Kreu</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">

            <div class="col-xs-24 col-sm-12 col-md-6 col-white tony-flex">
                @foreach($makina_e_par as $epara)
                    <a href=""><div class="card-style hover">

                            <div class="media imageHolder">
                                @if(count($epara->photos) >= 1)
                                    <img class="img-responsive" src="{{ asset('storage').$epara->photos->first()->threezerozero }}">
                                    @endif
                                <div class="caption-camera"><strong>6</strong>
                                    <i class="glyphicon glyphicon-camera"></i>
                                </div>
                            </div>


                            <div class="media-body">
                                <h4 class="media-heading">
                                    {!! $epara->title !!}
                                </h4>
                            </div>
                            <div class="members pull-left">{{ $epara->pershkrimi }}</div>
                            <span class="badge">Ora News</span>


                    </div></a>
                @endforeach
            </div>
            <div class="col-xs-24 col-sm-12 col-md-6 col-white tony-flex">
                <ul class="media-list">
                    @foreach($tre_makina as $gjashte)

                       <li class="media card-style-sm hover">
                           <a href="">
                           <div class="media-left media-middle">

                               @if(count($gjashte->photos) >= 1)
                                   <img class="media-object card-img-sm imageHolder" src="{{ asset('storage').$gjashte->photos->first()->thumbnail }}" alt="...">
                                  @endif
                               <div class="caption-camera"><strong>6</strong>
                                   <i class="glyphicon glyphicon-camera"></i>
                               </div>

                           </div>
                           <div class="media-body">
                               <p class="shkrim-p-smoll">{{ str_limit($gjashte->title, $limit = 55, $end = '...') }}</p>
                               <span class="badge">Ora News</span>
                           </div>
                           </a> </li>



                    @endforeach
                </ul>
            </div>
            <div class="col-xs-24 col-sm-12 col-md-6 col-white tony-flex">
                @foreach($ttre_makina as $tgjashte)
                    <div class="card-style-sm">
                        <a href="">
                            <div class="media">
                                <div class="media-left media-middle">
                                    @if(count($tgjashte->photos) >= 1)
                                        <img class="media-object card-img" src="{{ asset('storage').$tgjashte->photos->first()->threezerozero }}" alt="...">
                                        @endif

                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">{{ $tgjashte->title }}</h4>
                                    <div class="members">{{ $tgjashte->pershkrimi }}</div>
                                    <span class="badge">Ora News</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
            <div class="col-xs-24 col-sm-12 col-md-6 col-white tony-flex">
                @foreach($makina_e_dyt as $edyta)
                    <div class="card-style">
                        <div class="media">
                            @if(count($edyta->photos) >= 1)
                                <img class="thumbnail img-responsive" src="{{ asset('storage').$epara->photos->first()->threezerozero }}">
                                   @endif
                            <div class="media-heading">{!! $edyta->title !!}</div>
                            <span class="badge">Ora News</span>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="news-row-menu">
                <ul class="list-inline">
                    <li>
                        <a style="color: #eb9316" href="">Kreu</a>
                    </li>
                    <li class="hidden-xs">
                        <a href="">Kreu</a>
                    </li>
                    <li class="hidden-xs">
                        <a href="">Kreu</a>
                    </li>
                    <li class="hidden-xs">
                        <a href="">Kreu</a>
                    </li>
                    <li class="hidden-xs">
                        <a href="">Kreu</a>
                    </li>
                    <li class="hidden-xs">
                        <a href="">Kreu</a>
                    </li>
                    <li class="pull-right hidden-xs">
                        <a href="">Kreu</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">

            <div class="col-xs-12 col-sm-6 col-md-3 col-white tony-flex">
                @foreach($makina_e_par as $epara)
                    <div class="card-style">
                        <div class="media imageHolder">
                            @if(count($epara->photos) >= 1)
                                <img class="img-responsive" src="{{ asset('storage').$epara->photos->first()->threezerozero }}">
                            @else
                                <img height ="75"src ="{{ 'http://placehold.it/400x400' }}" alt=""  class="img-circle">
                            @endif
                            <div class="caption-camera"><strong>6</strong>
                                <i class="glyphicon glyphicon-camera"></i>
                            </div>
                        </div>


                        <div class="media-body">
                            <h4 class="media-heading">
                                {!! $epara->title !!}
                            </h4>
                        </div>
                        <div class="members pull-left">{{ $epara->pershkrimi }}</div>
                        <span class="badge">Ora News</span>
                    </div>
                @endforeach
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-white tony-flex">
                <ul class="media-list">
                    @foreach($tre_makina as $gjashte)

                        <li class="media card-style-sm">

                            <div class="media-left media-middle">

                                @if(count($gjashte->photos) >= 1)
                                    <img class="media-object card-img-sm imageHolder" src="{{ asset('storage').$gjashte->photos->first()->thumbnail }}" alt="...">
                                @else
                                    <img class="media-object card-img-sm" src ="{{ 'http://placehold.it/400x400' }}" alt="">
                                @endif
                                <div class="caption-camera"><strong>6</strong>
                                    <i class="glyphicon glyphicon-camera"></i>
                                </div>

                            </div>
                            <div class="media-body">
                                <p class="shkrim-p-smoll">{{ str_limit($gjashte->title, $limit = 55, $end = '...') }}</p>
                                <span class="badge">Ora News</span>
                            </div>
                        </li>

                    @endforeach
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                @foreach($ttre_makina as $tgjashte)
                    <div class="card-style-sm">
                        <a href="">
                            <div class="media">
                                <div class="media-left media-middle">
                                    @if(count($tgjashte->photos) >= 1)
                                        <img class="media-object card-img" src="{{ asset('storage').$tgjashte->photos->first()->threezerozero }}" alt="...">
                                    @else
                                        <img class="media-object card-img" src ="{{ 'http://placehold.it/400x400' }}" alt="">
                                    @endif

                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">{{ $tgjashte->title }}</h4>
                                    <div class="members">{{ $tgjashte->pershkrimi }}</div>
                                    <span class="badge">Ora News</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                @foreach($makina_e_dyt as $edyta)
                    <div class="card-style">
                        <div class="media">
                            @if(count($edyta->photos) >= 1)
                                <img class="thumbnail img-responsive" src="{{ asset('storage').$epara->photos->first()->threezerozero }}">
                            @else
                                <img height ="75"src ="{{ 'http://placehold.it/400x400' }}" alt=""  class="img-circle">
                            @endif
                            <div class="media-heading">{!! $edyta->title !!}</div>
                            <span class="badge">Ora News</span>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div><div class="container">
        <div class="row">
            <div class="news-row-menu">
                <ul class="list-inline">
                    <li>
                        <a style="color: #eb9316" href="">Kreu</a>
                    </li>
                    <li class="hidden-xs">
                        <a href="">Kreu</a>
                    </li>
                    <li class="hidden-xs">
                        <a href="">Kreu</a>
                    </li>
                    <li class="hidden-xs">
                        <a href="">Kreu</a>
                    </li>
                    <li class="hidden-xs">
                        <a href="">Kreu</a>
                    </li>
                    <li class="hidden-xs">
                        <a href="">Kreu</a>
                    </li>
                    <li class="pull-right hidden-xs">
                        <a href="">Kreu</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">

            <div class="col-xs-12 col-sm-6 col-md-3 col-white tony-flex">
                @foreach($makina_e_par as $epara)
                    <div class="card-style">
                        <div class="media imageHolder">
                            @if(count($epara->photos) >= 1)
                                <img class="img-responsive" src="{{ asset('storage').$epara->photos->first()->threezerozero }}">
                            @else
                                <img height ="75"src ="{{ 'http://placehold.it/400x400' }}" alt=""  class="img-circle">
                            @endif
                            <div class="caption-camera"><strong>6</strong>
                                <i class="glyphicon glyphicon-camera"></i>
                            </div>
                        </div>


                        <div class="media-body">
                            <h4 class="media-heading">
                                {!! $epara->title !!}
                            </h4>
                        </div>
                        <div class="members pull-left">{{ $epara->pershkrimi }}</div>
                        <span class="badge">Ora News</span>
                    </div>
                @endforeach
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-white tony-flex">
                <ul class="media-list">
                    @foreach($tre_makina as $gjashte)

                        <li class="media card-style-sm">

                            <div class="media-left media-middle">

                                @if(count($gjashte->photos) >= 1)
                                    <img class="media-object card-img-sm imageHolder" src="{{ asset('storage').$gjashte->photos->first()->thumbnail }}" alt="...">
                                @else
                                    <img class="media-object card-img-sm" src ="{{ 'http://placehold.it/400x400' }}" alt="">
                                @endif
                                <div class="caption-camera"><strong>6</strong>
                                    <i class="glyphicon glyphicon-camera"></i>
                                </div>

                            </div>
                            <div class="media-body">
                                <p class="shkrim-p-smoll">{{ str_limit($gjashte->title, $limit = 55, $end = '...') }}</p>
                                <span class="badge">Ora News</span>
                            </div>
                        </li>

                    @endforeach
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                @foreach($ttre_makina as $tgjashte)
                    <div class="card-style-sm">
                        <a href="">
                            <div class="media">
                                <div class="media-left media-middle">
                                    @if(count($tgjashte->photos) >= 1)
                                        <img class="media-object card-img" src="{{ asset('storage').$tgjashte->photos->first()->threezerozero }}" alt="...">
                                    @else
                                        <img class="media-object card-img" src ="{{ 'http://placehold.it/400x400' }}" alt="">
                                    @endif

                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">{{ $tgjashte->title }}</h4>
                                    <div class="members">{{ $tgjashte->pershkrimi }}</div>
                                    <span class="badge">Ora News</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                @foreach($makina_e_dyt as $edyta)
                    <div class="card-style">
                        <div class="media">
                            @if(count($edyta->photos) >= 1)
                                <img class="thumbnail img-responsive" src="{{ asset('storage').$epara->photos->first()->threezerozero }}">
                            @else
                                <img height ="75"src ="{{ 'http://placehold.it/400x400' }}" alt=""  class="img-circle">
                            @endif
                            <div class="media-heading">{!! $edyta->title !!}</div>
                            <span class="badge">Ora News</span>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="news-row-menu">
                <ul class="list-inline">
                    <li>
                        <a style="color: #eb9316" href="">Kreu</a>
                    </li>
                    <li class="hidden-xs">
                        <a href="">Kreu</a>
                    </li>
                    <li class="hidden-xs">
                        <a href="">Kreu</a>
                    </li>
                    <li class="hidden-xs">
                        <a href="">Kreu</a>
                    </li>
                    <li class="hidden-xs">
                        <a href="">Kreu</a>
                    </li>
                    <li class="hidden-xs">
                        <a href="">Kreu</a>
                    </li>
                    <li class="pull-right hidden-xs">
                        <a href="">Kreu</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">

            <div class="col-xs-12 col-sm-6 col-md-3 col-white tony-flex">
                @foreach($makina_e_par as $epara)
                    <div class="card-style">
                        <div class="media imageHolder">
                            @if(count($epara->photos) >= 1)
                                <img class="img-responsive" src="{{ asset('storage').$epara->photos->first()->threezerozero }}">
                            @else
                                <img height ="75"src ="{{ 'http://placehold.it/400x400' }}" alt=""  class="img-circle">
                            @endif
                            <div class="caption-camera"><strong>6</strong>
                                <i class="glyphicon glyphicon-camera"></i>
                            </div>
                        </div>


                        <div class="media-body">
                            <h4 class="media-heading">
                                {!! $epara->title !!}
                            </h4>
                        </div>
                        <div class="members pull-left">{{ $epara->pershkrimi }}</div>
                        <span class="badge">Ora News</span>
                    </div>
                @endforeach
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-white tony-flex">
                <ul class="media-list">
                    @foreach($tre_makina as $gjashte)

                        <li class="media card-style-sm">

                            <div class="media-left media-middle">

                                @if(count($gjashte->photos) >= 1)
                                    <img class="media-object card-img-sm imageHolder" src="{{ asset('storage').$gjashte->photos->first()->thumbnail }}" alt="...">
                                @else
                                    <img class="media-object card-img-sm" src ="{{ 'http://placehold.it/400x400' }}" alt="">
                                @endif
                                <div class="caption-camera"><strong>6</strong>
                                    <i class="glyphicon glyphicon-camera"></i>
                                </div>

                            </div>
                            <div class="media-body">
                                <p class="shkrim-p-smoll">{{ str_limit($gjashte->title, $limit = 55, $end = '...') }}</p>
                                <span class="badge">Ora News</span>
                            </div>
                        </li>

                    @endforeach
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                @foreach($ttre_makina as $tgjashte)
                    <div class="card-style-sm">
                        <a href="">
                            <div class="media">
                                <div class="media-left media-middle">
                                    @if(count($tgjashte->photos) >= 1)
                                        <img class="media-object card-img" src="{{ asset('storage').$tgjashte->photos->first()->threezerozero }}" alt="...">
                                    @else
                                        <img class="media-object card-img" src ="{{ 'http://placehold.it/400x400' }}" alt="">
                                    @endif

                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">{{ $tgjashte->title }}</h4>
                                    <div class="members">{{ $tgjashte->pershkrimi }}</div>
                                    <span class="badge">Ora News</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                @foreach($makina_e_dyt as $edyta)
                    <div class="card-style">
                        <div class="media">
                            @if(count($edyta->photos) >= 1)
                                <img class="thumbnail img-responsive" src="{{ asset('storage').$epara->photos->first()->threezerozero }}">
                            @else
                                <img height ="75"src ="{{ 'http://placehold.it/400x400' }}" alt=""  class="img-circle">
                            @endif
                            <div class="media-heading">{!! $edyta->title !!}</div>
                            <span class="badge">Ora News</span>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="news-row-menu">
                <ul class="list-inline">
                    <li>
                        <a style="color: #eb9316" href="">Kreu</a>
                    </li>
                    <li class="hidden-xs">
                        <a href="">Kreu</a>
                    </li>
                    <li class="hidden-xs">
                        <a href="">Kreu</a>
                    </li>
                    <li class="hidden-xs">
                        <a href="">Kreu</a>
                    </li>
                    <li class="hidden-xs">
                        <a href="">Kreu</a>
                    </li>
                    <li class="hidden-xs">
                        <a href="">Kreu</a>
                    </li>
                    <li class="pull-right hidden-xs">
                        <a href="">Kreu</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">

            <div class="col-xs-12 col-sm-6 col-md-3 col-white tony-flex">
                @foreach($makina_e_par as $epara)
                    <div class="card-style">
                        <div class="media imageHolder">
                            @if(count($epara->photos) >= 1)
                                <img class="img-responsive" src="{{ asset('storage').$epara->photos->first()->threezerozero }}">
                            @else
                                <img height ="75"src ="{{ 'http://placehold.it/400x400' }}" alt=""  class="img-circle">
                            @endif
                            <div class="caption-camera"><strong>6</strong>
                                <i class="glyphicon glyphicon-camera"></i>
                            </div>
                        </div>


                        <div class="media-body">
                            <h4 class="media-heading">
                                {!! $epara->title !!}
                            </h4>
                        </div>
                        <div class="members pull-left">{{ $epara->pershkrimi }}</div>
                        <span class="badge">Ora News</span>
                    </div>
                @endforeach
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-white tony-flex">
                <ul class="media-list">
                    @foreach($tre_makina as $gjashte)

                        <li class="media card-style-sm">

                            <div class="media-left media-middle">

                                @if(count($gjashte->photos) >= 1)
                                    <img class="media-object card-img-sm imageHolder" src="{{ asset('storage').$gjashte->photos->first()->thumbnail }}" alt="...">
                                @else
                                    <img class="media-object card-img-sm" src ="{{ 'http://placehold.it/400x400' }}" alt="">
                                @endif
                                <div class="caption-camera"><strong>6</strong>
                                    <i class="glyphicon glyphicon-camera"></i>
                                </div>

                            </div>
                            <div class="media-body">
                                <p class="shkrim-p-smoll">{{ str_limit($gjashte->title, $limit = 55, $end = '...') }}</p>
                                <span class="badge">Ora News</span>
                            </div>
                        </li>

                    @endforeach
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                @foreach($ttre_makina as $tgjashte)
                    <div class="card-style-sm">
                        <a href="">
                            <div class="media">
                                <div class="media-left media-middle">
                                    @if(count($tgjashte->photos) >= 1)
                                        <img class="media-object card-img" src="{{ asset('storage').$tgjashte->photos->first()->threezerozero }}" alt="...">
                                    @else
                                        <img class="media-object card-img" src ="{{ 'http://placehold.it/400x400' }}" alt="">
                                    @endif

                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">{{ $tgjashte->title }}</h4>
                                    <div class="members">{{ $tgjashte->pershkrimi }}</div>
                                    <span class="badge">Ora News</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                @foreach($makina_e_dyt as $edyta)
                    <div class="card-style">
                        <div class="media">
                            @if(count($edyta->photos) >= 1)
                                <img class="thumbnail img-responsive" src="{{ asset('storage').$epara->photos->first()->threezerozero }}">
                            @else
                                <img height ="75"src ="{{ 'http://placehold.it/400x400' }}" alt=""  class="img-circle">
                            @endif
                            <div class="media-heading">{!! $edyta->title !!}</div>
                            <span class="badge">Ora News</span>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
@section('footer')
    @include('layouts.footer')
    @endsection
@section('scripts')
    <script src="{{ asset('js/vue.js') }}"></script>
    <script src="{{ asset('js/ex.js') }}"></script>

    <script>
        var app = new Vue({
            el: '#app1',
            data: {
                message: 'Hello Vue!'
            }
        })
    </script>
@endsection
