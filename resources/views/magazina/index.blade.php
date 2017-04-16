@extends('layouts.app')

@section('menu')
    @include('layouts.app-menu')
    @endsection
@section('content')
    <section>
        <div class="container">


            <div class="row header-row">
                <div class="col-lg-12 col-md-12 col-sm-24 col-xs-24">
                    <div class="row header-row">
                        @foreach($vipa_nje as $epara)
                            <a href="{{ url('/magazina/'. $epara->slug) }}">
                                <div class="col-sm-12">
                                    @if(count($epara->photos) >= 1)
                                        <img class="img-responsive height-233"  src="{{ asset('storage').$epara->photos->first()->thumbnail }}" alt="">
                                    @endif
                                </div>
                                <div class="col-sm-12">
                                    <h3>{{ $epara->title }}</h3>
                                    <p>{{ $epara->pershkrimi }}</p>
                                </div>
                            </a>

                        @endforeach
                    </div>
                    <div class="row header-row">
                        @foreach($filma_kater as $tre)
                            <div class="col-sm-6 hover" >

                                <a href="{{ url('/magazina/'. $tre->slug) }}">
                                    @if(count($tre->photos) >= 1)
                                        <img class="img-responsive" src="{{ asset('storage').$tre->photos->first()->threezerozero }}">
                                    @endif
                                    <p class="max-lines">{{ $tre->title }}</p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-12 col-sm-24 col-xs-24">
                    <div class="row header-row">
                        @foreach($muzike_kater as $katerta)
                            <div class="col-sm-12 col-xs-24">
                                <a href="{{ url('/magazina/'. $katerta->slug) }}">

                                    <div class="imageHolder">
                                        @if(count($katerta->photos) >= 1)
                                            <img class="img-responsive height-233" src="{{ asset('storage').$katerta->photos->first()->thumbnail }}">
                                        @endif
                                        <h3 class="caption-bottom">{{ $katerta->title }}</h3>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                </div>

            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="news-row-menu">
                <ul class="list-inline">
                    <li>
                        <a style="color: #eb9316" href="{{ url('/magazina/vipat') }}">Vipat</a>
                    </li>

                    <li class="pull-right hidden-xs">
                        <a href="{{ url('/magazina/vipat') }}">Te gjitha</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            @foreach($vipat as $al)
                <div class="col-xs-16 col-sm-8 col-md-4">
                    <a href="{{ url('/lajme/'. $al->slug) }}">
                        @if(count($al->photos) >= 1)
                            <img class="img-responsive" src="{{ asset('storage'). $al->photos->first()->threezerozero }}">
                        @endif
                        <p>{{ $al->title }}</p>
                    </a>
                </div>
            @endforeach

        </div>
    </div>
    @endsection
@section('scripts')
    <script src="{{asset('js/vue.js')}}"></script>
    {{--<script type="text/javascript" href="js/app.js"></script>--}}


@endsection
