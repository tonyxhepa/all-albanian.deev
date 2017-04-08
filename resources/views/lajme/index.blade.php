@extends('layouts.app')

@section('menu')
    @include('layouts.lajme-menu')
@endsection
@section('content')
    <section>
        <div class="container">


            <div class="row header-row">
                <div class="col-lg-12 col-md-12 col-sm-24 col-xs-24">
                    <div class="row header-row">
                        @foreach($lajmi_i_pare as $epara)
                            <div class="col-sm-12">
                                @if(count($epara->photos) >= 1)
                                    <img class="img-responsive height-233"  src="{{ asset('storage').$epara->photos->first()->thumbnail }}" alt="">
                                @endif
                            </div>
                            <div class="col-sm-12">
                                <h3>{{ $epara->title }}</h3>
                                <p>{{ $epara->pershkrimi }}</p>
                            </div>
                        @endforeach
                    </div>
                    <div class="row header-row">
                        @foreach($kater_lajme as $tre)
                            <div class="col-sm-6 hover" >

                                <a href="">
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
                        @foreach($katera_lajme as $katerta)
                            <div class="col-sm-12 col-xs-24">
                                <a href="">

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
                        <a style="color: #eb9316" href="{{ url('/lajme/al') }}">Shqiperia</a>
                    </li>

                    <li class="pull-right hidden-xs">
                        <a href="{{ url('/lajme/al') }}">Te gjitha</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            @foreach($lajmet_al as $al)
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
    <div class="container">
        <div class="row">
            <div class="news-row-menu">
                <ul class="list-inline">
                    <li>
                        <a style="color: #eb9316" href="{{ url('/lajme/ks') }}">Kosova</a>
                    </li>

                    <li class="pull-right hidden-xs">
                        <a href="{{ url('/lajme/ks') }}">Te gjitha</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            @foreach($lajmet_ks as $al)
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
    <div class="container">
        <div class="row">
            <div class="news-row-menu">
                <ul class="list-inline">
                    <li>
                        <a style="color: #eb9316" href="{{ url('/lajme/mk') }}">Maqedonia</a>
                    </li>

                    <li class="pull-right hidden-xs">
                        <a href="{{ url('/lajme/mk') }}">Te gjitha</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            @foreach($lajmet_mk as $al)
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
    <div class="container">
        <div class="row">
            <div class="news-row-menu">
                <ul class="list-inline">
                    <li>
                        <a style="color: #eb9316" href="{{ url('/lajme/bota') }}">Bota</a>
                    </li>

                    <li class="pull-right hidden-xs">
                        <a href="{{ url('/lajme/bota') }}">Te gjitha</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            @foreach($lajmet_bota as $al)
                <div class="col-xs-16 col-sm-8 col-md-4">
                    <a href="{{ url('/lajme/'. $al->slug) }}">
                        @if(count($al->photos) >= 1)
                            <img class="img-responsive" src="{{ asset('storage'). $al->photos->first()->threezerozero }}">
                        @endif
                        <p class="max-lines">{{ $al->title }}</p>
                    </a>
                </div>
            @endforeach

        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{asset('js/vue.js')}}"></script>
    {{--<script type="text/javascript" href="js/app.js"></script>--}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="country_id"]').on('change', function() {
                var country_idID = $(this).val();
                if(country_idID) {
                    $.ajax({
                        url: '/mycityform/ajax/'+country_idID,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {


                            $('select[name="city_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="city_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });

                        }
                    });
                }else{
                    $('select[name="city"]').empty();
                }
            });
        });
    </script>

    <script>
        var app = new Vue({
            el: "#app",
            data: {
                disableWhenSelect: false,
                car_make_id: "",
                carModel: "",
                modelShow: false,
            }, methods: {
                getCarModel: function () {
                    if (this.car_make_id !== '') {
                        this.modelShow = true;
                    } else {
                        this.modelShow = false;
                    }

                }
            }
        });
    </script>
    <script>
        var app1 = new Vue({
            el: "#app-1",
            data: {
                disableWhenSelect: false,
                country_id: "",
                cityModel: "",
                cityModelShow: false,
            }, methods: {
                getCountryModel: function () {
                    if (this.country_id !== '') {
                        this.cityModelShow = true;
                    } else {
                        this.cityModelShow = false;
                    }

                }
            }
        });
    </script>


@endsection
@section('footer')
    @include('layouts.footer')
    @endsection
